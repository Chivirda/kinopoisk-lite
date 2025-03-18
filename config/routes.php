<?php

return [
    '/' => function (): void {
        echo '<h1>Hello World</h1>';
    },
    '/home' => function (): void {
        include_once APP_PATH . '/views/pages/home.php';
    },
    '/movies' => function (): void {
        include_once APP_PATH . '/views/pages/home.php';
    },
];
