<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}
	public function dashboard()
	{
		$data = [
			'ruangan' => $this->ruanganModel->getData(),
			'data' => $this->ruanganModel->activeData(),
			'data2' => $this->ruanganModel->nonactiveData(),

		];
		return view('dashboard', $data);
	}
}
