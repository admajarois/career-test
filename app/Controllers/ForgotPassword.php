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
        $this->config = array(
            'protocol' => 'smtp',
            'priority' => 1,
            'SMTPHost' => 'smtp.gmail.com',
            'SMTPPort' => 587,
            'SMTPUser' => 'yourmail', #insert your password as a mail sender
            'SMTPPass' => 'yourpass', #insert yout gmail password
            'charset' => 'iso-8859-1'
        );
    }
    public function index()
    {
        $data = [
            'title' => 'Reset Password'
        ];
        return view('auth/forgotPassword', $data);
    }
    #function for sending mail
    public function sendMail()
    {
        $this->email->initialize($this->config);
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
            $this->email->setFrom('your gmail', 'your company name'); #set gmail and name as sender
            $this->email->setTo($email);
            $this->email->setSubject('Reset Password');
            $this->email->setMessage('Ikuti link berikut ini untuk mengganti password anda, http://localhost:8080/changePassword/' . $dataUser['id']);
            if (!$this->email->send()) {
                $this->session->setFlashdata('error', $this->email->printDebugger());
                return redirect()->back();
            } else {
                $this->session->setFlashdata('success', "Berhasil dikirim, silahkan cek email anda");
                return redirect()->to(base_url('/login'));
            }
        } else {
            $this->session->setFlashdata('error', 'Email Tidak Terdaftar');
            return redirect()->back();
        }
    }
}
