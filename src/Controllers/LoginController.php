<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'login');
    }

    public function login()
    {
        $email = $this->getRequest()->input('email');
        $password = $this->getRequest()->input('password');

        $this->getAuth()->attempt($email, $password);

        if ($this->getAuth()->attempt($email, $password)) {
            $this->getRedirect('/');
        }

        $this->getSession()->set('error', 'Неверный логин или пароль');

        $this->getRedirect('/login');
    }

    public function logout(): void
    {
        $this->getAuth()->logout();
        $this->getRedirect('/login');
    }
}