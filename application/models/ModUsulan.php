<?php
class ModUsulan extends CI_model {
	private $_table = "usulan";

	public function selectAll() {
		$this->db->select('*');
        $this->db->from('usulan');
        return $this->db->get()->result();
	}
	public function selectById() {
		$this->db->select('*');
        $this->db->from('usulan');
		$this->db->where('id_user',$this->session->userdata('id_user'));
        return $this->db->get()->result();
	}
	public function add() {
		$nama_pengusul = $this->input->post('nama_pengusul');
		$email = $this->input->post('email');
		$jenis = $this->input->post('jenis');
		$keterangan = $this->input->post('keterangan');
		$id_user = $this->input->post('id_user');
		$tanggal_pengajuan = date('Y-m-d');
		$dokumen_pendukung = $this->_uploadDokumen();
		$status = $this->input->post('status'); 		
		$data = array('nama_pengusul' => $nama_pengusul, 'email' => $email,'jenis' => $jenis, 'keterangan' => $keterangan,
		'dokumen_pendukung'=>$dokumen_pendukung, 'status'=>$status, 'id_user'=>$id_user,'tanggal_pengajuan'=>$tanggal_pengajuan);
		$this->db->insert('usulan', $data);
	}
	private function _uploadDokumen()
	{
		$config['upload_path']          = './assets/dokumenPendukung';
		$config['allowed_types']        = 'pdf|docx|rar|zip';
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
    public function getStatus($id){
    	$query = $this->db->query("SELECT status FROM usulan WHERE id_usulan='$id'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$x = $query->row();
			$hasil = $x->status;
		} else {
			$hasil = 0;
		}
        return $hasil;	
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
		$status = $this->input->post('status'); 		
		$data = array('email' => $email,'jenis' => $jenis, 'keterangan' => $keterangan,
		'dokumen_pendukung'=>$dokumen_pendukung, 'status'=>$status, 'id_user'=>$id_user);
			$this->db->where('id_usulan', $id_usulan);
			$this->db->update('usulan', $data);
	}
	public function setStatus($id_usulan, $status){ 		
		$data = array('status'=>$status);
		$this->db->where('id_usulan', $id_usulan);
		$this->db->update('usulan', $data);
	}
	public function getCountUsulan()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		return $this->db->count_all_results();
	}
	public function getUsulanVerifikasi()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		$this->db->where('status','Diajukan');	
		return $this->db->count_all_results();
	}
	public function getUsulanStatus()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		$this->db->where('status','Disetujui');	
		return $this->db->count_all_results();
	}
	public function getUsulanSekretaris()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		$this->db->where('status','Diajukan - Sekretaris');	
		$this->db->or_where('status','Perlu Tindak Lanjut - Sidang Pleno');	
		$this->db->or_where('status','Perlu Tindak Lanjut - Sidang Paripurna');	
		return $this->db->count_all_results();
	}
	public function getUsulanKomisi1()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		$this->db->where('status','Diajukan - Komisi 1');	
		return $this->db->count_all_results();
	}
	public function getUsulanKomisi2()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		$this->db->where('status','Diajukan - Komisi 2');	
		return $this->db->count_all_results();
	}
	public function getUsulanKomisi3()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		$this->db->where('status','Diajukan - Komisi 3');	
		return $this->db->count_all_results();
	}
	public function getUsulanKomisi4()
	{
		$this->db->select('id_usulan');
		$this->db->from('usulan');
		$this->db->where('status','Diajukan - Komisi 4');	
		return $this->db->count_all_results();
	}
	public function GetMostInput()
	{
		$this->db->select('jenis, COUNT(jenis) AS totalUsulan');
		$this->db->from('usulan');
		$this->db->group_by('jenis'); 
		// $this->db->order_by('a.qty_input', "desc");
		// $this->db->limit('7');
        return $this->db->get()->result();
	}
	public function InputFilter()
	{
		$start = $this->input->post('startUsulan');
		$end = $this->input->post('endUsulan');
		$this->db->select('jenis, COUNT(jenis) AS totalUsulan');
		$this->db->from('usulan');
		$this->db->group_by('jenis'); 
		$this->db->where("tanggal_pengajuan BETWEEN' $start 'AND' $end '");
        return $this->db->get()->result();
	}
}