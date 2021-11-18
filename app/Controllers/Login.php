<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login.php', $data);
    }
}
