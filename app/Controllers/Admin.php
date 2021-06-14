<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'Dashboard',
            'active' => '/'
        ];
    }

    public function index()
    {
        return view('backend/dashboard/index', $this->data);
    }
}
