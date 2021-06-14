<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Marketplace extends BaseController
{
    protected $data;
    protected $barangModel;
    protected $output;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->data = [
            'title' => 'Marketplace',
            'active' => 'marketplace'
        ];
    }


    public function index()
    {
        $data = [
            'title' => 'Marketplace | List Jualan',
            'active' => 'marketplace',
            'barang' => $this->barangModel->getAll()
        ];
        return view('frontend/marketplace/index', $data);
    }

    public function form($id = null)
    {

        if ($id != null) {
            $model = $this->barangModel->getById($id);
            $data = [
                'id' => $id,
                'nama' => $model['nama'],
                'harga' => $model['harga'],
                'deskripsi' => $model['deskripsi'],
                'lokasi' => $model['lokasi'],
                'kategori' => $model['kategori'],
                'kondisi' => $model['kondisi'],
                'image' => $model['image'],
                'title' => 'Marketplace | Jual',
                'active' => 'marketplace',
                'btn_name' => "Edit Jualan"
            ];

            return view('frontend/marketplace/form', $data);
        } else {
            $data = [
                'id' => '',
                'nama' => '',
                'harga' => '',
                'deskripsi' => '',
                'lokasi' => '',
                'kategori' => '',
                'kondisi' => '',
                'image' => '',
                'title' => 'Marketplace | Jual',
                'active' => 'marketplace',
                'btn_name' => "Posting Jualan"

            ];
            return view('frontend/marketplace/form', $data);
        }
    }

    public function list()
    {
        $data = [
            'title' => 'Marketplace | List Jualan',
            'active' => 'marketplace',
            'barang' => $this->barangModel->getByUser()
        ];
        return view('frontend/marketplace/list', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Marketplace | Detail Jualan',
            'active' => 'marketplace',
            'barang' => $this->barangModel->getById($id)
        ];
        return view('frontend/marketplace/detail', $data);
    }

    public function submit($id = null)
    {
        $validation =  \Config\Services::validation();
        $valid = $this->validate($this->_validation());

        if (!$valid) {
            $this->output = [
                'error' => [
                    'nama' => $validation->getError('nama'),
                    'harga' => $validation->getError('harga'),
                    'kondisi' => $validation->getError('kondisi'),
                    'kategori' => $validation->getError('kategori'),
                    'deskripsi' => $validation->getError('deskripsi'),
                    'lokasi' => $validation->getError('lokasi'),
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

            $barang = [
                'nama' => $this->request->getVar('nama'),
                'harga' => $this->request->getVar('harga'),
                'kategori' => $this->request->getVar('kategori'),
                'kondisi' => $this->request->getVar('kondisi'),
                'lokasi' => $this->request->getVar('lokasi'),
                'deskripsi' => $this->request->getVar('deskripsi'),

            ];

            if ($id == null) {

                $barang['created_at'] = date('Y-m-d H:i:s');
                $barang['user_id'] = session()->get('user_id');


                if (!empty($image->getClientName())) {
                    $image->move('uploads', $newNameImage);
                    $barang['image'] = $newNameImage;
                } else {
                    $barang['image'] = 'default.png';
                }

                $this->barangModel->insert($barang);

                $this->output = [
                    'state' => true,
                    'msg' => 'Jualan kamu, berhasil diposting.',
                    'token' => csrf_hash()
                ];
            } else {
                $old_image = $this->request->getVar('old_image');

                if (empty($image->getClientName())) {
                    $barang['image'] = $old_image;
                } else {
                    if ($old_image != 'default.png') {
                        unlink('uploads/' . $old_image);
                    }
                    $image->move('uploads/', $newNameImage);
                    $barang['image'] = $newNameImage;
                }

                $this->barangModel->update($id, $barang);

                $this->output = [
                    'state' => true,
                    'msg' => 'Jualan kamu berhasil di update',
                    'token' => csrf_hash()
                ];
            }

            return $this->response->setJSON($this->output);
        }
    }

    protected function _validation()
    {

        $validationRules = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'harga' => [
                'label' => 'Harga',
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
            'kategori' => [
                'label' => 'kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'kondisi' => [
                'label' => 'kondisi',
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
        $barang = $this->barangModel->getById($id);
        if ($barang['user_id'] == session()->get('user_id')) {
            $this->barangModel->delete($id);
        }
        return redirect()->to(base_url('marketplace/list'));
    }
}
