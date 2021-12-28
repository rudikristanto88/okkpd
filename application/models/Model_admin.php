<?php
class Model_admin extends MY_Model
{

  public function getMenu($role)
  {
    $this->db->select("*");
    $this->db->from('menu');
    $this->db->where("kode_role", $role);
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
  public function getDataInspeksi()
  {
    $this->db->select("*");
    $this->db->from('identitas_usaha');
    $this->db->join('layanan', "identitas_usaha.id_identitas_usaha=layanan.id_identitas_usaha");
    $this->db->join('master_layanan', "layanan.kode_layanan=master_layanan.kode_layanan");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataIdentitas($kode_layanan, $id_layanan)
  {
    $this->db->select("c.nama_layanan,b.*");
    $this->db->from('layanan a');
    $this->db->join('identitas_usaha b', "a.`id_identitas_usaha`= b.`id_identitas_usaha`");
    $this->db->join('master_layanan c', "a.kode_layanan = c.kode_layanan");
    $this->db->where('a.kode_layanan', $kode_layanan);
    $this->db->where('a.uid', $id_layanan);

    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataDetailKomoditas($id_layanan)
  {
    $this->db->select("a.nama_jenis_komoditas,a.nama_jenis_komoditas as nama_produk, a.luas_lahan, concat(a.luas_lahan,' Ha') as nilai");
    $this->db->from('detail_komoditas a');
    // $this->db->join('master_komoditas b',"a.id_komoditas = b.kode_komoditas");
    $this->db->where('a.id_layanan', $id_layanan);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataLayanan($value)
  {
    $query = $this->db->query("SELECT *, (Select count(*) from dokumen_layanan where id_layanan = layanan.uid) - (Select count(*) from detail_dokumen where kode_layanan = layanan.kode_layanan) as kekurangan from layanan join master_layanan on layanan.kode_layanan = master_layanan.kode_layanan where layanan.id_identitas_usaha = " . $value . " ");
    return $query->result_array();
  }
  public function getAllUser($id_user)
  {
    $this->db->select("*");
    $this->db->from('user');
    $this->db->join('master_role', 'user.kode_role=master_role.kode_role');
    $where = "user.id_user <> $id_user";
    $where2 = "user.kode_role <> 'pelaku'";
    $this->db->where($where);
    $this->db->where($where2);
    $query = $this->db->get();
    return $query->result_array();
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
    $this->db->select("*");
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
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getKomoditas()
  {
    $this->db->select("*");
    $this->db->from('master_komoditas');
    $this->db->order_by('deskripsi', "asc");
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getIdUsaha($id_user)
  {
    $this->db->select("*");
    $this->db->from('identitas_usaha');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get();
    $dat = $query->result_array();
    foreach ($dat as $data);
    return $data['id_identitas_usaha'];
  }
  public function getLastId($tabel, $idtabel)
  {
    $this->db->select("*");
    $this->db->from($tabel);
    $this->db->order_by($idtabel, "asc");
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result_array();
    foreach ($result as $result);
    return $result[$idtabel];
  }

  public function validasi($username, $password, $isPengurus = null)
  {
    $this->db->select("user.id_user,user.kode_role,nama_role,nama_lengkap,username,COALESCE(identitas_usaha.id_identitas_usaha,0,1) as punya_usaha");
    $this->db->from('user');
    $this->db->join('identitas_usaha', 'user.id_user = identitas_usaha.id_user', 'left');
    $this->db->join('master_role', 'user.kode_role = master_role.kode_role');
    $this->db->where("username", $username);
    $this->db->where("password", sha1("Okkpd2018!" . $password));

    if ($isPengurus) {
      $where = "user.kode_role not like '%pelaku%'";
      $this->db->where($where);
    } else {
      $where = "user.kode_role like '%pelaku%'";
      $this->db->where($where);
      $this->db->where("status", "1");
    }
    $query = $this->db->get();
    $dat = $query->result_array();

    foreach ($dat as $dat);

    if (sizeof($dat) > 0) {
      $this->session->set_userdata("dataLogin", $dat);
      return true;
    } else {
      return false;
    }
  }

  /// function to fetch sertifikat of layanan Prima 3 and Prima 2 
  function getsertifikat($id = null, $unduh = false)
  {
    $this->db->select("layanan.kode_layanan,detail_komoditas.id_layanan,detail_komoditas.nomor_sertifikat,detail_komoditas.nama_latin,identitas_usaha.nama_usaha,identitas_usaha.alamat_usaha,identitas_usaha.kota, identitas_usaha.kecamatan, identitas_usaha.kelurahan, 
    master_komoditas.deskripsi,detail_komoditas.nama_jenis_komoditas nama_jenis, detail_komoditas.nama_jenis_komoditas, detail_komoditas.luas_lahan as luas_lahan_detail,detail_komoditas.tanggal_unggah,detail_komoditas.sertifikat as sertifikat_produk,detail_komoditas.mime_type as tipe_sertifikat_produk");
    $this->db->from('detail_komoditas');
    $this->db->join('layanan', "detail_komoditas.id_layanan = layanan.uid");
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha = identitas_usaha.id_identitas_usaha");
    $this->db->join('master_komoditas', "detail_komoditas.id_komoditas = master_komoditas.kode_komoditas", "left");
    if ($id != null) {
      $this->db->where("detail_komoditas.id_detail", $id);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  /// function to fetch sertifikat of layanan SPPB
  function getsertifikatSPPB($id = null, $unduh = false)
  {
    $this->db->select("*,detail_identitas_sppb.nomor_sertifikat,detail_identitas_sppb.sertifikat as sertifikat_produk, detail_identitas_sppb.mime_type as tipe_sertifikat_produk");
    $this->db->from('detail_identitas_sppb');
    $this->db->join('layanan', "detail_identitas_sppb.id_layanan = layanan.uid");
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha = identitas_usaha.id_identitas_usaha");
    if ($id != null) {
      $this->db->where("detail_identitas_sppb.id", $id);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  /// function to fetch sertifikat of layanan PSAT
  function getsertifikatPSAT($id = null, $unduh = false)
  {
    if ($unduh == true) {
      $this->db->select("*,detail_identitas_produk.nomor_sertifikat,detail_identitas_produk.sertifikat as sertifikat_produk, detail_identitas_produk.mime_type as tipe_sertifikat_produk");
    } else {
      $this->db->select("*");
    }
    $this->db->from('detail_identitas_produk');
    $this->db->join('layanan', "detail_identitas_produk.id_layanan = layanan.uid");
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha = identitas_usaha.id_identitas_usaha");
    if ($id != null) {
      $this->db->where("id", $id);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  /// function to fetch sertifikat of layanan Kemas
  function getsertifikatKemas($id = null, $unduh = false)
  {
    if ($unduh == true) {
      $this->db->select("*,detail_identitas_kemas.nomor_sertifikat,detail_identitas_kemas.sertifikat as sertifikat_produk, detail_identitas_kemas.mime_type as tipe_sertifikat_produk");
    } else {
      $this->db->select("*");
    }
    $this->db->from('detail_identitas_kemas');
    $this->db->join('layanan', "detail_identitas_kemas.id_layanan = layanan.uid");
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha = identitas_usaha.id_identitas_usaha");
    if ($id != null) {
      $this->db->where("id", $id);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  /// function to fetch sertifikat of layanan HC
  function getsertifikatHC($id = null, $unduh = false)
  {
    $this->db->select("layanan.kode_layanan,identitas_usaha.nama_usaha, detail_identitas_ekspor.*, detail_identitas_ekspor.sertifikat as sertifikat_produk,detail_identitas_ekspor.mime_type as tipe_sertifikat_produk");
    $this->db->from('detail_identitas_ekspor');
    $this->db->join('layanan', "detail_identitas_ekspor.id_layanan = layanan.uid");
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha = identitas_usaha.id_identitas_usaha");
    if ($id != null) {
      $this->db->where("id", $id);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  function getsertifikatUjiMutu($id = null, $unduh = false)
  {
    $this->db->select("layanan.kode_layanan,identitas_usaha.nama_usaha,  layanan.sertifikat as sertifikat_produk,layanan.mime_type as tipe_sertifikat_produk,layanan.kodelhu");
    $this->db->from('layanan_ujimutu layanan');
    $this->db->join('identitas_usaha', "layanan.id_identitas_usaha = identitas_usaha.id_identitas_usaha");
    if ($id != null) {
      $this->db->where("uid", $id);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  function getKeluhanSaran($jenis)
  {
    $this->db->select("*");
    $this->db->from('keluhan_saran');
    $this->db->where('jenis', $jenis);
    $this->db->order_by('tanggal_keluhan', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }
  function getKontakKami()
  {
    $this->db->select("*");
    $this->db->from('pesan');
    $this->db->order_by('tanggal', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }

  function getEmailPelaksana($id_layanan)
  {
    $query = $this->db->query("SELECT a.tanggal_inspeksi, a.tanggal_pc, b.nama_lengkap, b.username,b.kode_role, CONCAT(c.alamat_usaha,' Kel. ',c.kelurahan,' Kec. ',c.kecamatan,' ',c.kota) alamat FROM `layanan` a join user b on
		a.inspektor = b.id_user or a.pelaksana = b.id_user or a.ppc = b.id_user
        join identitas_usaha c on a.id_identitas_usaha = c.id_identitas_usaha
        where a.uid = " . $id_layanan . "");
    return $query->result_array();
  }
  function getUsernamePelaku($id_layanan)
  {
    $query = $this->db->query("SELECT c.nama_lengkap, c.username, a.kode_pendaftaran FROM `layanan` a join identitas_usaha b on a.id_identitas_usaha = b.id_identitas_usaha join user c on b.id_user = c.id_user WHERE uid = " . $id_layanan . "");
    return $query->result_array();
  }

  function getReportSurvey($periode)
  {
    $query = "SELECT master_parameter.*, avg_nilai, avg_kepentingan FROM `master_parameter`
    LEFT JOIN master_kuesioner on master_parameter.id = master_kuesioner.id_parameter
    LEFT JOIN (SELECT AVG((nilai + kepentingan) / 2) avg_nilai, AVG(kepentingan) avg_kepentingan, id_kuesioner
    FROM `survey_data`
    join survey_kuesioner on survey_data.id = survey_kuesioner.id_survey
    where id_periode = " . $periode . " 
    group by id_kuesioner) as hasil_kuesioner on master_kuesioner.id = hasil_kuesioner.id_kuesioner
    order by master_parameter.id";

    $report = $this->db->query($query)->result_array();

    $data = array();
    $result = array();
    $total_ikm = 0;
    $total_konversi = 0;
    foreach ($report as $element) {
      if($element["nama_parameter"] == 'Biaya'){
        $element["avg_nilai"] = round( 1 - $element["avg_nilai"],2);
        $element["nilai_konversi"] = round($element["avg_nilai"] * 100,2);
      }else{
        $element["avg_nilai"] = round($element["avg_nilai"],2);
        $element["nilai_konversi"] = round($element["avg_nilai"] * 25,2);
  
        $total_ikm += $element["avg_nilai"];
        $total_konversi += $element["nilai_konversi"];
      }

      $mutu = $this->getMutuPelayanan($element["nilai_konversi"]);
      $element["mutu_pelayanan"] = $mutu["mutu_pelayanan"];
      $element["ukuran_kinerja"] = $mutu["ukuran_kinerja"];

      array_push($data, $element);
    }
    $result["total_nilai"] = round($total_ikm,2);
    $result["avg_total_nilai"] = round($total_ikm / sizeof($report),2);
    $result["total_konversi"] = round($total_konversi,2);
    $result["avg_total_konversi"] = round($total_konversi / sizeof($report),2);

    $total_mutu = $this->getMutuPelayanan($result["avg_total_konversi"]);

    $result["mutu_pelayanan"] = $total_mutu["mutu_pelayanan"];
    $result["ukuran_kinerja"] = $total_mutu["ukuran_kinerja"];
    $result["data"] = $data;

    return $result;
  }

  private function getMutuPelayanan($nilai)
  {
    $data = array();
    if ($nilai <= 64.9) {
      $data["mutu_pelayanan"] = "D";
      $data["ukuran_kinerja"] = "Tidak Baik";
    } else if ($nilai <= 76.6) {
      $data["mutu_pelayanan"] = "C";
      $data["ukuran_kinerja"] = "Kurang Baik";
    } else if ($nilai <= 88.3) {
      $data["mutu_pelayanan"] = "B";
      $data["ukuran_kinerja"] = "Baik";
    } else if ($nilai <= 100) {
      $data["mutu_pelayanan"] = "A";
      $data["ukuran_kinerja"] = "Sangat Baik";
    } else {
      $data["mutu_pelayanan"] = "-";
      $data["ukuran_kinerja"] = "-";
    }
    return $data;
  }

  function getSurvey($periode = null)
  {
    $where = $periode != null ? "Where survey_data.id_periode = " . $periode : "";
    $query = "SELECT `survey_data`.*, layanan_ujimutu.kodelhu as nomor_sertifikat FROM `survey_data`
    left join layanan_ujimutu on survey_data.id = layanan_ujimutu.id_survey " . $where;
    return $this->db->query($query)->result_array();
  }

  function getKuesioner($jenis = null)
  {
    $this->db->select("master_kuesioner.*, master_parameter.id as id_parameter, master_parameter.nama_parameter");
    $this->db->from("master_kuesioner");
    $this->db->join("master_parameter", "master_kuesioner.id_parameter = master_parameter.id");
    $this->db->where("deleted", "0");
    if ($jenis != null) {
      $this->db->where("jenis", $jenis);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  function getDetailSurvey($id)
  {
    $query = "SELECT master_kuesioner.id, survey_kuesioner.pertanyaan,master_kuesioner.jenis, master_kuesioner.tipe,master_kuesioner.urutan, survey_kuesioner.nilai, survey_kuesioner.kepentingan, survey_kuesioner.jawaban FROM survey_kuesioner
    JOIN master_kuesioner ON survey_kuesioner.id_kuesioner = master_kuesioner.id
    WHERE id_survey = $id";
    return $this->db->query($query)->result_array();
  }
}
