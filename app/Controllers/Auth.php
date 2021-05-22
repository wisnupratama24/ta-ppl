<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function register()
    {
        $data = [
            'title' => appName . ' | Register'
        ];
        return view('frontend/auth/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => appName . ' | Login'
        ];
        return view('frontend/auth/login', $data);
    }

    public function process_register()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $tlp = $this->request->getPost('tlp');




        $user = $this->userModel->where('email', $email)->first();

        if ($user['email']) {

            $output = [
                'state' => false,
                'msg' => 'Pendaftaran gagal, email sudah terdaftar.',
                'token' => csrf_hash()
            ];
            return $this->response->setJSON($output);
        }

        $dataUser = [
            'nama' => $nama,
            'email' => $email,
            'tlp' => $tlp,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role_id' => 'user',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $createUser = $this->userModel->insert($dataUser);

        if (!$createUser) {
            $output = [
                'state' => false,
                'msg' => 'Pendaftaran gagal, coba lagi nanti.',
                'token' => csrf_hash()
            ];
            return $this->response->setJSON($output);
        }

        $output = [
            'state' => true,
            'msg' => 'Pendaftaran berhasil, silahkan login.',
            'token' => csrf_hash()
        ];

        return $this->response->setJSON($output);
    }
}
