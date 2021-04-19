<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModUser');
		$this->load->model('ModNotifikasi');
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Notifikasi"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('auth/auth_login','refresh');
		}
		$data['notifikasiAll'] = $this->ModNotifikasi->selectAll();
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['user'] = $this->ModUser->selectAll();
		$this->load->view('notifikasi',$data);
	}
}
