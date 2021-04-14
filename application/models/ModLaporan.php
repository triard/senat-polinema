<?php
class ModLaporan extends CI_model {
	private $_table = "laporan";

	public function selectAll() {
		$this->db->select('*');
        $this->db->from('laporan');
        return $this->db->get()->result();
	}
	public function getJoinAll(){
		$this->db->select('laporan.*');
		$this->db->select('agenda');
		$this->db->from('laporan');
		$this->db->join('kegiatan', 'laporan.id_kegiatan = kegiatan.id_kegiatan');
		$this->db->where('laporan.status', 'Diajukan');
        return $this->db->get()->result();
    } 
	public function add() {
		$id_kegiatan = $this->input->post('id_kegiatan');
		$status = $this->input->post('status');
		$nama_laporan = $this->input->post('nama_laporan');
		$file_laporan = $this->_uploadDokumen();
		$data = array('id_kegiatan' => $id_kegiatan, 'nama_laporan'=>$nama_laporan, 'file_laporan'=>$file_laporan, 'status'=>$status);
		$this->db->insert('laporan', $data);
	}
	private function _uploadDokumen()
	{
		$config['upload_path']          = './assets/laporanKegiatan';
		$config['allowed_types']        = 'pdf|docx';
		$config['file_name']            = "laporan-kegiatan-".substr(md5(time()), 0, 16);
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_laporan')) {
			return $this->upload->data("file_name");
		}
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_laporan" => $id])->row();
    } 
	public function delete($id){
		$this->_deleteDokumen($id);
		$this->db->where('id_laporan', $id);
		$this->db->delete('laporan');
	}
	private function _deleteDokumen($id)
	{
    	$laporan = $this->getById($id);
	    $filename = explode(".", $laporan->file_laporan)[0];
		return array_map('unlink', glob(FCPATH."/assets/laporanKegiatan/$filename.*"));
	}
	public function edit($id){ 
		$this->db->select('*');
        $this->db->from('laporan');
		$this->db->where('id_laporan', $id);
        return $this->db->get()->row();
	}
	public function update(){
		$id_laporan = $this->input->post('id_laporan');
		$id_kegiatan = $this->input->post('id_kegiatan');
		$status = $this->input->post('status');
		if (!empty($_FILES["nama_laporan"]["name"])) {
			$this->_deleteDokumen($id_laporan);
            $nama_laporan = $this->_uploadDokumen();
        } else {
            $nama_laporan = $this->input->post('old_dokumen');
		} 		
		$data = array('id_kegiatan' => $id_kegiatan, 'nama_laporan'=>$nama_laporan, 'status'=>$status);
		$this->db->where('id_laporan', $id_laporan);
		$this->db->update('laporan', $data);
	}
	public function updateStatus($id_laporan, $status){
		$data = array('status'=>$status);
		$this->db->where('id_laporan', $id_laporan);
		$this->db->update('laporan', $data);
	}
	public function getCountLaporan()
	{
		$this->db->select('id_laporan');
		$this->db->from('laporan');
		return $this->db->count_all_results();
	}
	public function getBirokrasi()
	{
		$this->db->select('id_laporan');
		$this->db->from('laporan');
		$this->db->where('status','Diajukan');
		return $this->db->count_all_results();
	}
}