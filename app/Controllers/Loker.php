<?php

namespace App\Controllers;

use App\Models\LokerModel;

class Loker extends BaseController
{
    protected $data;
    protected $lokerModel;

    public function __construct()
    {
        $this->lokerModel = new LokerModel();
        $this->data = [
            'title' => 'Lowongan Kerja',
            'active' => 'loker'
        ];
    }


    public function index()
    {
        $data = [
            'title' => 'Lowongan Kerja',
            'active' => 'loker',
            'loker' => $this->lokerModel->getAll()
        ];
        return view('frontend/loker/index', $data);
    }

    public function form($id = null)
    {

        if ($id != null) {
            $model = $this->lokerModel->getById($id);
            $data = [
                'id' => $id,
                'posisi' => $model['posisi'],
                'pt' => $model['pt'],
                'tipe' => $model['tipe'],
                'deskripsi' => $model['deskripsi'],
                'lokasi' => $model['lokasi'],
                'email' => $model['email'],
                'tlp' => $model['tlp'],
                'gaji' => $model['gaji'],
                'image' => $model['image'],
                'title' => 'Lowongan Kerja | Post',
                'active' => 'loker',
                'btn_name' => "Edit Lowongan"
            ];

            return view('frontend/loker/form', $data);
        } else {
            $data = [
                'id' => '',
                'posisi' => '',
                'pt' => '',
                'email' => '',
                'tlp' => '',
                'tipe' => '',
                'gaji' => '',
                'deskripsi' => '',
                'lokasi' => '',
                'image' => '',
                'title' => 'Lowongan Kerja | Edit',
                'active' => 'loker',
                'btn_name' => "Posting Lowongan"

            ];
            return view('frontend/loker/form', $data);
        }
    }

    public function submit($id = null)
    {
        $validation =  \Config\Services::validation();
        $valid = $this->validate($this->_validation());

        if (!$valid) {
            $this->output = [
                'error' => [
                    'pt' => $validation->getError('pt'),
                    'email' => $validation->getError('email'),
                    'deskripsi' => $validation->getError('deskripsi'),
                    'tipe' => $validation->getError('tipe'),
                    'deskripsi' => $validation->getError('deskripsi'),
                    'lokasi' => $validation->getError('lokasi'),
                    'posisi' => $validation->getError('lokasi'),
                ],
                'state' => false,
                'token' => csrf_hash()
            ];
            return json_encode($this->output);
        } else {

            $image = $this->request->getFile('image');

            if (!empty($image->getClientName())) {
                $newNameImage = 'im-' . uniqid() . '.' . $image->getClientExtension();
            }

            $loker = [
                'posisi' => $this->request->getVar('posisi'),
                'email' => $this->request->getVar('email'),
                'tlp' => $this->request->getVar('tlp'),
                'tipe' => $this->request->getVar('tipe'),
                'lokasi' => $this->request->getVar('lokasi'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'pt' => $this->request->getVar('pt'),
                'gaji' => $this->request->getVar('gaji'),

            ];

            if ($id == null) {

                $loker['created_at'] = date('Y-m-d H:i:s');
                $loker['user_id'] = session()->get('user_id');


                if (!empty($image->getClientName())) {
                    $image->move('uploads', $newNameImage);
                    $loker['image'] = $newNameImage;
                } else {
                    $loker['image'] = 'default.png';
                }

                $this->lokerModel->insert($loker);

                $this->output = [
                    'state' => true,
                    'msg' => 'Lowongan kamu, berhasil diposting.',
                    'token' => csrf_hash()
                ];
            } else {
                $old_image = $this->request->getVar('old_image');

                if (empty($image->getClientName())) {
                    $loker['image'] = $old_image;
                } else {
                    if ($old_image != 'default.png') {
                        unlink('uploads/' . $old_image);
                    }
                    $image->move('uploads/', $newNameImage);
                    $loker['image'] = $newNameImage;
                }

                $this->lokerModel->update($id, $loker);

                $this->output = [
                    'state' => true,
                    'msg' => 'Lowongan kamu berhasil di update',
                    'token' => csrf_hash()
                ];
            }

            return $this->response->setJSON($this->output);
        }
    }

    public function list()
    {
        $data = [
            'title' => 'Lowongan Kerja | List Lowongan',
            'active' => 'loker',
            'loker' => $this->lokerModel->getByUser()
        ];
        return view('frontend/loker/list', $data);
    }

    protected function _validation()
    {

        $validationRules = [
            'pt' => [
                'label' => 'Nama Perusahaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'tipe' => [
                'label' => 'tipe',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'lokasi' => [
                'label' => 'lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'deskripsi' => [
                'label' => 'deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'posisi' => [
                'label' => 'posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],

        ];

        return $validationRules;
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $loker = $this->lokerModel->getById($id);
        if ($loker['user_id'] == session()->get('user_id')) {
            $this->lokerModel->delete($id);
        }
        return redirect()->to(base_url('loker/list'));
    }
}
