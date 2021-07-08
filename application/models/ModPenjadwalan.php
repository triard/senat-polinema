<?php
class ModPenjadwalan extends CI_model {
	private $_table = "penjadwalan";
 
	public function selectAll() {
		$this->db->select('u.nama, p.*');
        $this->db->from('penjadwalan as p');
		$this->db->join('user as u','p.id_user=u.id_user');
        return $this->db->get()->result();
	}
	public function selectDataAll() {

		$this->db->select('penjadwalan.*,COUNT(user.id_user) AS item_user');
        $this->db->from('penjadwalan');
        $this->db->join('peserta', 'penjadwalan.id_penjadwalan=peserta.id_penjadwalan');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->group_by('penjadwalan.id_penjadwalan');
        $this->db->order_by('penjadwalan.waktu_mulai','DESC');
        return $this->db->get()->result();
	}
	public function SelectDataById() {
		$this->db->select('j.*, u.id_user AS iu');
		$this->db->from('user as u'); 
		$this->db->join('peserta as p', 'p.id_user=u.id_user');
		$this->db->join('penjadwalan as j', 'j.id_penjadwalan=p.id_penjadwalan');
		$this->db->order_by('j.waktu_mulai','DESC');
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
		if ($id_usulan == 0) {
			$data = array('id_user'=>$id_user, 'agenda' => $agenda,'pembahasan' => $pembahasan,'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat,'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,'status'=>$status);
		} else {
			$data = array('id_user'=>$id_user, 'id_usulan'=>$id_usulan, 'agenda' => $agenda,'pembahasan' => $pembahasan,'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai,'tempat'=>$tempat,'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,'status'=>$status);
		} 		
		$this->db->insert('penjadwalan', $data);
		$user = $this->input->post('user',TRUE);

		$id_penjadwalan = $this->db->insert_id();
		$this->session->set_userdata('jadwal_id', $id_penjadwalan);
		$result = array();
        foreach($user AS $key => $val){
        	$result[] = array(
			  'id_penjadwalan' => $id_penjadwalan,
              'id_user'   => $_POST['user'][$key]
            );
        }    
		$this->db->insert_batch('peserta', $result);
        $this->db->trans_complete();  
	}
	public function getId(){
		$agenda = $this->input->post('agenda'); 
		$pembahasan = $this->input->post('pembahasan');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$waktu_selesai = $this->input->post('waktu_selesai');
		$tempat = $this->input->post('tempat');
		$jenis_rapat = $this->input->post('jenis_rapat');	
        $query = $this->db->query("SELECT id_penjadwalan FROM penjadwalan WHERE agenda='$agenda' AND pembahasan='$pembahasan' 
		AND waktu_mulai='$waktu_mulai' AND waktu_selesai='$waktu_selesai' AND tempat='$tempat'
		AND jenis_rapat='$jenis_rapat'");
        $hasil = $query->row();
        return $hasil->id_penjadwalan;
    } 
 
	public function data_peserta()
	{
		$id_jadwal = $this->session->userdata('jadwal_id');
		$this->db->select('a.email, a.username');
        $this->db->from(' peserta AS p');
        $this->db->join('penjadwalan AS j', 'p.id_penjadwalan = j.id_penjadwalan');
        $this->db->join(' account AS a', 'p.id_user = a.id_user');
        $this->db->where('j.id_penjadwalan',$id_jadwal);
        return $this->db->get()->result();
	}
	public function kirimEmailPeserta($id_penjadwalan)
	{
		$id_jadwal = $this->session->userdata('jadwal_id');
		$this->db->select('a.email, a.username');
        $this->db->from(' peserta AS p');
        $this->db->join('penjadwalan AS j', 'p.id_penjadwalan = j.id_penjadwalan');
        $this->db->join(' account AS a', 'p.id_user = a.id_user');
        $this->db->where('j.id_penjadwalan',$id_penjadwalan);
        return $this->db->get()->result();
	}

	public function ingatkanEmailPeserta($id_penjadwalan)
	{
		$id_jadwal = $this->session->userdata('jadwal_id');
		$this->db->select('a.email, a.username');
        $this->db->from(' peserta AS p');
        $this->db->join('penjadwalan AS j', 'p.id_penjadwalan = j.id_penjadwalan');
        $this->db->join(' account AS a', 'p.id_user = a.id_user');
        $this->db->where('j.id_penjadwalan',$id_penjadwalan);
        $this->db->where('p.konfirmasi_kehadiran', NULL);
        return $this->db->get()->result();
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_penjadwalan" => $id])->row();
    }
	function get_user_by_jadwal($id){
        $this->db->select('*, u.id_user AS user_id');
        $this->db->from('user as u');
        $this->db->join('peserta as p', 'p.id_user=u.id_user');
        $this->db->join('penjadwalan as j', 'j.id_penjadwalan=p.id_penjadwalan');
        $this->db->where('j.id_penjadwalan',$id);
        return $this->db->get()->result();
    }
	function selectJadwal(){
        $this->db->select('p.*, u.id_user, u.nama,u.jabatan,u.keterangan, j.id_penjadwalan');
        $this->db->from('user as u');
        $this->db->join('peserta as p', 'p.id_user=u.id_user');
        $this->db->join('penjadwalan as j', 'j.id_penjadwalan=p.id_penjadwalan');
        return $this->db->get()->result();
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
	public function getPengusul($id_penjadwalan){
    	$query = $this->db->query("SELECT nama_pengusul FROM penjadwalan AS p JOIN usulan AS u ON p.id_usulan=u.id_usulan WHERE id_penjadwalan='$id_penjadwalan'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$x = $query->row();
			$hasil = $x->nama_pengusul;
		} else {
			$hasil = 0;
		}
        return $hasil;	
    }
	public function getEmailPengusul($id_penjadwalan){
    	$query = $this->db->query("SELECT email FROM penjadwalan AS p JOIN usulan AS u ON p.id_usulan=u.id_usulan WHERE id_penjadwalan='$id_penjadwalan'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$x = $query->row();
			$hasil = $x->email;
		} else {
			$hasil = 0;
		}
        return $hasil;	
    }
    public function getIdUser($id_penjadwalan){
    	$query = $this->db->query("SELECT id_user FROM penjadwalan WHERE id_penjadwalan='$id_penjadwalan'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$x = $query->row();
			$hasil = $x->id_user;
		} else {
			$hasil = 0;
		}
        return $hasil;	
    }

	public function delete($id){
		$this->db->delete('peserta', array('id_penjadwalan' => $id));
		$this->db->where('id_penjadwalan', $id);
		$this->db->delete('penjadwalan');
	}
	public function edit($id){ 
		// $this->db->select('*');
        // $this->db->from('penjadwalan');
		// $this->db->where('id_penjadwalan', $id);
		$this->db->select('*');
        $this->db->from('user as u');
        $this->db->join('peserta as p', 'p.id_user=u.id_user');
        $this->db->join('penjadwalan as j', 'j.id_penjadwalan=p.id_penjadwalan');
        $this->db->where('j.id_penjadwalan',$id);
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
		if ($id_usulan == NULL) {
			$data = array('id_user'=>$id_user, 'agenda' => $agenda,'pembahasan' => $pembahasan,
			'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,'tempat'=>$tempat, 'status'=>$status);
		} else {
			$data = array('id_user'=>$id_user, 'id_usulan'=>$id_usulan,'agenda' => $agenda,'pembahasan' => $pembahasan,
			'waktu_mulai'=>$waktu_mulai ,'waktu_selesai'=>$waktu_selesai, 'jenis_rapat'=>$jenis_rapat,'link'=>$link,'password'=>$password,'tempat'=>$tempat, 'status'=>$status);
		}
			$this->db->where('id_penjadwalan', $id_penjadwalan);
			$this->db->update('penjadwalan', $data);
			$this->db->delete('peserta', array('id_penjadwalan' => $id_penjadwalan));

			$result = array();
			$user = $this->input->post('user',TRUE);
			$result = array();
                foreach($user AS $key => $val){
                     $result[] = array(
                      'id_penjadwalan'   => $id_penjadwalan,
                      'id_user'   => $_POST['user'][$key]
                     );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('peserta', $result);
        $this->db->trans_complete();
	}
	public function editKehadiran($id){ 
		$id_user = $this->session->userdata('id_user');
		$this->db->select('p.*');
        $this->db->from('peserta AS p');
        $this->db->join('penjadwalan AS j', 'p.id_penjadwalan = j.id_penjadwalan');
        $this->db->where('j.id_penjadwalan',$id);
		$this->db->where('p.id_user',$id_user);
        return $this->db->get()->row();
	}
	public function updateKehadiran(){
		$id_peserta = $this->input->post('id_peserta');
		$konfirmasi_kehadiran = $this->input->post('konfirmasi_kehadiran');
		$keterangan_kehadiran = $this->input->post('keterangan_kehadiran');

			$data = array('konfirmasi_kehadiran' => $konfirmasi_kehadiran,
			'keterangan_kehadiran' => $keterangan_kehadiran);
			$this->db->where('id_peserta', $id_peserta);
			$this->db->update('peserta', $data);
	}
	public function updateStatus(){
		$id_penjadwalan = $this->input->post('id_penjadwalan');
		$status = $this->input->post('status'); 		
		$data = array('status'=>$status);
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
		public function getJadwalTerlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan WHERE status='Selesai'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalBelumTerlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan WHERE status!='Selesai'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi1()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE jabatan='Ketua Komisi 1'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi1Terlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status='Selesai' AND jabatan='Ketua Komisi 1'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi1BelumTerlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status!='Selesai' AND jabatan='Ketua Komisi 1'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi2()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE jabatan='Ketua Komisi 2'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi2Terlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status='Selesai' AND jabatan='Ketua Komisi 2'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi2BelumTerlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status!='Selesai' AND jabatan='Ketua Komisi 2'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi3()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE jabatan='Ketua Komisi 3'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi3Terlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status='Selesai' AND jabatan='Ketua Komisi 3'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi3BelumTerlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status!='Selesai' AND jabatan='Ketua Komisi 3'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi4()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE jabatan='Ketua Komisi 4'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi4Terlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status='Selesai' AND jabatan='Ketua Komisi 4'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

	public function getJadwalKomisi4BelumTerlaksana()
	{
		$query = $this->db->query("SELECT * FROM penjadwalan INNER JOIN user ON penjadwalan.id_user=user.id_user WHERE status!='Selesai' AND jabatan='Ketua Komisi 4'");
        $cek = $query->num_rows();
		if ($cek > 0) {
			$hasil = $cek;
		} else {
			$hasil = 0;
		}
        return $hasil;	
	}

}