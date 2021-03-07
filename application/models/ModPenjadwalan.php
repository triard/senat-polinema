<?php
class ModPenjadwalan extends CI_model {
	private $_table = "penjadwalan";

	public function selectAll() {
		$this->db->select('*');
        $this->db->from('penjadwalan');
        return $this->db->get()->result();
	}
	public function add() {
		$agenda = $this->input->post('agenda');
		$pembahasan = $this->input->post('pembahasan');
		$tanggal = $this->input->post('tanggal');
		$id_user = $this->input->post('id_user');
		$tempat = $this->input->post('tempat');
		$status = $this->input->post('status'); 		
		$data = array('agenda' => $agenda,'pembahasan' => $pembahasan,'tanggal'=>$tanggal,
		'tempat'=>$tempat, 'status'=>$status, 'id_user'=>$id_user);
		$this->db->insert('penjadwalan', $data);
	}

	public function getById($id){
		return $this->db->get_where($this->_table, ["id_penjadwalan" => $id])->row();
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
		$agenda = $this->input->post('agenda');
		$pembahasan = $this->input->post('pembahasan');
		$tanggal = $this->input->post('tanggal');
		$id_user = $this->input->post('id_user');
		$tempat = $this->input->post('tempat');
		$status = $this->input->post('status'); 		
		$data = array('agenda' => $agenda,'pembahasan' => $pembahasan,'tanggal'=>$tanggal,
		'tempat'=>$tempat, 'status'=>$status, 'id_user'=>$id_user);
			$this->db->where('id_penjadwalan', $id_penjadwalan);
			$this->db->update('penjadwalan', $data);
	}
	public function getCountPenjadwalan()
	{
		$this->db->select('id_penjadwalan');
		$this->db->from('penjadwalan');
		return $this->db->count_all_results();
	}
}