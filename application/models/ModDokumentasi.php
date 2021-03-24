<?php
class ModDokumentasi extends CI_model {
	private $_table = "dokumentasi";

	public function selectAll() {
		$this->db->select('*');
        $this->db->from('dokumentasi');
        return $this->db->get()->result();
	}
	public function add() {
		$id_kegiatan = $this->input->post('id_kegiatan');
		$nama_dokumentasi = $this->_uploadDokumentasi();
		$data = array('id_kegiatan' => $id_kegiatan, 'nama_dokumentasi'=>$nama_dokumentasi);
		$this->db->insert('dokumentasi', $data);
	}
	private function _uploadDokumentasi()
	{
		$config['upload_path']          = './assets/dokumentasiKegiatan';
		$config['allowed_types']        = 'png|jpg';
		$config['file_name']            = "dokumentasi-kegiatan-".substr(md5(time()), 0, 16);
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('nama_dokumentasi')) {
			return $this->upload->data("file_name");
		}
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_dokumentasi" => $id])->row();
    } 
	public function delete($id){
		$this->_deleteDokumen($id);
		$this->db->where('id_dokumentasi', $id);
		$this->db->delete('dokumentasi');
	}
	private function _deleteDokumen($id)
	{
    	$dokumentasi = $this->getById($id);
	    $filename = explode(".", $dokumentasi->nama_dokumentasi)[0];
		return array_map('unlink', glob(FCPATH."assets/dokumentasiKegiatan/$filename.*"));
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
}