<?php

namespace App\Router;

class Route 
{
    public function __construct(
        private string $uri,
        private string $method,
        private $action
    ) {}

    public static function get(string $uri, callable $action): Route {
        return new static($uri, 'GET', $action);
    }

    public static function post(string $uri, callable $action): Route {
        return new static($uri, 'POST', $action);
    }

    public function getUri(): string {
        return $this->uri;
    }

    public function getMethod(): string {
        return $this->method;
    }

    public function getAction(): callable {
        return $this->action;
    }
}
