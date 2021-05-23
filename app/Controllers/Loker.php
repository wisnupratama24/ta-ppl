<?php

namespace App\Controllers;

class Loker extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'Lowongan Kerja',
            'active' => 'loker'
        ];
    }


    public function index()
    {
        return view('frontend/loker/index', $this->data);
    }
}
