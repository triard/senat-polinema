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
		$status = $this->input->post('status');
		if ($status == 'Sidang Sedang Berlangsung' || $status == 'Rapat Sedang Berlangsung') {
			$status = $this->input->post('status');
		} else {
			$status = 'Selesai';
		}
		$notula = $this->input->post('notula');
		if ($id_penjadwalan == 0) {
		$data = array('agenda' => $agenda,'pembahasan' => $pembahasan,
		'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat, 
		'tujuan'=>$tujuan, 'notula'=>$notula, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,'status'=>$status,'id_user'=>$id_user);
		} else {
			$data = array('id_penjadwalan' => $id_penjadwalan, 'agenda' => $agenda,'pembahasan' => $pembahasan,'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat, 'tujuan'=>$tujuan, 'notula'=>$notula, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,'status'=>$status,'id_user'=>$id_user);
		}
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
    public function getIdPenjadwalan($id){
    	$query = $this->db->query("SELECT id_penjadwalan FROM kegiatan WHERE id_kegiatan='$id'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$x = $query->row();
			$hasil = $x->id_penjadwalan;
		} else {
			$hasil = 0;
		}
        return $hasil;	
    } 
    public function getStatus($id){
    	$query = $this->db->query("SELECT status FROM kegiatan WHERE id_kegiatan='$id'");
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
		$status = $this->input->post('status');
		if ($status != 'Rapat/Sidang Sedang Berlangsung') {
			$status = 'Selesai';
		}
		$notula= $this->input->post('notula');
		if ($id_penjadwalan == NULL) {
			$data = array('agenda' => $agenda,'pembahasan' => $pembahasan,'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat, 'notula'=>$notula, 'tujuan'=>$tujuan, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'notula'=>$notula,'password'=>$password, 'status'=>$status, 'id_user'=>$id_user);
		} else {
			$data = array('id_penjadwalan' => $id_penjadwalan, 'agenda' => $agenda,'pembahasan' => $pembahasan,
			'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat, 'notula'=>$notula, 
			'tujuan'=>$tujuan, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'notula'=>$notula,'password'=>$password, 'status'=>$status, 'id_user'=>$id_user);
		}
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('kegiatan', $data);
	}

	public function modalAbsen($id){ 
        $this->db->select('p.*, u.*, j.id_penjadwalan');
        $this->db->from('user as u');
        $this->db->join('peserta as p', 'p.id_user=u.id_user');
        $this->db->join('penjadwalan as j', 'j.id_penjadwalan=p.id_penjadwalan');
		$this->db->where('p.id_peserta', $id);
        return $this->db->get()->row();
	}
	public function updateAbsen(){ 
		$img = $this->input->post('image');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = 'assets/signature-image/' . uniqid() . '.png';
		$success = file_put_contents($file, $data); 
		$image=str_replace('./','',$file);

		$id_peserta = $this->input->post('id_peserta');
		$img= $image;
		$data = array('absen' => $img);
		$this->db->where('id_peserta', $id_peserta);
		if ($this->db->update('peserta', $data)) {
			$this->session->set_flashdata('success', 'Sukses! Absen anda berhasil tersimpan.');
			} else {
			$this->session->set_flashdata('failed', 'Error! Absen anda gagal berhasil tersimpan.');
			}
	}
	public function updateVoting(){ 
		$id_peserta = $this->input->post('id_peserta');
		$voting= $this->input->post('voting');
		$data = array('voting' => $voting);
		$this->db->where('id_peserta', $id_peserta);
		if ($this->db->update('peserta', $data)) {
			$this->session->set_flashdata('success', 'Sukses! Voting anda berhasil tersimpan.');
			} else {
			$this->session->set_flashdata('failed', 'Error! Voting anda gagal berhasil tersimpan.');
			}
	}
	public function JumlahVotingSetuju($id)
	{
		$this->db->select('count(peserta.voting) AS setuju');
		$this->db->from('peserta'); 
		$this->db->join('kegiatan', 'peserta.id_penjadwalan=kegiatan.id_penjadwalan');
		$this->db->where('peserta.voting','Setuju');    
		$this->db->where('kegiatan.id_kegiatan',$id);       
		return $this->db->get()->row();
	}
	public function JumlahVotingTidakSetuju($id)
	{
		$this->db->select('count(peserta.voting) AS tidak_setuju');
		$this->db->from('peserta'); 
		$this->db->join('kegiatan', 'peserta.id_penjadwalan=kegiatan.id_penjadwalan');
		$this->db->where('peserta.voting','Tidak Setuju');    
		$this->db->where('kegiatan.id_kegiatan',$id);        
		return $this->db->get()->row();
	}
	public function JumlahGolput($id)
	{
		$this->db->select('count(peserta.voting) AS golput');
		$this->db->from('peserta'); 
		$this->db->join('kegiatan', 'peserta.id_penjadwalan=kegiatan.id_penjadwalan');
		$this->db->where('peserta.voting','');    
		$this->db->where('kegiatan.id_kegiatan',$id);  
		return $this->db->get()->row();
	}
	public function SelectAgenda()
	{
		$this->db->select('k.*, u.id_user AS user, u.nama');
		$this->db->from('user as u'); 
		$this->db->join('peserta as p', 'p.id_user=u.id_user');
		$this->db->join('penjadwalan as j', 'j.id_penjadwalan=p.id_penjadwalan');
		$this->db->join('kegiatan AS k', 'j.id_penjadwalan=k.id_penjadwalan');
		return $this->db->get()->result();
	}
}