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
		$data['status_notifikasi'] = $this->ModUser->getStatusNotifikasi();
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
		$data['user'] = $this->ModUser->userId();
		$this->load->view('modal/usulan', $data); 
	}
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit(); 
		}
		$this->ModUsulan->add();
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Usulan Anda berhasil diajukan');
			// Notifikasi
			$user = 'Civitas Akademika';
			$text = 'Mengajukan sebuah usulan';
			date_default_timezone_set('Asia/Jakarta');
			$time = date('Y/m/d H:i:s'); 
			$id_usulan = $this->ModNotifikasi->getLastIdUsulan();
			$this->ModNotifikasi->addByUsulan($user, $text, $time, $id_usulan);
			$this->ModUser->setUnreadStatusNotifikasiAdmin();
		}else{
			$this->session->set_flashdata('failed', 'Usulan Anda gagal diajukan');
		}		
	}
	public function add_homepage() {
			$this->ModUsulan->add();
			if(json_encode(array("status" => TRUE))){
				$this->session->set_flashdata('success', 'Usulan Anda berhasil diajukan');
				// Notifikasi
				$user = 'Civitas Akademika';
				$text = 'Mengajukan sebuah usulan';
				date_default_timezone_set('Asia/Jakarta');
				$time = date('Y/m/d H:i:s'); 
				$id_usulan = $this->ModNotifikasi->getLastIdUsulan();
				$this->ModNotifikasi->addByUsulan($user, $text, $time, $id_usulan);
				$this->ModUser->setUnreadStatusNotifikasiAdmin();
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
	public function edit_verifikasi($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 2;
		$data['usulan'] = $this->ModUsulan->edit($id);
		$this->load->view('modal/usulan', $data);
	}
	public function delete($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUsulan->delete($id);
		// Notifikasi
		$this->ModNotifikasi->deleteByUsulan($id);
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Usulan Anda berhasil dihapus');
		}else{
			$this->session->set_flashdata('failed', 'Usulan Anda gagal dihapus');
		}		
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModUsulan->update();

		$this->load->library('email');
		$config = array();
		$config['charset']='utf-8';
		$config['useragent']='Codeigniter';
		$config['protocol']="smtp";
		$config['mailtype']="html";
		$config['smtp_host']="ssl://smtp.gmail.com";
		$config['smtp_port']="465";
		$config['smtp_timeout']="400";
		$config['smtp_user']="laporanakhir41@gmail.com";
		$config['smtp_pass']="laporanakhir2021";
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
		$config['wordwrap']=TRUE;
		//memanggil library email dan set konfigurasi untuk pengiriman email	
		$this->email->initialize($config);
	 	// Email dan nama pengirim
		 $this->email->from('no-reply@senatpolinema.ac.id', 'Senat Polinema');
	 	// Email penerima
		 $this->email->to($this->input->post('email')); // Ganti dengan email tujuan
	 	// Lampiran email, isi dengan url/path file
	 	// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');	
	 	// Subject email
	 	$this->email->subject('Status Pengajuan Usulan');
	 	// Isi email
		 $email = $this->input->post('email');
		 $keterangan = $this->input->post('keterangan');
		 $status = $this->input->post('status');
	 	$this->email->message("Berdasarkan hasil verifikasi dari usulan yang anda ajukan. Berikut ini detail usulan anda : <br>
		 Email <t>: $email<br>
		 Keterangan <t>: $keterangan<br>
		 Status <t>: $status <br><br>
		 Demikian pemberitahuan ini kami sampaikan. Atas perhatian dan izin yang diberikan kami ucapkan terima kasih.");
	 	if ($this->email->send()) {
		 $this->session->set_flashdata('successemail', 'Sukses! email status usulan berhasil dikirim.');
	 	} else {
		 $this->session->set_flashdata('failedemail', 'Error! email status usulan tidak dapat dikirim.');
	 	}
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Usulan Anda berhasil diperbarui');
		}else{
			$this->session->set_flashdata('failed', 'Usulan Anda gagal diperbarui');
		}		
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