<?php
class ModBerita extends CI_model {
	private $_table = "berita";

	public function selectAll() {
		$this->db->select('u.nama, b.*');
        $this->db->from('berita as b');
		$this->db->join('user as u','b.id_user=u.id_user');
        return $this->db->get()->result();
	}
	public function selectBerita() {
		$this->db->select('*');
        $this->db->from('berita');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit('4');
        return $this->db->get()->result();
	}
	public function add() {
		$judul = $this->input->post('judul');
		$keterangan = $this->input->post('keterangan');
		$id_user = $this->input->post('id_user');
		$tanggal = $this->input->post('tanggal');
		$image = $this->_uploadImage();
		$data = array('judul' => $judul,'keterangan' => $keterangan, 'image' => $image,'tanggal'=>$tanggal, 'id_user'=>$id_user);
		$this->db->insert('berita', $data);
	}
	private function _uploadImage()
	{
		$config['upload_path']          = './assets/berita';
		$config['allowed_types']        = 'jpg|png';
		$config['file_name']            =  $this->input->post('judul');
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
	}
	public function beritaDetail($id){ 
		$this->db->select('u.nama, b.*');
        $this->db->from('berita as b');
		$this->db->join('user as u','b.id_user=u.id_user');
		$this->db->where('b.id_berita', $id);
        return $this->db->get()->row();
	}
	public function TambahJumlahView($id){ 
		$hsl=$this->db->query("UPDATE berita SET jumlah_view = jumlah_view+1 WHERE id_berita=$id");
		return $hsl;
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_berita" => $id])->row();
    } 
	public function delete($id){
		$this->_deleteImage($id);
		$this->db->where('id_berita', $id);
		$this->db->delete('berita');
	}
	private function _deleteImage($id)
	{
    	$berita = $this->getById($id);
	    $filename = explode(".", $berita->image)[0];
		return array_map('unlink', glob(FCPATH."assets/berita/$filename.*"));
	}
	public function edit($id){ 
		$this->db->select('*');
        $this->db->from('berita');
		$this->db->where('id_berita', $id);
        return $this->db->get()->row();
	}
	public function update(){
		$id_berita = $this->input->post('id_berita');
		$judul = $this->input->post('judul');
		$keterangan = $this->input->post('keterangan');
		$tanggal = $this->input->post('tanggal');
		$jumlah_view = $this->input->post('jumlah_view');
		$id_user = $this->input->post('id_user');
		if (!empty($_FILES["image"]["name"])) {
			$this->_deleteImage($id_berita);
            $image = $this->_uploadImage();
        } else {
            $image = $this->input->post('old_image');
		}
		$data = array('judul' => $judul,'keterangan' => $keterangan,'tanggal'=>$tanggal,
		'jumlah_view'=>$jumlah_view,'image'=>$image, 'id_user'=>$id_user);
			$this->db->where('id_berita', $id_berita);
			$this->db->update('berita', $data);
	}
	public function getCountBerita()
	{
		$this->db->select('id_berita');
		$this->db->from('berita');
		return $this->db->count_all_results();
	}
}