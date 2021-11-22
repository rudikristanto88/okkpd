<?php
class Model_user extends MY_Model
{

  public function cek_username($username, $role = null)
  {
    $this->db->select("count(*) jumlah");
    $this->db->from('user');
    $this->db->where('username', $username);
    if ($role != null) {
      $this->db->where('kode_role', $role);
    }
    $query = $this->db->get();
    $data = $query->result_array();
    foreach ($data as $data);
    return $data['jumlah'];
  }

  public function getAllData($table, $order_by = null, $mode = null)
  {
    $this->db->select("*");
    $this->db->from($table);
    if ($order_by != null && $mode == null) {
      $this->db->order_by($order_by, 'asc');
    } else if ($order_by != null && $mode != null) {
      $this->db->order_by($order_by, $mode);
    }
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataWhere($table, $where, $value)
  {
    $this->db->select("*");
    $this->db->from($table);
    $this->db->where($where, $value);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getProfile($id_profile)
  {
    $this->db->select("*");
    $this->db->from('user u');
    $this->db->join('master_role as c', "u.kode_role=c.kode_role");
    $this->db->where('id_user', $id_profile);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getProfileByLayanan($id_layanan)
  {
    $this->db->select("c.*");
    $this->db->from('layanan a');
    $this->db->join('identitas_usaha as b', "a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('user as c', "b.id_user=c.id_user");
    $this->db->where('a.uid', $id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getMenu($role)
  {
    $this->db->select("*,IF((select count(parent) from menu where parent = a.id_menu)>0,'yes','no') as has_child");
    $this->db->from('menu as a');
    $this->db->where("kode_role", $role);
    $this->db->where("aktif", "1");
    $this->db->order_by("urutan", "asc");
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataKota()
  {
    $this->db->select("*");
    $this->db->from('kota');
    $this->db->where("kode_provinsi", '33');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataUsaha($id_user)
  {
    $this->db->select("*");
    $this->db->from('identitas_usaha');
    $this->db->where("id_user", $id_user);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataBySQL($sSQL)
  {
    $query = $this->db->query($sSQL);
    return $query->row();
  }

  public function getDataInspeksi()
  {
    $this->db->select("a.nama_usaha,c.kode_layanan,b.uid,b.kode_pendaftaran,b.surat_tugas, c.nama_layanan,a.kota,`nama_inspektor` as inspektor, `nama_pelaksana` as `pelaksana`, `nama_ppc` as `ppc` ");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan as b', "a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c', "b.kode_layanan=c.kode_layanan");
    $this->db->join('user as inspektor', "b.inspektor=inspektor.id_user", "left");
    $this->db->join('user as pelaksana', "b.pelaksana=pelaksana.id_user", "left");
    $this->db->join('user as ppc', "b.ppc=ppc.id_user", "left");
    $this->db->where('manager_tek', null);
    $where = " b.alasan_penolakan is null";
    $where2 = " b.manager_adm is not null";
    $this->db->where($where);
    $this->db->where($where2);
    $this->db->order_by("manager_adm", 'desc');

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getCountDataForm($layanan, $jenis)
  {
    $ret = "";
    if ($jenis == 'inspeksi') {
      $ret = "form_inspeksi";
      $this->db->select("form_inspeksi");
    } else {
      $ret = "form_ppc";
      $this->db->select("form_ppc");
    }
    $this->db->from('master_layanan');
    $this->db->where('kode_layanan', $layanan);
    $query = $this->db->get();
    foreach ($query->result_array() as $data);
    return $data[$ret];
  }
  public function getDataUjiSampel()
  {
    $this->db->select("a.nama_usaha,b.kode_layanan,b.uid,b.status_hasil_uji,b.surat_tugas,b.laporan_hasil_uji, c.nama_layanan,a.kota,`nama_inspektor` as inspektor, `nama_pelaksana` as `pelaksana`, `nama_ppc` as `ppc` ");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan as b', "a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c', "b.kode_layanan=c.kode_layanan");
    $this->db->join('user as inspektor', "b.inspektor=inspektor.id_user", "left");
    $this->db->join('user as pelaksana', "b.pelaksana=pelaksana.id_user", "left");
    $this->db->join('user as ppc', "b.ppc=ppc.id_user", "left");
    $where = "surat_tugas is NOT NULL";
    $where2 = "ditolak_oleh is NULL";
    $this->db->where($where);
    $this->db->where('hasil_ppc', "1");
    $this->db->where('status_komtek', "1");
    $this->db->where('surat_pengantar_uji_sampel', "1");
    $this->db->where($where2);
    $this->db->order_by('manager_adm', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }



  public function getDataJenisInspeksi($role)
  {
    if ($role == 'ppc') {
      $this->db->select("a.nama_usaha,b.kode_pendaftaran,b.uid,b.surat_tugas,b.tanggal_inspeksi,b.tanggal_pc, c.nama_layanan,c.kode_layanan,sampling.id_sampling,sampling.deskripsi, sampling.status,a.kota,inspektor.nama_lengkap as inspektor, pelaksana.nama_lengkap as pelaksana,ppc.nama_lengkap as ppc,b.hasil_inspeksi, b.hasil_pelaksana,b.hasil_ppc");
    } else {
      $this->db->select("a.nama_usaha,b.kode_pendaftaran,b.uid,b.surat_tugas,b.tanggal_inspeksi,b.tanggal_pc, c.nama_layanan,c.kode_layanan,a.kota,inspektor.nama_lengkap as inspektor, pelaksana.nama_lengkap as pelaksana,ppc.nama_lengkap as ppc,b.hasil_inspeksi, b.hasil_pelaksana,b.hasil_ppc");
    }
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan as b', "a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c', "b.kode_layanan=c.kode_layanan");
    $this->db->join('user as inspektor', "b.inspektor=inspektor.id_user");
    $this->db->join('user as pelaksana', "b.pelaksana=pelaksana.id_user");
    $this->db->join('user as ppc', "b.ppc=ppc.id_user");
    if ($role == 'ppc') {
      $this->db->join('data_sampling_plan as sampling', "b.uid=sampling.id_layanan", 'left');
    }
    $where = "surat_tugas is NOT NULL";
    if ($role == "pelaksana") {
      $where2 = "ijin_pelaksana = '1'";
    } else if ($role == "inspektor") {
      $where2 = "ijin_inspektor = '1'";
    } else if ($role == "ppc") {
      $where2 = "ijin_ppc = '1'";
    }
    $this->db->where($where);
    $this->db->where($where2);
    $this->db->order_by('manager_adm', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataRekomendasi()
  {
    $this->db->select("a.nama_usaha,b.kode_layanan,b.laporan_hasil_uji,a.id_user,b.uid,b.surat_tugas,b.tanggal_inspeksi,b.tanggal_pc, c.nama_layanan,a.kota,inspektor.nama_lengkap as inspektor, pelaksana.nama_lengkap as pelaksana,ppc.nama_lengkap as ppc");
    $this->db->from('identitas_usaha as a');
    $this->db->join('layanan as b', "a.id_identitas_usaha=b.id_identitas_usaha");
    $this->db->join('master_layanan as c', "b.kode_layanan=c.kode_layanan");
    $this->db->join('user as inspektor', "b.inspektor=inspektor.id_user");
    $this->db->join('user as pelaksana', "b.pelaksana=pelaksana.id_user");
    $this->db->join('user as ppc', "b.ppc=ppc.id_user");
    $this->db->where("status_hasil_uji", "1");
    $this->db->where("ditolak_oleh is null", null, false);
    $this->db->order_by("w_hasil_mt", 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getForm($jenis, $kode_layanan)
  {
    $this->db->select("*");
    $this->db->from('master_form_uji');
    $this->db->where("jenis", $jenis);
    $this->db->where("kode_layanan", $kode_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getMasterForm($jenis, $kode_layanan)
  {
    $this->db->select("*");
    $this->db->from('master_dokumen_inspeksi');
    $this->db->where("jenis", $jenis);
    $this->db->where("kode_layanan", $kode_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDetailForm($jenis, $kode_layanan, $id_layanan)
  {
    $this->db->select("master_dokumen_inspeksi.*,COALESCE(detail_dokumen_inspeksi.id_dokumen,0,1) as isUploaded");
    $this->db->from('master_dokumen_inspeksi');
    $this->db->join('detail_dokumen_inspeksi', 'master_dokumen_inspeksi.id_dokumen = detail_dokumen_inspeksi.id_dokumen and detail_dokumen_inspeksi.id_layanan = ' . $id_layanan . '', 'LEFT');
    $this->db->where("jenis", $jenis);
    $this->db->where("kode_layanan", $kode_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function updateDetailForm($id_dokumen, $id_layanan, $data)
  {
    $this->db->where("id_dokumen", $id_dokumen);
    $this->db->where("id_layanan", $id_layanan);
    return $this->db->update("detail_dokumen_inspeksi", $data);
  }

  public function getJenisLayanan($uid)
  {
    $this->db->select("kode_layanan");
    $this->db->from('layanan');
    $this->db->where("uid", $uid);
    $query = $this->db->get();
    foreach ($query->result_array() as $data);
    return $data['kode_layanan'];
  }

  public function getDokumenInspeksi($id)
  {
    $this->db->select("*");
    $this->db->from('master_dokumen_inspeksi');
    $this->db->where("id_dokumen", $id);
    $query = $this->db->get();
    return $query->result_array();
  }


  public function getDataForm($id_layanan)
  {
    $this->db->select("*");
    $this->db->from('data_form_uji');
    $this->db->where("id_layanan", $id_layanan);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return 0;
    }
  }

  public function getNamaUsahaByLayanan($id_layanan)
  {
    $this->db->select("b.nama_usaha");
    $this->db->from('layanan a');
    $this->db->join('identitas_usaha b', 'a.id_identitas_usaha = b.id_identitas_usaha');
    $this->db->where("a.uid", $id_layanan);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $value);
      return $value['nama_usaha'];
    } else {
      return '';
    }
  }

  public function getDataUsahaByLayanan($id_layanan)
  {
    $this->db->select("b.*");
    $this->db->from('layanan a');
    $this->db->join('identitas_usaha b', 'a.id_identitas_usaha = b.id_identitas_usaha');
    $this->db->where("a.uid", $id_layanan);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return '';
    }
  }

  public function getGambarHasilInspeksi($id_layanan)
  {
    $this->db->select("master_nama_gambar.id_gambar as uid_gambar,master_nama_gambar.keterangan, data.*");
    $this->db->from('master_nama_gambar');
    $this->db->join('(select * from gambar_hasil_inspeksi where id_layanan = ' . $id_layanan . ') as data', "master_nama_gambar.id_gambar = data.id_gambar", "left");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getHasilInspeksi($uid)
  {
    $this->db->select("form_inspeksi");
    $this->db->from('layanan');
    $this->db->where('uid', $uid);
    $query = $this->db->get();
    foreach ($query->result_array() as $data);
    return $data['form_inspeksi'];
  }

  public function getDokumenHasilInspeksi($uid, $jenis)
  {
    $this->db->select("*,d.file file_hasil");
    $this->db->from('detail_dokumen_inspeksi d');
    $this->db->join('master_dokumen_inspeksi m', 'd.id_dokumen = m.id_dokumen');
    $this->db->where('id_layanan', $uid);
    $this->db->where('jenis', $jenis);
    $query = $this->db->get();

    return $query->result_array();
  }
  public function getDetailDokumenInspeksi($id)
  {
    $this->db->select("*");
    $this->db->from('detail_dokumen_inspeksi');
    $this->db->where("id_dokumen", $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getCountGambar($id_gambar, $id_layanan)
  {
    $this->db->select("*");
    $this->db->from('gambar_hasil_inspeksi');
    $this->db->where('id_gambar', $id_gambar);
    $this->db->where('id_layanan', $id_layanan);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function updateGambar($id_gambar, $id_layanan, $table, $data)
  {
    $this->db->where("id_gambar", $id_gambar);
    $this->db->where("id_layanan", $id_layanan);
    return $this->db->update($table, $data);
  }

  
  public function updateLayananmutuDetail($table, $id_layanan, $data)
  {
    $this->db->where("idlayanan_ujimutu", $id_layanan);
    $this->db->where("valid", 0);
    return $this->db->update($table, $data);
  }


  public function statusInspektor($id_layanan)
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->where('uid', $id_layanan);
    $this->db->where('ijin_inspektor', "1");
    $this->db->where('ijin_pelaksana', "1");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function getPenugasanInspeksi()
  {
    $this->db->select("*");
    $this->db->from('identitas_usaha');
    $this->db->join('layanan', "identitas_usaha.id_identitas_usaha=layanan.id_identitas_usaha");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $where = "surat_tugas is NOT NULL";
    $where3 = "manager_tek is NOT NULL";
    $where2 = "status_ppc = '0'";
    $this->db->where($where);
    $this->db->where($where3);
    $this->db->order_by('manager_adm', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getPenugasanPPC()
  {
    $this->db->select("identitas_usaha.*,layanan.*,master_layanan.*,sampling.id_sampling, sampling.id_layanan,sampling.deskripsi,sampling.status as status_sampling");
    $this->db->from('identitas_usaha');
    $this->db->join('layanan', "identitas_usaha.id_identitas_usaha=layanan.id_identitas_usaha");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $this->db->join('data_sampling_plan sampling', "layanan.uid=sampling.id_layanan", 'left');
    $where = "surat_tugas is NOT NULL";
    $where2 = "status_ppc = '1'";
    $where3 = "status_komtek = '0'";
    $this->db->where($where);
    $this->db->where($where2);
    $this->db->order_by('manager_adm', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }




  public function getDataLayanan($value)
  {
    if ($value != null) {
      $query = $this->db->query("SELECT *,layanan.status status_layanan from layanan join master_layanan on layanan.kode_layanan = master_layanan.kode_layanan where layanan.id_identitas_usaha = " . $value . " and layanan.status_hasil_uji <> 2 order by layanan.tanggal_buat desc");
      return $query->result_array();
    } else {
      return null;
    }
  }

  public function getDataSertifikat($value)
  {
    if ($value != null) {
      $this->db->select("*");
      $this->db->from('view_data_layanan');
      $this->db->where('id_identitas_usaha', $value);
      $query = $this->db->get();
      return $query->result_array();
    } else {
      return null;
    }
  }

  public function getAllUser($id_user)
  {
    $this->db->select("*");
    $this->db->from('user');
    $this->db->join('master_role', 'user.kode_role=master_role.kode_role');
    $where = "user.id_user <> $id_user";
    $where2 = "user.kode_role <> 'pelaku'";
    $where3 = "user.kode_role <> 'admin'";
    $this->db->where($where);
    $this->db->where($where2);
    $this->db->where($where3);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getMasterRole()
  {
    $this->db->select("*");
    $this->db->from('master_role');
    $where = "master_role.kode_role <> 'admin'";
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getFotoProfil($id_user)
  {
    $this->db->select("foto_profil");
    $this->db->from('user');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get();
    foreach ($query->result_array() as $value);
    return $value['foto_profil'];
  }


  public function getDetailSyaratTeknis($layanan)
  {
    $this->db->select("*");
    $this->db->from('detail_syarat_teknis');
    $this->db->join('master_syarat_teknis', 'detail_syarat_teknis.kode_syarat_teknis=master_syarat_teknis.kode');
    $this->db->where("id_layanan", $layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDetailDokumen($layanan)
  {
    $this->db->select("*");
    $this->db->from('detail_dokumen');
    $this->db->join('master_dokumen', 'detail_dokumen.kode_dokumen=master_dokumen.kode_dokumen');
    $this->db->where("kode_layanan", $layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDokumen($id_layanan)
  {
    $this->db->select("file,mime_type,nama_dokumen");
    $this->db->from('dokumen_layanan');
    $this->db->where("id_layanan", $id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDokumenById($id_dokumen)
  {
    $this->db->select("*");
    $this->db->from('dokumen_layanan');
    $this->db->where("id_dokumen", $id_dokumen);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDokumenLevel($level)
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('user', "identitas_usaha.id_user=user.id_user");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $this->db->where("layanan.status", "0");
    $this->db->where("layanan.manager_adm", null);
    $this->db->where("layanan.level", $level);
    $this->db->where("ditolak_oleh", null);
    $where = "syarat_teknis is not null";
    $this->db->where($where);
    $this->db->order_by("layanan.tanggal_buat", "desc");

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDokumenDitolak($level)
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('user', "identitas_usaha.id_user=user.id_user");
    $this->db->where("level", $level);
    $this->db->where("layanan.status", "1");
    $this->db->order_by("layanan.tanggal_buat", "desc");

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDokumenTolakSaya($id_user)
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('user', "identitas_usaha.id_user=user.id_user");
    $this->db->where("user.id_user", $id_user);
    $where = "layanan.alasan_penolakan is not null";
    $this->db->where($where);
    $this->db->order_by("layanan.tanggal_buat", "desc");

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDokumenDitolakOleh($id_user)
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('user', "identitas_usaha.id_user=user.id_user");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $this->db->where("layanan.ditolak_oleh", $id_user);
    $this->db->order_by("layanan.tanggal_ditolak", "desc");

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getTerimaDokumenMA()
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('user', "identitas_usaha.id_user=user.id_user");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $where = "manager_adm is not null";
    $where2 = "ditolak_oleh is null";
    $this->db->where($where);
    $this->db->where($where2);
    $this->db->order_by("manager_adm", "desc");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getLayananDiterima($role, $id_user = null)
  {
    if ($role == 'm_adm') {
      $this->db->select("*,'' as data_keterangan,manager_adm as tanggal_diterima");
    } else if ($role == 'm_teknis') {
      $this->db->select("*,'' as data_keterangan,w_hasil_mt as tanggal_diterima ");
    } else if ($role == 'inspektor') {
      $this->db->select("*,'' as data_keterangan,w_inspeksi as tanggal_diterima");
    } else if ($role == 'ppc') {
      $this->db->select("*,'' as data_keterangan,w_ppc as tanggal_diterima");
    } else if ($role == 'pelaksana') {
      $this->db->select("*,'' as data_keterangan,w_inspeksi as tanggal_diterima");
    } else if ($role == 'komtek') {
      $this->db->select("*,berita_acara as data_keterangan,w_komtek as tanggal_diterima");
    }

    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('user', "identitas_usaha.id_user=user.id_user");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $where = "";

    if ($role == 'm_adm') {
      $where = "manager_adm is not null";
    } else if ($role == 'm_teknis') {
      $where = "manager_tek is not null";
    } else if ($role == 'inspektor') {
      $where = "inspektor = " . $id_user;
      $wh = 'w_inspeksi is not null';
      $this->db->where($wh);
    } else if ($role == 'ppc') {
      $where = "ppc = " . $id_user;
      $wh = 'w_ppc is not null';
      $this->db->where($wh);
    } else if ($role == 'pelaksana') {
      $where = "pelaksana = " . $id_user;
      $wh = 'hasil_pelaksana = 1';
      $this->db->where($wh);
    } else if ($role == 'komtek') {
      $where = "status_hasil_uji = 2";
    }

    $where2 = "ditolak_oleh is null";

    $this->db->where($where);
    $this->db->where($where2);
    $this->db->order_by("manager_adm", "desc");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDokumenDiterima($jenis_layanan, $menu = null, $kategori = null, $cari = null)
  {
    $where = "";
    if ($jenis_layanan == 'prima_3' || $jenis_layanan == 'prima_2' || $jenis_layanan == 'kemas') {
      $this->db->select('*,detail_komoditas.sertifikat as sertifikat_produk, detail_komoditas.mime_type as tipe_sertifikat_produk ');
    } else if ($jenis_layanan == "psat") {
      $this->db->select('*,detail_identitas_produk.sertifikat as sertifikat_produk, detail_identitas_produk.mime_type as tipe_sertifikat_produk ');
    } else if ($jenis_layanan == "hc") {
      $this->db->select('*,detail_identitas_ekspor.sertifikat as sertifikat_produk, detail_identitas_ekspor.mime_type as tipe_sertifikat_produk ');
    }
    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    if ($jenis_layanan == 'prima_3' || $jenis_layanan == 'prima_2' || $jenis_layanan == 'kemas') {
      if ($menu == 'daftar') {
        $where = "detail_komoditas.sertifikat is not null";
      } else if ($menu == 'cetak') {
        $where = "detail_komoditas.sertifikat is null";
      }
      $this->db->join('detail_komoditas', "detail_komoditas.id_layanan=layanan.uid");
    } else if ($jenis_layanan == "psat") {
      if ($menu == 'daftar') {
        $where = "detail_identitas_produk.sertifikat is not null";
      } else if ($menu == 'cetak') {
        $where = "detail_identitas_produk.sertifikat is null";
      }
      $this->db->join('detail_identitas_produk', "detail_identitas_produk.id_layanan=layanan.uid");
    } else if ($jenis_layanan == "hc") {
      if ($menu == 'daftar') {
        $where = "detail_identitas_ekspor.sertifikat is not null";
      } else if ($menu == 'cetak') {
        $where = "detail_identitas_ekspor.sertifikat is null";
      }
      $this->db->join('detail_identitas_ekspor', "detail_identitas_ekspor.id_layanan=layanan.uid");
    }

    $where2 = "";
    if ($kategori != null) {
      if ($kategori == "noreg") {
        $where2 = " layanan.kode_pendaftaran like '%" . $cari . "%' ";
      } else if ($kategori == "nosertifikat") {
        $where2 = " identitas_usaha.nama_usaha like '%" . $cari . "%' ";
      } else if ($kategori == "merk") {
        $where2 = " layanan like '%" . $cari . "%' ";
      } else if ($kategori == "usaha") {
        $where2 = " identitas_usaha.nama_usaha like '%" . $cari . "%' ";
      } else if ($kategori == "pemohon") {
        $where2 = " identitas_usaha.nama_pemohon like '%" . $cari . "%' ";
      }

      $this->db->where($where2);
    }

    $this->db->where("status_hasil_uji", "2");
    $this->db->where("layanan.kode_layanan", $jenis_layanan);
    $this->db->where($where);

    $this->db->order_by('w_komtek', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getCountSertifikat()
  {
    $query = $this->db->query("SELECT count(1) jumlah, a.kode_layanan FROM `layanan` a join detail_komoditas b on a.uid = b.id_layanan where b.sertifikat is not null and b.nomor_sertifikat is not null group by kode_layanan union
    SELECT count(1), a.kode_layanan FROM `layanan` a join detail_identitas_produk b on a.uid = b.id_layanan where b.sertifikat is not null and b.nomor_sertifikat is not null group by kode_layanan union
    SELECT count(1), a.kode_layanan FROM `layanan` a join detail_identitas_ekspor b on a.uid = b.id_layanan where b.sertifikat is not null and b.nomor_sertifikat is not null group by kode_layanan");
    return $query->result_array();
  }

  public function getSertifikatCetak()
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha=identitas_usaha.id_identitas_usaha");
    $this->db->join('user', "identitas_usaha.id_user=user.id_user");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $this->db->join('detail_komoditas', "detail_komoditas.id_layanan=layanan.uid");
    $this->db->where("status_hasil_uji", "2");
    $where = "detail_komoditas.sertifikat is null";
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getJumlahSertifikat($jenis)
  {
    $where = "";
    if ($jenis == 'all') {
      $where = '';
    } else {
      $where = "where kode_layanan = '" . $jenis . "'";
    }
    $query = $this->db->query("SELECT nama_layanan,kode_layanan,
                case when kode_layanan = 'hc' then (select count(*) from detail_identitas_ekspor where tanggal_unggah is not null)
                when kode_layanan = 'kemas' then (select count(*) from detail_identitas_produk where tanggal_unggah is not null)
                else (select count(*) from detail_komoditas a join layanan b on a.id_layanan = b.uid where a.tanggal_unggah is not null and b.kode_layanan = master_layanan.kode_layanan)  end jumlah
                FROM `master_layanan` " . $where);
    return $query->result_array();
  }

  public function getTotalSertifikat()
  {
    $data = $this->getJumlahSertifikat("all");
    $jumlah = 0;
    foreach ($data as $data) {
      $jumlah += $data['jumlah'];
    }
    return $jumlah;
  }

  public function getKomoditas()
  {
    $this->db->select("*");
    $this->db->from('master_komoditas');
    $this->db->order_by('deskripsi', "asc");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getJenisKomoditas()
  {
    $this->db->select("*");
    $this->db->from('jenis_komoditas');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getSertifikatkomoditas($id_layanan, $cetak = null)
  {
    $this->db->select("*");
    $this->db->from('detail_komoditas a');
    $this->db->where('id_layanan', $id_layanan);
    $query = $this->db->get();
    $data =  $query->result_array();
    if ($cetak == null) {
      $hasil = true;
      foreach ($data as $data) {
        if ($data['sertifikat'] == null) {
          $hasil = false;
        }
      }
      if ($hasil) {
        return null;
      } else {
        return $query->result_array();
      }
    } else {
      $hasil = false;
      foreach ($data as $data) {
        if ($data['sertifikat'] != null) {
          $hasil = true;
        }
      }
      if ($hasil) {

        return $query->result_array();
      } else {
        return null;
      }
    }
  }

  public function getsertifikatsaya($id_user)
  {
  }



  public function getDaftarKomoditas($id)
  {
    $this->db->select("*");
    $this->db->from('detail_komoditas s');
    $this->db->where('s.id_layanan', $id);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getProdukPsat($id)
  {
    $this->db->select("*, concat(detail_identitas_produk.nama_produk_pangan,'/') as nama_produk,concat(concat(detail_identitas_produk.nama_kemasan,'/'),concat(detail_identitas_produk.netto,concat(' ',detail_identitas_produk.satuan))) as nilai ");
    $this->db->from('detail_identitas_produk');
    // $this->db->join('master_satuan','detail_identitas_produk.id_satuan=master_satuan.id_satuan');
    // $this->db->join('master_kemasan','detail_identitas_produk.id_kemasan=master_kemasan.id_kemasan');
    $this->db->where('detail_identitas_produk.id_layanan', $id);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getProdukHC($id)
  {
    $this->db->select("ex.*, concat(' / ',ex.nomor_hs) as nilai");
    $this->db->from('detail_identitas_ekspor ex');
    $this->db->where('ex.id_layanan', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  // public function getProdukHC($id){
  //   $this->db->select("ex.*,");
  //   $this->db->from('detail_identitas_ekspor ex');
  //   $this->db->join('layanan l','ex.id_layanan = l.uid');
  //   $this->db->join('identitas_usaha iden','l.id_identitas_usaha = iden.id_identitas_usaha');
  //   $this->db->where('ex.id_layanan',$id);
  //   $query = $this->db->get();
  //   return $query->result_array();
  // }

  public function verificationUser($data)
  {
    $dat = array('status' => 1);
    $this->db->where("concat(sha1(username),sha1('Aktivasi Pendaftaran')) = '" . $data . "'");
    return $this->db->update('user', $dat);
  }

  public function getIdUsaha($id_user)
  {
    $this->db->select("*");
    $this->db->from('identitas_usaha');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get();
    $dat = $query->result_array();
    if ($query->num_rows() > 0) {
      foreach ($dat as $data);
      return $data['id_identitas_usaha'];
    } else {
      return null;
    }
  }
  public function getLastId($tabel, $idtabel)
  {
    $this->db->select("*");
    $this->db->from($tabel);
    $this->db->order_by($idtabel, "desc");
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result_array();
    foreach ($result as $result);
    return $result[$idtabel];
  }

  public function getMessage($limit = null, $id_saya)
  {
    $this->db->select("*");
    $this->db->from('notification');
    $this->db->where('kepada', $id_saya);
    $this->db->order_by('tanggal', "desc");
    $this->db->limit($limit);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
  public function getUnreadMessage($id_saya)
  {
    $this->db->select("*");
    $this->db->from('notification');
    $this->db->where('kepada', $id_saya);
    $this->db->where('isread', "0");
    $query = $this->db->get();
    $result = $query->result_array();
    return count($result);
  }

  public function validasi($username, $password, $role = null)
  {
    $this->db->select("user.id_user,user.status,user.kode_role,nama_role,nama_lengkap,username,COALESCE(identitas_usaha.id_identitas_usaha,0,1) as punya_usaha");
    $this->db->from('user');
    $this->db->join('identitas_usaha', 'user.id_user = identitas_usaha.id_user', 'left');
    $this->db->join('master_role', 'user.kode_role = master_role.kode_role');
    $this->db->where("username", $username);
    $this->db->where("password", sha1("Okkpd2018!" . $password));
    if ($role != 'pelaku') {
      $where = "user.kode_role = '" . $role . "'";
      $this->db->where($where);
    } else {
      $where = "user.kode_role like '%pelaku%'";
      $this->db->where($where);
      //$this->db->where("status","1");
    }
    $query = $this->db->get();
    $dat = $query->result_array();

    foreach ($dat as $dat);

    if (sizeof($dat) > 0) {
      if ($dat['status'] == 1) {
        $this->session->set_userdata("dataLogin", $dat);
        return 1;
      } else {
        return 2;
      }
    } else {
      return 0;
    }
  }

  public function getberitahome()
  {
    $this->db->select("*");
    $this->db->from('berita');
    $this->db->order_by('tanggal_buat', 'desc');
    $this->db->limit('6');
    $query = $this->db->get();
    return $query->result_array();
  }




  public function getKelompok($kode_sektor)
  {
    $this->db->select("*");
    $this->db->from('komoditas_sektor s ');
    $this->db->join('komoditas_kelompok k', 's.id_sektor = k.id_sektor');
    $this->db->where('s.id_sektor', $kode_sektor);
    $query = $this->db->get();
    return $query->result_array();
  }
  // public function getMasterKomoditas($kode_kelompok,$id_sektor){
  //   $this->db->select("*");
  //   $this->db->from('master_komoditas m ');
  //   $this->db->join('komoditas_sektor s','m.id_sektor = s.id_sektor');
  //   $this->db->join('komoditas_kelompok k','m.id_kelompok = k.id_kelompok');
  //
  //   $this->db->where('k.id_kelompok',$kode_kelompok);
  //   $this->db->where('s.id_sektor',$id_sektor);
  //   $query = $this->db->get();
  //   return $query->result_array();
  // }
  public function getMasterKomoditas($kode_kelompok, $id_sektor)
  {
    if ($kode_kelompok != null) {
      $query = $this->db->query(
        "SELECT * FROM `master_komoditas` as m join komoditas_sektor s on m.id_sektor = s.id_sektor join komoditas_kelompok k on m.id_kelompok = k.id_kelompok and k.id_sektor = s.id_sektor where m.id_kelompok = '" . $kode_kelompok . "' and m.id_sektor = '" . $id_sektor . "'"
      );
      return $query->result_array();
    } else {
      return null;
    }
  }

  public function getDataPanduan()
  {
    $this->db->select("*");
    $this->db->from('panduan');
    $this->db->order_by('id', "desc");
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getKodePendaftaran($id_layanan)
  {
    $this->db->select("*");
    $this->db->from('layanan');
    $this->db->where('uid', $id_layanan);
    $query = $this->db->get();
    foreach ($query->result_array() as $data);
    return $data['kode_pendaftaran'];
  }

  public function getEmail($id_user)
  {
    $this->db->select("username");
    $this->db->from('user');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get();

    foreach ($query->result_array() as $data);
    return $data['username'];
  }

  public function resetPassword($password, $verify)
  {
    $data = array("password" => sha1("Okkpd2018!" . $password));
    $where = "concat(sha1(username),sha1('Atur Ulang Sandi')) = '" . $verify . "'";
    $this->db->where($where);
    return $this->db->update('user', $data);
  }

  public function cekIdentitasUsaha($data)
  {
    $this->db->select("nama_usaha");
    $this->db->from('identitas_usaha');
    $this->db->where('nama_usaha', $data['nama_usaha']);
    $this->db->where('alamat_usaha', $data['alamat']);
    $this->db->where('kota', $data['kota']);
    $query = $this->db->get();
    $result = $query->result_array();
    return count($result);
  }
}
