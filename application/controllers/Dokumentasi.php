<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModDokumentasi');
		$this->load->model('ModKegiatan');
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
		$menu['login'] = $this->ModDokumentasi->edit($this->session->userdata('id_user'));
		$data['berita'] = $this->ModDokumentasi->selectAll();
		$this->load->view('berita',$data);
	}


	public function modal() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$this->load->view('modal/berita', $data); 
	}
	public function ModalDokumentasi($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 2;
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$this->load->view('modal/dokumentasi', $data);
	}
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModDokumentasi->add();
		echo json_encode(array("status" => TRUE));
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['berita'] = $this->ModDokumentasi->edit($id);
		$this->load->view('modal/berita', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModDokumentasi->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		
		$this->ModDokumentasi->update();
		echo json_encode(array("status" => TRUE));
	}
}
