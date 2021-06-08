<?php

namespace App\Controllers;

class Wisata extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'Wisata',
            'active' => 'wisata'
        ];
    }


    public function index()
    {
        return view('frontend/wisata/index', $this->data);
    }
}
