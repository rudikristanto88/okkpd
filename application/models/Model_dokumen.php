<?php
class Model_dokumen extends MY_Model
{

  public function getSyaratTeknis($id_layanan)
  {
    $this->db->select("syarat_teknis");
    $this->db->from('layanan');
    $this->db->where("uid", $id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getSuratTugas($id_layanan)
  {
    $this->db->select("surat_tugas,tipe_surat_tugas");
    $this->db->from('layanan');
    $this->db->where("uid", $id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataDokumen($id_layanan)
  {
    $this->db->select("*");
    $this->db->from('dokumen_layanan');
    $this->db->like("nama_dokumen", 'Dokumen Jenis Komoditas dan Peta Lahan');
    $this->db->where("id_layanan", $id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getberkas($id)
  {
    $this->db->select("nama_pemohon,jenis_usaha,kode_pendaftaran,nama_usaha,alamat_usaha,no_telp,no_hp_pemohon,jabatan_pemohon,m.nama_layanan,'Diproses' as status, tanggal_buat,nama_pemohon");
    $this->db->from('layanan l');
    $this->db->join('identitas_usaha i', 'l.id_identitas_usaha = i.id_identitas_usaha');
    $this->db->join('master_layanan m', 'l.kode_layanan = m.kode_layanan');
    $this->db->where("sha1(kode_pendaftaran)", $id);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getStatusLayanan($kode_pendaftaran, $jenis_layanan = "okkpd")
  {
    if($jenis_layanan == "okkpd"){
      $this->db->select("manager_adm,w_inspeksi,w_ppc,w_hasil_mt,w_komtek,w_diterima,tanggal_ditolak");
      $this->db->from('layanan');
    }else{
      $this->db->select("kode_pendaftaran,tanggal_buat,sampleLab,tanggalSampleLab,validLab,tanggalValidLab,validManTek,tanggalManTek, tglcetak");
      $this->db->from('layanan_ujimutu');
    }
    
    $this->db->where("kode_pendaftaran", $kode_pendaftaran);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataSertifikat($jenis)
  {
    if ($jenis == "prima_2" || $jenis == "prima_3") {
      return $this->fetchSertifikat("detail_komoditas", "nama_jenis_komoditas, concat(luas_lahan,' Ha') as keterangan, kelurahan, nama_jenis_komoditas");
    } else if ($jenis == "kemas") {
      return $this->fetchSertifikat("detail_identitas_kemas", "alamat_pengemasan, kota_pengemasan,nama_personel, no_hp_pemohon, email,komoditas, komoditas_latin");
    } else if ($jenis == "psat") {
      return $this->fetchSertifikat("detail_identitas_produk", "kota,komoditas, nama_produk_pangan, nama_dagang, kelas_mutu, concat(netto,' ', satuan) ukuran");
    } else if ($jenis == "sppb") {
      return $this->fetchSertifikat("detail_identitas_sppb", "nama_unit,a.alamat as alamat_unit, a.kota as kota_unit, status_kepemilikan, level_sppb, ruang_lingkup");
    }
  }

  private function fetchSertifikat($table, $column = "a.*", $where = '')
  {
    $default = "
    a.nomor_sertifikat, 
    a.tanggal_unggah as tanggal_cetak,
    case when a.tanggal_kadaluarsa is null then DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) else tanggal_kadaluarsa end as tanggal_kadaluarsa,
    case when a.status <> 'Dibekukan' then case when sysdate() <= DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) then 'AKTIF' else 'KADALUARSA' end else a.status end status_aktif,
    b.kode_layanan,
    c.nama_usaha,
    c.nama_pemohon,
    c.alamat_usaha,
    c.kota,
    ";

    $sql = "SELECT " . $default . $column . " FROM " . $table . " as a 
    join layanan b on a.id_layanan = b.uid
    join identitas_usaha c on b.id_identitas_usaha = c.id_identitas_usaha";
    return $this->db->query($sql)->result_array();
  }

  public function getStatusSertifikat($kode_pendaftaran)
  {
    $query = $this->db->query("SELECT a.nomor_sertifikat, c.nama_usaha,a.nama_jenis_komoditas as nama_produk, concat(a.luas_lahan,' Ha') as keterangan,'' as merk,a.tanggal_unggah as tanggal_cetak,
                DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) tanggal_akhir,
                case when sysdate() <= DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) then 'AKTIF' else 'KADALUARSA' end status_aktif
                FROM `detail_komoditas` a
                join layanan b on a.id_layanan = b.uid
                join identitas_usaha c on b.id_identitas_usaha = c.id_identitas_usaha
                where a.nomor_sertifikat = '" . $kode_pendaftaran . "'
                union all
                SELECT a.nomor_sertifikat, c.nama_usaha,a.nama_produk_pangan as nama_produk, '' as keterangan,a.nama_dagang as merk,a.tanggal_unggah as tanggal_cetak,
                DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) tanggal_akhir,
                case when sysdate() <= DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) then 'AKTIF' else 'KADALUARSA' end status_aktif
                FROM `detail_identitas_produk` a
                join layanan b on a.id_layanan = b.uid
                join identitas_usaha c on b.id_identitas_usaha = c.id_identitas_usaha
                where a.nomor_sertifikat = '" . $kode_pendaftaran . "'
                union all
                SELECT a.nomor_sertifikat, c.nama_usaha,a.nama_produk as nama_produk, a.jenis_produk as keterangan,'' as merk,a.tanggal_unggah as tanggal_cetak,
                DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) tanggal_akhir,
                case when sysdate() <= DATE_ADD(a.tanggal_unggah, INTERVAL 3 YEAR) then 'AKTIF' else 'KADALUARSA' end status_aktif
                FROM `detail_identitas_ekspor` a
                join layanan b on a.id_layanan = b.uid
                join identitas_usaha c on b.id_identitas_usaha = c.id_identitas_usaha
                where a.nomor_sertifikat = '" . $kode_pendaftaran . "'");
    return $query->result_array();
  }
}
