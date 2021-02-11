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
}