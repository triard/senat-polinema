<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModUser');
		$this->load->model('ModNotifikasi');
		$idUser = $this->session->userdata('id_user');
	}
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | User"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		$menu['login'] = $this->ModUser->edit($this->session->userdata('id_user'));
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['user'] = $this->ModUser->selectAll();
		$this->load->view('user',$data);
	}
	public function modal() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$this->load->view('modal/user', $data); 
	}
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUser->add();
			$id = $this->ModUser->getId();
			$this->ModUser->addAccount($id);
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Data User Berhasil Ditambah');
		}else{
			$this->session->set_flashdata('failed', 'Data User Gagal Ditambah');
		}
	}
	public function edit($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 1;
		$data['user'] = $this->ModUser->edit($id);
		$this->load->view('modal/user', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}		
		$this->ModUser->delete($id);
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Data User Berhasil Dihapus');
		}else{
			$this->session->set_flashdata('failed', 'Data User Gagal Dihapus');
		}
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUser->update();
		$this->ModUser->updateAccount();
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Data User Berhasil Diedit');
		}else{
			$this->session->set_flashdata('failed', 'Data User Gagal Diedit');
		}
	}
	public function editProfile($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data = array(
			'title' => "Senat Polinema | profile"
		);
		$data['user'] = $this->ModUser->edit($id);
		$this->load->view('auth/features_profile', $data);
	}

	public function updateFoto() {
		$q = $this->session->userdata('status');
		$id = $this->session->userdata('id_user');
		if($q != "login") {
			exit();
		}
		$this->ModUser->updateFoto();
		redirect(site_url('user/editProfile/'.$id));
	}
	public function resetPassword()  
	{  
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$id = $this->session->userdata('id_user');
		$password = $this->input->post('password');
		$confirm = $this->input->post('confirm');
		if($password == $confirm){
		$this->ModUser->updatePassword();
		$this->session->set_flashdata('success', 'Update password berhasil.');  
		redirect(site_url('user/editProfile/'.$id));  
		}else{
			$this->session->set_flashdata('fail', 'Update password gagal.');  
			redirect(site_url('user/editProfile/'.$id));
		}
	  }
	  public function updateProfile() {
		$q = $this->session->userdata('status');
		$id = $this->session->userdata('id_user');
		if($q != "login") {
			exit();
		} 
		$this->ModUser->updateProfile();
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Update Profile');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Update Profile');
		}
		redirect(site_url('user/editProfile/'.$id));
	}  
}