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

    public function jual_barang()
    {
        return view('frontend/marketplace/jual', $this->data);
    }

    public function list()
    {
        $data = [
            'title' => 'Marketplace | List Jualan',
            'active' => 'marketplace',
            'barang' => $this->barangModel->getAll()
        ];
        return view('frontend/marketplace/list', $data);
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


            if($id == null ) {
                $barang = [
                    'nama' => $this->request->getVar('nama'),
                    'harga' => $this->request->getVar('harga'),
                    'kategori' => $this->request->getVar('kategori'),
                    'kondisi' => $this->request->getVar('kondisi'),
                    'lokasi' => $this->request->getVar('lokasi'),
                    'deskripsi' => $this->request->getVar('kategori'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'user_id' => session()->get('user_id')
                ];


            

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

}
