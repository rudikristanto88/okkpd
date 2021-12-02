<?php
class Model_ujimutu extends CI_Model {
    
  public function getDataUjiMutuSample()
  {
    $this->db->select("a.nama_usaha,b.kode_layanan,b.uid,c.nama_layanan,a.kota ");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->where('b.samplelab',"0"); 
    $this->db->order_by('b.kode_pendaftaran','desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  
  public function getDataUjiMutuBlmValid()
  {
    $this->db->select("a.nama_usaha,b.kode_layanan,b.uid,c.nama_layanan,a.kota ");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->where('b.samplelab',"1"); 
    
    $where = '(b.validlab = 0 or b.validManTek = 2)';
    $this->db->where($where); 
    $this->db->order_by('b.kode_pendaftaran','desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  
  public function getDataUjiMutuLHU()
  {
    $this->db->select("a.nama_usaha,b.kode_layanan,b.uid,c.nama_layanan,a.kota ");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->where('b.samplelab',"1"); 
    $this->db->where('b.validlab',"1"); 
    $this->db->where('b.validManTek',"1"); 
     
    $this->db->order_by('b.kode_pendaftaran','asc');
    $query = $this->db->get();
    return $query->result_array();
  }


  
  public function getDataUjiMutuValidLab()
  {
    $this->db->select("a.*,b.*,c.*,d.namadetail,e.namajenis");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->join('jenis_komoditas_detil as d',"b.idjenisdetail=d.idjenisdetail"); 
    $this->db->join('jenis_komoditas as e',"b.idjenis=e.idjenis"); 
    $this->db->where('b.samplelab',"1"); 
    $this->db->where('b.validlab',"1"); 
    $this->db->where('b.validManTek',"0"); 
    $this->db->order_by('b.kode_pendaftaran','desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  
  public function getDataUjiMutuValidLabByID($id)
  {
    $this->db->select("a.*,b.*,c.*,d.namadetail,e.namajenis,f.nama_kemasan");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->join('jenis_komoditas_detil as d',"b.idjenisdetail=d.idjenisdetail"); 
    $this->db->join('jenis_komoditas as e',"b.idjenis=e.idjenis"); 
    $this->db->join('master_kemasan as f',"b.id_kemasan=f.id_kemasan"); 
    $this->db->where('b.samplelab',"1"); 
    $this->db->where('b.validlab',"1"); 
    $this->db->where('b.validManTek',"0"); 
    $this->db->where('b.uid',$id); 
    $this->db->order_by('b.kode_pendaftaran','desc');
    $query = $this->db->get();
    return $query->result_array();
  }
  
  public function getDataHasilUjiMutuByID($id)
  {
    $this->db->select("a.*");
    $this->db->from('layanan_ujimutu_hasil as a'); 
    $this->db->where('a.valid',"0");  
    $this->db->where('a.idlayanan_ujimutu',$id);  
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataHasilUjiMutuLHUByID($id)
  {
    $this->db->select("a.*");
    $this->db->from('layanan_ujimutu_hasil as a'); 
    $this->db->where('a.valid',"1");  
    $this->db->where('a.idlayanan_ujimutu',$id);  
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataHasilUjiMutuLHUByIDTolak($id)
  {
    $this->db->select("a.*");
    $this->db->from('layanan_ujimutu_hasil as a'); 
    $this->db->where('a.valid',"2");  
    $this->db->where('a.idlayanan_ujimutu',$id);  
    $query = $this->db->get();
    return $query->result_array();
  }

  
  public function getDataHasilUjiMutuByUID($id)
  {
    $this->db->select("a.*");
    $this->db->from('layanan_ujimutu as a');  
    $this->db->where('a.uid',$id);  
    $query = $this->db->get();
    return $query->result_array();
  }
  
  
  
  public function getValidPengujian()
  {
    $this->db->select("a.*,b.*,c.*,d.namadetail,e.namajenis,f.nama_kemasan");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan"); 
    $this->db->join('jenis_komoditas_detil as d',"b.idjenisdetail=d.idjenisdetail"); 
    $this->db->join('jenis_komoditas as e',"b.idjenis=e.idjenis"); 
    $this->db->join('master_kemasan as f',"b.id_kemasan=f.id_kemasan"); 
    $this->db->where("b.samplelab",1); 
    $where = '(b.validlab = 0 or b.validManTek = 2)';
    $this->db->where($where); 
    $this->db->order_by('b.tanggalsampleLab asc,b.kode_pendaftaran asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataUjiMutuLHUDetail()
  {
    $this->db->select("a.*,b.*,c.*,d.namadetail,e.namajenis,f.nama_kemasan,g.nama_lengkap as namaanalis,h.nama_lengkap as namamantek,i.username");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->join('jenis_komoditas_detil as d',"b.idjenisdetail=d.idjenisdetail"); 
    $this->db->join('jenis_komoditas as e',"b.idjenis=e.idjenis"); 
    $this->db->join('master_kemasan as f',"b.id_kemasan=f.id_kemasan"); 
    $this->db->join('user as g',"b.userValidLab=g.id_user"); 
    $this->db->join('user as h',"b.userValidMantek=h.id_user"); 
    $this->db->join('user as i',"a.id_user=i.id_user"); 
    $this->db->where('b.samplelab',"1"); 
    $this->db->where('b.validlab',"1"); 
    $this->db->where('b.validManTek',"1"); 
     
    $this->db->order_by('b.kode_pendaftaran','desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  function getDataUjiMutuLHUDetailByID($id){
    
    $this->db->select("a.*,b.*,c.*,d.namadetail,e.namajenis,f.nama_kemasan,g.nama_lengkap as namaanalis,h.nama_lengkap as namamantek");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->join('jenis_komoditas_detil as d',"b.idjenisdetail=d.idjenisdetail"); 
    $this->db->join('jenis_komoditas as e',"b.idjenis=e.idjenis"); 
    $this->db->join('master_kemasan as f',"b.id_kemasan=f.id_kemasan"); 
    $this->db->join('user as g',"b.userValidLab=g.id_user"); 
    $this->db->join('user as h',"b.userValidMantek=h.id_user"); 
    $this->db->where('b.samplelab',"1"); 
    $this->db->where('b.validlab',"1"); 
    $this->db->where('b.validManTek',"1"); 
    $this->db->where('b.uid',$id);
      
    $query = $this->db->get();
    return $query->result_array();
  }

  
  public function getDataLayananUjiMutu($value)
  {
    if ($value != null) {
      $query = $this->db->query("SELECT *,
      c.namajenis,d.namadetail,
      a.status status_layanan ,timestampdiff(DAY,  CONVERT(a.tanggal_buat, DATE), CONVERT(DATE_ADD(a.tanggal_buat, INTERVAL 7 DAY), DATE)) selisih
      from layanan_ujimutu a
      join master_layanan b on a.kode_layanan = b.kode_layanan 
      join jenis_komoditas c on a.idjenis = c.idjenis 
      join jenis_komoditas_detil d on a.idjenisdetail = d.idjenisdetail
      where a.id_identitas_usaha = " . $value . "
      and case when a.validlab = 0 then timestampdiff(DAY,  CONVERT(a.tanggal_buat, DATE), CONVERT(now(), DATE)) else 0 end <= 7 
      order by a.tanggal_buat desc");
      return $query->result_array();
    } else {
      return null;
    }
  }

  
  public function daftarBelumKirimSampel()
  { 
      $query = $this->db->query("SELECT f.username,f.nama_lengkap,a.kode_pendaftaran,
      c.namajenis,d.namadetail, 7-ifnull(timestampdiff(DAY, CONVERT(a.tanggal_buat, DATE), CONVERT(now(), DATE)),0) kurang,
      a.status status_layanan ,timestampdiff(DAY,  CONVERT(a.tanggal_buat, DATE), CONVERT(DATE_ADD(a.tanggal_buat, INTERVAL 7 DAY), DATE)) selisih
      from layanan_ujimutu a
      join master_layanan b on a.kode_layanan = b.kode_layanan 
      join jenis_komoditas c on a.idjenis = c.idjenis 
      join jenis_komoditas_detil d on a.idjenisdetail = d.idjenisdetail
      join identitas_usaha e on a.id_identitas_usaha = e.id_identitas_usaha
      join user f on e.id_user = f.id_user
      where a.samplelab = 0 
      and case when a.samplelab = 0 then timestampdiff(DAY,  CONVERT(a.tanggal_buat, DATE), CONVERT(now(), DATE)) else 8 end <= 7 
      order by a.tanggal_buat desc");
      return $query->result_array(); 
  }
  
  public function getValidSampleLab()
  {
    $this->db->select("a.*,b.*,c.*,d.namajenis,e.namadetail");
    $this->db->from('identitas_usaha a');
    $this->db->join('layanan_ujimutu b', "a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan c', "b.kode_layanan=c.kode_layanan");
    $this->db->join('jenis_komoditas d', "b.idjenis=d.idjenis");
    $this->db->join('jenis_komoditas_detil e', "b.idjenisdetail=e.idjenisdetail");

    $this->db->where("samplelab", 0);
    $this->db->order_by('b.kode_pendaftaran', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getPimpinanBalai()
  {
    $this->db->select("a.*");
    $this->db->from('identitas_kepala_balai as a');  
    $query = $this->db->get();
    return $query->result_array();
  }
  
}
?>