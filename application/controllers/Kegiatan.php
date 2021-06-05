<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('ModKegiatan'); 
		$this->load->model('ModPenjadwalan');
		$this->load->model('ModUsulan'); 
		$this->load->model('ModLaporan'); 
		$this->load->model('ModDokumentasi'); 
		$this->load->model('ModNotifikasi'); 
		$this->load->model('ModUser');
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
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['status_notifikasi'] = $this->ModUser->getStatusNotifikasi();
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

	public function modalStatusKegiatan() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 0;
		$this->load->view('modal/statusKegiatan', $data); 
	}	
	public function add() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$id_penjadwalan = $this->input->post('id_penjadwalan');
		$status = $this->input->post('status');
		if ($status != "Proses") {
			if ($id_penjadwalan != 0) {
				$this->ModPenjadwalan->setStatus($id_penjadwalan, $status);
				$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
				$nama = $this->ModPenjadwalan->getPengusul($id_penjadwalan);
				$email = $this->ModPenjadwalan-> getEmailPengusul($id_penjadwalan);
				if ($id_usulan != 0) {
					$this->ModUsulan->setStatus($id_usulan, $status);
					
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
					$this->email->to($email); // Ganti dengan email tujuan
					// Lampiran email, isi dengan url/path file
					// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');	
					// Subject email
					$this->email->subject('Status Pengajuan Usulan');
					// Isi email
					$keterangan = $this->input->post('pembahasan');
					$status = $this->input->post('status');
					$this->email->message("Berdasarkan hasil verifikasi dari usulan yang anda ajukan. berikut ini detail usulan anda : <br>
					Nama : $nama <br>
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
			}
		}
		$this->ModKegiatan->add();

		// Notifikasi
		$user = $this->session->userdata('level');
		$text = 'Menambahkan kegiatan '.$this->input->post('agenda');
		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y/m/d H:i:s'); 
		$id_user = $this->session->userdata('id_user');
		$id_kegiatan = $this->ModNotifikasi->getLastIdKegiatan();
		$this->ModNotifikasi->addByKegiatan($user, $text, $time, $id_user, $id_kegiatan);
		$this->ModUser->setUnreadStatusNotifikasi();

		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Menambah Agenda Baru');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Menambah Agenda Baru');
		}
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
		$id_penjadwalan = $this->ModKegiatan->getIdPenjadwalan($id);
		$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
		if ($this->session->userdata('level') == 'Sekretaris') {
			if ($id_penjadwalan != 0) {
				$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Sidang Pleno');
				$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
				if ($id_usulan != 0) {
					$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Sidang Pleno');
				}
			}	
		} 
		else if ($this->session->userdata('level') == 'Ketua Komisi 1') {
			if ($id_penjadwalan != 0) {
				$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 1');
				$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
				if ($id_usulan != 0) {
					$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 1');
				}
			}
		}
		else if ($this->session->userdata('level') == 'Ketua Komisi 2') {
			if ($id_penjadwalan != 0) {
				$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 2');
				$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
				if ($id_usulan != 0) {
					$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 2');
				}
			}
		}
		else if ($this->session->userdata('level') == 'Ketua Komisi 3') {
			if ($id_penjadwalan != 0) {
				$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 3');
				$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
				if ($id_usulan != 0) {
					$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 3');
				}
			}
		}
		else if ($this->session->userdata('level') == 'Ketua Komisi 4') {
			if ($id_penjadwalan != 0) {
				$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 4');
				$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
				if ($id_usulan != 0) {
					$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 4');
				}
			}
		}
		$this->ModKegiatan->delete($id);
		// Notifikasi
		$this->ModNotifikasi->deleteByKegiatan($id);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$id_penjadwalan = $this->input->post('id_penjadwalan');
		$status = $this->input->post('status');
		if ($status != "Proses") {
			if ($id_penjadwalan != 0) {
				$this->ModPenjadwalan->setStatus($id_penjadwalan, $status);
				$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
				$nama = $this->ModPenjadwalan->getPengusul($id_penjadwalan);
				$email = $this->ModPenjadwalan-> getEmailPengusul($id_penjadwalan);
				if ($id_usulan != 0) {
					$this->ModUsulan->setStatus($id_usulan, $status);

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
					$this->email->to($email); // Ganti dengan email tujuan
					// Lampiran email, isi dengan url/path file
					// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');	
					// Subject email
					$this->email->subject('Status Pengajuan Usulan');
					// Isi email
					$keterangan = $this->input->post('pembahasan');
					$status = $this->input->post('status');
					$this->email->message("Berdasarkan hasil verifikasi dari usulan yang anda ajukan. berikut ini detail usulan anda : <br>
					Nama : $nama <br>
					email : $email<br>
					Keterangan : $keterangan<br>
					Status : $status <br>
					Hasil dari Usulan Anda akan kami sampaikan Setelah ini. <br><br>
					Demikian pemberitahuan ini kami sampaikan. Atas perhatian dan izin yang diberikan kami ucapkan terima kasih.");
					if ($this->email->send()) {
					$this->session->set_flashdata('successemail', 'Sukses! email status usulan berhasil dikirim.');
					} else {
					$this->session->set_flashdata('failedemail', 'Error! email status usulan tidak dapat dikirim.');
					}
				}
			}
		} else {
			if ($this->session->userdata('level') == 'Sekretaris') {
				if ($id_penjadwalan != 0) {
					$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Sekretaris');
					$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
					if ($id_usulan != 0) {
						$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Sekretaris');
					}
				}	
			} 
			else if ($this->session->userdata('level') == 'Ketua Komisi 1') {
				if ($id_penjadwalan != 0) {
					$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 1');
					$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
					if ($id_usulan != 0) {
						$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 1');
					}
				}
			}
			else if ($this->session->userdata('level') == 'Ketua Komisi 2') {
				if ($id_penjadwalan != 0) {
					$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 2');
					$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
					if ($id_usulan != 0) {
						$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 2');
					}
				}
			}
			else if ($this->session->userdata('level') == 'Ketua Komisi 3') {
				if ($id_penjadwalan != 0) {
					$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 3');
					$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
					if ($id_usulan != 0) {
						$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 3');
					}
				}
			}
			else if ($this->session->userdata('level') == 'Ketua Komisi 4') {
				if ($id_penjadwalan != 0) {
					$this->ModPenjadwalan->setStatus($id_penjadwalan, 'Dijadwalkan - Komisi 4');
					$id_usulan = $this->ModPenjadwalan->getIdUsulan($id_penjadwalan);
					if ($id_usulan != 0) {
						$this->ModUsulan->setStatus($id_usulan, 'Dijadwalkan - Komisi 4');
					}
				}
			}
		}
		$this->ModKegiatan->update();
		if(json_encode(array("status" => TRUE))){
			$this->session->set_flashdata('success', 'Berhasil Mengedit Agenda Baru');
		}else{
			$this->session->set_flashdata('failed', 'Gagal Mengedit Agenda Baru');
		}
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
			redirect('Homepage/home','refresh');
		}
		$data = array( 
			'title' => "Senat Polinema | Agenda Kegiatan Detail"
		);
		$data['hakAkses'] = $this->session->userdata('level');
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['laporan'] = $this->ModLaporan->selectAll();
		$data['peserta'] = $this->ModPenjadwalan->selectJadwal();
		$data['dokumentasi'] = $this->ModDokumentasi->selectAll();
		$data['setuju'] = $this->ModKegiatan->JumlahVotingSetuju($id);
		$data['tidak_setuju'] = $this->ModKegiatan->JumlahVotingTidakSetuju($id);
		$data['golput'] = $this->ModKegiatan->JumlahGolput($id);
		$data['notifikasi'] = $this->ModNotifikasi->getAll();
		$data['status_notifikasi'] = $this->ModUser->getStatusNotifikasi();
		$this->load->view('kegiatan-detail', $data);
	}
	public function modalAbsen($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 5;
		$data['absen'] = $this->ModKegiatan->modalAbsen($id);
		$this->load->view('modal/kegiatan', $data); 
	}

	public function modalUnduhNotula($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 7;
		$data['hakAkses'] = $this->session->userdata('level');
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$this->load->view('modal/kegiatan', $data); 
	}
	public function modalUnduhAbsen($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 8;
		$data['hakAkses'] = $this->session->userdata('level');
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['peserta'] = $this->ModPenjadwalan->selectJadwal();
		$this->load->view('modal/kegiatan', $data); 
	}
	public function updateAbsen() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModKegiatan->updateAbsen();
		echo json_encode(array("status" => TRUE));
		
	}
	public function modalVoting($id) {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$data['cek'] = 6;
		$data['voting'] = $this->ModKegiatan->modalAbsen($id);
		$this->load->view('modal/kegiatan', $data); 
	}
	public function updateVoting() {
		$q = $this->session->userdata('status');
		if($q != "login") {
			exit();
		}
		$this->ModKegiatan->updateVoting();
		echo json_encode(array("status" => TRUE));
	}
	public function download_notula($id){
		$data['hakAkses'] = $this->session->userdata('level');
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['koresponden'] = $this->input->post('koresponden');
		$data['nip'] = $this->input->post('nip');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "notula.pdf"; 
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->load_view('pdf/notula', $data);	
	}
	public function download_absen($id){
		$data['hakAkses'] = $this->session->userdata('level');
		$data['kegiatan'] = $this->ModKegiatan->edit($id);
		$data['peserta'] = $this->ModPenjadwalan->selectJadwal();
		$data['koresponden'] = $this->input->post('koresponden');
		$data['nip'] = $this->input->post('nip');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "absen.pdf"; 
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->load_view('pdf/absen', $data);	
	}
}
