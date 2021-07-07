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
		$data['peserta'] = $this->ModPenjadwalan->data_peserta();
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
			$config['smtp_pass']="kinerjasenatpolinema";
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
			 $this->email->message("Berdasarkan hasil verifikasi dari usulan yang anda ajukan. Berikut ini detail usulan anda : <br>
			 Nama <t>: $nama_pengusul <br>
			 Email <t>: $email<br>
			 Keterangan <t>: $keterangan<br>
			 Status <t>: $status <br><br>
			 Demikian pemberitahuan ini kami sampaikan. Atas perhatian dan izin yang diberikan kami ucapkan terima kasih.");
			 if ($this->email->send()) {
			 $this->session->set_flashdata('successemail', 'Sukses! email status usulan berhasil dikirim.');
			 } else {
			 $this->session->set_flashdata('failedemail', 'Error! email status usulan tidak dapat dikirim.');
			 }
			}
			$this->ModPenjadwalan->add();
			$sel = $this->ModPenjadwalan->data_peserta();
			$prefix = $emailList = '';
			foreach($sel as $key=>$r){
			$emailList .= $prefix . '' . $r->email . '';
			$prefix = ', ';
			}
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
			$this->email->to($emailList);
			$agenda = $this->input->post('agenda'); 
			$pembahasan = $this->input->post('pembahasan');
			$waktu_mulai = $this->input->post('waktu_mulai');
			$waktu_selesai = $this->input->post('waktu_selesai');
			$id_user = $this->input->post('id_user');
			$tempat = $this->input->post('tempat');
			$jenis_rapat = $this->input->post('jenis_rapat');
			$link = $this->input->post('link');
			$password= $this->input->post('password');
			$sess_jadwal = $this->session->userdata('jadwal_id');
			 $this->email->subject('Jadwal '.$agenda.' Senat Politeknik Negeri Malang');
			 // Isi email
			 $this->email->message('
			 <html><body>
			 <style>
			 .table1 {
				font-family: sans-serif;
				color: #444;
				font-size: 20px;
				border-collapse: collapse;
				width: 100%;
				border: 1px solid #f2f5f7;
				margin: 10px;
			}
			 
			.table1 tr{
				background: #35A9DB;
				color: #fff;
				font-weight: normal;
			}
			 
			.table1, td {
				padding: 16px 40px;
				text-align: center;
			}
			 
			.table1 tr:nth-child(even) {
				background-color: #f2f2f2;
			}
			 </style>
			 <p>Mengaharap dengan hormat kehadiran Bapak/ Ibu/ Saudara untuk menghadiri '.$agenda.'
			 Senat Politeknik Negeri Malang yang akan diselenggarakan pada:</p>
			 <table class="table1">
			 <tr>
				<td><strong>Agenda</strong></td>
			 	<td><strong> : </strong></td>
			 	<td>'.$agenda.'</td>
			 </tr>
			 <tr>
			 	 <td><strong>Pembahasan</strong></td>
				 <td><strong> : </strong></td>
				 <td>'.$pembahasan.'</td>
			 </tr>
			 <tr>
			 	 <td><strong>Tanggal</strong> </td>
				 <td><strong> : </strong></td>
				 <td>'.date('d-m-Y', strtotime($waktu_mulai)).'</td>
			 </tr>
			 <tr>
			 	<td><strong>Waktu</strong> </td>
				 <td><strong> : </strong></td>
				 <td>'.date('H:i', strtotime($waktu_mulai)).'
			 	-'.date('H:i', strtotime($waktu_selesai)).' WIB</td>
			 </tr>
			 <tr>
			 	 <td><strong>Tempat</strong> </td>
				 <td><strong> : </strong></td>
				 <td>'.$tempat.'</td>
			 </tr>
			 <tr>
			 	 <td><strong>Link Ruangan Daring(Password)</strong> </td>
				 <td><strong> : </strong></td>
				 <td>'.$link.'('.$password.')</td>
			 </tr>
		 </table>	
		 <br>
		 <p>Atas Perhatianya, kehadiran dan kerjasama yang baik dicupakan terimakasih.</p>
			 <br>
			 <center><h2>Konfirmasi Kehadiran</h2></center>
			 <center>
			 <a href="https://kinerjasenat.xyz/Penjadwalan/konfirmasi_jadwal/'.$sess_jadwal).'" 
			 target="_blank"><button 
			 style="background-color: #4CAF50;
			 border: none;
			 color: white;
			 padding: 15px 32px;
			 text-align: center;
			 text-decoration: none;
			 display: inline-block;
			 font-size: 16px;
			 margin: 4px 2px;
			 cursor: pointer;"
			 >Klik Untuk Konfirmasi</button></a>
			 </center>	
			 </body></html>
			 ');
			 if ($this->email->send()) {
			 $this->session->set_flashdata('successemail', "Sukses! email status usulan berhasil dikirim. $id");
			 } else {
			 $this->session->set_flashdata('failedemail', 'Error! email status usulan tidak dapat dikirim. ');
			 }
		
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
			$this->session->set_flashdata('success', "Berhasil Menambah Jadwal Baru");
		}else{
			$this->session->set_flashdata('failed', 'Gagal Menambah Jadwal Baru');
		}
		$this->session->unset_userdata('email_sess');
	}
	public function konfirmasi_jadwal(){
		$data = array(
			'title' => "Senat Polinema | Penjadwalan"
		);
		$q = $this->session->userdata('status');
		if($q != "login") {
			$id_pen = $this->uri->segment('3');
			redirect('/Auth/auth_login_v2/'.$id_pen, 'refresh');
		}
		$id = $this->session->userdata('ses_id_jad');
		$data['data_konfirmasi'] = $this->ModPenjadwalan->editKehadiran($id);
		$menu['login'] = $this->ModPenjadwalan->edit($this->session->userdata('id_user'));
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['status_notifikasi'] = $this->ModUser->getStatusNotifikasi();
		$this->load->view('konfirmasi', $data);
	}	
	public function update_kehadiran() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModPenjadwalan->updateKehadiran();
		
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Melakukan Konfirmasi Kehadiran');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Melakukan Konfirmasi Kehadiran');
		}
		redirect('Penjadwalan');
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
		$kirim = $this->input->post('kirim'); 
		$pesan = $this->input->post('pesan');
		$id_penjadwalan = $this->input->post('id_penjadwalan');  
		if ($kirim == 1) {
			$sel = $this->ModPenjadwalan->kirimEmailPeserta($id_penjadwalan);
			$prefix = $emailList = '';
			foreach($sel as $key=>$r){
			$emailList .= $prefix . '' . $r->email . '';
			$prefix = ', ';
			}
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
			$this->email->to($emailList);
			$agenda = $this->input->post('agenda'); 
			$pembahasan = $this->input->post('pembahasan');
			$waktu_mulai = $this->input->post('waktu_mulai');
			$waktu_selesai = $this->input->post('waktu_selesai');
			$id_user = $this->input->post('id_user');
			$tempat = $this->input->post('tempat');
			$jenis_rapat = $this->input->post('jenis_rapat');
			$link = $this->input->post('link');
			$password= $this->input->post('password');
			$sess_jadwal = $this->session->userdata('jadwal_id');
			 $this->email->subject('Pembaruan Jadwal '.$agenda.' Senat Politeknik Negeri Malang');
			 // Isi email
			 $this->email->message('
			 <html><body>
			 <table rules="all" style="border-color: #666;" cellpadding="10">
			 <tr><td><strong>Agenda:</strong> </td>'.$agenda.'</tr>
			 <tr><td><strong>Pembahasan:</strong></td>'.$pembahasan.'</tr>
			 <tr><td><strong>Tanggal:</strong> </td>'.date('d-m-Y', strtotime($waktu_mulai)).'</tr>
			 <tr><td><strong>Waktu:</strong> </td>'.date('H:i', strtotime($waktu_mulai)).'
			 -'.date('H:i', strtotime($waktu_selesai)).' WIB</tr>
			 <tr><td><strong>Tempat:</strong> </td>'.$tempat.'</tr>
			 <tr><td><strong>Link Ruangan Daring:</strong> </td>'.$link.'('.$password.')</tr>
			 <tr><td><strong>Catatan</strong> </td>'.$pesan.'</tr>
			 </table>
			 <br>
			 <center><h2>Konfirmasi Kehadiran</h2></center>
			 <center>
			 <a href="https://kinerjasenat.xyz/Penjadwalan/konfirmasi_jadwal/'.$sess_jadwal).'" target="_blank">Klik Untuk Konfirmasi</a>
			 </center>
			 </body></html>
			 ');
			 if ($this->email->send()) {
			 $this->session->set_flashdata('successemail', "Sukses! email status usulan berhasil dikirim. $id");
			 } else {
			 $this->session->set_flashdata('failedemail', 'Error! email status usulan tidak dapat dikirim. ');
			 }
		}
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
