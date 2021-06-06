<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    public function __construct() {
		parent::__construct();
        $this->load->model('ModUser');
        $this->load->model('ModUsulan');
        $this->load->model('ModLaporan');
		$this->load->model('ModKegiatan');
        $this->load->model('ModDokumentasi');
        $this->load->model('ModBerita');
        $this->load->model('ModPenjadwalan');
        $this->load->model('ModNotifikasi');
	} 

    public function index() {
    $cek = $this->session->userdata('status');
	    if($cek != "login") {
	        redirect('auth/auth_login','refresh');
        }
        $data = array(
            'title' => "Senat Polinema"
        );
        $data['user'] = $this->ModUser->getCountUser();
        $data['berita'] = $this->ModBerita->getCountBerita();
        $data['usulan'] = $this->ModUsulan->getCountUsulan();
        $data['verifikasi'] = $this->ModUsulan->getUsulanVerifikasi();
        $data['status'] = $this->ModUsulan->getUsulanStatus();
        $data['sekretaris'] = $this->ModUsulan->getUsulanSekretaris();
        $data['laporan'] = $this->ModLaporan->getCountLaporan();
        $data['birokrasi'] = $this->ModLaporan->getBirokrasi();
        $data['komisi1'] = $this->ModUsulan->getUsulanKomisi1();
        $data['komisi2'] = $this->ModUsulan->getUsulanKomisi2();
        $data['komisi3'] = $this->ModUsulan->getUsulanKomisi3();
        $data['komisi4'] = $this->ModUsulan->getUsulanKomisi4();
        $data['dokumentasi'] = $this->ModDokumentasi->getCountDokumentasi();
        $data['penjadwalan'] = $this->ModPenjadwalan->SelectDataById();
        $data['agenda'] = $this->ModKegiatan->selectAgenda();
        $data['totalUsulan'] = $this->ModUsulan->GetMostInput();
        $data['usulanFilter'] = $this->ModUsulan->InputFilter();
        $data['notifikasi'] = $this->ModNotifikasi->getAll();
        $data['notifikasiLimit'] = $this->ModNotifikasi->getAllLimit4();
        $data['status_notifikasi'] = $this->ModUser->getStatusNotifikasi();
        $data['jadwalTerlaksana'] = $this->ModPenjadwalan->getJadwalTerlaksana();
        $data['jadwalBelumTerlaksana'] = $this->ModPenjadwalan->getJadwalBelumTerlaksana();
        $data['jadwalKomisi1'] = $this->ModPenjadwalan->getJadwalKomisi1();
        $data['jadwalKomisi1Terlaksana'] = $this->ModPenjadwalan->getJadwalKomisi1Terlaksana();
        $data['jadwalKomisi1BelumTerlaksana'] = $this->ModPenjadwalan->getJadwalKomisi1BelumTerlaksana();
        $data['jadwalKomisi2'] = $this->ModPenjadwalan->getJadwalKomisi2();
        $data['jadwalKomisi2Terlaksana'] = $this->ModPenjadwalan->getJadwalKomisi2Terlaksana();
        $data['jadwalKomisi2BelumTerlaksana'] = $this->ModPenjadwalan->getJadwalKomisi2BelumTerlaksana();
        $data['jadwalKomisi3'] = $this->ModPenjadwalan->getJadwalKomisi3();
        $data['jadwalKomisi3Terlaksana'] = $this->ModPenjadwalan->getJadwalKomisi3Terlaksana();
        $data['jadwalKomisi3BelumTerlaksana'] = $this->ModPenjadwalan->getJadwalKomisi3BelumTerlaksana();
        $data['jadwalKomisi4'] = $this->ModPenjadwalan->getJadwalKomisi4();
        $data['jadwalKomisi4Terlaksana'] = $this->ModPenjadwalan->getJadwalKomisi4Terlaksana();
        $data['jadwalKomisi4BelumTerlaksana'] = $this->ModPenjadwalan->getJadwalKomisi4BelumTerlaksana();
        $this->load->view('home', $data);
    }

    public function setReadNotifikasi() {
        $q = $this->session->userdata('status');
        if($q != "login") {
            exit();
        }
        $this->ModUser->setReadStatusNotifikasi();
        redirect($_SERVER['HTTP_REFERER']);
    }
}