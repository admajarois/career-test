<?php


namespace App\Controllers;

class Auth extends BaseController
{
    public function loginPage()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }
    public function registerPage()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth/register', $data);
    }
}
