<?php

class Modelsurat extends CI_Model{

public function insert($data,$nama_tabel){
	return $this->db->insert($nama_tabel,$data);
	}

	public function update ($data,$nama_tabel,$nama_kolom,$value){
		$this->db->where($nama_kolom, $value);
		return $this->db->update($nama_tabel, $data);

	}

public function get_id_status_terakhir($nama_tabel,$nama_kolom){
	$this->db->select('*');
	$this->db->from($nama_tabel);
	$this->db->order_by($nama_kolom,'desc');
	$this->db->limit(1);
	$query = $this->db->get();
		$data = $query->result_array();
		foreach ($data as $dat ) {

		}
	return $dat[$nama_kolom];
}

public function get_last_id($nama_tabel){
	$this->db->select('CAST(LAST_INSERT_ID(id_status) AS UNSIGNED) +1 as last_id');
	$this->db->from($nama_tabel);
	$this->db->order_by('last_id','desc');
	$this->db->limit(1);
	$query = $this->db->get();
		$data = $query->result_array();
		foreach ($data as $dat ) {

		}
	return $dat['last_id'];
}

public function get_last_identitas($nama_tabel){
	$this->db->select('CAST(LAST_INSERT_ID(id_identitas) AS UNSIGNED) +1 as last_identitas');
	$this->db->from($nama_tabel);
	$this->db->order_by('last_identitas','desc');
	$this->db->limit(1);
	$query = $this->db->get();
		$data = $query->result_array();
		foreach ($data as $dat ) {

		}
	return $dat['get_last_identitas'];
}


		public function get_surat($id_user){
		$this->db->select('a.id_status, a.status,a.id_user, a.keterangan, a.tgl_buat, a.tgl_diterima, b.id_jenis_surat, b.jenis_surat, c.nama_lengkap, ');
		$this->db->from('tb_status_surat as a');
		$this->db->join('tb_jenis_surat as b','a.id_jenis_surat=b.id_jenis_surat');
		$this->db->join('tb_user as c','a.id_user=c.id_user');
		$this->db->where('c.id_user',$id_user);
		$query = $this->db->get();
		return $query->result_array();


	}

  public function getUserbySurat($id_status,$id_surat){
    $this->db->select('a.id_status, b.username ');
    $this->db->from('tb_status_surat as a');
    $this->db->join('tb_user as b','a.id_user=b.id_user');
    $this->db->where('a.id_status',$id_status);
    $this->db->where('a.id_jenis_surat',$id_surat);
    $query = $this->db->get();
    $data = $query->result_array();
    $id_user='';
    foreach ($data as $dat ) {
      $id_user = $dat['username'];


    }
    return $id_user;

  }


	public function getSuratbyStatus($id_status,$nama_tabel){
		$this->db->select('a.*, b.*');
		$this->db->from('tb_status_surat as a');
		$this->db->join($nama_tabel.' as b','a.id_status = b.id_status');
		$this->db->where('a.id_status',$id_status);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;





	}

	public function get_id_terakhir($nama_tabel,$nama_kolom){
		$id=1;
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$this->db->order_by($nama_kolom,'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$data = $query->result_array();
			foreach ($data as $dat ) {

			}
			$id= ($dat[$nama_kolom]+1);
		}
		return ($id);
	}



	public function getData($namaTabel,$berdasarkan,$namaKolom){
		$this->db->select('*');
		$this->db->from($namaTabel);
		$this->db->where($namaKolom,$berdasarkan);
		$query = $this->db->get();
		return $query->result_array();

	}

	public function terima_bidan($data){
		$this->db->set('no_surat_bidan',$data['no_surat_bidan']);
		$this->db->set('masa_berlaku_bidan',$data['masa_berlaku_bidan']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_perawat($data){
		$this->db->set('no_surat_sikp',$data['no_surat_sikp']);
		$this->db->set('masa_berlaku_sikp',$data['masa_berlaku_sikp']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_gizi($data){
		$this->db->set('no_surat',$data['no_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_laboratorium($data){
		$this->db->set('no_surat',$data['no_surat']);
		$this->db->set('masa_berlaku_sipatlm',$data['masa_berlaku_sipatlm']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_radiografer($data){
		$this->db->set('no_surat_sikr',$data['no_surat_sikr']);
		$this->db->set('masa_berlaku_sikr',$data['masa_berlaku_sikr']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_apoteker($data){
		$this->db->set('no_surat_sipa',$data['no_surat_sipa']);
		//$this->db->set('masa_berlaku_nostra',$data['masa_berlaku_nostra']);
		$this->db->set('praktik_sebagai',$data['praktik_sebagai']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_fisiopterapis($data){
		$this->db->set('nomor_surat',$data['nomor_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_wicara($data){
		$this->db->set('nomor_surat',$data['nomor_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_medis($data){
		$this->db->set('nomor_surat',$data['nomor_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_farmasi($data){
		$this->db->set('nomor_surat',$data['nomor_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_obat($data){
		$this->db->set('nomor_surat',$data['nomor_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_apotek($data){
		$this->db->set('nomor_surat',$data['nomor_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_refraksionis($data){
		$this->db->set('nomor_surat',$data['nomor_surat']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_ujilab($data){
		$this->db->set('no_laboratorium',$data['no_laboratorium']);
		$this->db->set('jadwal_pengambilan',$data['jadwal_pengambilan']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_pirt($data){
		$this->db->set('no_pirt',$data['no_pirt']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}

	public function terima_dokter($data){
		$this->db->set('no_surat',$data['no_surat']);
		//$this->db->set('masa_berlaku_nostr',$data['masa_berlaku_nostr']);
		//$this->db->set('rbPraktik',$data['rbPraktik']);
		$this->db->set('masa_berlaku',$data['masa_berlaku']);
		$this->db->where("id",$data['id_surat']);
		return $this->db->update($data['nama_tabel']);
	}






}
