<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{

    protected $data;
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->data = [
            'title' => 'Semarang',
            'active' => '/'
        ];
    }

    public function index()
    {
        $data = [
            'title' => 'Berita',
            'active' => 'berita',
            'berita' => $this->beritaModel->getAll()
        ];
        return view('backend/berita/index', $data);
    }

    public function form($id = null)
    {

        if ($id != null) {
            $model = $this->beritaModel->getById($id);
            $data = [
                'id' => $id,
                'isi' => $model['isi'],
                'judul' => $model['judul'],
                'image' => $model['image'],
                'status' => $model['status'],
                'title' => 'Edit Berita',
                'active' => 'berita',
            ];
            return view('backend/berita/form', $data);
        } else {
            $data = [
                'id' => '',
                'judul' => '',
                'isi' => '',
                'image' => '',
                'status' => '',
                'title' => 'Tambah Berita',
                'active' => 'berita',

            ];
            return view('backend/berita/form', $data);
        }
    }

    public function submit($id = null)
    {
        $validation =  \Config\Services::validation();
        $valid = $this->validate($this->_validation());

        if (!$valid) {
            $this->output = [
                'error' => [
                    'judul' => $validation->getError('judul'),
                    'isi' => $validation->getError('isi'),
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

            $judul = $this->request->getVar('judul');
            $berita = [
                'judul' => $judul,
                'isi' => $this->request->getVar('isi'),
                'status' => $this->request->getVar('status'),
                'slug' => url_title($judul, '-'),
            ];

            if ($id == null) {

                $berita['created_at'] = date('Y-m-d H:i:s');
                $berita['user_id'] = session()->get('user_id');


                if (!empty($image->getClientName())) {
                    $image->move('uploads', $newNameImage);
                    $berita['image'] = $newNameImage;
                } else {
                    $berita['image'] = 'default.png';
                }

                $this->beritaModel->insert($berita);

                $this->output = [
                    'state' => true,
                    'msg' => 'Berhasil menambah berita.',
                    'token' => csrf_hash()
                ];
            } else {
                $old_image = $this->request->getVar('old_image');

                if (empty($image->getClientName())) {
                    $berita['image'] = $old_image;
                } else {
                    if ($old_image != 'default.png') {
                        unlink('uploads/' . $old_image);
                    }
                    $image->move('uploads/', $newNameImage);
                    $berita['image'] = $newNameImage;
                }

                $this->beritaModel->update($id, $berita);

                $this->output = [
                    'state' => true,
                    'msg' => 'Lowongan kamu berhasil di update',
                    'token' => csrf_hash()
                ];
            }

            return $this->response->setJSON($this->output);
        }
    }

    protected function _validation()
    {

        $validationRules = [
            'judul' => [
                'label' => 'judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'isi' => [
                'label' => 'isi berita',
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
        $berita = $this->beritaModel->getById($id);
        if ($berita['user_id'] == session()->get('user_id')) {
            $this->beritaModel->delete($id);
        }
        return redirect()->to(base_url('admin/berita'));
    }
}
