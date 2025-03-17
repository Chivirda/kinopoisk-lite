<?php

return [
    '/' => function (): void {
        echo '<h1>Hello World</h1>';
    },
    '/home' => function (): void {
        echo '<h1>Home</h1>';
    },
    '/movies' => function (): void {
        echo '<h1>Movies</h1>';
    },
];
