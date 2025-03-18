<?php

namespace App\Router;

class Router
{
    public function dispatch(string $uri) {
        $routes = $this->getRoutes();
        
        $routes[$uri]();
    }
    
    private function getRoutes(): array {
        return require_once APP_PATH . '/config/routes.php';
    }
}
