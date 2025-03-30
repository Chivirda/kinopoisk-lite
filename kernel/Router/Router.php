<?php

namespace App\Kernel\Router;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Session\Session;
use App\Kernel\View\View;

class Router implements RouterInterface
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(
        private View $view,
        private Request $request,
        private Redirect $redirect,
        private Session $session
    ) {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (!$route) {
            $this->notFound();
            exit;
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            /**
             * @var \App\Kernel\Controller\Controller $controller
             */
            $controller = new $controller();

            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setRedirect'], $this->redirect);
            call_user_func([$controller, 'setSession'], $this->session);
            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }

    }

    /**
     * @return Route[]
     */
    private function getRoutes(): array
    {
        return require_once APP_PATH . '/config/routes.php';
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        return $this->routes[$method][$uri] ?? false;
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo '404 | Not Found';
    }

    private function initRoutes(): void
    {
        $rotes = $this->getRoutes();

        foreach ($rotes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
}
