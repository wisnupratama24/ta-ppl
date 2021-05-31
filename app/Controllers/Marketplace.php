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
}
