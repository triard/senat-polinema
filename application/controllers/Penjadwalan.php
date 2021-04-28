<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjadwalan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ModPenjadwalan');
		$this->load->model('ModUsulan');
		$this->load->model('ModUser');
		$this->load->model('ModNotifikasi');
		$idUser = $this->session->userdata('id_user');
	} 
	public function index()
	{
		$data = array(
			'title' => "Senat Polinema | Penjadwalan"
		);
        $q = $this->session->userdata('status');
		if($q != "login") {
			redirect('Homepage/home','refresh');
		}
		$menu['login'] = $this->ModPenjadwalan->edit($this->session->userdata('id_user'));
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['status_notifikasi'] = $this->ModUser->getStatusNotifikasi();
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
			 $nama_pengusul = $this->input->post('nama_pengusul');
			 $email = $this->input->post('email');
			 $keterangan = $this->input->post('pembahasan');
			 $status = $this->input->post('status');
			 $this->email->message("Berdasarkan hasil verifikasi dari usulan yang anda ajukan. berikut ini detail usulan anda : <br>
			 nama : $nama_pengusul <br>
			 email : $email<br>
			 Keterangan : $keterangan<br>
			 Status : $status <br><br>
			 Demikian pemberitahuan ini kami sampaikan. Atas perhatian dan izin yang diberikan kami ucapkan terima kasih.");
			 if ($this->email->send()) {
			 $this->session->set_flashdata('successemail', 'Sukses! email status usulan berhasil dikirim.');
			 } else {
			 $this->session->set_flashdata('failedemail', 'Error! email status usulan tidak dapat dikirim.');
			 }
		}
		$this->ModPenjadwalan->add();
	
		// Notifikasi
		$user = $this->session->userdata('level');
		$text = 'Melakukan penjadwalan '.$this->input->post('agenda');
		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y/m/d H:i:s'); 
		$id_user = $this->session->userdata('id_user');
		$id_penjadwalan = $this->ModNotifikasi->getLastIdPenjadwalan();
		$this->ModNotifikasi->addByPenjadwalan($user, $text, $time, $id_user, $id_penjadwalan);
		$this->ModUser->setUnreadStatusNotifikasi();
		
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Menambah Jadwal Baru');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Menambah Jadwal Baru');
		}
		$this->session->unset_userdata('email_sess');
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
		// Notifikasi
		$this->ModNotifikasi->deleteByPenjadwalan($id);
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Menghapus Jadwal');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Menghapus Jadwal');
		}
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModPenjadwalan->update();
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Mengedit Jadwal');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Mengedit Jadwal');
		}
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
