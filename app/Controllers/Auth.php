<?php

namespace App\Controllers;

use App\Libraries\Email;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrait;
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

    public function login_process()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->getByEmail($email);

        if ($user['total'] <= 0) {
            $output = [
                'state' => false,
                'msg' => 'Tidak dapat menemukan email.',
                'token' => csrf_hash()
            ];
            // echo json_encode($output);
            return $this->response->setJSON($output);
            // return $this->respond($output, 200);
        } else {
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'email' => md5($user['email']),
                    'nama' => $user['nama'],
                    'logged_in' => TRUE,
                    'role' => $user['role_id']
                ]);
                $output = [
                    'state' => true,
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($output);
            } else {
                $output = [
                    'state' => false,
                    'msg' => 'Email dan password tidak cocok.',
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($output);
            }
        }
$output = [
    'state' => false
];

         return $this->response->setJSON($output);
    }


    public function reset_password($hash)
    {
        $hasUser = $this->userModel->getCountActivation($hash);
        if ($hasUser['total'] <= 0) {
            return redirect()->to('/register');
        } else {
            $data = [
                'title' => appName . ' | Reset Kata Sandi',
                'hash' => $hash,
                'nama' => $hasUser['nama'],
            ];
            return view('frontend/auth/reset_password', $data);
        }
    }

    public function reset_password_process()
    {

        $validation =  \Config\Services::validation();
        $valid = $this->validate($this->_validation_reset_password());

        if (!$valid) {

            $output = [
                'error' => [
                    'password' => $validation->getError('password'),
                    'password_conf' => $validation->getError('password_conf'),

                ],
                'state' => false,
                'token' => csrf_hash()
            ];

            return $this->response->setJSON($output);
        } else {
            $password = $this->request->getPost('password');
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
            $hash = $this->request->getPost('hash');
            $hasUser = $this->userModel->getCountActivation($hash);

            $dataUser = [
                'password' => $hashPassword,
            ];

            $updatePassword = $this->userModel->update($hasUser['id'], $dataUser);

            if ($updatePassword) {
                $output = [
                    'state' => true,
                    'msg' => 'Berhasil mengatur ulang kata sandi. Silahkan login',
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($output);
            } else {
                $output = [
                    'state' => false,
                    'msg' => 'Gagal mengatur ulang kata sandi',
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($output);
            }
        }
    }

    public function forgot_password()
    {
        $data = [
            'title' => appName . ' | Lupa Kata Sandi'
        ];
        return view('frontend/auth/forgot_password', $data);
    }

    public function forgot_password_process()
    {
        $email = $this->request->getPost('email');
        $user = $this->userModel->getByEmail($email);

        if ($user['total'] <= 0) {

            $output = [
                'state' => false,
                'msg' => 'Tidak dapat menemukan email.',
                'token' => csrf_hash()
            ];
            return $this->response->setJSON($output);
        } else {

            $hash = md5(md5($user['nama'] . '-' . $user['email'] . '-' . $user['password']));
            $link = base_url('password/reset') . '/' . $hash;
            $message = $this->emailLibrary->message_forgot_password($user['nama'], $link);
            $sendMail = $this->emailLibrary->send_email($email, subjectResetPassword, $message);

            if (!$sendMail) {
                $output = [
                    'state' => false,
                    'msg' => 'Tidak bisa mengirim email.',
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($output);
            } else {
                $output = [
                    'state' => true,
                    'msg' => 'Silahkan cek email anda, untuk mengatur ulang kata sandi.',
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($output);
            }
        }
    }


    public function aktivasi($hash)
    {

        $hasUser = $this->userModel->getCountActivation($hash);
        if ($hasUser['total'] <= 0) {
            return redirect()->to('/register');
        } else {
            $data = [
                'title' => appName . ' | Aktivasi Akun',
                'hash' => $hash,
                'nama' => $hasUser['nama'],
                'is_active' => $hasUser['is_active']
            ];
            return view('frontend/auth/aktivasi', $data);
        }
    }


    public function process_aktivasi()
    {

        $hash = $this->request->getPost('hash');

        $hasUser = $this->userModel->getCountActivation($hash);
        if ($hasUser['total'] <= 0) {
            $output = [
                'state' => false,
                'msg' => 'Aktivasi gagal, link tidak valid.',
                'token' => csrf_hash(),
            ];

            return $this->response->setJSON($output);
        } else {
            $dataUser = [
                'is_active' => 1
            ];
            $updateIsActive = $this->userModel->update($hasUser['id'], $dataUser);

            if ($updateIsActive) {
                $output = [
                    'state' => true,
                    'msg' => 'Aktivasi berhasil, silahkan login.',
                    'token' => csrf_hash(),

                ];

                return $this->response->setJSON($output);
            } else {
                $output = [
                    'state' => false,
                    'msg' => 'Aktivasi gagal, coba lagi nanti.',
                    'token' => csrf_hash(),
                ];

                return $this->response->setJSON($output);
            }
        }
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

        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $dataUser = [
            'nama' => $nama,
            'email' => $email,
            'tlp' => $tlp,
            'password' => $hashPassword,
            'role_id' => 'user',
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];


        $hash = md5(md5($nama . '-' . $email . '-' . $hashPassword));
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

    protected function _validation_reset_password()
    {
        $validationRules = [
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

        ];

        return $validationRules;
    }
}
