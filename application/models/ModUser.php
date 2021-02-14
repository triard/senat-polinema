<?php
class ModUser extends CI_model {
	public function selectAll() {
		$this->db->select('*');
        $this->db->from('user');
        $this->db->join('account','user.id_user=account.user_id');
        return $this->db->get()->result();
	}
	public function add() {
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$komisi = $this->input->post('komisi'); 		
		$data = array('nama' => $nama,'jabatan' => $jabatan, 'komisi' => $komisi);
		$this->db->insert('user', $data);
	}
	public function getId(){
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$komisi = $this->input->post('komisi'); 		
        $query = $this->db->query("SELECT id_user from user where nama='$nama' AND jabatan='$jabatan' AND komisi='$komisi'");
        $hasil = $query->row();
        return $hasil->id_user;
    } 
	public function addAccount($id) {
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$level = $this->input->post('level'); 		
		$email = $this->input->post('email'); 		
		$user_id = $id; 		
		$data = array('username' => $username,'password' => $password, 'level' => $level, 'email' => $email,'user_id' => $user_id);
		$this->db->insert('account', $data);
	}
	public function delete($id){
		$this->db->where('id_user', $id);
		// $this->_deleteImage($id);
		$this->db->delete('user');
	}
	public function deleteAccount($id){
		$this->db->where('user_id', $id);
		$this->db->delete('account');
	}
	public function edit($id){ 
		$this->db->select('*');
        $this->db->from('user');
		$this->db->join('account','user.id_user=account.user_id');
		$this->db->where('id_user', $id);
        return $this->db->get()->row();
	}
	
	public function update(){
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$komisi = $this->input->post('komisi'); 		
		$data = array('nama' => $nama,'jabatan' => $jabatan, 'komisi' => $komisi);
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
	}
	public function updateAccount(){
		$user_id = $this->input->post('user_id');
		$username = $this->input->post('username');
		$level = $this->input->post('level'); 		
		$email = $this->input->post('email'); 		
		$data = array('username' => $username, 'level' => $level, 'email' => $email);
			$this->db->where('user_id', $user_id);
			$this->db->update('account', $data);
	}

	public function getCountUser()
	{
		$this->db->select('id_user');
		$this->db->from('user');
		return $this->db->count_all_results();
	}
	public function updateFoto(){
		$id_user = $this->input->post('id_user');
		if (!empty($_FILES["image"]["name"])) {
			$this->_deleteImage();
			$image = $this->_uploadImage();
			$this->session->set_flashdata('success', 'Update Foto berhasil.');  
		} else {
			$image = $this->input->post('old_image');
			$this->session->set_flashdata('fail', 'Update password gagal.');  
		}
		$data = array('image' => $image);
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
	}
	private function _uploadImage()
	{
		$config['upload_path']          = './assets/img/user';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            =  $this->input->post('id_user');
		$config['overwrite']			= true;
		$config['max_size']             = 6000; // 1MB
	
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		return "avatar-1.png";
	}
	private function _deleteImage()
	{
    	$user = $this->edit($this->input->post('id_user'));
    	if ($user->image != "avatar-1.jpg") {
	    $filename = explode(".", $user->image)[0];
		return array_map('unlink', glob(FCPATH."assets/img/user/$filename.*"));
    }
	}
	public function updatePassword()  
   {    
	$user_id = $this->input->post('user_id');
	$password = $this->input->post('password');
	$data = array('password' => password_hash($password, PASSWORD_DEFAULT));
		$this->db->where('user_id', $user_id);
		$this->db->update('account', $data);
   }    
   public function updateProfile(){
	$id_user = $this->input->post('id_user');
	$user_id = $this->input->post('user_id');
	$nama = $this->input->post('nama');
	$jabatan = $this->input->post('jabatan');
	$komisi = $this->input->post('komisi'); 
	$username = $this->input->post('username');
	$email = $this->input->post('email'); 	
	$data = array('username' => $username, 'email' => $email);
		$this->db->where('user_id', $user_id);
		$this->db->update('account', $data);			
	$data = array('nama' => $nama,'jabatan' => $jabatan, 'komisi' => $komisi);
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
}
}