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
        var_dump($this->getRequest());

        $validation = $this->getRequest()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        if (!$validation) {
            foreach ($this->getRequest()->errors() as $field => $errors) {
                $this->getSession()->set($field, $errors);
            }

            $this->getRedirect('/register');
        }

        $this->database()->insert('users', [
            'name' => $this->getRequest()->input('name'),
            'email' => $this->getRequest()->input('email'),
            'password' => password_hash($this->getRequest()->input('password'), PASSWORD_DEFAULT),
        ]);

        $this->getRedirect('/');
    }
}