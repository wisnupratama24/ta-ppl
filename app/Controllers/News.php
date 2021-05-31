<?php

namespace App\Controllers;

class News extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'News',
            'active' => 'news'
        ];
    }


    public function index()
    {
        return view('frontend/news/index', $this->data);
    }
}
