<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    public function __construct() {
		parent::__construct();
	} 

    public function index() {
    $cek = $this->session->userdata('status');
	    if($cek != "login") {
	        redirect('auth/auth_login','refresh');
        }
        $data = array(
            'title' => "Senat Polinema"
        );
        $this->load->view('home', $data);
    }
}