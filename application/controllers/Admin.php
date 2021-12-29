<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->model('model_user');
    $this->load->model('model_admin');
    $this->load->helper("data_helper");
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->menu =  $this->model_user->getMenu($this->saya());
  }

  public function saya()
  {
    $datalogin = $this->session->userdata("dataLogin");
    return $datalogin['kode_role'];
  }

  public function uploads($files, $nama)
  {
    $config['upload_path']          = './upload/';
    $config['allowed_types']        = 'doc|pdf|docx|jpg|png|jpeg';
    $config['max_size']             = 0;

    $files = $_FILES;
    $_FILES[$nama]['name'] = $files[$nama]['name'];
    $_FILES[$nama]['type'] = $files[$nama]['type'];
    $_FILES[$nama]['tmp_name'] = $files[$nama]['tmp_name'];
    $_FILES[$nama]['error'] = $files[$nama]['error'];
    $_FILES[$nama]['size'] = $files[$nama]['size'];
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload($nama)) {
      return null;
    } else {
      return $this->upload->data();
    }
  }

  public function info_layanan($jenis = null, $data_ubah = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    if ($jenis == null) {
      $data["layanan"] = $this->model_admin->getDataWhere("master_layanan", "status", 1);
      $this->loadView('dashboard_view/admin/info_layanan', $data);
    } else {
      if ($data_ubah == null) {
        $data['info_layanan'] = $this->model_user->getDataWhere('info_layanan', 'kode_layanan', $jenis);

        $data['jenis'] = $jenis;
        $data["layanan"] = $this->model_admin->getDataWhere("master_layanan", "kode_layanan", $jenis)[0]["nama_layanan"];
        $this->loadView('dashboard_view/admin/layanan', $data);
      } else {
        $value = '';
        if ($data_ubah == 'deskripsi') {
          $value = $this->input->post('deskripsi');
        } else if ($data_ubah == 'dasar_hukum') {
          $value = $this->input->post('dasar_hukum');
        } else if ($data_ubah == 'persyaratan') {
          $value = $this->input->post('persyaratan');
        } else if ($data_ubah == 'prosedur') {
          $value = $this->input->post('prosedur');
        } else if ($data_ubah == 'biaya') {
          $value = $this->input->post('biaya');
        }

        $cek = sizeof($this->model_user->getDataWhere('info_layanan', 'kode_layanan', $jenis));
        $hasil = "";
        if ($cek > 0) {
          $data = array($data_ubah => $value);
          $hasil = $this->model_user->updateData('info_layanan', $jenis, 'kode_layanan', $data);
        } else {
          $data = array($data_ubah => $value, 'kode_layanan' => $jenis);
          $hasil = $this->model_user->insertData('info_layanan', $data);
        }
        if ($hasil) {
          $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
          redirect("admin/info_layanan/" . $jenis, "redirect");
        } else {
          $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
          redirect("admin/gambar_slider/" . $jenis, "redirect");
        }
      }
    }
  }

  public function akun_pelaku_usaha($id = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['akun'] = $this->model_user->getUserDetail($id);

    if ($id != null) {
      if (sizeof($data['akun']) == 0 || $data['akun'][0]['nama_pemohon'] == '') {
        $this->session->set_flashdata("status", "<div class='alert alert-warning'>Akun belum mendaftarkan usaha</div>");
        header("location:" . base_url() . 'dashboard/akun_pelaku_usaha');
      }
      $data['akun'] = $data['akun'][0];
      $this->loadView('dashboard_view/admin/detail_pelaku_usaha', $data);
    } else {
      $this->loadView('dashboard_view/admin/akun_pelaku_usaha', $data);
    }
  }

  public function gambar_slider()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['slider'] = $this->model_user->getAllData("gambar_slider");
    $this->loadView('dashboard_view/admin/gambar_slider', $data);
  }
  public function hapus_slider($id_gambar)
  {
    $this->model_user->deleteData('gambar_slider', $id_gambar, 'id_gambar');
    redirect("dashboard/gambar_slider");
  }

  public function tambah_slider()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $this->loadView('dashboard_view/admin/tambah_slider', $data);
  }

  public function insert_gambar_slider()
  {
    $i = $this->input;
    $max = 1000000;
    $gambar_slider_temp = $this->uploads($_FILES, 'gambar_slider');

    if ($_FILES['gambar_slider']['size'] > $max) {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
      redirect("admin/tambah_slider", "redirect");
    }

    if ($gambar_slider_temp != null) {
      $gambar_slider = file_get_contents($gambar_slider_temp['full_path']);
    }

    $arr = array(
      "id_gambar" => '',
      "gambar_slider" => $gambar_slider
    );
    if ($this->model_admin->insertData("gambar_slider", $arr)) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
      redirect("admin/gambar_slider", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
      redirect("admin/gambar_slider", "redirect");
    }
  }

  public function kontak_kami()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/kontak_kami', $data);
  }

  public function unit_dinas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/unit_dinas', $data);
  }

  public function tambah_dinas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();

    $this->loadView('dashboard_view/admin/tambah_dinas', $data);
  }

  public function identitas_kepala_dinas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['identitas'] = $this->model_admin->getAllData("identitas_kepala_dinas");
    $this->loadView('dashboard_view/admin/identitas_kepala_dinas', $data);
  }

  public function tambah_identitas_kepala_dinas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['jenis'] = 'tambah';
    $this->loadView('dashboard_view/admin/tambah_identitas_kepala_dinas', $data);
  }
  public function ubah_identitas_kepala_dinas()
  {
    $nip = $this->input->post('nip');
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['kepala'] = $this->model_user->getDataWhere("identitas_kepala_dinas", 'nip', $nip);
    $data['jenis'] = 'ubah';
    $this->loadView('dashboard_view/admin/tambah_identitas_kepala_dinas', $data);
  }

  public function kelola_identitas($jenis)
  {
    $i = $this->input;
    $nip = $i->post("nip");
    $pangkat = $i->post("pangkat");
    $nama_kepala_dinas = $i->post("nama_kepala_dinas");
    $awal_menjabat = $i->post("awal_menjabat");
    $akhir_menjabat = $i->post("akhir_menjabat");
    $status = $i->post("status");
    if ($status == '') {
      $status = 0;
    }


    if ($akhir_menjabat == '1970-01-01' || $akhir_menjabat == '0000-00-00') {
      $akhir_menjabat = null;
    }

    $max = 1000000;
    $foto_kepala_dinas_temp = $this->uploads($_FILES, 'foto_kepala_dinas');

    if ($_FILES['panduan']['size'] > $max) {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
      redirect("admin/tambah_identitas_kepala_dinas", "redirect");
    }

    if ($foto_kepala_dinas_temp != null) {
      $foto_kepala_dinas = file_get_contents($foto_kepala_dinas_temp['full_path']);
    }


    $hasil = "";
    if ($jenis == 'tambah') {
      $arr = array(
        "nip" => $nip,
        "pangkat" => $pangkat,
        "nama_kepala_dinas" => $nama_kepala_dinas,
        "t_jabatan_awal" => $awal_menjabat,
        "t_jabatan_akhir" => $akhir_menjabat,
        "foto" => $foto_kepala_dinas
      );
      $hasil = $this->model_admin->insertData("identitas_kepala_dinas", $arr);
    } else if ($jenis == 'ubah') {
      $arr = array(
        "nip" => $nip,
        "pangkat" => $pangkat,
        "nama_kepala_dinas" => $nama_kepala_dinas,
        "t_jabatan_awal" => $awal_menjabat,
        "t_jabatan_akhir" => $akhir_menjabat,
        "status" => $status,
        "foto" => $foto_kepala_dinas
      );
      $hasil = $this->model_admin->updateData("identitas_kepala_dinas", $nip, 'nip', $arr);
    }

    if ($hasil) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
      redirect("admin/identitas_kepala_dinas", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
      redirect("admin/identitas_kepala_dinas", "redirect");
    }
  }

  public function tautan_terkait()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['tautan'] = $this->model_admin->getAllData("tautan");
    $this->loadView('dashboard_view/admin/tautan_terkait', $data);
  }
  public function hapus_tautan()
  {
    $id = $this->input->post('id_tautan');
    if ($this->model_user->deleteData('tautan', $id, 'id_tautan')) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");
      redirect("admin/tautan_terkait", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menghapus data</div>");
      redirect("admin/tautan_terkait", "redirect");
    }
  }


  public function tambah_tautan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->load->view('dashboard_view/template/header', $data);
    $this->loadView('dashboard_view/admin/tambah_tautan', $data);
  }

  public function insert_tautan()
  {
    $i = $this->input;
    $nama_tautan = $i->post("nama_tautan");
    $alamat_tautan = $i->post("alamat_tautan");


    $data = array(
      'id_tautan' => null,
      'nama_tautan' => $nama_tautan,
      'alamat_tautan' => $alamat_tautan
    );

    if ($this->model_admin->insertData('tautan', $data)) {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Tautan berhasil ditambahkan</div>");
      redirect("admin/tautan_terkait", "redirect");
    } else {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Tautan gagal ditambahkan</div>");
      redirect("admin/tautan_terkait", "redirect");
    }
  }

  public function konsultasi_online()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/konsultasi_online', $data);
  }

  public function migrasi_layanan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->loadView('dashboard_view/admin/migrasi_layanan', $data);
  }

  public function migrasi()
  {
    $this->load->library('SimpleXLSX');
    $type = $_FILES['form_migrasi']['type'];
    if (
      $type == 'application/wps-office.xlsx'
      || $type == 'application/vnd.ms-excel'
      || $type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ) {
      if ($xlsx = SimpleXLSX::parse($_FILES['form_migrasi']['tmp_name'])) {
        $arrs = $xlsx->rows(1);
        switch ($arrs[1][2]) {
          case "prima_2":
            $this->migrasi_prima($xlsx->rows());
            break;
          case "sppb":
            $this->migrasi_sppb($xlsx->rows());
            break;
          case "psat":
            $this->migrasi_psat($xlsx->rows());
            break;
          case "kemas":
            $this->migrasi_kemas($xlsx->rows());
            break;
        }
      }
    }
  }

  private function insert_layanan_migrasi($layanan, $data_pelaku, $tabel_detail, $data_detail)
  {
    $tanggal = date('Y-m-d H:i:sa');
    $data_layanan = array(
      'kode_layanan' => $layanan,
      'kode_pendaftaran' => 'MIGRASI',
      'tanggal_buat' => $tanggal,
      'manager_adm' => $tanggal,
      'syarat_teknis' => '-',
      'w_inspeksi' => $tanggal,
      'w_ppc' => $tanggal,
      'w_hasil_mt' => $tanggal,
      'w_komtek' => $tanggal,
      'w_diterima' => $tanggal,
      'status_hasil_uji' => 2
    );

    $data = $this->model_admin->getDataWhere($tabel_detail, "nomor_sertifikat", $data_detail["nomor_sertifikat"]);
    if (sizeof($data) > 0 && $data[0]["nomor_sertifikat"] != '') {
      $layanan = $this->model_admin->getDataWhere("layanan", "uid", $data[0]["id_layanan"]);
      $identitas = $this->model_admin->getDataWhere("identitas_usaha", "id_identitas_usaha", $layanan[0]["id_identitas_usaha"]);

      $this->model_admin->updateData("layanan", $layanan[0]["uid"], "uid", $data_layanan);
      $this->model_admin->updateData("identitas_usaha", $identitas[0]["id_identitas_usaha"], "id_identitas_usaha", $data_pelaku);

      return $this->model_admin->updateData($tabel_detail, $data_detail["nomor_sertifikat"], "nomor_sertifikat", $data_detail);
    } else {
      $identitas_usaha = $this->model_admin->insertGetID('identitas_usaha', $data_pelaku);
      $data_layanan['id_identitas_usaha'] = $identitas_usaha;

      $id_layanan = $this->model_admin->insertGetID('layanan', $data_layanan);
      $data_detail["id_layanan"] = $id_layanan;

      return $this->model_admin->insertData($tabel_detail, $data_detail);
    }
  }

  private function migrasi_prima($data)
  {
    $iterasi = 0;
    foreach ($data as $element) {
      if ($iterasi == 0 || ($element[0] == '' || $element[1] == '' || $element[2] == '' || $element[3] == '' || $element[4] == '' || $element[5] == '')) {
        $iterasi++;
        continue;
      }
      $layanan = $this->model_admin->getDataWhere("master_layanan", "kode_layanan", $element[11])[0];
      $UNIX_DATE = ($element[9] - 25569) * 86400;
      $date = gmdate("d-m-Y H:i:s", $UNIX_DATE);
      $tanggal_sertifikat = date('Y-m-d', strtotime($date));
      $tanggal_kadaluarsa = date('Y-m-d', strtotime("+" . $layanan['masa_berlaku'] . " months", strtotime($date)));
      $data_excel = array(
        "nomor_sertifikat" => $element[0],
        "nama_jenis_komoditas" => $element[6],
        "nama_latin" => $element[7],
        "luas_lahan" => $element[8],
        "tanggal_unggah" => $tanggal_sertifikat,
        "tanggal_kadaluarsa" => $tanggal_kadaluarsa,
        "status" => $element[10]
      );
      $data_pelaku = array(
        'nama_pemohon' => $element[1],
        'nama_usaha' => $element[1],
        'alamat_usaha' => $element[2],
        'kelurahan' => $element[3],
        'kecamatan' => $element[4],
        'kota' => $element[5],
        'jabatan_pemohon' => 'MIGRASI'
      );
      $this->insert_layanan_migrasi($element[11], $data_pelaku, 'detail_komoditas', $data_excel);
      $iterasi++;
    }
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Proses migrasi berhasil</div>");
    // redirect("admin/migrasi_layanan", "redirect");
  }

  private function migrasi_sppb($data)
  {
    $iterasi = 0;
    foreach ($data as $element) {
      if ($iterasi == 0 || ($element[0] == '' || $element[1] == '' || $element[2] == '' || $element[3] == '' || $element[4] == '' || $element[5] == '')) {
        $iterasi++;
        continue;
      }
      // $UNIX_DATE = ($element[7] - 25569) * 86400;
      // $date = gmdate("d-m-Y H:i:s", $UNIX_DATE);
      $layanan = $this->model_admin->getDataWhere("master_layanan", "kode_layanan", "sppb")[0];
      $UNIX_DATE = ($element[7] - 25569) * 86400;
      $date = gmdate("d-m-Y H:i:s", $UNIX_DATE);
      $tanggal_sertifikat = date('Y-m-d', strtotime($date));
      $tanggal_kadaluarsa = date('Y-m-d', strtotime("+" . $layanan['masa_berlaku'] . " months", strtotime($date)));

      $data_excel = array(
        "nomor_sertifikat" => $element[0],
        "nama_unit" => $element[1],
        "alamat" => $element[2],
        "kota" => $element[3],
        "status_kepemilikan" => $element[4],
        "level_sppb" => $element[5],
        "ruang_lingkup" => $element[6],
        "tanggal_unggah" => $tanggal_sertifikat,
        "tanggal_kadaluarsa" => $tanggal_kadaluarsa,
        "status" => $element[8]
      );
      $data_pelaku = array(
        'nama_pemohon' => $data_excel['nama_unit'],
        'nama_usaha' => $data_excel['nama_unit'],
        'alamat_usaha' => $data_excel['alamat'],
        'kota' => $data_excel['kota'],
        'jabatan_pemohon' => 'MIGRASI'
      );
      $this->insert_layanan_migrasi("sppb", $data_pelaku, 'detail_identitas_sppb', $data_excel);
      $iterasi++;
    }
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Proses migrasi berhasil</div>");
    redirect("admin/migrasi_layanan", "redirect");
  }

  private function migrasi_psat($data)
  {
    $iterasi = 0;
    foreach ($data as $element) {
      if ($iterasi == 0 || ($element[0] == '' || $element[1] == '' || $element[2] == '' || $element[3] == '' || $element[4] == '' || $element[5] == '')) {
        $iterasi++;
        continue;
      }
      $layanan = $this->model_admin->getDataWhere("master_layanan", "kode_layanan", "psat")[0];

      $UNIX_DATE = ($element[8] - 25569) * 86400;
      $date = gmdate("d-m-Y H:i:s", $UNIX_DATE);
      $tanggal_sertifikat = date('Y-m-d', strtotime($date));
      $tanggal_kadaluarsa = date('Y-m-d', strtotime("+" . $layanan['masa_berlaku'] . " months", strtotime($date)));

      $data_excel = array(
        "komoditas" => $element[3],
        "nama_dagang" => $element[4],
        "nama_produk_pangan" => $element[5],
        "kelas_mutu" => $element[6],
        "nomor_sertifikat" =>  $element[7],
        "tanggal_unggah" => $tanggal_sertifikat,
        "tanggal_kadaluarsa" => $tanggal_kadaluarsa,
        "netto" => $element[9],
        "status" => $element[10]
      );
      $data_pelaku = array(
        'nama_pemohon' => $element[0],
        'nama_usaha' => $element[4],
        'alamat_usaha' => $element[1],
        'kota' => $element[2],
        'jabatan_pemohon' => 'MIGRASI'
      );
      $this->insert_layanan_migrasi("psat", $data_pelaku, 'detail_identitas_produk', $data_excel);
      $iterasi++;
    }
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Proses migrasi berhasil</div>");
    redirect("admin/migrasi_layanan", "redirect");
  }

  private function migrasi_kemas($data)
  {
    $iterasi = 0;
    foreach ($data as $element) {
      if ($iterasi == 0 || ($element[0] == '' || $element[1] == '' || $element[2] == '' || $element[3] == '' || $element[4] == '' || $element[5] == '')) {
        $iterasi++;
        continue;
      }
      $layanan = $this->model_admin->getDataWhere("master_layanan", "kode_layanan", "kemas")[0];

      $UNIX_DATE = ($element[12] - 25569) * 86400;
      $date = gmdate("d-m-Y H:i:s", $UNIX_DATE);
      $tanggal_sertifikat = date('Y-m-d', strtotime($date));
      $tanggal_kadaluarsa = date('Y-m-d', strtotime("+" . $layanan['masa_berlaku'] . " months", strtotime($date)));

      $data_excel = array(
        "nomor_sertifikat" => $element[0],
        "alamat_pengemasan" => $element[4],
        "kota_pengemasan" => $element[5],
        "nama_personel" => $element[7],
        "komoditas" => $element[10],
        "komoditas_latin" => $element[11],
        "tanggal_unggah" => $tanggal_sertifikat,
        "tanggal_kadaluarsa" => $tanggal_kadaluarsa,
        "status" => $element[13]
      );
      $data_pelaku = array(
        'nama_pemohon' => $element[6],
        'nama_usaha' => $element[1],
        'alamat_usaha' => $element[2],
        'kota' => $element[3],
        'email' => $element[9],
        'no_hp_pemohon' => $element[8],
        'jabatan_pemohon' => 'MIGRASI'
      );
      $this->insert_layanan_migrasi("kemas", $data_pelaku, 'detail_identitas_kemas', $data_excel);
      $iterasi++;
    }
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Proses migrasi berhasil</div>");
    redirect("admin/migrasi_layanan", "redirect");
  }


  public function berita()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['berita'] = $this->model_admin->getAllData("berita");
    $this->loadView('dashboard_view/admin/berita', $data);
  }

  public function kelola_berita($jenis)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    if ($jenis == 'ubah') {
      $id_berita = $this->input->post('id_berita');
      $data['berita'] = $this->model_user->getDataWhere("berita", 'id_berita', $id_berita);
    }

    $data['jenis'] = $jenis;
    $this->loadView('dashboard_view/admin/tambah_berita', $data);
  }

  public function insert_berita()
  {
    $i = $this->input;
    $judul_berita = $i->post("judul_berita");
    $slug = strtolower($judul_berita);
    $slug = str_replace(" ", "_", $slug);
    $slug = str_replace(",", "", $slug);
    $slug = str_replace(".", "", $slug);
    $isi_berita = $i->post("isi_berita");
    $jenis = $i->post("jenis");
    $id_berita = $i->post("id_berita");
    $max = 1000000;


    if ($_FILES['gambar_berita']['size'] > $max) {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
      redirect("admin/kelola_berita/" . $jenis, "redirect");
    } else {
      $gambar_berita_temp = $this->uploads($_FILES, 'gambar_berita');
    }
    $dat = "";

    if ($gambar_berita_temp != null) {
      $gambar_berita = file_get_contents($gambar_berita_temp['full_path']);
      $data = array(
        'id_berita' => $id_berita,
        'judul_berita' => $judul_berita,
        'isi_berita' => $isi_berita,
        'gambar' => $gambar_berita
      );
    } else {
      $data = array(
        'id_berita' => $id_berita,
        'judul_berita' => $judul_berita,
        'isi_berita' => $isi_berita
      );
    }
    $data['slug'] = $slug;
    $hasil = "";
    $kata = 'ditambahkan';

    if ($jenis == 'tambah') {
      $hasil = $this->model_admin->insertData('berita', $data);
    } else {
      $kata = 'diubah';
      $hasil = $this->model_admin->updateData('berita', $id_berita, 'id_berita', $data);
    }

    if ($hasil) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Berita berhasil " . $kata . "</div>");
      redirect("admin/berita", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Berita gagal " . $kata . "</div>");
      redirect("admin/berita", "redirect");
    }
  }

  public function cek_status_layanan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/status_layanan', $data);
  }

  public function panduan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['panduan'] = $this->model_user->getDataPanduan();
    $this->loadView('dashboard_view/admin/panduan', $data);
  }

  public function hapus_panduan()
  {
    $id = $this->input->post('id_panduan');
    if ($this->model_user->deleteData('panduan', $id, 'id')) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");
      redirect("admin/panduan", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menghapus data</div>");
      redirect("admin/panduan", "redirect");
    }
  }

  public function kelola_panduan($judul)
  {
    $data['judul'] = $judul;
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['panduan'] = $this->model_admin->getAllData("panduan");
    $this->loadView('dashboard_view/admin/tambah_panduan', $data);
  }

  public function insert_panduan()
  {
    $i = $this->input;
    $nama_panduan = $i->post("nama_panduan");
    $jenis = $i->post("jenis");
    $id = $i->post("id");
    $max = 1000000;
    $panduan_temp = $this->uploads($_FILES, 'panduan');
    $tipe = $_FILES['panduan']['type'];

    if ($_FILES['panduan']['size'] > $max) {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
      redirect("admin/tambah_panduan", "redirect");
    }
    $result = null;

    if ($panduan_temp != null) {
      $panduan = file_get_contents($panduan_temp['full_path']);
      if ($jenis == 'tambah') {
        $arr = array(
          "id" => '',
          "nama_panduan" => 'Panduan',
          "type" => $tipe,
          "panduan" => $panduan
        );
        $result = $this->model_admin->insertData("panduan", $arr);
      } else {
        $arr = array(
          "type" => $tipe,
          "panduan" => $panduan
        );
        $result = $this->model_admin->updateData("panduan", $id, 'id', $arr);
      }
    } else if ($panduan_temp == null && $jenis = "ubah") {
      $arr = array("nama_panduan" => $nama_panduan);
      $result = $this->model_admin->updateData("panduan", $id, 'id', $arr);
    }


    if ($result) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
      redirect("admin/panduan", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
      redirect("admin/panduan", "redirect");
    }
  }

  public function tentang_kami()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/tentang_kami', $data);
  }

  public function master_kemasan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['kemasan'] = $this->model_user->getAllData("master_kemasan", 'nama_kemasan');
    $this->loadView('dashboard_view/admin/master_kemasan', $data);
  }
  public function tambah_kemasan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->loadView('dashboard_view/admin/tambah_master_kemasan', $data);
  }
  public function data_kemasan($menu = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    if ($menu == null) {
      redirect('dashboard/master_kemasan');
    } else {
      $nama_kemasan = $this->input->post("nama_kemasan");
      $id_kemasan = $this->input->post("id_kemasan");
      $isTrue = false;
      if ($menu == 'tambah') {
        for ($i = 0; $i < sizeof($nama_kemasan); $i++) {
          $data = array("id_kemasan" => null, "nama_kemasan" => $nama_kemasan[$i]);
          $isTrue = $this->model_user->insertData('master_kemasan', $data);
        }
      } else if ($menu == 'ubah') {
        $data = array("nama_kemasan" => $nama_kemasan);
        $isTrue = $this->model_user->updateData('master_kemasan', $id_kemasan, 'id_kemasan', $data);
      } else if ($menu == 'hapus') {
        $isTrue = $this->model_user->deleteData('master_kemasan', $id_kemasan, 'id_kemasan');
      } else {
        redirect('dashboard/master_kemasan');
      }
      if ($isTrue) {
        $this->session->set_flashdata("status", "<div class='alert alert-success alert-dismissible fade show'>Data berhasil disimpan</div>");
      } else {
        $this->session->set_flashdata("status", "<div class='alert alert-warning alert-dismissible fade show'>Gagal menyimpan data</div>");
      }

      redirect("dashboard/master_kemasan", "redirect");
    }

    $data['kemasan'] = $this->model_user->getAllData("master_kemasan");
    $this->loadView('dashboard_view/admin/master_kemasan', $data);
  }


  public function master_satuan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['satuan'] = $this->model_user->getAllData("master_satuan", "nama_satuan");
    $this->loadView('dashboard_view/admin/master_satuan', $data);
  }
  public function tambah_satuan()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->loadView('dashboard_view/admin/tambah_master_satuan', $data);
  }
  public function data_satuan($menu = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    if ($menu == null) {
      redirect('dashboard/master_satuan');
    } else {
      $nama_satuan = $this->input->post("nama_satuan");
      $id_satuan = $this->input->post("id_satuan");
      $isTrue = false;
      if ($menu == 'tambah') {
        for ($i = 0; $i < sizeof($nama_satuan); $i++) {
          $data = array("id_satuan" => null, "nama_satuan" => $nama_satuan[$i]);
          $isTrue = $this->model_user->insertData('master_satuan', $data);
        }
      } else if ($menu == 'ubah') {
        $data = array("nama_satuan" => $nama_satuan);
        $isTrue = $this->model_user->updateData('master_satuan', $id_satuan, 'id_satuan', $data);
      } else if ($menu == 'hapus') {
        $isTrue = $this->model_user->deleteData('master_satuan', $id_satuan, 'id_satuan');
      } else {
        redirect('dashboard/master_satuan');
      }
      if ($isTrue) {
        $this->session->set_flashdata("status", "<div class='alert alert-success alert-dismissible fade show'>Data berhasil disimpan</div>");
      } else {
        $this->session->set_flashdata("status", "<div class='alert alert-warning alert-dismissible fade show'>Gagal menyimpan data</div>");
      }

      redirect("dashboard/master_satuan", "redirect");
    }

    $data['kemasan'] = $this->model_user->getAllData("master_kemasan");
    $this->loadView('dashboard_view/admin/master_kemasan', $data);
  }


  public function layanan_prima_3()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/layanan_prima_3', $data);
  }

  public function layanan_prima_2()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/layanan_prima_2', $data);
  }

  public function layanan_psat()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->loadView('dashboard_view/admin/layanan_psat', $data);
  }

  public function layanan_rumah_kemas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->load->view('dashboard_view/template/header', $data);
    $this->load->view('dashboard_view/template/top_nav');
    $this->load->view('dashboard_view/template/side_nav', $this->menu);
    $this->load->view('dashboard_view/admin/layanan_rumah_kemas', $data);
    $this->load->view('dashboard_view/template/footer');
  }

  public function layanan_hc()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->load->view('dashboard_view/template/header', $data);
    $this->load->view('dashboard_view/template/top_nav');
    $this->load->view('dashboard_view/template/side_nav', $this->menu);
    $this->load->view('dashboard_view/admin/layanan_hc', $data);
    $this->load->view('dashboard_view/template/footer');
  }

  public function layanan_hs()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['kota'] = $this->model_user->getDataKota();
    $this->load->view('dashboard_view/template/header', $data);
    $this->load->view('dashboard_view/template/top_nav');
    $this->load->view('dashboard_view/template/side_nav', $this->menu);
    $this->load->view('dashboard_view/admin/layanan_hs', $data);
    $this->load->view('dashboard_view/template/footer');
  }

  public function visi_misi()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['visi'] = $this->model_admin->getAllData("tentang_kami");
    $this->loadView('dashboard_view/admin/visi_misi', $data);
  }

  public function tambah_visi_misi()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $this->loadView('dashboard_view/admin/tambah_visi_misi', $data);
  }

  public function insert_visi_misi()
  {
    $i = $this->input;
    $visi_misi = $i->post("visi_misi");

    $data = array('visi_misi' => $visi_misi);

    if ($this->model_admin->updateData("tentang_kami", 1, "id", $data)) {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Berita berhasil ditambahkan</div>");
      redirect("admin/visi_misi", "redirect");
    } else {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Berita gagal ditambahkan</div>");
      redirect("admin/visi_misi", "redirect");
    }
  }

  public function struktur_organisasi()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['tentang'] = $this->model_user->getAllData("tentang_kami");

    $this->loadView('dashboard_view/admin/struktur_organisasi', $data);
  }

  public function tambah_struktur_organisasi()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    // $this->load->view('dashboard_view/template/header',$data);
    // $this->load->view('dashboard_view/template/top_nav');
    // $this->load->view('dashboard_view/template/side_nav',$this->menu);
    // $this->load->view('dashboard_view/admin/tambah_struktur_organisasi',$data);
    // $this->load->view('dashboard_view/template/footer');
    $this->loadView('dashboard_view/admin/tambah_struktur_organisasi', $data);
  }

  public function insert_struktur_organisasi()
  {
    $i = $this->input;
    $max = 1000000;
    $struktur_organisasi_temp = $this->uploads($_FILES, 'struktur_organisasi');

    if ($_FILES['struktur_organisasi']['size'] > $max) {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
      redirect("admin/struktur_organisasi", "redirect");
    }

    if ($struktur_organisasi_temp != null) {
      $struktur_organisasi = file_get_contents($struktur_organisasi_temp['full_path']);
    }

    $data = array('struktur_organisasi' => $struktur_organisasi);
    if ($this->model_admin->updateData("tentang_kami", 1, "id", $data)) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
      redirect("admin/struktur_organisasi", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
      redirect("admin/struktur_organisasi", "redirect");
    }
  }

  public function maklumat()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['maklumat'] = $this->model_admin->getAllData("tentang_kami");
    $this->loadView('dashboard_view/admin/maklumat', $data);

    /*$this->load->view('dashboard_view/template/header',$data);
      $this->load->view('dashboard_view/template/top_nav');
      $this->load->view('dashboard_view/template/side_nav',$this->menu);
      $this->load->view('dashboard_view/admin/maklumat',$data);
      $this->load->view('dashboard_view/template/footer');*/
  }

  public function tambah_maklumat()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $this->load->view('dashboard_view/template/header', $data);
    $this->load->view('dashboard_view/template/top_nav');
    $this->load->view('dashboard_view/template/side_nav', $this->menu);
    $this->load->view('dashboard_view/admin/tambah_maklumat', $data);
    $this->load->view('dashboard_view/template/footer');
  }

  public function insert_maklumat()
  {
    $i = $this->input;
    $maklumat = $i->post("maklumat");

    $data = array('maklumat' => $maklumat);

    if ($this->model_admin->updateData("tentang_kami", 1, "id", $data)) {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Maklumat berhasil ditambahkan</div>");
      redirect("admin/maklumat", "redirect");
    } else {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Maklumat gagal ditambahkan</div>");
      redirect("admin/maklumat", "redirect");
    }
  }



  public function tugas_fungsi()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['tugas'] = $this->model_admin->getAllData("tentang_kami");

    $this->loadView('dashboard_view/admin/tugas_fungsi', $data);
  }

  public function tambah_tugas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $this->loadView('dashboard_view/admin/tambah_tugas', $data);
  }

  public function insert_tugas_fungsi()
  {
    $i = $this->input;
    $tugas_fungsi = $i->post("tugas_fungsi");

    $data = array('tugas_fungsi' => $tugas_fungsi);

    if ($this->model_admin->updateData("tentang_kami", 1, "id", $data)) {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Maklumat berhasil ditambahkan</div>");
      redirect("admin/tugas_fungsi", "redirect");
    } else {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Maklumat gagal ditambahkan</div>");
      redirect("admin/maklumat", "redirect");
    }
  }

  public function legalitas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['legalitas'] = $this->model_admin->getAllData("tentang_kami");
    $this->loadView('dashboard_view/admin/legalitas', $data);
  }

  public function tambah_legalitas()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $this->loadView('dashboard_view/admin/tambah_legalitas', $data);
  }

  public function insert_legalitas()
  {
    $i = $this->input;
    $legalitas = $i->post("legalitas");

    $data = array('legalitas' => $legalitas);

    if ($this->model_admin->updateData("tentang_kami", 1, "id", $data)) {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Legalitas berhasil ditambahkan</div>");
      redirect("admin/legalitas", "redirect");
    } else {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Legalitas gagal ditambahkan</div>");
      redirect("admin/legalitas", "redirect");
    }
  }

  public function produk_hukum()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['produk'] = $this->model_admin->getAllData("produk_hukum");
    $this->loadView('dashboard_view/admin/produk_hukum', $data);
  }

  public function kelola_produk_hukum($jenis = null, $id = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $data['jenis'] = $jenis;
    $data['menu'] = '';
    $data['nama_produk_hukum'] = "";
    $data['produk_hukum'] = "";
    $data['id'] = "";
    if ($jenis == null) {
      redirect('dashboard/produk_hukum');
    } else {
      if ($jenis == 'tambah') {
        $data['menu'] = 'Tambah';
      } else if ($jenis == 'ubah') {
        if ($id == null) {
          redirect('dashboard/produk_hukum');
        }
        $data['id_produk'] = $id;

        $data['menu'] = 'Ubah';
        $dat = $this->model_user->getdatawhere("produk_hukum", 'id', $id);
        foreach ($dat as $dd);

        $data['nama_produk_hukum'] = $dd['nama_produk_hukum'];
        $data['produk_hukum'] = $dd['produk_hukum'];
        $data['id_produk'] = $dd['id'];
      }
    }

    $this->loadView('dashboard_view/admin/tambah_produk_hukum', $data);
  }

  public function hapus_produk_hukum()
  {
    $id = $this->input->post('id_produk');
    if ($this->model_user->deleteData('produk_hukum', $id, 'id')) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");
      redirect("admin/produk_hukum", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menghapus data</div>");
      redirect("admin/produk_hukum", "redirect");
    }
  }

  public function insert_produk_hukum($jenis = null)
  {
    $i = $this->input;
    $nama_produk_hukum = $i->post("nama_produk_hukum");
    $max = 1000000;
    $tipe = $_FILES['produk_hukum']['type'];
    $gambar = null;

    if ($_FILES['produk_hukum']['size'] > $max) {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
      redirect("admin/tambah_produk_hukum", "redirect");
    }

    if ($jenis == 'tambah') {
      $produk_hukum_temp = $this->uploads($_FILES, 'produk_hukum');
      if ($produk_hukum_temp != null) {
        $produk_hukum = file_get_contents($produk_hukum_temp['full_path']);
      }
    } else if ($jenis == 'ubah') {
      if ($this->uploads($_FILES, 'produk_hukum') != null) {
        $gambar = 'ada';
        $produk_hukum_temp = $this->uploads($_FILES, 'produk_hukum');
        if ($produk_hukum_temp != null) {
          $produk_hukum = file_get_contents($produk_hukum_temp['full_path']);
        }
      }
    }
    $hasil = '';

    if ($jenis == 'tambah') {
      $arr = array(
        "id" => '',
        "nama_produk_hukum" => $nama_produk_hukum,
        "produk_hukum" => $produk_hukum,
        "tipe_dokumen" => $tipe
      );
      $hasil = $this->model_admin->insertData("produk_hukum", $arr);
    } else if ($jenis == 'ubah') {
      $id_produk = $this->input->post('id_produk');
      if ($gambar == null) {
        $arr = array(
          "nama_produk_hukum" => $nama_produk_hukum
        );
      } else {
        $arr = array(
          "nama_produk_hukum" => $nama_produk_hukum,
          "produk_hukum" => $produk_hukum,
          "tipe_dokumen" => $tipe
        );
      }
      $hasil = $this->model_admin->updateData("produk_hukum", $id_produk, 'id', $arr);
    }


    if ($hasil) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
      redirect("admin/produk_hukum", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
      redirect("admin/produk_hukum", "redirect");
    }
  }

  function ubah_data_dinas()
  {
    $i = $this->input;
    $data = array("nama_instansi" => $i->post('nama_instansi'), "nama_ketua" => $i->post('nama_ketua'));
    if ($this->model_user->updateData("kota", $i->post('kode_kota'), "kode_kota", $data)) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
    }
    redirect("dashboard/kelola_dinas");
  }

  public function kelola_alamat()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['kontak'] = $this->model_user->getAllData("kontak_kami");
    $this->loadView('dashboard_view/admin/tambah_alamat', $data);
  }

  public function tambah_alamat()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $this->loadView('dashboard_view/admin/tambah_alamat', $data);
  }

  public function insert_alamat()
  {
    $i = $this->input;
    $alamat = $i->post("alamat");
    $nomor_telepon = $i->post("nomor_telepon");
    $whatsapp = $i->post("whatsapp");

    $data = array('alamat' => $alamat, 'nomor_telepon' => $nomor_telepon, 'whatsapp' => $whatsapp);

    if ($this->model_admin->updateData("kontak_kami", 1, "id", $data)) {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Berita berhasil ditambahkan</div>");
      redirect("admin/kelola_alamat", "redirect");
    } else {
      $this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Berita gagal ditambahkan</div>");
      redirect("admin/kelola_alamat", "redirect");
    }
  }

  public function kelola_medsos()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['kontak'] = $this->model_user->getAllData("kontak_kami");
    $this->loadView('dashboard_view/admin/tambah_medsos', $data);
  }

  public function tambah_medsos()
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['role'] = $this->model_user->getAllData("master_role");
    $this->loadView('dashboard_view/admin/tambah_medsos', $data);
  }

  public function insert_medsos()
  {
    $i = $this->input;
    $email = $i->post("email");
    $facebook = $i->post("facebook");
    $twitter = $i->post("twitter");
    $instagram = $i->post("instagram");

    $data = array('email' => $email, 'facebook' => $facebook, 'twitter' => $twitter, 'instagram' => $instagram);

    if ($this->model_admin->updateData("kontak_kami", 1, "id", $data)) {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil ditambahkan</div>");
      redirect("admin/kelola_medsos", "redirect");
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-warning'>Data gagal ditambahkan</div>");
      redirect("admin/kelola_medsos", "redirect");
    }
  }

  public function kelola_komoditas($kelompok = null, $id_sektor = null, $komoditas = null, $id_kelompok = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    if ($kelompok == null && $id_sektor == null && $komoditas == null && $id_kelompok == null) {
      $data['sektor'] = $this->model_user->getAllData("komoditas_sektor");
      $this->loadView('dashboard_view/admin/kelola_komoditas', $data);
    } else if ($kelompok != null && $id_sektor != null && $komoditas == null && $id_kelompok == null) {
      $data['id_sektor'] = $id_sektor;
      $data['kelompok'] = $this->model_user->getKelompok($id_sektor);
      $this->loadView('dashboard_view/admin/kelola_kelompok', $data);
    } else if ($kelompok != null && $id_sektor != null && $komoditas != null && $id_kelompok != null) {
      $data['id_kelompok'] = $id_kelompok;
      $data['id_sektor'] = $id_sektor;
      $data['komoditas'] = $this->model_user->getMasterKomoditas($id_kelompok, $id_sektor);
      $this->loadView('dashboard_view/admin/kelola_master_komoditas', $data);
    }
  }
  public function tambah_sektor($menu = null, $id_sektor = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['jenis'] = $menu;
    if ($menu == 'tambah') {
      $data['menu'] = 'Tambah';
      $this->loadView('dashboard_view/admin/tambah_sektor', $data);
    } else if ($menu == 'ubah') {
      $data['menu'] = 'Ubah';
      $dat = $this->model_user->getdatawhere("komoditas_sektor", 'id_sektor', $id_sektor);
      foreach ($dat as $data['sektor']);
      $this->loadView('dashboard_view/admin/tambah_sektor', $data);
    }
  }
  public function tambah_kelompok($menu = null, $id_sektor = null, $id_kelompok = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['jenis'] = $menu;
    $data['id_sektor'] = $id_sektor;
    if ($menu == 'tambah') {
      $data['menu'] = 'Tambah';
      $this->loadView('dashboard_view/admin/tambah_kelompok', $data);
    } else if ($menu == 'ubah') {
      $data['menu'] = 'Ubah';
      $data['id_sektor'] = $id_sektor;
      $dat = $this->model_user->getdatawhere("komoditas_kelompok", 'id_kelompok', $id_kelompok);
      foreach ($dat as $data['sektor']);
      $this->loadView('dashboard_view/admin/tambah_kelompok', $data);
    }
  }
  public function tambah_master_komoditas($menu = null, $id_kelompok = null, $id_sektor = null, $kode_komoditas = null)
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['jenis'] = $menu;
    $data['id_kelompok'] = $id_kelompok;
    $data['id_sektor'] = $id_sektor;
    if ($menu == 'tambah') {
      $data['menu'] = 'Tambah';
      $this->loadView('dashboard_view/admin/tambah_master_komoditas', $data);
    } else if ($menu == 'ubah') {
      $data['menu'] = 'Ubah';
      $data['id_sektor'] = $id_sektor;
      $dat = $this->model_user->getdatawhere("komoditas_kelompok", 'id_kelompok', $id_kelompok);
      foreach ($dat as $data['sektor']);
      $this->loadView('dashboard_view/admin/tambah_kelompok', $data);
    }
  }

  public function simpan_sektor()
  {
    $id_sektor = $this->input->post('id_sektor');
    $nama_sektor_komoditas = $this->input->post('nama_sektor_komoditas');
    $i = 0;
    foreach ($id_sektor as $id) {
      $arr = array('id_sektor' => $id_sektor[$i], 'nama_sektor_komoditas' => $nama_sektor_komoditas[$i]);
      $this->model_user->insertData('komoditas_sektor', $arr);
      $i++;
    }
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil ditambahkan</div>");
    redirect('admin/kelola_komoditas');
  }
  public function simpan_kelompok()
  {
    $id_kelompok = $this->input->post('id_kelompok');
    $nama_kelompok = $this->input->post('nama_kelompok');
    $nama_latin_kelompok = $this->input->post('nama_latin_kelompok');
    $id_sektor = $this->input->post('id_sektor');
    $i = 0;
    foreach ($id_kelompok as $id) {
      $arr = array('id_kelompok' => $id_kelompok[$i], 'nama_kelompok' => $nama_kelompok[$i], 'nama_latin_kelompok' => $nama_latin_kelompok[$i], 'id_sektor' => $id_sektor);
      $this->model_user->insertData('komoditas_kelompok', $arr);
      $i++;
    }
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil ditambahkan</div>");
    redirect('admin/kelola_komoditas/kelompok/' . $id_sektor);
  }
  public function simpan_master()
  {
    $kode_komoditas = $this->input->post('kode_komoditas');
    $deskripsi = $this->input->post('deskripsi');
    $nama_latin = $this->input->post('nama_latin');
    $id_kelompok = $this->input->post('id_kelompok');
    $id_sektor = $this->input->post('id_sektor');
    $i = 0;
    foreach ($kode_komoditas as $id) {
      $arr = array('kode_komoditas' => $kode_komoditas[$i], 'deskripsi' => $deskripsi[$i], 'id_sektor' => $id_sektor, 'nama_latin' => $nama_latin[$i], 'id_kelompok' => $id_kelompok);
      $this->model_user->insertData('master_komoditas', $arr);
      $i++;
    }
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil ditambahkan</div>");
    redirect('admin/kelola_komoditas/kelompok/' . $id_sektor . '/komoditas/' . $id_kelompok);
  }

  public function hapus_komoditas($menu)
  {
    $id_sektor = $this->input->post('id_sektor');
    $id_kelompok = $this->input->post('id_kelompok');
    $kode_komoditas = $this->input->post('kode_komoditas');
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");

    if ($menu == 'sektor') {
      $this->model_user->deleteData('komoditas_sektor', $id_sektor, 'id_sektor');
      $this->model_user->deleteData('komoditas_kelompok', $id_sektor, 'id_sektor');
      $this->model_user->deleteData('master_komoditas', $id_sektor, 'id_sektor');
      redirect('admin/kelola_komoditas');
    } else if ($menu == 'kelompok') {
      $where1 = 'id_kelompok = ' . $id_kelompok;
      $where2 = "id_sektor = '" . $id_sektor . "'";
      $this->model_user->deleteDataParam('komoditas_kelompok', $where1, $where2);
      $this->model_user->deleteDataParam('master_komoditas', $where1, $where2);
      redirect('admin/kelola_komoditas/kelompok/' . $id_sektor);
    } else if ($menu == 'master') {
      $where1 = 'id_kelompok = ' . $id_kelompok;
      $where2 = "id_sektor = '" . $id_sektor . "'";
      $where3 = "kode_komoditas = '" . $kode_komoditas . "'";
      $this->model_user->deleteDataParam('master_komoditas', $where1, $where2, $where3);
      redirect('admin/kelola_komoditas/kelompok/' . $id_sektor . '/komoditas/' . $id_kelompok);
    }
  }
  public function kelola_kuesioner()
  {
    $data['list_periode'] = $this->model_admin->getAllData("master_periode", "id", "desc");
    $data['periode'] = $this->input->get("periode");

    if ($data['periode'] == null) {
      foreach ($data['list_periode'] as $periode) {
        if ($periode['isaktif'] == 1) {
          $data['periode'] = $periode['id'];
        }
      }
    }

    $data['list_parameter'] = $this->model_admin->getAllData("master_parameter");
    $data['jenis'] = array(array("key" => "ujimutu", "value" => "Uji Mutu"));
    $data['tipe'] = array("Skor", "Yes/No");
    $data['aspek'] = array("Mudah", "Cepat", "Berkualitas", "Kompeten", "Sopan", "Lengkap");;
    $data['kuesioner'] = $this->model_admin->getKuesioner($data['periode']);
    $this->loadView('dashboard_view/admin/kelola_kuesioner', $data);
  }

  public function hapus_kuesioner()
  {
    $id = $this->input->post('id');
    $param["deleted"] = 1;
    $this->model_admin->updateData("master_kuesioner", $id, "id", $param);
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");
    redirect('dashboard/kelola_kuesioner');
  }

  public function proses_kuesioner()
  {
    $input = $this->input;
    $id = $input->post('id');

    $parameter = $this->model_admin->getDataWhere("master_parameter","id",$input->post("id_parameter"))[0];

    $data = array(
      "pertanyaan" => $input->post("pertanyaan"), "jenis" => $input->post("jenis"), "tipe" => $input->post("tipe"),
      "nama_parameter" => $parameter["nama_parameter"], "hitungan" => $parameter["isaktif"] , "id_periode" => $input->post("id_periode")
    );

    if ($input->post('action') == "Tambah") {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil ditambah</div>");
      $this->model_admin->insertData("master_kuesioner", $data);
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil diubah</div>");
      $this->model_admin->updateData("master_kuesioner", $id, "id", $data);
    }
    if ($input->post("id_periode") != null) {
      redirect('dashboard/kelola_kuesioner?periode=' . $input->post("id_periode"));
    } else {
      redirect('dashboard/kelola_kuesioner');
    }
  }

  function hasil_survey()
  {
    $data['list_periode'] = $this->model_admin->getAllData("master_periode", "id", "desc");
    $data['periode'] = $this->input->get("periode");

    if ($data['periode'] == null) {
      foreach ($data['list_periode'] as $periode) {
        if ($periode['isaktif'] == 1) {
          $data['periode'] = $periode['id'];
        }
      }
    }

    $data['report_survey'] = $this->model_admin->getReportSurvey($data['periode']);
    $data['hasil_survey'] = $this->model_admin->getSurvey($data['periode']);

    $this->loadView('dashboard_view/admin/hasil_survey', $data);
  }

  function hasil_survey_detail()
  {
    $id = $this->input->get("id") ?? 0;
    if ($id == 0) {
      redirect('dashboard/kelola_kuesioner');
    }

    $data['data_survey'] = $this->model_admin->getDataWhere("survey_data", "id", $id)[0];
    $data['detail_survey'] = $this->model_admin->getDetailSurvey($id);

    if ($data['data_survey']["kode_layanan"] == "prima_2" || $data['data_survey']["kode_layanan"] == "prima_3")
      $jenis = "okkpd";
    else
      $jenis = "ujimutu";

    $data["properties"] = array(
      "jenis_kelamin" => data_jenis_kelamin(),
      "pendidikan" => data_pendidikan(), "pekerjaan" => data_pekerjaan(), "pelayanan" => data_pelayanan($jenis)
    );

    $data['jenis'] = $jenis;
    $data["identitas"] = data_identitas_survey($jenis);

    $this->loadView('dashboard_view/admin/hasil_survey_detail', $data);
  }

  function kelola_periode()
  {
    $data['kuesioner'] = $this->model_admin->getAllData("master_periode", "id", "desc");
    $this->loadView('dashboard_view/admin/kelola_periode', $data);
  }

  public function proses_periode()
  {
    $input = $this->input;
    $id = $input->post('id');
    $data = array("nama_periode" => $input->post("nama_periode"), "isaktif" => $input->post("isaktif"));
    if ($input->post("isaktif") == 1) {
      $this->model_admin->updateData("master_periode", "1", "isaktif", array("isaktif" => 0));
    }
    if ($input->post('action') == "Tambah" || $input->post('action') == "Salin") {
      $new_periode = $this->model_admin->insertGetID("master_periode", $data);

      if ($input->post('action') == "Salin") {
        $this->model_admin->duplicateSurvey($input->post("old_periode"), $new_periode);
      }

      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil ditambah</div>");
    } else {
      $this->model_admin->updateData("master_periode", $id, "id", $data);
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil diubah</div>");
    }
    redirect('dashboard/kelola_periode');
  }

  public function aktifkan_periode()
  {
    $input = $this->input;
    $data = array("id" => $input->post("id"), "isaktif" => 1);
    $this->model_admin->updateData("master_periode", "1", "isaktif", array("isaktif" => 0));
    $this->model_admin->updateData("master_periode", $input->post("id"), "id", $data);
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil diubah</div>");
    redirect('dashboard/kelola_periode');
  }

  public function hapus_periode()
  {
    $id = $this->input->post('id');
    $this->model_user->deleteData('master_periode', $id, 'id');
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");
    redirect('dashboard/kelola_periode');
  }

  function kelola_parameter()
  {
    $data['kuesioner'] = $this->model_admin->getAllData("master_parameter");
    $this->loadView('dashboard_view/admin/kelola_parameter', $data);
  }

  public function proses_parameter()
  {
    $input = $this->input;
    $id = $input->post('id');
    $data = array("nama_parameter" => $input->post("nama_parameter"), "isaktif" => $input->post("isaktif"));

    if ($input->post('action') == "Tambah") {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil ditambah</div>");
      $this->model_admin->insertData("master_parameter", $data);
    } else {
      $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil diubah</div>");
      $this->model_admin->updateData("master_parameter", $id, "id", $data);
    }
    redirect('dashboard/kelola_parameter');
  }

  public function hapus_parameter()
  {
    $id = $this->input->post('id');
    $this->model_user->deleteData('master_parameter', $id, 'id');
    $this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");
    redirect('dashboard/kelola_parameter');
  }
}
