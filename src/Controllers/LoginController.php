<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view('login');
    }

    public function login(): void
    {
        $email = $this->request()->input('email');
        $password = $this->request()->input('password');

        dd($this->auth()->attempt($email, $password), $_SESSION);
        $validation = $this->request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }
            $this->redirect('/login');
        }

        $user = $this->db()->select('users', [
            'email' => $this->request()->input('email'),
        ]);

        if (!$user || !password_verify($this->request()->input('password'), $user['password'])) {
            $this->session()->set('login_error', 'Invalid email or password');
            $this->redirect('/login');
        }

        $this->session()->set('user_id', $user['id']);
        $this->redirect('/home');
    }
}
