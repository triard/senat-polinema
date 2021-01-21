<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function home() {
		$data = array(
			'title' => "Homepage"
		);
		$this->load->view('homepage/home.php', $data);
	}

	public function tentang() {
		$data = array(
			'title' => "Senat Polinema"
		);
		$this->load->view('homepage/tentang', $data);
	}
	
	public function komisi()
	{
		$data =  array(
			'title' => "Senat Polinema"
		);
		$this->load->view('homepage/komisi', $data);
	}

	public function arsip()
	{
		$data =  array(
			'title' => "Senat Polinema"
		);
		$this->load->view('homepage/arsip', $data);
	}

	public function gallery()
	{
		$data =  array(
			'title' => "Senat Polinema"
		);
		$this->load->view('homepage/gallery', $data);
	}

	public function gallery_detail()
	{
		$data =  array(
			'title' => "Senat Polinema"
		);
		$this->load->view('homepage/gallery-detail', $data);
	}

	public function usulan()
	{
		$data =  array(
			'title' => "Senat Polinema"
		);
		$this->load->view('homepage/usulan', $data);
	}
}