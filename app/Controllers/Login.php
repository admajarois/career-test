<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->session = session();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login.php', $data);
    }

    public function process()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus diisi'
                ]
            ], 'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password harus diisi'
                ]
            ]

        ])) {
            $this->session->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $this->usersModel->where([
            'email' => $email
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                $this->session->set([
                    'email' => $dataUser['email'],
                    'name'  => $dataUser['name'],
                    'password' => $dataUser['password'],
                    'profile_image' => $dataUser['profile_image'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('home'));
            } else {
                $this->session->setFlashdata('error', 'Password Salah');
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata('error', 'Email Tidak Terdaftar');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
