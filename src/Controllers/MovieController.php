<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class MovieController extends Controller
{
    public function index(): void
    {
        $this->view('movies');
    }

    public function add(): void
    {
        $this->view('admin/movies/add');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:2', 'max:255'],
        ]);

        if (!$validation) {
            dd('Validation failed', $this->request()->errors());
        }

        dd(mb_strlen($this->request()->input('name')));
    }
}
