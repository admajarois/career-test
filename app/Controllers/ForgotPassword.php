<?php

namespace App\Controllers;

use App\Models\UsersModel;

class ForgotPassword extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UsersModel();
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->email = \Config\Services::email();
    }
    public function index()
    {
        $data = [
            'title' => 'Reset Password'
        ];
        return view('auth/forgotPassword', $data);
    }

    public function sendMail()
    {
        $config = array(
            'protocol' => 'smtp',
            'priority' => 1,
            'SMTPHost' => 'smtp.gmail.com',
            'SMTPPort' => 587,
            'SMTPUser' => 'gemaktechno@gmail.com',
            'SMTPPass' => 'Gemak12345',
            'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong'
                ]
            ]
        ])) {
            $this->session->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $email = $this->request->getVar('email');
        $dataUser = $this->userModel->where([
            'email' => $email
        ])->first();
        if ($dataUser) {
            $this->email->setFrom('gemaktechno@gmail.com', 'PT Gemak Techno');
            $this->email->setTo($email);
            $this->email->setSubject('Reset Password');
            $this->email->setMessage('Ngetes Email dulur');
            if (!$this->email->send()) {
                $this->session->setFlashdata('error', $this->email->printDebugger());
                return redirect()->back();
            } else {
                $this->session->setFlashdata('success', "Berhasil dikirim");
                return redirect()->to(base_url('/login'));
            }
        } else {
            $this->session->setFlashdata('error', 'Email Tidak Terdaftar');
            return redirect()->back();
        }
    }
}
