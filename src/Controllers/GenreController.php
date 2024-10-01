<?php

namespace App\Controllers;

use App\Core\Controller\Controller;
use App\Services\GenreService;

class GenreController extends Controller
{

    private GenreService $service;
    public function index()
    {
        $genres = new GenreService($this->database());
        $this->view('admin/genres/genreCreate', [
            'genres' => $genres->all()
        ]);
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

        $this->service()->store($this->getRequest()->input('name'));

        $this->getRedirect('/admin/genres');
    }

    public function destroy()
    {
        $this->service()->delete($this->getRequest()->input('id'));

        $this->getRedirect('/admin/genres');
    }

    public function edit(): void
    {
        $this->view('admin/genres/genreUpdate');
//            'genre' => $this->service()->find($this->getRequest()->input('id'))
//        ]);
    }

    private function service()
    {
        if(! isset($this->service)){
            $this->service = new GenreService($this->database());
        }

        return $this->service;
    }

}