<?php

use App\Controllers\HomeController;
use App\Router\Route;

return [
    Route::get('/', function () {
        echo '<h1>Hello World!</h1>';
    }),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', function () {
        include_once APP_PATH.'/views/pages/movies.php';
    }),
];
