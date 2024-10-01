<?php

namespace App\Controllers;

use App\Core\Controller\Controller;


class RegisterController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'register');
    }

    public function register()
    {
        $validation = $this->getRequest()->validate([
//            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
//            'password' => ['required', 'min:8', 'confirmed'],
//            'password_confirmation' => ['required', 'min:8'],
        ]);
//
        if (!$validation) {
            foreach ($this->getRequest()->errors() as $field => $errors) {
                $this->getSession()->set($field, $errors);
            }

            $this->getRedirect('/register');
        }

        print_r('store user in database');

        $userId = $this->database()->insert('users', [
            'email' => $this->getRequest()->input('email'),
            'password' => password_hash($this->getRequest()->input('password'), PASSWORD_DEFAULT),
        ]);
        print_r('user created with ID: ' . $userId);
//        $this->redirect('/');
    }
}