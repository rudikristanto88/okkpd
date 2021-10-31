<?php
class Model_dokumen extends CI_Model {
  public function insertData($table,$data)
  {
    return $this->db->insert($table, $data);
  }
  public function replaceData($table,$data)
  {
    return $this->db->replace($table, $data);
  }
  public function getSyaratTeknis($id_layanan){
    $this->db->select("syarat_teknis");
    $this->db->from('layanan');
    $this->db->where("uid",$id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getSuratTugas($id_layanan){
    $this->db->select("surat_tugas,tipe_surat_tugas");
    $this->db->from('layanan');
    $this->db->where("uid",$id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataDokumen($id_layanan){
    $this->db->select("*");
    $this->db->from('dokumen_layanan');
    $this->db->like("nama_dokumen",'Dokumen Jenis Komoditas dan Peta Lahan');
    $this->db->where("id_layanan",$id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getberkas($id){
    $this->db->select("nama_pemohon,jenis_usaha,kode_pendaftaran,nama_usaha,alamat_usaha,no_telp,no_hp_pemohon,jabatan_pemohon,m.nama_layanan,'Diproses' as status, tanggal_buat,nama_pemohon");
    $this->db->from('layanan l');
    $this->db->join('identitas_usaha i','l.id_identitas_usaha = i.id_identitas_usaha');
    $this->db->join('master_layanan m','l.kode_layanan = m.kode_layanan');
    $this->db->where("sha1(kode_pendaftaran)",$id);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getStatusLayanan($kode_pendaftaran){
    $this->db->select("manager_adm,w_inspeksi,w_ppc,w_hasil_mt,w_komtek,w_diterima,tanggal_ditolak");
    $this->db->from('layanan');
    $this->db->where("kode_pendaftaran",$kode_pendaftaran);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getStatusSertifikat($kode_pendaftaran){
    $query = $this->db->query("SELECT a.nomor_sertifikat, c.nama_usaha,a.nama_jenis_komoditas as nama_produk, concat(a.luas_lahan,' Ha') as keterangan,'' as merk,a.tanggal_unggah as tanggal_cetak,
                DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) tanggal_akhir,
                case when sysdate() <= DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) then 'AKTIF' else 'KADALUARSA' end status_aktif
                FROM `detail_komoditas` a
                join layanan b on a.id_layanan = b.uid
                join identitas_usaha c on b.id_identitas_usaha = c.id_identitas_usaha
                where a.nomor_sertifikat = '".$kode_pendaftaran."'
                union all
                SELECT a.nomor_sertifikat, c.nama_usaha,a.nama_produk_pangan as nama_produk, '' as keterangan,a.nama_dagang as merk,a.tanggal_unggah as tanggal_cetak,
                DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) tanggal_akhir,
                case when sysdate() <= DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) then 'AKTIF' else 'KADALUARSA' end status_aktif
                FROM `detail_identitas_produk` a
                join layanan b on a.id_layanan = b.uid
                join identitas_usaha c on b.id_identitas_usaha = c.id_identitas_usaha
                where a.nomor_sertifikat = '".$kode_pendaftaran."'
                union all
                SELECT a.nomor_sertifikat, c.nama_usaha,a.nama_produk as nama_produk, a.jenis_produk as keterangan,'' as merk,a.tanggal_unggah as tanggal_cetak,
                DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) tanggal_akhir,
                case when sysdate() <= DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) then 'AKTIF' else 'KADALUARSA' end status_aktif
                FROM `detail_identitas_ekspor` a
                join layanan b on a.id_layanan = b.uid
                join identitas_usaha c on b.id_identitas_usaha = c.id_identitas_usaha
                where a.nomor_sertifikat = '".$kode_pendaftaran."'");
    return $query->result_array();
  }
}
