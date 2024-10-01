<?php

namespace App\Controllers;

use App\Core\Controller\Controller;
use App\Core\Http\Redirect;
use App\Core\View\View;

class HomeController extends Controller
{

    public function index(): void
    {
        $this->view('home');
    }

    public function add()
    {
        $this->view('admin/add');
    }

    public function store()
    {
        $file = $this->getRequest()->file('image');

        var_dump($file->move('movies'));

        $validation = $this->getRequest()->validate([
            'name' => ['required', 'min:3', 'max:50'],
        ]);

        if(!$validation){
            foreach ($this->getRequest()->errors() as $field => $errors) {
                $this->getSession()->set($field, $errors);
            }
            $this->getRedirect('/admin/add');
        }

//        $id = $this->database()->insert('movies', [
//            'name' => $this->getRequest()->input('name'),
//        ]);

//        print_r("Success with id: $id");
    }

}