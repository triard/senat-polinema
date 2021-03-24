<?php
class ModPenjadwalan extends CI_model {
	private $_table = "penjadwalan";

	public function selectAll() {
		$this->db->select('u.nama, p.*');
        $this->db->from('penjadwalan as p');
		$this->db->join('user as u','p.id_user=u.id_user');
        return $this->db->get()->result();
	}
	public function add() {
		$id_usulan = $this->input->post('id_usulan');
		$agenda = $this->input->post('agenda'); 
		$pembahasan = $this->input->post('pembahasan');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$waktu_selesai = $this->input->post('waktu_selesai');
		$id_user = $this->input->post('id_user');
		$tempat = $this->input->post('tempat');
		$jenis_rapat = $this->input->post('jenis_rapat');
		$link = $this->input->post('link');
		$password= $this->input->post('password');
		$status = $this->input->post('status'); 		
		$data = array('id_user'=>$id_user, 'id_usulan'=>$id_usulan, 'agenda' => $agenda,'pembahasan' => $pembahasan,
		'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat,'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,
		 'status'=>$status);
		$this->db->insert('penjadwalan', $data);
	}

	public function getById($id){
		return $this->db->get_where($this->_table, ["id_penjadwalan" => $id])->row();
    }

    public function getIdUsulan($id_penjadwalan){
    	$query = $this->db->query("SELECT id_usulan FROM penjadwalan WHERE id_penjadwalan='$id_penjadwalan'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$x = $query->row();
			$hasil = $x->id_usulan;
		} else {
			$hasil = 0;
		}
        return $hasil;	
    }

	public function delete($id){
		$this->db->where('id_penjadwalan', $id);
		$this->db->delete('penjadwalan');
	}
	public function edit($id){ 
		$this->db->select('*');
        $this->db->from('penjadwalan');
		$this->db->where('id_penjadwalan', $id);
        return $this->db->get()->row();
	}
	public function update(){
		$id_penjadwalan = $this->input->post('id_penjadwalan');
		$id_usulan = $this->input->post('id_usulan');
		$agenda = $this->input->post('agenda');
		$pembahasan = $this->input->post('pembahasan');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$waktu_selesai = $this->input->post('waktu_selesai');
		$id_user = $this->input->post('id_user');
		$tempat = $this->input->post('tempat');
		$jenis_rapat = $this->input->post('jenis_rapat');
		$link = $this->input->post('link');
		$password= $this->input->post('password');
		$status = $this->input->post('status'); 		
		$data = array('id_user'=>$id_user, 'id_usulan'=>$id_usulan,'agenda' => $agenda,'pembahasan' => $pembahasan,
		'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,
		'tempat'=>$tempat, 'status'=>$status);
			$this->db->where('id_penjadwalan', $id_penjadwalan);
			$this->db->update('penjadwalan', $data);
	}
	public function getCountPenjadwalan()
	{
		$this->db->select('id_penjadwalan');
		$this->db->from('penjadwalan');
		return $this->db->count_all_results();
	}
	public function setStatus($id_penjadwalan, $status){ 		
		$data = array('status'=>$status);
		$this->db->where('id_penjadwalan', $id_penjadwalan);
		$this->db->update('penjadwalan', $data);
	}
}