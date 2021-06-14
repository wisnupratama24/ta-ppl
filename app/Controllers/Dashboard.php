<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'Dashboard'
        ];
    }

    public function index()
    {
        echo "Wisnu";
    }
}
