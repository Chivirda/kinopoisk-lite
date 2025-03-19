<?php

namespace App\Router;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound();
            exit;
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            $controller = new $controller;
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
        return require_once APP_PATH.'/config/routes.php';
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
