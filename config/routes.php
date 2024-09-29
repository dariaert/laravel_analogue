<?php

use App\Controllers\HomeController;
use App\Router\Route;

return [

    Route::get('/', [HomeController::class, 'index'])

];