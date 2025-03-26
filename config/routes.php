<?php

use App\Controllers\HomeController;
use App\Controllers\MovieController;
use App\Kernel\Router\Route;

return [
    Route::get('/', function () {
        echo '<h1>Hello World!</h1>';
    }),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', [MovieController::class, 'index']),
    Route::get('/admin/movies/add', [MovieController::class, 'add']),
    Route::post('/admin/movies/add', [MovieController::class, 'store']),
];
