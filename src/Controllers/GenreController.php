<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class GenreController extends Controller
{

    public function index()
    {
        $this->database()->get('genre');
        $this->view('admin/genres/create');
    }

    public function store(): void
    {
        $validation = $this->getRequest()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);

        if (! $validation) {
            foreach ($this->getRequest()->errors() as $field => $errors) {
                $this->getSession()->set($field, $errors);
            }

            $this->getRedirect('/admin/genres');
        }

//        $this->service()->store($this->request()->input('name'));
        $this->database()->insert('genre', [
            'name_genre' => $this->getRequest()->input('name'),
        ]);

        $this->getRedirect('/admin/genres');
    }

}