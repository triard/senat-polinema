<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BirokrasiKetuaUmum extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModLaporan');
		$this->load->model('ModKegiatan');
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Birokrasi Ketua Umum"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		// $menu['login'] = $this->ModLaporan->edit($this->session->userdata('id_user'));
		$data['laporan'] = $this->ModLaporan->getJoinAll();
		$this->load->view('birokrasi-ketua-umum',$data);
	}
	public function modal() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$data['nama'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$this->load->view('modal/usulan', $data); 
	}
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModLaporan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['usulan'] = $this->ModLaporan->edit($id);
		$this->load->view('modal/usulan', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModLaporan->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {exit();
		}
		$this->ModLaporan->update();
		echo json_encode(array("status" => TRUE));
	}
	public function updateStatusSetuju($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {exit();
		}
		$this->ModLaporan->updateStatus($id, 'Disetujui');
		echo json_encode(array("status" => TRUE));
	}
	public function updateStatusRevisi($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {exit();
		}
		$this->ModLaporan->updateStatus($id, 'Revisi');
		echo json_encode(array("status" => TRUE));
	}

	function download_file(){
		$this->load->helper('download');
		$name = $this->uri->segment(3);
		force_download("assets/laporanKegiatan/".$name, null);
	}
}
