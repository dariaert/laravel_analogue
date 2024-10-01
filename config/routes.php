<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Core\Router\Route;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

return [

    Route::get('/', [HomeController::class, 'index']),
    Route::get('/admin/add', [HomeController::class, 'add'], [AuthMiddleware::class]),
    Route::get('/register', [RegisterController::class, 'index'], [GuestMiddleware::class]),
    Route::get('/login', [LoginController::class, 'index'], [GuestMiddleware::class]),

    Route::post('/admin/add', [HomeController::class, 'store']),
    Route::post('/register', [RegisterController::class, 'register']),
    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/logout', [LoginController::class, 'logout']),

];