<?php

namespace App\Controllers;

class Marketplace extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'Marketplace',
            'active' => 'marketplace'
        ];
    }


    public function index()
    {
        return view('frontend/marketplace/index', $this->data);
    }

    public function jual_barang()
    {
        return view('frontend/marketplace/jual', $this->data);
    }

     public function submit($id = null)
    {
        // $validation =  \Config\Services::validation();
        // $valid = $this->validate($this->_validation());
        // $postId = $this->request->getVar('id');

        // if (!$valid) {
        //     $this->output = [
        //         'error' => [
        //             'nama' => $validation->getError('nama'),
        //             'tanggal_mulai' => $validation->getError('tanggal_mulai'),
        //             'tanggal_selesai' => $validation->getError('tanggal_selesai'),
        //             'status' => $validation->getError('status'),
        //             'harga' => $validation->getError('harga'),

        //         ],
        //         'state' => false,
        //         'token' => csrf_hash()
        //     ];
        //     return json_encode($this->output);
        // } else {

            
        // }
    }
}
