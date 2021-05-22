<?php

namespace App\Controllers;

use App\Libraries\Email;
use App\Models\UserModel;

class Auth extends BaseController
{

    protected $userModel;
    protected $emailLibrary;

    public function __construct()
    {
        $this->emailLibrary = new Email();
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

        $validation =  \Config\Services::validation();
        $valid = $this->validate($this->_validation_register());

        if (!$valid) {

            $output = [
                'error' => [
                    'nama' => $validation->getError('nama'),
                    'email' => $validation->getError('email'),
                    'tlp' => $validation->getError('tlp'),
                    'password' => $validation->getError('password'),
                    'password_conf' => $validation->getError('password_conf'),

                ],
                'state' => false,
                'token' => csrf_hash()
            ];

            return $this->response->setJSON($output);
        }

        $user = $this->userModel->where('email', $email)->countAll();

        if ($user > 0) {

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
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];


        $hash = md5(md5($nama . '-' . $email . '-' . $password));
        $link = base_url('register/aktivasi/') . '/' . $hash;
        $message = $this->emailLibrary->message_aktivasi($nama, $link);
        $sendMail = $this->emailLibrary->send_email($email, subjectEmailAktivasi, $message);

        if (!$sendMail) {
            $output = [
                'state' => false,
                'msg' => 'Pendaftaran gagal, tidak bisa mengirim email.',
                'token' => csrf_hash()
            ];
            return $this->response->setJSON($output);
        } else {
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
                'msg' => ' Pendaftaran kamu berhasil. Silahkan cek email, untuk aktivasi akun.',
                'token' => csrf_hash()
            ];

            return $this->response->setJSON($output);
        }
    }


    protected function _validation_register()
    {

        $validationRules = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'tlp' => [
                'label' => 'Telephone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal 5 character.',
                ],
            ],
            'password_conf' => [
                'label' => 'Password Konfirmasi',
                'rules' => 'required|min_length[5]|matches[password]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal 5 character.',
                    'matches' => '{field} tidak sama.',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => '{field} tidak valid',
                    'is_unique' => '{field} sudah ada.'
                ],
            ],

        ];

        return $validationRules;
    }
}
