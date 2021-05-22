<?php
class ModUser extends CI_model {
	public function selectAll() {
		$this->db->select('*');
        $this->db->from('user');
        $this->db->join('account','user.id_user=account.id_user');
        return $this->db->get()->result();
	}
	public function userById() {
		$this->db->select('*');
        $this->db->from('user');
		$this->db->where('id_user',$this->session->userdata('id_user'));
        return $this->db->get()->result();
	}
	public function userId() {
		$this->db->select('*');
        $this->db->from('user');
		$this->db->where('id_user',$this->session->userdata('id_user'));
        return $this->db->get()->row();
	}
	public function add() {
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$NIP = $this->input->post('NIP');
		$keterangan = $this->input->post('keterangan'); 		
		$data = array('nama' => $nama,'jabatan' => $jabatan, 'keterangan' => $keterangan, 'NIP' => $NIP);
		$this->db->insert('user', $data);
	}
	public function getId(){
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$keterangan = $this->input->post('keterangan'); 		
        $query = $this->db->query("SELECT id_user from user where nama='$nama' AND jabatan='$jabatan' AND keterangan='$keterangan'");
        $hasil = $query->row();
        return $hasil->id_user;
    } 
	public function addAccount($id) {
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$level = $this->input->post('level'); 		
		$email = $this->input->post('email'); 		
		$id_user = $id; 		
		$data = array('username' => $username,'password' => $password, 'level' => $level, 'email' => $email,'id_user' => $id_user);
		$this->db->insert('account', $data);
	}
	// public function deleteAccount($id){
	// 	$this->db->where('id_user', $id);
	// 	$this->db->delete('account');
	// }
	public function delete($id){
		$this->_deleteImagebyAdmin($id);
		$this->db->where('id_user', $id);
		$this->db->delete('account');
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}
	private function _deleteImagebyAdmin($id)
	{
    	$user = $this->edit($id);
    	if ($user->image != "image.png") {
	    $filename = explode(".", $user->image)[0];
		return array_map('unlink', glob(FCPATH."assets/img/user/$filename.*"));
    }
	}

	public function edit($id){ 
		$this->db->select('*');
        $this->db->from('user');
		$this->db->join('account','user.id_user=account.id_user');
		$this->db->where('user.id_user', $id);
        return $this->db->get()->row();
	}
	
	public function update(){
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$keterangan = $this->input->post('keterangan'); 
		$NIP = $this->input->post('NIP');		
		$data = array('nama' => $nama,'jabatan' => $jabatan, 'keterangan' => $keterangan, 'NIP' => $NIP);
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
	}
	public function updateAccount(){
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$level = $this->input->post('level'); 		
		$email = $this->input->post('email'); 		
		$data = array('username' => $username, 'level' => $level, 'email' => $email);
			$this->db->where('id_user', $id_user);
			$this->db->update('account', $data);
	}
	public function updateFoto(){
		$id_user = $this->input->post('id_user');
		if (!empty($_FILES["image"]["name"])) {
			$this->_deleteImage();
			$image = $this->_uploadImage();
			$this->session->set_flashdata('success', 'Update Foto berhasil.');  
		} else {
			$image = $this->input->post('old_image');
			$this->session->set_flashdata('failed', 'Update password gagal.');  
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
		return "image.png";
	}
	private function _deleteImage()
	{
    	$user = $this->edit($this->input->post('id_user'));
    	if ($user->image != "image.png") {
	    $filename = explode(".", $user->image)[0];
		return array_map('unlink', glob(FCPATH."assets/img/user/$filename.*"));
    }
	}
	public function updatePassword()  
   {    
	$id_user = $this->input->post('id_user');
	$password = $this->input->post('password');
	$data = array('password' => password_hash($password, PASSWORD_DEFAULT));
		$this->db->where('id_user', $id_user);
		$this->db->update('account', $data);
   }    
   public function updateProfile(){ 
	$id_user = $this->input->post('id_user');
	$nama = $this->input->post('nama');
	$NIP = $this->input->post('NIP');
	$jabatan = $this->input->post('jabatan');
	$keterangan = $this->input->post('keterangan'); 
	$username = $this->input->post('username');
	$email = $this->input->post('email'); 	
	$data = array('username' => $username, 'email' => $email);
		$this->db->where('id_user', $id_user);
		$this->db->update('account', $data);			
	$data = array('nama' => $nama,'jabatan' => $jabatan,'NIP' => $NIP,'keterangan' => $keterangan);
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}
	public function getCountUser() {
		$this->db->select('id_user');
		$this->db->from('user');
		return $this->db->count_all_results(); 
	} 
	public function getStatusNotifikasi() {
		$id_user = $this->session->userdata('id_user');
		$query = $this->db->query("SELECT status_notifikasi FROM user WHERE id_user = '$id_user'");
        $hasil = $query->row();
        return $hasil->status_notifikasi;	
	}
	public function setUnreadStatusNotifikasi() {
		$data = array('status_notifikasi' => 'Unread');
		$this->db->update('user', $data);
	}
	public function setUnreadStatusNotifikasiAdmin() {
		$data = array('status_notifikasi' => 'Unread');
		$this->db->update('user', $data);
	}
	public function setReadStatusNotifikasi() {
		$id_user = $this->session->userdata('id_user');
		$data = array('status_notifikasi' => 'Read');
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}
}