<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->helper(array('form', 'url'));
    $this->load->model('model_user');
    $this->load->model('model_admin');
    $this->load->model('model_dokumen');



    $data['datalogin'] = $this->session->userdata("dataLogin");
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $this->bulan_eng = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  }


  public function index()
  {
    $this->load->view('welcome_message');
  }
  public function dokumen_produk($id_layanan)
  {
    $surat = $this->model_dokumen->getDataDokumen($id_layanan);
    foreach ($surat as $surat);
    return $this->getNamaFolder($id_layanan) . $surat['file'];
    // $this->load->view('dashboard_view/dokumen/lihat_dokumen',$data);
  }
  public function surat_tugas($id_layanan)
  {
    $surat = $this->model_dokumen->getSuratTugas($id_layanan);
    foreach ($surat as $surat);
    $data['tipe'] = $surat['tipe_surat_tugas'];
    $data['dokumen'] = $surat['surat_tugas'];
    $data['nama'] = 'Surat Tugas';
    $this->load->view('dashboard_view/cetak/surat_tugas', $data);
  }

  public function sertifikat($jenis, $id = null)
  {
    $dat = array('tanggal_unggah' => date("Y-m-d"));
    $this->model_admin->updateData('detail_komoditas', $id, 'id_detail', $dat);

    //$data['kadin'] = $this->model_admin->getAllData("identitas_kepala_dinas");
    $data['bulan'] = $this->bulan;
    $data['bulan_eng'] = $this->bulan_eng;
    $data['kadin'] = $this->model_admin->getDataWhere("identitas_kepala_dinas", "status", "1");
    $data['sertifikat'] = $this->model_admin->getsertifikat($id);
    if ($jenis == 'prima_3' || $jenis == 'prima_2') {
      if ($jenis == 'prima_3') {
        $this->load->view('dashboard_view/cetak/prima3', $data);
      } else if ($jenis == 'prima_2') {
        $this->load->view('dashboard_view/cetak/prima2', $data);
      } 
    } else if ($jenis == 'psat') {
      $data['sertifikat'] = $this->model_admin->getsertifikatPSAT($id);
      $this->load->view('dashboard_view/cetak/psat', $data);
    } else if ($jenis == 'hc') {
      $data['sertifikat'] = $this->model_admin->getsertifikatHC($id);

      $this->load->view('dashboard_view/cetak/hc', $data);
    }
  }
  public function cetak_sertifikat($jenis, $id)
  {
    $produk = "";
    if ($jenis == 'psat') {
      $dokumen = $this->model_admin->getsertifikatPSAT($id, true);
    } else if ($jenis == 'sppb') {
      $dokumen = $this->model_admin->getsertifikatSPPB($id, true);
    } else if ($jenis == 'kemas') {
      $dokumen = $this->model_admin->getsertifikatKemas($id, true);
    } else if ($jenis == 'hc') {
      $dokumen = $this->model_admin->getsertifikatHC($id, true);
    } else if ($jenis == 'ujimutu') {
      $dokumen = $this->model_admin->getsertifikatUjiMutu($id, true);
    } else {
      $dokumen = $this->model_admin->getsertifikat($id, true);
    }
    foreach ($dokumen as $dokumen);
    if ($jenis == 'psat') {
      $produk = $dokumen['nama_produk_pangan'];
    } else if ($jenis == 'hc') {
      $produk = $dokumen['nama_produk'];
    } else {
      if (isset($dokumen['nama_komoditas'])) {
        $produk = $dokumen['nama_komoditas'];
      } else {
        $produk = "";
      }
    }
    $data['tipe'] = $dokumen['tipe_sertifikat_produk'];
    if($jenis == 'ujimutu'){
      $data['nama'] = 'LHU_' . str_replace(' ', '_', $dokumen['kodelhu']);
    
    }else{
      $data['nama'] = 'Sertifikat_' . str_replace(' ', '_', $dokumen['nama_usaha']) . '_' . $dokumen['kode_layanan'] . '_' . str_replace(' ', '_', $produk);
          
    }
    $data['dokumen'] = $dokumen['sertifikat_produk'];
    $this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
  }

  public function form_kesanggupan($kode_layanan, $id_layanan)
  {
    $form = $this->model_admin->getDataIdentitas($kode_layanan, $id_layanan);
    $data['komoditas'] = $this->model_admin->getDataDetailKomoditas($id_layanan);
    $data['kode_layanan'] = "";
    if ($kode_layanan == 'prima_3') {
      $data['kode_layanan'] = "Prima 3";
    } else if ($kode_layanan == 'prima_2') {
      $data['kode_layanan'] = "Prima 2";
    } else if ($kode_layanan == 'kemas') {
      $data['kode_layanan'] = "Rumah Kemas";
    } else if ($kode_layanan == 'psat') {
      $data['komoditas'] = $this->model_user->getProdukPsat($id_layanan);

      $data['kode_layanan'] = "PSAT";
    } else if ($kode_layanan == 'hc') {
      $data['komoditas'] = $this->model_user->getProdukHC($id_layanan);

      $data['kode_layanan'] = "Health Certificate";
    }
    foreach ($form as $data['form']);

    $this->load->view('dashboard_view/cetak/form_kesanggupan', $data);
  }

  public function form_prima3($id)
  {
    $prima3 = $this->model_admin->getDataIdentitas($id);
    foreach ($prima3 as $data['prima3']);
    $this->load->view('dashboard_view/cetak/form_kesanggupan/prima3', $data);
  }

  public function prima2()
  {
    $data['kadin'] = $this->model_admin->getAllData("identitas_kepala_dinas");
    $this->load->view('dashboard_view/cetak/prima2', $data);
  }

  public function form_prima2($id)
  {
    $prima2 = $this->model_admin->getDataIdentitas($id);
    foreach ($prima2 as $data['prima2']);
    $this->load->view('dashboard_view/cetak/form_kesanggupan/prima2', $data);
  }

  public function psat()
  {
    $data['kadin'] = $this->model_admin->getAllData("identitas_kepala_dinas");
    $this->load->view('dashboard_view/cetak/psat', $data);
  }

  public function form_psat($id)
  {
    $psat = $this->model_admin->getDataIdentitas($id);
    foreach ($psat as $data['psat']);
    $this->load->view('dashboard_view/cetak/form_kesanggupan/psat', $data);
  }

  public function rumah_kemas()
  {
    $data['kadin'] = $this->model_admin->getAllData("identitas_kepala_dinas");
    $this->load->view('dashboard_view/cetak/rumah_kemas', $data);
  }

  public function form_rumah_kemas($id)
  {
    $rumah_kemas = $this->model_admin->getDataIdentitas($id);
    foreach ($rumah_kemas as $data['rumah_kemas']);
    $this->load->view('dashboard_view/cetak/form_kesanggupan/rumah_kemas', $data);
  }


  public function hc()
  {
    $data['kadin'] = $this->model_admin->getAllData("identitas_kepala_dinas");
    $this->load->view('dashboard_view/cetak/hc', $data);
  }

  public function form_hc($id)
  {
    $hc = $this->model_admin->getDataIdentitas($id);
    foreach ($hc as $data['hc']);
    $this->load->view('dashboard_view/cetak/form_kesanggupan/hc', $data);
  }

  public function unduh_dokumen($jenis, $id)
  {
    $dokumen = $this->model_user->getDetailDokumenInspeksi($id);
    foreach ($dokumen as $dokumen);
    $data['tipe'] = $dokumen['tipe_dokumen'];
    $data['nama'] = $dokumen['nama_dokumen'];
    $data['dokumen'] = $dokumen['dokumen'];
    $this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
  }

  public function unduh_produk_hukum($id_produk_hukum)
  {
    $dokumen = $this->model_user->getDataWhere('produk_hukum', 'id', $id_produk_hukum);
    foreach ($dokumen as $dokumen);
    $data['tipe'] = $dokumen['tipe_dokumen'];
    $data['nama'] = $dokumen['nama_produk_hukum'];
    $data['dokumen'] = $dokumen['produk_hukum'];
    $this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
  }

  public function unduh_panduan()
  {
    $panduan = $this->model_user->getDataPanduan();
    foreach ($panduan as $dokumen);
    $data['tipe'] = $dokumen['type'];
    $data['nama'] = $dokumen['nama_panduan'];
    $data['dokumen'] = $dokumen['panduan'];
    $this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
  }

  public function lihat_dokumen_inspeksi($id_dokumen)
  {
    $dokumen = $this->model_user->getdatawhere('master_dokumen_inspeksi', 'id_dokumen', $id_dokumen);
    foreach ($dokumen as $dokumen);
    $data['tipe'] = $dokumen['tipe_dokumen'];
    $data['nama'] = $dokumen['nama_dokumen'];
    $data['dokumen'] = $dokumen['dokumen'];
    $this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
  }

  public function lihat_hasil_lab($id_dokumen)
  {
    $dokumen = $this->model_user->getdatawhere('layanan', 'uid', $id_dokumen);
    foreach ($dokumen as $dokumen);
    $data['tipe'] = $dokumen['tipe_surat_pengantar'];
    $data['nama'] = 'Laporan Hasil Uji';
    $data['dokumen'] = $dokumen['surat_pengantar_lab'];
    $this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
  }

  public function berkas_pendaftaran()
  {
    $id = $_GET['q'];
    $data['berkas'] = $this->model_dokumen->getberkas($id);
    $this->load->view('dashboard_view/dokumen/berkas_pendaftaran', $data);
  }

  
  public function berkas_pendaftaran_ujimutu()
  {
    $id = $_GET['q']; 
    $data['berkas'] = $this->model_dokumen->getberkasUjimutu($id);
    $this->load->view('dashboard_view/dokumen/berkas_pendaftaran_ujimutu', $data);
  }
  

  public function berkas_diterima()
  {
    $this->load->view('dashboard_view/dokumen/berkas_diterima');
  }

  public function berkas_ditolak()
  {
    $this->load->view('dashboard_view/dokumen/berkas_ditolak');
  }

  public function lihat_hasil($jenis, $id)
  {
    if ($this->saya() == "m_teknis" || $this->saya() == "komtek") {
      $data['datalogin'] = $this->session->userdata("dataLogin");
      if ($jenis == "inspeksi") {
        $data['data_form'] = $this->model_user->getDataForm($id);
        $data['dokumen'] = $this->model_user->getDokumenHasilInspeksi($id, $jenis);
        $dokumen = $this->model_user->getDataWhere("layanan", "uid", $id);
        foreach ($dokumen as $dokumen);
        $data['status'] = $dokumen['status_hasil_uji'];

        $data['uid'] = $id;
        $this->loadView('dashboard_view/pages/m_teknis/hasil_inspeksi', $data);
      } else if ($jenis == "pelaksana") {
        $data['gambar'] = $this->model_user->getGambarHasilInspeksi($id);
        $this->loadView('dashboard_view/pages/m_teknis/hasil_pelaksana', $data);
      } else if ($jenis == "ppc") {
        $data['data_form'] = $this->model_user->getDataForm($id);
        $data['dokumen'] = $this->model_user->getDokumenHasilInspeksi($id, $jenis);
        $dokumen = $this->model_user->getDataWhere("layanan", "uid", $id);
        foreach ($dokumen as $dokumen);
        $data['status'] = $dokumen['status_hasil_uji'];

        $data['uid'] = $id;
        $this->loadView('dashboard_view/pages/m_teknis/hasil_ppc', $data);
      } else if ($jenis == "uji_sampel") {
        $dokumen = $this->model_user->getDataWhere("layanan", "uid", $id);
        foreach ($dokumen as $dokumen);
        $data['tipe'] = $dokumen['tipe_surat_pengantar'];
        $data['nama'] = "Surat Pengantar Lab";
        $data['dokumen'] = $dokumen['surat_pengantar_lab'];
        $this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
      }
    } else {
      echo "<h3>Forbidden Access</h3>Anda tidak dapat mengakses halaman ini";
    }
  }
}
