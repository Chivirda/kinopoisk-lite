<?php

namespace App\Router;

class Route 
{
    public function __construct(
        private string $uri,
        private string $method,
        private $action
    ) {}

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
