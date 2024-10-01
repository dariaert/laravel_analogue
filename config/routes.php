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

    // GET
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::get('/login', [LoginController::class, 'index']),
    Route::get('/admin/movies/create', [AdminController::class, 'index']),
    Route::get('/admin/genres', [GenreController::class, 'index']),
    Route::get('/admin/genres/update', [GenreController::class, 'edit']),

    // POST
    Route::post('/register', [RegisterController::class, 'register']),
    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/logout', [LoginController::class, 'logout']),
    Route::post('/admin/genres/create', [GenreController::class, 'store']),
    Route::post('/admin/genres/destroy', [GenreController::class, 'destroy']),
    Route::post('/admin/genres/update', [GenreController::class, 'update']),

];