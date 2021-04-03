<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModUsulan');
		$this->load->model('ModUser');
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
		$secutity_code = $this->input->post('secutity_code');
		$mycaptcha = $this->session->userdata('mycaptcha');
		if ($this->input->post() && ($secutity_code == $mycaptcha)) {
			$this->ModUsulan->add();
			if(json_encode(array("status" => TRUE))){
				$this->session->set_flashdata('success', 'Usulan Anda berhasil diajukan');
			}else{
				$this->session->set_flashdata('failed', 'Usulan Anda gagal diajukan');
			}
			redirect('homepage/usulan', 'refresh'); 
		}else {
			// pesan akan muncul jika captcha salah
			$this->session->set_flashdata('failed','Captcha salah');
			redirect('homepage/usulan', 'refresh'); 
		   }


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

}