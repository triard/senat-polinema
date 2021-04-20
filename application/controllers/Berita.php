<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModBerita');
		$this->load->model('ModNotifikasi');
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Berita"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		$menu['login'] = $this->ModBerita->edit($this->session->userdata('id_user'));
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['berita'] = $this->ModBerita->selectAll();
		$this->load->view('berita',$data);
	}
	public function berita()
	{
		$data = array(
			'title' => "Senat Polinema | Berita"
		);
		// $menu['login'] = $this->ModBerita->edit($this->session->userdata('id_user'));
		$data['berita'] = $this->ModBerita->selectAll();
		$this->load->view('homepage/berita',$data);
	}
	public function berita_detail($id)
	{
		$data = array(
			'title' => "Senat Polinema | Berita"
		);
		// $menu['login'] = $this->ModBerita->edit($this->session->userdata('id_user'));
		$this->ModBerita->TambahJumlahView($id);
		$data['berita'] = $this->ModBerita->beritaDetail($id);
		$this->load->view('homepage/berita-detail',$data);
	}
	public function modal() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$this->load->view('modal/berita', $data); 
	}
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModBerita->add();

		// Notifikasi
		$user = $this->session->userdata('level');
		$text = 'Menambahkan berita dengan judul '.$this->input->post('judul');
		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y/m/d H:i:s'); 
		$id_user = $this->session->userdata('id_user');
		$id_berita = $this->ModNotifikasi->getLastIdBerita();
		$this->ModNotifikasi->addByBerita($user, $text, $time, $id_user, $id_berita);
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Menambah Berita Baru');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Menambah Berita Baru');
		}		
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['berita'] = $this->ModBerita->edit($id);
		$this->load->view('modal/berita', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModBerita->delete($id);
		// Notifikasi
		$this->ModNotifikasi->deleteByBerita($id);
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Menghapus Berita');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Menghapus Berita');
		}		
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		
		$this->ModBerita->update();
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Mengedit Berita');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Mengedit Berita');
		}		
	}
}
