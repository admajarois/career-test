<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{
    protected $usersModel;



    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->session = session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth/register', $data);
    }
    public function registration()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[4]|max_length[30]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} terlalu pendek',
                    'max_length' => '{field} terlalu panjang',
                ]
            ],
            'email' => [
                'rules' => 'required|min_length[4]|max_length[30]|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} terlalu pendek',
                    'max_length' => '{field} terlalu panjang',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[30]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} terlalu pendek',
                    'max_length' => '{field} terlalu panjang'
                ]
            ],
            'confirm_password' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama.'
                ]
            ]
        ])) {
            $this->session->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $profileImage = $this->request->getFile('profile_image');
        // dd($profileImage);

        if ($profileImage->getError() == 4) {
            $imageName = 'profile.jpg';
        } else {
            $imageName = $profileImage->getRandomName();
            $profileImage->move('/images', $imageName);
        }

        $this->usersModel->insert([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'profile_image' => $imageName,
            'role_id' => 0,
            'is_active' => null
        ]);
        return redirect()->to('/login');
    }
}
