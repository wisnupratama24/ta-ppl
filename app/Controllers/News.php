<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\LokerModel;

class News extends BaseController
{
    protected $data;
    protected $beritaModel;
    protected $lokerModel;

    public function __construct()
    {
        $this->lokerModel = new LokerModel();
        $this->beritaModel = new BeritaModel();
        $this->data = [
            'title' => 'News',
            'active' => 'news'
        ];
    }


    public function index()
    {
        $data = [
            'title' => 'News',
            'active' => 'news',
            'berita' => $this->beritaModel->getAll(),
            'loker' => $this->lokerModel->getAll(),


        ];
        return view('frontend/news/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'News',
            'active' => 'news',
            'berita' => $this->beritaModel->getBySlug($slug),
            'loker' => $this->lokerModel->getAll(),

        ];
        return view('frontend/news/detail', $data);
    }
}
