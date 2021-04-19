<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModLaporan');
		$this->load->model('ModKegiatan');
		$this->load->model('ModNotifikasi');
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Laporan"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		$menu['login'] = $this->ModLaporan->edit($this->session->userdata('id_user'));
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['laporan'] = $this->ModLaporan->selectAll();
		$this->load->view('laporan',$data);
	}

	public function modal() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$this->load->view('modal/laporan', $data); 
	}
	public function modalLaporan($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 2;
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$this->load->view('modal/laporan', $data);
	}
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModLaporan->add();

		// Notifikasi
		$user = $this->session->userdata('level');
		$agenda = $this->ModNotifikasi->getKegiatanFromLaporan($this->input->post('id_kegiatan'));
		$text = 'Mengunggah laporan kegiatan '.$agenda;
		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y/m/d H:i:s'); 
		$id_user = $this->session->userdata('id_user');
		$id_laporan = $this->ModNotifikasi->getLastIdLaporan();
		$this->ModNotifikasi->addByLaporan($user, $text, $time, $id_user, $id_laporan);

		echo json_encode(array("status" => TRUE));
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['laporan'] = $this->ModLaporan->edit($id);
		$this->load->view('modal/laporan', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModLaporan->delete($id);
		// Notifikasi
		$this->ModNotifikasi->deleteByLaporan($id);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		
		$this->ModLaporan->update();
		echo json_encode(array("status" => TRUE));
	}
	function download_file(){
		$this->load->helper('download');
		$name = $this->uri->segment(3);
		force_download("assets/laporanKegiatan/".$name, null);
	}
	public function viewLaporan($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 3;
		$data['laporan'] = $this->ModLaporan->edit($id);
		$this->load->view('modal/laporan', $data);
	}
}
