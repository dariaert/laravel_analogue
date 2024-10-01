<?php

use App\Controllers\AdminController;
use App\Controllers\GenreController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Core\Router\Route;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

return [

    Route::get('/', [HomeController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::get('/login', [LoginController::class, 'index']),
    Route::get('/admin/movies/create', [AdminController::class, 'index']),
    Route::get('/admin/genres', [GenreController::class, 'index']),

    Route::post('/register', [RegisterController::class, 'register']),
    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/logout', [LoginController::class, 'logout']),
    Route::post('/admin/genres/create', [GenreController::class, 'store']),

//    Route::get('/admin/add', [HomeController::class, 'add'], [AuthMiddleware::class]),
//    Route::post('/admin/add', [HomeController::class, 'store']),


];