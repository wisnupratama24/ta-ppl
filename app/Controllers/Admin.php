<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BeritaModel;
use App\Models\LokerModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $data;
    protected $lokerModel;
    protected $userModel;
    protected $barangModel;
    protected $beritaModel;


    public function __construct()
    {

        $this->lokerModel = new LokerModel();
        $this->userModel = new UserModel();
        $this->barangModel = new BarangModel();
        $this->beritaModel = new BeritaModel();


        $this->data = [
            'title' => 'Dashboard',
            'active' => '/'
        ];
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard',
            'active' => '/',
            'jml_loker' => count($this->lokerModel->getAll()),
            'jml_user' => count($this->userModel->getAll()),
            'jml_barang' => count($this->barangModel->getAll()),
            'jml_berita' => count($this->beritaModel->getAll()),

        ];
        return view('backend/dashboard/index', $data);
    }
}
