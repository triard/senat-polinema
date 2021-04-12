<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjadwalan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModPenjadwalan');
		$this->load->model('ModUsulan');
		$this->load->model('ModUser');
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Penjadwalan"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		$menu['login'] = $this->ModPenjadwalan->edit($this->session->userdata('id_user'));
		$data['penjadwalan'] = $this->ModPenjadwalan->selectDataAll();
		$data['user'] = $this->ModUser->selectAll();
		$this->load->view('penjadwalan',$data);
	}
	public function modal() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$data['usulan'] = $this->ModUsulan->selectAll();
		$data['user'] = $this->ModUser->selectAll();
		$this->load->view('modal/penjadwalan', $data); 
	}
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$usulan = $this->input->post('id_usulan');
		$status = $this->input->post('status'); 
		if ($usulan != 0) {
			$this->ModUsulan->setStatus($usulan, $status);
		}
		$this->ModPenjadwalan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['penjadwalan'] = $this->ModPenjadwalan->edit($id);
		$data['getuser'] = $this->ModPenjadwalan->get_user_by_jadwal($id);
		$data['user'] = $this->ModUser->selectAll();
		$data['usulan'] = $this->ModUsulan->selectAll();
		$this->load->view('modal/penjadwalan', $data);
	}
	public function edit_status($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 2;
		$data['penjadwalan'] = $this->ModPenjadwalan->edit($id);
		$data['usulan'] = $this->ModUsulan->selectAll();
		$this->load->view('modal/penjadwalan', $data);
	}
	public function detail_peserta($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 5;
		$data['peserta'] = $this->ModPenjadwalan-> get_user_by_jadwal($id);
		$this->load->view('modal/penjadwalan', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$usulan = $this->ModPenjadwalan->getIdUsulan($id);
		$user = $this->ModPenjadwalan->getIdUser($id);
		$statusUsulan = $this->ModUsulan->getStatus($usulan);
		if ($statusUsulan == "Dijadwalkan - Komisi 1") {
			$this->ModUsulan->setStatus($usulan, "Diajukan - Komisi 1");
		} 
		else if ($statusUsulan == "Dijadwalkan - Komisi 2") {
			$this->ModUsulan->setStatus($usulan, "Diajukan - Komisi 2");
		}
		else if ($statusUsulan == "Dijadwalkan - Komisi 3") {
			$this->ModUsulan->setStatus($usulan, "Diajukan - Komisi 3");
		}
		else if ($statusUsulan == "Dijadwalkan - Komisi 4") {
			$this->ModUsulan->setStatus($usulan, "Diajukan - Komisi 4");
		}
		else if ($statusUsulan == "Dijadwalkan - Sekretaris") {
			$this->ModUsulan->setStatus($usulan, "Diajukan - Sekretaris");
		}
		else if ($statusUsulan == "Dijadwalkan - Sidang Pleno") {
			$this->ModUsulan->setStatus($usulan, "Perlu Tindak Lanjut - Sidang Pleno");
		}
		else if ($statusUsulan == "Dijadwalkan - Sidang Paripurna") {
			$this->ModUsulan->setStatus($usulan, "Perlu Tindak Lanjut - Sidang Paripurna");
		}
		$this->ModPenjadwalan->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModPenjadwalan->update();
		echo json_encode(array("status" => TRUE));
	}
	public function update_status() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModPenjadwalan->updateStatus();
		echo json_encode(array("status" => TRUE));
	}
	public function set_usulan($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['usulan'] = $this->ModUsulan->edit($id);
		$this->load->view('modal/set-usulan', $data);
	}
}
