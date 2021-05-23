<?php

namespace App\Controllers;

class Home extends BaseController
{

	protected $data;

	public function __construct()
	{
		$this->data = [
			'title' => 'Semarang',
			'active' => '/'
		];
	}

	public function index()
	{
		return view('frontend/home/index', $this->data);
	}
}
