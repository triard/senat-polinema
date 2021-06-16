<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ModDokumentasi');
		$this->load->model('ModBerita');
		$this->load->model('ModKegiatan');
		$this->load->model('ModLaporan');
		$this->load->model('ModUser');
	} 

	public function home() {
		$data = array(
			'title' => "Senat Polinema | Homepage"
		);
		$data['dokumentasi'] = $this->ModDokumentasi->Selectcarousel();
		$data['berita'] = $this->ModBerita->selectBerita();
		$this->load->view('homepage/home.php', $data);
	}

	public function tentang() {
		$data = array(
			'title' => "Senat Polinema | Tentang Senat"
		);
		$data['user'] = $this->ModUser->selectAll();
		$this->load->view('homepage/tentang', $data);
	}
	
	public function komisi()
	{
		$data =  array(
			'title' => "Senat Polinema | Komisi"
		);
		$this->load->view('homepage/komisi', $data);
	}

	public function arsip()
	{
		$data =  array(
			'title' => "Senat Polinema | Arsip"
		);
		$data['laporan'] = $this->ModLaporan->selectHomepage();
	    $data['pengawasan'] = $this->ModLaporan->selectPengawasan();
		$data['pertimbangan'] = $this->ModLaporan->selectPertimbangan();
		$data['kebijakan'] = $this->ModLaporan->selectKebijakan();
		$this->load->view('homepage/arsip', $data);
	}

	public function gallery()
	{
		$data =  array(
			'title' => "Senat Polinema | Dokumentasi"
		);
		$data['dokumentasi'] = $this->ModDokumentasi->selectAll();
		$this->load->view('homepage/gallery', $data);
	}

	public function gallery_folder()
	{
		$data =  array(
			'title' => "Senat Polinema | Dokuemntasi"
		);
		$data['kegiatan'] = $this->ModKegiatan->selectAll();
		$this->load->view('homepage/gallery_folder', $data);
	}

	public function gallery_detail($id)
	{
		$data =  array(
			'title' => "Senat Polinema | Dokuemntasi"
		);
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['dokumentasi'] = $this->ModDokumentasi->selectAll();
		$this->load->view('homepage/gallery-detail', $data);
	}
	public function email_usulan()
	{
		$data =  array(
			'title' => "Senat Polinema | Usulan"
		);
		$this->load->view('homepage/usulan-email', $data);
	}
	public function konfirmasi_kode()
	{
		$data =  array(
			'title' => "Senat Polinema | Usulan"
		);
		$email = $this->input->post('email');
		$this->session->set_userdata('email_sess', $email);
		if(strpos($email, "polinema.ac.id") || strpos($email, "student.polinema.ac.id")){
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
			   $config['smtp_pass']="kinerjasenatpolinema";
			   $config['crlf']="\r\n";
			   $config['newline']="\r\n";
			   $config['wordwrap']=TRUE;
			   //memanggil library email dan set konfigurasi untuk pengiriman email
				   
			   $this->email->initialize($config);
			// Email dan nama pengirim
			$this->email->from('no-reply@senatpolinema.ac.id', 'Senat Polinema');
			// Email penerima
			$this->email->to($email); // Ganti dengan email tujuan
			// Lampiran email, isi dengan url/path file
			// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');	
			// Subject email
			$this->email->subject('Kode pengajuan Usulan');
			// Isi email
			//session code
			$kode_acak = rand( 1000 , 9999 );
			$this->session->set_userdata('kode', $kode_acak);
			$this->email->message("Ini adalah kode aktivasi, silahkan isi.<br><br> $kode_acak");
			if ($this->email->send()) {
				$this->session->set_flashdata('success', 'Sukses! email berhasil dikirim.');
				$this->load->view('homepage/usulan-kode', $data);
			} else {
				$this->session->set_flashdata('failed', 'Error! email tidak dapat dikirim.');
				redirect('Homepage/email_usulan', 'refresh');
			}
		}else{
			$this->session->set_flashdata('failed', 'email anda tidak valid.');
			redirect('Homepage/email_usulan', 'refresh');
		}
	}
	public function usulan()
	{
		$data =  array(
			'title' => "Senat Polinema | Usulan"
		);
		if($this->session->userdata('kode')== $this->input->post('kode_aktiv')){
			$this->session->set_flashdata('success', 'kode anda valid silahkan isi usulan anda.');
			$this->session->unset_userdata('kode_aktiv');
			$this->load->view('homepage/usulan', $data);
		}else{
			$this->session->set_flashdata('failed', 'kode anda invalid.');
			$this->session->unset_userdata('kode_aktiv');
			redirect('Homepage/konfirmasi_kode', 'refresh');
		}

	}
}