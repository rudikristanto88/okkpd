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
     
    $this->db->order_by('b.kode_pendaftaran','desc');
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
  
  public function getValidPengujian()
  {
    $this->db->select("a.*,b.*,c.*,d.namadetail,e.namajenis");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan"); 
    $this->db->join('jenis_komoditas_detil as d',"b.idjenisdetail=d.idjenisdetail"); 
    $this->db->join('jenis_komoditas as e',"b.idjenis=e.idjenis"); 
    $this->db->where("b.samplelab",1); 
    $where = '(b.validlab = 0 or b.validManTek = 2)';
    $this->db->where($where); 
    $this->db->order_by('b.kode_pendaftaran','desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataUjiMutuLHUDetail()
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
    $this->db->where('b.validManTek',"1"); 
     
    $this->db->order_by('b.kode_pendaftaran','desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  function getDataUjiMutuLHUDetailByID($id){
    
    $this->db->select("a.*,b.*,c.*,d.namadetail,e.namajenis,f.nama_kemasan");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan_ujimutu as b',"a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c',"b.kode_layanan=c.kode_layanan");  
    $this->db->join('jenis_komoditas_detil as d',"b.idjenisdetail=d.idjenisdetail"); 
    $this->db->join('jenis_komoditas as e',"b.idjenis=e.idjenis"); 
    $this->db->join('master_kemasan as f',"b.id_kemasan=f.id_kemasan"); 
    $this->db->where('b.samplelab',"1"); 
    $this->db->where('b.validlab',"1"); 
    $this->db->where('b.validManTek',"1"); 
    $this->db->where('b.uid',$id);
      
    $query = $this->db->get();
    return $query->result_array();
  }
}
?>