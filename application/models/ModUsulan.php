<?php
class ModUsulan extends CI_model {
	private $_table = "usulan";

	public function selectAll() {
		$this->db->select('*');
        $this->db->from('usulan');
        return $this->db->get()->result();
	}
	public function add() {
		$email = $this->input->post('email');
		$jenis = $this->input->post('jenis');
		$keterangan = $this->input->post('keterangan');
		$id_user = $this->input->post('id_user');
		$dokumen_pendukung = $this->_uploadDokumen();
		$lokasi = $this->input->post('lokasi');
		$status = $this->input->post('status'); 		
		$data = array('email' => $email,'jenis' => $jenis, 'keterangan' => $keterangan,
		'dokumen_pendukung'=>$dokumen_pendukung, 'lokasi'=>$lokasi, 'status'=>$status, 'id_user'=>$id_user);
		$this->db->insert('usulan', $data);
	}
	private function _uploadDokumen()
	{
		$config['upload_path']          = './assets/dokumenPendukung';
		$config['allowed_types']        = 'pdf|docx';
		$config['file_name']            = "dokumen-pendukung-".substr(md5(time()), 0, 16);
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('dokumen_pendukung')) {
			return $this->upload->data("file_name");
		}
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_usulan" => $id])->row();
    } 
	public function delete($id){
		$this->_deleteDokumen($id);
		$this->db->where('id_usulan', $id);
		$this->db->delete('usulan');
	}
	private function _deleteDokumen($id)
	{
    	$usulan = $this->getById($id);
	    $filename = explode(".", $usulan->dokumen_pendukung)[0];
		return array_map('unlink', glob(FCPATH."assets/dokumenPendukung/$filename.*"));
	}
	public function edit($id){ 
		$this->db->select('*');
        $this->db->from('usulan');
		$this->db->where('id_usulan', $id);
        return $this->db->get()->row();
	}
	public function update(){
		$id_usulan = $this->input->post('id_usulan');
		$email = $this->input->post('email');
		$jenis = $this->input->post('jenis');
		$keterangan = $this->input->post('keterangan');
		$id_user = $this->input->post('id_user');
		if (!empty($_FILES["dokumen_pendukung"]["name"])) {
			$this->_deleteDokumen($id_usulan);
            $dokumen_pendukung = $this->_uploadDokumen();
        } else {
            $dokumen_pendukung = $this->input->post('old_dokumen');
		}
		$lokasi = $this->input->post('lokasi');
		$status = $this->input->post('status'); 		
		$data = array('email' => $email,'jenis' => $jenis, 'keterangan' => $keterangan,
		'dokumen_pendukung'=>$dokumen_pendukung, 'lokasi'=>$lokasi, 'status'=>$status, 'id_user'=>$id_user);
			$this->db->where('id_usulan', $id_usulan);
			$this->db->update('usulan', $data);
	}
	public function getCountUsulan()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		return $this->db->count_all_results();
	}
}