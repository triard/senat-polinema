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
        $this->load->view('home', $data);
    }
}