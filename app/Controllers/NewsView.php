<?php

namespace App\Controllers;

class newsview extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'Berita Terbaru',
            'active' => 'berita terbaru'
        ];
    }


    public function index()
    {
        return view('frontend/news/newsview', $this->data);
    }
}
