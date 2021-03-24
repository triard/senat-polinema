<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModKegiatan'); 
		$this->load->model('ModPenjadwalan');
		$this->load->model('ModUsulan'); 
		$this->load->model('ModLaporan'); 
		$this->load->model('ModDokumentasi'); 
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Agenda Kegiatan"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		$menu['login'] = $this->ModKegiatan->edit($this->session->userdata('id_user'));
		$data['kegiatan'] = $this->ModKegiatan->selectAll();
		$this->load->view('kegiatan',$data);
	}
	public function modal() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$data['penjadwalan'] = $this->ModPenjadwalan->selectAll();
		$this->load->view('modal/kegiatan', $data); 
	}
	
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$id_penjadwalan = $this->input->post('id_penjadwalan');
		if ($id_penjadwalan != 0) {
			$this->ModPenjadwalan->setStatus($id_penjadwalan, 'telah dilaksanakan');
			$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
			if ($id_usulan != 0) {
				$this->ModUsulan->setStatus($id_usulan, 'sedang diproses');
			}
		}
		$this->ModKegiatan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['penjadwalan'] = $this->ModPenjadwalan->selectAll();
		$this->load->view('modal/kegiatan', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModKegiatan->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModKegiatan->update();
		echo json_encode(array("status" => TRUE));
	}
	public function set_penjadwalan($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['penjadwalan'] = $this->ModPenjadwalan->edit($id);
		$this->load->view('modal/set-penjadwalan', $data);
	}
	public function kegiatan_detail($id)
	{
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data = array(
			'title' => "Senat Polinema | Agenda Kegiatan Detail"
		);
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['laporan'] = $this->ModLaporan->selectAll();
		$data['dokumentasi'] = $this->ModDokumentasi->selectAll();
		$this->load->view('kegiatan-detail', $data);
	}
}
