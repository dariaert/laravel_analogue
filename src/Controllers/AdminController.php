<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class AdminController extends Controller
{

    public function index(): void
    {
        $this->view(name: 'admin/movies/movieCreate');
    }

}