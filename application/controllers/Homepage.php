<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ModDokumentasi');
		$this->load->model('ModBerita');
		$this->load->model('ModKegiatan');
		$this->load->model('ModLaporan');
	} 

	public function home() {
		$data = array(
			'title' => "Senat Polinema | Homepage"
		);
		$data['dokumentasi'] = $this->ModDokumentasi->Selectcarousel();
		$data['berita'] = $this->ModBerita->selectBerita();
		$this->load->view('homepage/home.php', $data);
	}

	public function tentang() {
		$data = array(
			'title' => "Senat Polinema | Tentang Senat"
		);
		$this->load->view('homepage/tentang', $data);
	}
	
	public function komisi()
	{
		$data =  array(
			'title' => "Senat Polinema | Komisi"
		);
		$this->load->view('homepage/komisi', $data);
	}

	public function arsip()
	{
		$data =  array(
			'title' => "Senat Polinema | Arsip"
		);
		$data['laporan'] = $this->ModLaporan->selectAll();
		$this->load->view('homepage/arsip', $data);
	}

	public function gallery()
	{
		$data =  array(
			'title' => "Senat Polinema | Dokumentasi"
		);
		$data['dokumentasi'] = $this->ModDokumentasi->selectAll();
		$this->load->view('homepage/gallery', $data);
	}

	public function gallery_folder()
	{
		$data =  array(
			'title' => "Senat Polinema | Dokuemntasi"
		);
		$data['kegiatan'] = $this->ModKegiatan->selectAll();
		$this->load->view('homepage/gallery_folder', $data);
	}

	public function gallery_detail($id)
	{
		$data =  array(
			'title' => "Senat Polinema | Dokuemntasi"
		);
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['dokumentasi'] = $this->ModDokumentasi->selectAll();
		$this->load->view('homepage/gallery-detail', $data);
	}

	public function usulan()
	{
		$data =  array(
			'title' => "Senat Polinema | Usulan"
		);
		$config_captcha = array(
			'img_path'  => './captcha/',
			'img_url'  => base_url().'captcha/',
			'img_width'  => '200',
			'img_height' => 40,
			'border' => 0, 
			'expiration' => 7200
		   );
		  
		   // create captcha image
		   $cap = create_captcha($config_captcha);
		  
		   // store image html code in a variable
		   $data['img'] = $cap['image'];
		  
		   // store the captcha word in a session
		$this->session->set_userdata('mycaptcha', $cap['word']);
		$this->load->view('homepage/usulan', $data);
	}

	
}