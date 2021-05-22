<?php
class ModNotifikasi extends CI_model {
	private $_table = "notifikasi";

	public function selectAll() {
		$this->db->select('*');
        $this->db->from('notifikasi');
        $this->db->order_by('time', 'DESC');
        return $this->db->get()->result(); 
	}
	public function getAll(){
    	$query = $this->db->query("SELECT * FROM notifikasi ORDER BY time DESC LIMIT 4");
        return $query->result();
    }

	public function addByPenjadwalan($user, $text, $time, $id_user, $id_penjadwalan) {
		$data = array('user' => $user, 'text' => $text, 'time' => $time, 'id_user' => $id_user, 'id_penjadwalan' => $id_penjadwalan);
		$this->db->insert('notifikasi', $data);
	}
	public function getLastIdPenjadwalan(){
    	$query = $this->db->query("SELECT MAX(id_penjadwalan) AS id_penjadwalan FROM penjadwalan");
        $hasil = $query->row();
        return $hasil->id_penjadwalan;	
    }
    public function deleteByPenjadwalan($id_penjadwalan){
		$this->db->where('id_penjadwalan', $id_penjadwalan);
		$this->db->delete('notifikasi');
	}

	public function addByKegiatan($user, $text, $time, $id_user, $id_kegiatan) {
		$data = array('user' => $user, 'text' => $text, 'time' => $time, 'id_user' => $id_user, 'id_kegiatan' => $id_kegiatan);
		$this->db->insert('notifikasi', $data);
	}
	public function getLastIdKegiatan(){
    	$query = $this->db->query("SELECT MAX(id_kegiatan) AS id_kegiatan FROM kegiatan");
        $hasil = $query->row();
        return $hasil->id_kegiatan;	
    }
    public function deleteByKegiatan($id_kegiatan){
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->delete('notifikasi');
	}

	public function addByDokumentasi($user, $text, $time, $id_user, $id_dokumentasi) {
		$data = array('user' => $user, 'text' => $text, 'time' => $time, 'id_user' => $id_user, 'id_dokumentasi' => $id_dokumentasi);
		$this->db->insert('notifikasi', $data);
	}
	public function getLastIdDokumentasi(){
    	$query = $this->db->query("SELECT MAX(id_dokumentasi) AS id_dokumentasi FROM dokumentasi");
        $hasil = $query->row();
        return $hasil->id_dokumentasi;	
    }
    public function getKegiatanFromDokumentasi($id_kegiatan){
    	$query = $this->db->query("SELECT agenda FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'");
        $hasil = $query->row();
        return $hasil->agenda;	
    }
    public function deleteByDokumentasi($id_dokumentasi){
		$this->db->where('id_dokumentasi', $id_dokumentasi);
		$this->db->delete('notifikasi');
	}

	public function addByLaporan($user, $text, $time, $id_user, $id_laporan) {
		$data = array('user' => $user, 'text' => $text, 'time' => $time, 'id_user' => $id_user, 'id_laporan' => $id_laporan);
		$this->db->insert('notifikasi', $data);
	}
	public function getLastIdLaporan(){
    	$query = $this->db->query("SELECT MAX(id_laporan) AS id_laporan FROM laporan");
        $hasil = $query->row();
        return $hasil->id_laporan;	
    }
    public function getKegiatanFromLaporan($id_kegiatan){
    	$query = $this->db->query("SELECT agenda FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'");
        $hasil = $query->row();
        return $hasil->agenda;	
    }
    public function deleteByLaporan($id_laporan){
		$this->db->where('id_laporan', $id_laporan);
		$this->db->delete('notifikasi');
	}

	public function addByBerita($user, $text, $time, $id_user, $id_berita) {
		$data = array('user' => $user, 'text' => $text, 'time' => $time, 'id_user' => $id_user, 'id_berita' => $id_berita);
		$this->db->insert('notifikasi', $data);
	}
	public function getLastIdBerita(){
    	$query = $this->db->query("SELECT MAX(id_berita) AS id_berita FROM berita");
        $hasil = $query->row();
        return $hasil->id_berita;	
    }
    public function deleteByBerita($id_berita){
		$this->db->where('id_berita', $id_berita);
		$this->db->delete('notifikasi');
	}

	public function addByUsulan($user, $text, $time, $id_usulan) {
		$data = array('user' => $user, 'text' => $text, 'time' => $time, 'id_usulan' => $id_usulan);
		$this->db->insert('notifikasi', $data);
	}
	public function getLastIdUsulan(){
    	$query = $this->db->query("SELECT MAX(id_usulan) AS id_usulan FROM usulan");
        $hasil = $query->row();
        return $hasil->id_usulan;	
    }
    public function deleteByUsulan($id_usulan){
		$this->db->where('id_usulan', $id_usulan);
		$this->db->delete('notifikasi');
	}
}