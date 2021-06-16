<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModAuth');
	}

	public function auth_login() {
		$data = array(
			'title' => "Login"
		);
			if($_POST != NULL) {
				$this->ModAuth->log();
				$cek = $this->session->userdata('status');
				if($cek == "login") {
					echo "1";
				} else {
					echo "0";
				}
			} else {
				if ($this->session->userdata('status')=="login") {
					redirect('Home');
				}else{
					$this->load->view('auth/auth-login', $data);
				}
			}	
	}

	public function auth_forgot_password1() {
		$data = array(
			'title' => "Senat Polinema"
		);
		$this->load->view('auth/auth-forgot-password', $data);
	}
	public function logout() {
		$this->session->sess_destroy(); 
		redirect(base_url('Homepage/home'));
	}

	public function auth_forgot_password()  
	{  
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
		
		if($this->form_validation->run() == FALSE) {  
			$data['title'] = 'Senat Polinema';  
			$this->load->view('auth/auth-forgot-password',$data);  
		}else{  
			$email = $this->input->post('email');   
			$clean = $this->security->xss_clean($email);  
			$userInfo = $this->ModAuth->getUserInfoByEmail($clean);  
			  
			if(!$userInfo){  
			  $this->session->set_flashdata('message', 'email tidak ditemukan, silakan coba lagi.');  
			  redirect(site_url('auth/auth_login'),'refresh');   
			}    
		   
			$token = $this->ModAuth->insertToken($userInfo->id_user);   
		   

			$qstring = $this->base64url_encode($token);           
			$url = site_url() . '/auth/reset_password/token/' . $qstring;  
			$link = '<a href="' . $url . '">' . $url . '</a>';   
			  
  
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
			   //konfigurasi pengiriman
			   $this->email->from('no-reply@senatpolinema.ac.id', 'Senat Polinema');
			   $this->email->to($this->input->post('email'));
			   $this->email->subject("Mereset password Anda");

			   $message = "<p>Anda melakukan permintaan reset password</p>";
			   $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
			   password anda.</strong><br>';  
			   $message .= '<strong>Silakan klik link ini:</strong> ' . $link;      
			   $this->email->message($message);
			   if($this->email->send())
			   {
				   $this->session->set_flashdata('message', 'Silahkan cek email '.$this->input->post('email').' untuk melakukan reset password');
				   redirect(site_url('auth/auth_login'));
			   }else{
				   $this->session->set_flashdata('message', 'gagal mengirim verifikasi email');
				   redirect(site_url('auth/auth_login'));
			   }
			exit;  
		}   
	}  
  
	public function reset_password()  
	{  
	  $token = $this->base64url_decode($this->uri->segment(4));           
	  $cleanToken = $this->security->xss_clean($token);  
		
	  $user_info = $this->ModAuth->isTokenValid($cleanToken); //either false or array();          
		
	  if(!$user_info){  
		$this->session->set_flashdata('message', 'Token tidak valid atau kadaluarsa');  
		redirect(site_url('auth/auth_login'),'refresh');   
	  }    
  
	  $data = array(  
		'title'=> 'Halaman Reset Password',  
		'nama'=> $user_info->username,   
		'email'=>$user_info->email,   
		'token'=>$this->base64url_encode($token)  
	  );  
		
	  $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
	  $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
		
	  if ($this->form_validation->run() == FALSE) { 
		$this->load->view('auth/auth-reset-password', $data); 
		 
	  }else{  
						  
		$post = $this->input->post(NULL, TRUE);          
		$cleanPost = $this->security->xss_clean($post);          
		$hashed = $cleanPost['password'];          
		$cleanPost['password'] = $hashed;  
		$cleanPost['id_user'] = $user_info->id_user;  
		unset($cleanPost['passconf']);          
		if(!$this->ModAuth->updatePassword($cleanPost)){  
		  $this->session->set_flashdata('message', 'Update password gagal.');  
		}else{  
		  $this->session->set_flashdata('message', 'Password anda sudah  
						diperbaharui. Silakan login.');
					   
		}  
		redirect(site_url('auth/auth_login'),'refresh');         
	  }  
	}  
	  
  public function base64url_encode($data) {   
   return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
  }   
  
  public function base64url_decode($data) {   
   return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
  }    
}