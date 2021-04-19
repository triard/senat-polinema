<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModUsulan');
		$this->load->model('ModUser');
		$this->load->model('ModNotifikasi');
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Usulan"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		$menu['login'] = $this->ModUsulan->edit($this->session->userdata('id_user'));
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['usulan'] = $this->ModUsulan->selectAll();
		$data['usulanById'] = $this->ModUsulan->selectById();
		$data['userById'] = $this->ModUser->userById();
		$this->load->view('usulan',$data);
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
		$this->ModUsulan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function add_homepage() {
			$this->ModUsulan->add();
			if(json_encode(array("status" => TRUE))){
				$this->session->set_flashdata('success', 'Usulan Anda berhasil diajukan');
			}else{
				$this->session->set_flashdata('failed', 'Usulan Anda gagal diajukan');
			}
			$this->session->unset_userdata('email_sess');
			redirect('Homepage/email_usulan', 'refresh');  
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['usulan'] = $this->ModUsulan->edit($id);
		$this->load->view('modal/usulan', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUsulan->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUsulan->update();
		echo json_encode(array("status" => TRUE));
	}
	function download_file(){
		$this->load->helper('download');
		$name = $this->uri->segment(3);
		force_download("assets/dokumenPendukung/".$name, null);
	}
	public function acceptAdmin($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUsulan->setStatus($id, 'Disetujui');
		echo json_encode(array("status" => TRUE));
	}
	public function refuseAdmin($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUsulan->setStatus($id, 'Ditolak');
		echo json_encode(array("status" => TRUE));
	}
}