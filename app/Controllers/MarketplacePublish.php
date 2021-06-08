<?php

namespace App\Controllers;

class MarketplacePublish extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'Marketplace - Jual Barang',
            'active' => 'marketplace-jual barang'
        ];
    }


    public function index()
    {
        return view('frontend/marketplace/publish', $this->data);
    }
}