<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function create(): void
    {
        $this->view('admin/categories/add');
    }

    public function edit(): void
    {
        $category = $this->service()->find($this->request()->input('id'));

        $this->view('admin/categories/update', [
            'category' => $category
        ]);
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:2', 'max:255'],
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }
            $this->redirect('/admin/categories/add');
        }

        $this->db()->insert('categories', [
            'name' => $this->request()->input('name'),
        ]);

        $this->redirect('/admin');
    }

    public function update(): void
    {
        $this->db()->update('categories', [
            'name' => $this->request()->input('name')
        ], [
            'id' => $this->request()->input('id')
        ]);

        $this->redirect('/admin');
    }

    public function destroy(): void
    {
        $this->db()->delete('categories', [
            'id' => $this->request()->input('id')
        ]);

        $this->redirect('/admin');
    }

    private function service(): CategoryService
    {
        return new CategoryService($this->db());
    }
}
