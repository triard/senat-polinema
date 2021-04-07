<?php
class ModKegiatan extends CI_model {
	private $_table = "kegiatan";

	public function selectAll() {
		$this->db->select('*');
        $this->db->from('kegiatan');
        return $this->db->get()->result(); 
	}
	public function add() {
		$id_penjadwalan = $this->input->post('id_penjadwalan');
		$agenda = $this->input->post('agenda');
		$pembahasan = $this->input->post('pembahasan');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$waktu_selesai = $this->input->post('waktu_selesai');
		$id_user = $this->input->post('id_user');
		$tempat = $this->input->post('tempat');
		$jenis_rapat = $this->input->post('jenis_rapat');
		$link = $this->input->post('link');
		$password= $this->input->post('password');
		$tujuan = $this->input->post('tujuan');
		$notula = $this->input->post('notula');
		$status = "Selesai";
		$data = array('id_penjadwalan' => $id_penjadwalan, 'agenda' => $agenda,'pembahasan' => $pembahasan,
		'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat, 
		'tujuan'=>$tujuan, 'notula'=>$notula, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,'status'=>$status,'id_user'=>$id_user);
		$this->db->insert('kegiatan', $data);
	}
	private function _uploadDokumen()
	{
		$config['upload_path']          = './assets/notulaKegiatan';
		$config['allowed_types']        = 'pdf|docx|zip|rar';
		$config['file_name']            = "notula-kegiatan-".substr(md5(time()), 0, 16);
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('notula')) {
			return $this->upload->data("file_name");
		}
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_kegiatan" => $id])->row();
    } 
	public function delete($id){
		$this->_deleteDokumen($id);
		$this->db->where('id_kegiatan', $id);
		$this->db->delete('kegiatan');
	}
	private function _deleteDokumen($id)
	{
    	$kegiatan = $this->getById($id);
	    $filename = explode(".", $kegiatan->notula)[0];
		return array_map('unlink', glob(FCPATH."assets/notulaKegiatan/$filename.*"));
	}
	public function edit($id){ 
		$this->db->select('u.nama, k.*');
        $this->db->from('kegiatan as k');
		$this->db->join('user as u','k.id_user=u.id_user');
		$this->db->where('k.id_kegiatan', $id);
        return $this->db->get()->row();
	}
	public function update(){ 
		$id_kegiatan = $this->input->post('id_kegiatan');
		$id_penjadwalan = $this->input->post('id_penjadwalan');
		$agenda = $this->input->post('agenda');
		$pembahasan = $this->input->post('pembahasan');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$waktu_selesai = $this->input->post('waktu_selesai');
		$id_user = $this->input->post('id_user');
		$tempat = $this->input->post('tempat');
		$jenis_rapat = $this->input->post('jenis_rapat');
		$link = $this->input->post('link');
		$tujuan = $this->input->post('tujuan');
		$password= $this->input->post('password');
		$notula= $this->input->post('notula');
		$status = "Selesai";
		$data = array('id_penjadwalan' => $id_penjadwalan, 'agenda' => $agenda,'pembahasan' => $pembahasan,
		'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat, 'notula'=>$notula, 
		'tujuan'=>$tujuan, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'notula'=>$notula,'password'=>$password, 'status'=>$status, 'id_user'=>$id_user);
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('kegiatan', $data);
	}
}