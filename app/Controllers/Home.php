<?php

namespace App\Controllers;

use App\Models\LokerModel;

class Home extends BaseController
{

	protected $data;
	protected $lokerModel;

	public function __construct()
	{
		$this->lokerModel = new LokerModel();
		$this->data = [
			'title' => 'Semarang',
			'active' => '/'
		];
	}

	public function index()
	{

		$data = [
			'title' => 'Semarang',
			'active' => '/',
			'loker' => $this->lokerModel->getAll()
		];
		return view('frontend/home/index', $data);
	}
}
