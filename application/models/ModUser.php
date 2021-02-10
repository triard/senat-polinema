<?php
class ModUser extends CI_model {
	public function selectAll() {
		$this->db->select('*');
        $this->db->from('user');
        $this->db->join('account','user.id_user=account.user_id');
        return $this->db->get()->result();
	}
	public function add() {
		$nama_user = $this->input->post('nama_user');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$email = $this->input->post('email');
		
		$data = array('nama_user' => $nama_user,'password' => md5($password), 'level' => $level, 'email' => $email);
		$this->db->insert('user', $data);
	}
	public function delete($id){
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}
	public function edit($id){
		$this->db->where('id_user', $id);
		return $this->db->get('user')->row();
	}
	
	public function update(){
		$id = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$email = $this->input->post('email');
		
		if ($password == NULL) {
			$data = array('nama_user' => $nama_user, 'level' => $level, 'email' => $email);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		} else {
			$data = array('nama_user' => $nama_user,'password' => md5($password), 'level' => $level, 'email' => $email);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		}
	}

	public function getCountUser()
	{
		$this->db->select('id_user');
		$this->db->from('user');
		return $this->db->count_all_results();
	}
}