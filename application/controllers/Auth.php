<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function auth_login() {
		$data = array(
			'title' => "Login"
		);
		$this->load->view('auth/auth-login', $data);
	}

	public function auth_forgot_password() {
		$data = array(
			'title' => "Senat Polinema"
		);
		$this->load->view('auth/auth-forgot-password', $data);
    }
}