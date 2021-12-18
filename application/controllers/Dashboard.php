<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('data_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('model_user');
		$this->load->model('model_admin');
		$this->load->model('model_dokumen');
		$this->load->model('model_ujimutu');
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->menu =  $this->model_user->getMenu($this->saya());
		$this->bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	}
	public function index()
	{
		if ($this->session->userdata("dataLogin") == null) {
			redirect("home/pendaftaran_online", "redirect");
		}
		$data['datalogin'] = $this->session->userdata("dataLogin");

		if ($this->saya() == "admin") {
			$data['keluhan_saran'] = $this->model_admin->getKontakKami();
			$this->loadView('dashboard_view/dashboard_view', $data);
		} else if ($this->saya() == "pelaku") {
			$idUsaha = $this->model_user->getIdUsaha($data['datalogin']['id_user']);
			$data['layanan'] = $this->model_user->getDataLayanan($idUsaha);
			$data['layananujimutu'] = $this->model_ujimutu->getDataLayananUjiMutu($idUsaha);
			$this->loadView('dashboard_view/main_dashboard', $data, $this->bulan);
		} else if ($this->saya() == "m_teknis") {
			$data['inspeksi'] = $this->model_user->getDataInspeksi();
			$inspeksi = $this->model_user->getPenugasanInspeksi();
			$ppc = $this->model_user->getPenugasanPPC();
			$uji_sampel = $this->model_user->getDataUjiSampel();

			$data['penugasan_inspektor'] = 0;
			$data['penugasan_ppc'] = 0;
			$data['hasil_uji_lab'] = 0;
			$data['hasil_uji_mutu'] = 0;
			$data['permohonan_masuk'] = count($this->model_user->getDataInspeksi());
			$hasil_uji_mutu = $this->model_ujimutu->getDataUjiMutuValidLab();
			foreach ($inspeksi as $ins) {
				if ($ins['status_ppc'] == "0") {
					$data['penugasan_inspektor']++;
				}
			}
			foreach ($ppc as $ppc) {
				if ($ppc['status_komtek'] == "0") {
					$data['penugasan_ppc']++;
				}
			}
			foreach ($uji_sampel as $uji) {
				if ($uji['status_hasil_uji'] == "0") {
					$data['hasil_uji_lab']++;
				}
			}
			foreach ($hasil_uji_mutu as $uji) {
				$data['hasil_uji_mutu']++;
			}


			$this->loadView('dashboard_view/pages/m_teknis/dashboard_mt', $data);
		} else if ($this->saya() == "analislab") {
			$uji_sampel = $this->model_ujimutu->getDataUjiMutuSample();
			$hasil_uji_lab = $this->model_ujimutu->getDataUjiMutuBlmValid();

			$data['hasil_sample'] = 0;
			$data['hasil_uji_lab'] = 0;
			$data['permohonan_masuk'] = count($this->model_user->getDataInspeksi());
			foreach ($uji_sampel as $uji) {
				$data['hasil_sample']++;
			}
			foreach ($hasil_uji_lab as $uji) {
				$data['hasil_uji_lab']++;
			}

			$this->loadView('dashboard_view/pages/analislab/dashboard_mt', $data);
		} else if ($this->saya() == "u_layanan") {
			$uji_sampel = $this->model_ujimutu->getDataUjiMutuSample();
			$siap_lhu = $this->model_ujimutu->getDataUjiMutuLHU();

			$data['hasil_sample'] = 0;
			$data['siap_lhu'] = 0;
			$data['permohonan_masuk'] = count($this->model_user->getDataInspeksi());
			foreach ($uji_sampel as $uji) {
				$data['hasil_sample']++;
			}
			foreach ($siap_lhu as $uji) {
				$data['siap_lhu']++;
			}

			$this->loadView('dashboard_view/pages/u_layanan/dashboard_mt', $data);
		} else if ($this->saya() == "komtek") {
			$data['rekomendasi'] = $this->model_user->getDataRekomendasi();
			$this->loadView('dashboard_view/pages/komtek/dashboard_komtek', $data);
		} else if ($this->saya() == "m_adm") {
			$data['rekomendasi'] = $this->model_user->getDataRekomendasi();
			$data['sertifikat'] = $this->model_user->getJumlahSertifikat("all");
			$data['total'] = $this->model_user->getTotalSertifikat();


			$this->loadView('dashboard_view/pages/m_admin/dashboard_m_admin', $data);
		} else {
			$this->loadView('dashboard_view/template/header', $data, $this->menu);
			$this->loadView('dashboard_view/template/top_nav', $this->menu);
			$this->loadView('dashboard_view/template/side_nav', $this->menu);
			$this->loadView('dashboard_view/template/footer', $this->menu);
		}
	}

	public function saya()
	{
		$datalogin = $this->session->userdata("dataLogin");
		return $datalogin['kode_role'];
	}

	public function main()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->loadView('dashboard_view/fragment/main_fragment', $data);
	}

	public function profile($id_user)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		if ($id_user != $data['datalogin']['id_user']) {
			echo '<h2>403 Forbidden</h2><br/>Anda tidak boleh mengakses halaman ini';
		} else {
			$data['profile'] = $this->model_user->getProfile($id_user);
			$this->loadView('dashboard_view/kelola_profile', $data);
		}
	}

	public function ubah_profile()
	{
		$nama = $this->input->post('nama_lengkap');
		$pass = $this->input->post('pass_baru');
		$id_user = $this->input->post('id_user');
		$id_user = $this->input->post('id_user');
		$arr = array('nama_lengkap' => $nama);
		$id_user = $this->session->userdata("dataLogin")['id_user'];

		$max = 1000000;
		$foto_profil;
		$foto_profil_temp = $this->uploads($_FILES, 'foto_profil');

		if ($_FILES['foto_profil']['size'] > $max) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
			redirect("dashboard/kelola_profil", "redirect");
		}

		if ($foto_profil_temp != null) {
			$foto_profil = file_get_contents($foto_profil_temp['full_path']);
			$arr["foto_profil"] = $foto_profil;
		}

		if ($pass != '') {
			$pass = sha1('Okkpd2018!' . $pass);
			$arr['password'] = $pass;
		}

		if ($this->model_user->updateData('user', $id_user, 'id_user', $arr)) {
			$this->session->set_flashdata("statCI_Controllerus", "<div class='alert alert-success'>Profile sudah diubah</div>");
			redirect("dashboard/profile/" . $id_user, 'redirect');
		} else {

			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal mengubah foto</div>");
			redirect("dashboard/profile/" . $id_user, 'redirect');
		}
	}

	public function daftar_usaha()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['kota'] = $this->model_user->getDataKota();
		$data['menu'] = 'tambah';
		$this->loadView('dashboard_view/fragment/daftar_usaha_fragment', $data);
	}
	public function daftarkan_aktor()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['role'] = $this->model_user->getMasterRole();
		$data['kota'] = $this->model_user->getDataKota();
		$this->loadView('dashboard_view/daftarkan_aktor', $data);
	}

	public function registrasi_user()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->loadView('dashboard_view/fragment/daftar_usaha_fragment', $data);
	}

	function getDataKecamatan()
	{
		$kode_kota = $this->input->post("kode_kota");
		$kec = $this->model_user->getDataWhere("kecamatan", "kode_kota", $kode_kota);
		echo "<option value='X;X'>--Pilih Kecamatan--</option>";

		foreach ($kec as $kec) {
			echo "<option value='" . $kec['kode_kec'] . ';' . $kec['nama_kec'] . "'>" . $kec['nama_kec'] . "</option>";
		}
	}

	function getInstansi()
	{
		$kode_kota = $this->input->post("kode_kota");
		$kota = $this->model_user->getDataWhere("kota", "kode_kota", $kode_kota);
		foreach ($kota as $kota);
		echo $kota['nama_instansi'] . '<>' . $kota['nama_ketua'];
	}

	function getDataKelurahan()
	{
		$kode_kec = $this->input->post("kode_kec");
		$kel = $this->model_user->getDataWhere("kelurahan", "kode_kec", $kode_kec);
		echo "<option value='X;X'>--Pilih Kelurahan--</option>";

		foreach ($kel as $kel) {
			echo "<option value='" . $kel['kode_kel'] . ';' . $kel['nama_kel'] . "'>" . $kel['nama_kel'] . "</option>";
		}
	}

	function getDataJenisDetail()
	{
		$kode = $this->input->post("kode");
		$kel = $this->model_user->getDataWhere("jenis_komoditas_detil", "idjenis", $kode);
		/*echo "<option value='X;X'>--Pilih Detail Jenis--</option>";

		foreach ($kel as $kel) {
			echo "<option value='".$kel['idjenisdetail'].';'.$kel['namadetail']."'>".$kel['namadetail']."</option>";
		}*/
		$i = 1;
		foreach ($kel as $kel) {
			if ($i == 1) {
				$checked = " checked ";
			} else {
				$checked = "";
			}
			echo "<input $checked style='opacity: 100;' class='jenisdetail' type='radio' id='jenisdetail-" . $i . "' name='jenisdetail' value='" . $kel['idjenisdetail'] . ';' . $kel['namadetail'] . "'>";
			echo "<label style='display:inline' for='jenisdetail-" . $i . "'>" . $kel['namadetail'] . "</label><br/>";

			$i++;
		}
	}
	public function sign_in()
	{
		if ($this->session->userdata("dataLogin") != null) {
			redirect("dashboard", "redirect");
		}
		$data['role'] = $this->model_user->getAllData("master_role");
		$this->load->view('dashboard_view/template/header');
		$this->load->view('dashboard_view/sign-in', $data);
		$this->load->view('dashboard_view/template/footer');
	}



	public function insert_identitas_usaha($menu = null)
	{
		if ($menu == null) {
			redirect('dashboard/identitas_usaha');
		}
		$i = $this->input;
		$nama_pemohon = $i->post("nama_pemohon");
		$jabatan_pemohon = $i->post("jabatan_pemohon");
		$no_ktp_pemohon = $i->post("no_ktp_pemohon");
		$foto_ktp = null;
		$no_npwp = $i->post("no_npwp");
		$foto_npwp = null; //foto
		$nama_usaha = $i->post("nama_usaha");
		$alamat_usaha = $i->post("alamat_usaha");
		$rt = $i->post("rt");
		$rw = $i->post("rw");
		$kelurahan = explode(";", $i->post("kelurahan"));
		$kecamatan = explode(";", $i->post("kecamatan"));
		$kota = explode(";", $i->post("kota"));
		$no_telp = $i->post("no_telp");
		$no_hp_pemohon = $i->post("no_hp_pemohon");
		$kop_surat = null; //foto
		$unit_kerja = $i->post("nama_unit_kerja");
		$nama_pimpinan = $i->post("nama_pimpinan_unit_kerja");
		$jenis_usaha = $i->post("jenis_usaha");
		$max = 1000000;

		$foto_ktp_temp = $this->uploads($_FILES, 'foto_ktp');
		$foto_npwp_temp = $this->uploads($_FILES, 'foto_npwp');
		$kop_surat_temp = $this->uploads($_FILES, 'kop_surat');

		if ($_FILES['foto_ktp']['size'] > $max || $_FILES['foto_npwp']['size'] > $max || $_FILES['kop_surat']['size'] > $max) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>File terlalu besar</div>");
			redirect("dashboard/identitas_usaha", "redirect");
		}


		$id_user = $this->session->userdata("dataLogin")['id_user'];

		$arr = array(
			"no_ktp_pemohon" => $no_ktp_pemohon,
			"no_npwp" => $no_npwp,
			"alamat_usaha" => $alamat_usaha,
			"rt" => $rt,
			"rw" => $rw,
			"kelurahan" => $kelurahan[1],
			"kecamatan" => $kecamatan[1],
			"kota" => $kota[1],
			"no_telp" => $no_telp,
			"no_hp_pemohon" => $no_hp_pemohon,
			"unit_kerja" => $unit_kerja,
			"nama_pimpinan" => $nama_pimpinan,
		);

		if ($menu == "tambah") {
			$arr["nama_pemohon"] = $nama_pemohon;
			$arr["jabatan_pemohon"] = $jabatan_pemohon;
			$arr["nama_usaha"] = $nama_usaha;
			$arr["jenis_usaha"] =  $jenis_usaha;
			$arr["id_user"] = $id_user;
		}

		if ($foto_ktp_temp != null) {
			$foto_ktp = file_get_contents($foto_ktp_temp['full_path']);
			$arr["foto_ktp"] = $foto_ktp;
		}
		if ($foto_npwp_temp != null) {
			$foto_npwp = file_get_contents($foto_npwp_temp['full_path']);
			$arr["foto_npwp"] = $foto_npwp;
		}
		if ($kop_surat_temp != null) {
			$kop_surat = file_get_contents($kop_surat_temp['full_path']);
			$arr["kop_surat"] = $kop_surat;
		}

		$hasil;
		if ($menu == 'tambah') {
			$hasil = $this->model_user->insertData("identitas_usaha", $arr);
		} else if ($menu == 'ubah') {
			$id_identitas_usaha = $this->input->post('id_identitas_usaha');
			$hasil = $this->model_user->updateData("identitas_usaha", $id_identitas_usaha, 'id_identitas_usaha', $arr);
		}

		if ($hasil) {
			$ses = $this->session->userdata("dataLogin");
			$ses['punya_usaha'] = 1;
			$this->session->set_userdata("dataLogin", $ses);
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");

			if ($hasil) {
				$ses = $this->session->userdata("dataLogin");
				$ses['punya_usaha'] = 1;
				$this->session->set_userdata("dataLogin", $ses);
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
				redirect("dashboard/identitas_usaha", "redirect");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
				redirect("dashboard/identitas_usaha", "redirect");
			}
		}
	}

	public function insert_aktor()
	{
		$i = $this->input;
		$nama_lengkap = $i->post("nama_lengkap");
		$username = $i->post("username");
		$alamat_lengkap = $i->post("alamat_lengkap");
		$kode_kota = $i->post("kode_kota");
		$no_ktp = $i->post("no_ktp");
		// $foto_ktp = "";
		$kode_role = $i->post("kode_role");
		$status = 1;
		$password = sha1("Okkpd2018!12345678");

		$files = $_FILES;
		/*
			if($this->uploads($_FILES,'foto_ktp') == null){
				$this->session->set_flashdata("status","<div class='alert alert-warning'>Foto KTP Kosong</div>");
				var_dump($_FILES);
				redirect("dashboard");
			}else{
				$foto_ktp_temp = $this->uploads($_FILES,'foto_ktp');
				$foto_ktp = file_get_contents($foto_ktp_temp['full_path']);
			}
*/

		$arr = array(
			"id_user" => null,
			"nama_lengkap" => $nama_lengkap,
			"username" => $username,
			//"alamat_lengkap" => $alamat_lengkap,
			//"kode_kota"=>$kode_kota,
			//"no_ktp"=>$no_ktp,
			// "foto_ktp"=>$foto_ktp,
			"kode_role" => $kode_role,
			"status" => $status,
			"password" => $password
		);
		if ($this->model_user->insertData("user", $arr)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data user berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menambah data user</div>");
		}
		redirect("dashboard/daftarkan_aktor");
	}

	// Daftar
	public function pendaftaran($jenis = null)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['identitas_usaha'] = $this->model_user->getDataUsaha($data['datalogin']['id_user']);


		if ($jenis == null) {
			$this->loadView('dashboard_view/pendaftaran', $data);
		} else if ($jenis == "prima_3") {
			$data['komoditas_sektor'] = $this->model_user->getAllData('komoditas_sektor');
			$data['komoditas'] = $this->model_user->getKomoditas();
			$this->loadView('dashboard_view/daftar_prima_3', $data);
		} else if ($jenis == "prima_2") {
			$data['komoditas_sektor'] = $this->model_user->getAllData('komoditas_sektor');

			$data['komoditas'] = $this->model_user->getKomoditas();
			$this->loadView('dashboard_view/daftar_prima_2', $data);
		} else if ($jenis == "psat") {
			$data['komoditas'] = $this->model_user->getKomoditas();
			$data['kemasan'] = $this->model_user->getAllData("master_kemasan");
			$data['satuan'] = $this->model_user->getAllData("master_satuan");
			$this->loadView('dashboard_view/pages/pelaku/daftar_psat', $data);
		} else if ($jenis == "rumah_kemas") {
			$data['komoditas_sektor'] = $this->model_user->getAllData('komoditas_sektor');
			$data['komoditas'] = $this->model_user->getKomoditas();
			$this->loadView('dashboard_view/pages/pelaku/daftar_rumah_kemas', $data);
		} else if ($jenis == "health_care") {
			$data['komoditas'] = $this->model_user->getKomoditas();
			$this->loadView('dashboard_view/pages/pelaku/daftar_hc', $data);
		} else if ($jenis == "hygiene_sanitation") {
			$data['komoditas'] = $this->model_user->getKomoditas();
			$this->loadView('dashboard_view/pages/pelaku/daftar_hs', $data);
		} else if ($jenis == "ujimutu") {
			$data['jenis'] = $this->model_user->getJenisKomoditas();
			$data['kemasan'] = $this->model_user->getAllData("master_kemasan");
			$data['satuan'] = $this->model_user->getAllData("master_satuan");
			$this->loadView('dashboard_view/pages/pelaku/daftar_ujimutu', $data);
		}
	}

	public function getKomoditasKelompok()
	{
		$id_sektor = $this->input->post("id_sektor");
		$data = $this->model_user->getKelompok($id_sektor);
		echo '<option value="null" >-- Pilih Kelompok --</option>';
		foreach ($data as $kelompok) {
			echo '<option value="' . $kelompok['id_kelompok'] . '" >' . $kelompok['nama_kelompok'] . '</option>';
		}
	}
	public function getMasterKomoditas()
	{
		$id_kelompok = $this->input->post("id_kelompok");
		$id_sektor = $this->input->post("id_sektor");
		$data = $this->model_user->getMasterKomoditas($id_kelompok, $id_sektor);
		echo '<option value="null" >-- Pilih Jenis Komoditas --</option>';
		foreach ($data as $komoditas) {
			echo '<option value="' . $komoditas['kode_komoditas'] . ';' . $komoditas['deskripsi'] . ';' . $komoditas['nama_latin'] . '" >' . $komoditas['deskripsi'] . '</option>';
		}
	}

	public function dokumen($jenis = null, $id = 0)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$identitas = $this->model_user->getDataUsaha($data['datalogin']['id_user']);
		$data['syarat_teknis'] = $this->model_user->getDetailSyaratTeknis($jenis);
		$data['id_layanan'] = $id;
		$data['daftar_dokumen'] = $this->model_user->getDetailDokumen($jenis);
		$data['identitas'] = $identitas;

		if ($jenis == "prima_3") {
			$this->loadView('dashboard_view/dokumen_prima3', $data);
		} else	if ($jenis == "prima_2") {
			$this->loadView('dashboard_view/dokumen_prima2', $data);
		} else	if ($jenis == "psat") {
			$this->loadView('dashboard_view/pages/pelaku/dokumen_psat', $data);
		} else	if ($jenis == "kemas") {
			$this->loadView('dashboard_view/pages/pelaku/dokumen_kemas', $data);
		} else	if ($jenis == "hs") {
			$this->loadView('dashboard_view/pages/pelaku/dokumen_hs', $data);
		} else	if ($jenis == "hc") {
			$this->loadView('dashboard_view/pages/pelaku/dokumen_hc', $data);
		}
	}
	public function insert($jenis = null)
	{
		$isSuccess = false;
		if ($jenis == null) {
		} else if ($jenis == "ujimutu") {
			$data['datalogin'] = $this->session->userdata("dataLogin");
			$i = $this->input;

			$nama_produk = $i->post("nama_produk");
			$nama_dagang = $i->post("nama_dagang");
			$id_kemasan = $i->post("id_kemasan");
			$id_jenis = $i->post("id_jenis");
			$id_kemasan = $i->post("id_kemasan");
			$id_detail = $i->post("id_detail");
			$netto = $i->post("netto");
			$id_satuan = $i->post("id_satuan");
			$satuan = $i->post("nama_satuan");

			$kode_layanan = $i->post("kode_layanan");
			$id_identitas_usaha = $i->post("id_identitas_usaha");
			$sSQL = "SELECT a.kode_kota FROM kota a left join identitas_usaha b on b.kota = a.nama_kota WHERE b.id_identitas_usaha = '" . $id_identitas_usaha . "' ";

			$datakota = $this->model_user->getDataBySQL($sSQL);
			$kota = $datakota->kode_kota;

			for ($i = 0; $i < sizeof($nama_produk); $i++) {
				$tahun = date("Y");
				$bulan = date("m");
				$kodeKota = "SKA";
				if ($id_jenis[$i] == 1) {
					$kodeKota = "UNG";
				}
				//$sSQL = "SELECT max(SUBSTRING(kode_pendaftaran, 17, 3)) as maxID FROM layanan_ujimutu WHERE kode_pendaftaran like '%".$tahun."'";
				$sSQL = "SELECT max(SUBSTRING(kode_pendaftaran, 1, 3)) as maxID FROM layanan_ujimutu WHERE kode_pendaftaran like '%" . "/" . $tahun . "'";
				$datakota = $this->model_user->getDataBySQL($sSQL);
				$idMax = $datakota->maxID;
				$noUrut = (int) $idMax;
				$noUrut++;
				$month = array('01' => 'I', '02' => 'II', '03' => 'III', '04' => 'IV', '05' => 'V', '06' => 'VI', '07' => 'VII', '08' => 'VIII', '09' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII');
				//$kodependaftaran = $kota."/BPMKP/PSAT".sprintf("%03s", $noUrut)."/".$month[$bulan]."/".$tahun;
				$kodependaftaran = sprintf("%03s", $noUrut) . "/" . $kodeKota . "/" . $month[$bulan] . "/" . $tahun;
				$dat = array(
					"kode_layanan" => $kode_layanan, "kode_pendaftaran" => $kodependaftaran, "id_identitas_usaha" => $id_identitas_usaha, "nama_dagang" => $nama_dagang[$i], "id_kemasan" => $id_kemasan[$i],
					"idjenis" => $id_jenis[$i], "idjenisdetail" => $id_detail[$i]
				);
				$this->model_user->insertData("layanan_ujimutu", $dat);
			}
		} else if ($jenis == "psat") {
			$data['datalogin'] = $this->session->userdata("dataLogin");
			$i = $this->input;

			$nama_produk = $i->post("nama_produk");
			$nama_dagang = $i->post("nama_dagang");
			$id_kemasan = $i->post("id_kemasan");
			$nama_kemasan = $i->post("nama_kemasan");
			$netto = $i->post("netto");
			$id_satuan = $i->post("id_satuan");
			$satuan = $i->post("nama_satuan");

			$kode_layanan = $i->post("kode_layanan");
			$id_identitas_usaha = $i->post("id_identitas_usaha");
			$arr = array("uid" => null, "kode_layanan" => $kode_layanan, "id_identitas_usaha" => $id_identitas_usaha);
			if ($this->model_user->insertData("layanan", $arr)) {
				$id_jenis = $this->model_user->getLastId("layanan", "uid");
				for ($i = 0; $i < sizeof($nama_produk); $i++) {
					$dat = array(
						"id" => null, "nama_produk_pangan" => $nama_produk[$i], "nama_dagang" => $nama_dagang[$i], "id_kemasan" => $id_kemasan[$i],
						"nama_kemasan" => $nama_kemasan[$i], "satuan" => $satuan[$i], "netto" => $netto[$i], "id_satuan" => $id_satuan[$i], "id_layanan" => $id_jenis
					);
					$this->model_user->insertData("detail_identitas_produk", $dat);
				}
			}
		} else if ($jenis == "hc") {
			$data['datalogin'] = $this->session->userdata("dataLogin");
			$i = $this->input;

			$nama_produk = $i->post("nama_produk");
			$jenis_produk = $i->post("jenis_produk");
			$nomor_hs = $i->post("nomor_hs");
			$nama_eksportir = $i->post("nama_eksportir");
			$alamat_kantor = $i->post("alamat_kantor");
			$alamat_gudang = $i->post("alamat_gudang");
			$consigment_code = $i->post("consigment_code");
			$jumlah_lot = $i->post("jumlah_lot");
			$berat_lot = $i->post("berat_lot");
			$jumlah_kemasan = $i->post("jumlah_kemasan");
			$jenis_kemasan = $i->post("jenis_kemasan");
			$berat_kotor = $i->post("berat_kotor");
			$berat_bersih = $i->post("berat_bersih");
			$pelabuhan_berangkat = $i->post("pelabuhan_berangkat");
			$identitas_transportasi = $i->post("identitas_transportasi");
			$pelabuhan_tujuan = $i->post("pelabuhan_tujuan");
			$negara_tujuan = $i->post("negara_tujuan");
			$negara_transit = $i->post("negara_transit");
			$pelabuhan_transit = $i->post("pelabuhan_transit");
			$transportasi_transit = $i->post("transportasi_transit");

			$kode_layanan = $i->post("kode_layanan");
			$id_identitas_usaha = $i->post("id_identitas_usaha");
			$arr = array("uid" => null, "kode_layanan" => $kode_layanan, "id_identitas_usaha" => $id_identitas_usaha);
			if ($this->model_user->insertData("layanan", $arr)) {
				$id_jenis = $this->model_user->getLastId("layanan", "uid");
				for ($i = 0; $i < sizeof($consigment_code); $i++) {
					$dat = array(
						"id" => null,
						"nama_produk" => $nama_produk[$i],
						"jenis_produk" => $jenis_produk[$i],
						"nomor_hs" => $nomor_hs[$i],
						"nama_eksportir" => $nama_eksportir[$i],
						"alamat_kantor" => $alamat_kantor[$i],
						"alamat_gudang" => $alamat_gudang[$i],
						"consignment_code" => $consigment_code[$i],
						"jumlah_lot" => $jumlah_lot[$i],
						"berat_lot" => $berat_lot[$i],
						"jumlah_kemasan" => $jumlah_kemasan[$i],
						"jenis_kemasan" => $jenis_kemasan[$i],
						"berat_kotor" => $berat_kotor[$i],
						"berat_bersih" => $berat_bersih[$i],
						"pelabuhan_berangkat" => $pelabuhan_berangkat[$i],
						"identitas_transportasi" => $identitas_transportasi[$i],
						"pelabuhan_tujuan" => $pelabuhan_tujuan[$i],
						"negara_tujuan" => $negara_tujuan[$i],
						"negara_transit" => $negara_transit[$i],
						"pelabuhan_transit" => $pelabuhan_transit[$i],
						"transportasi_transit" => $transportasi_transit[$i],
						"id_layanan" => $id_jenis
					);
					$this->model_user->insertData("detail_identitas_ekspor", $dat);
				}
			}
		} else if ($jenis == "hs") {
			$data['datalogin'] = $this->session->userdata("dataLogin");
			$i = $this->input;

			$kode_layanan = $i->post("kode_layanan");
			$id_identitas_usaha = $i->post("id_identitas_usaha");
			$arr = array("uid" => null, "kode_layanan" => $kode_layanan, "id_identitas_usaha" => $id_identitas_usaha);
			if ($this->model_user->insertData("layanan", $arr)) {
				$isSuccess = true;
			}
		} else {
			$data['datalogin'] = $this->session->userdata("dataLogin");

			$i = $this->input;

			$id_sektor = $i->post("id_sektor");
			$id_kelompok = $i->post("id_kelompok");
			$kode_komoditas = $i->post("kode_komoditas");
			$nama_komoditas = $i->post("nama_komoditas");
			$nama_latin = $i->post("nama_latin");
			$luas_lahan = $i->post("luas_lahan");

			$kode_layanan = $i->post("kode_layanan");
			$id_identitas_usaha = $i->post("id_identitas_usaha");


			$arr = array("uid" => null, "kode_layanan" => $kode_layanan, "id_identitas_usaha" => $id_identitas_usaha);
			if ($this->model_user->insertData("layanan", $arr)) {
				$isSuccess = true;
				$id_jenis = $this->model_user->getLastId("layanan", "uid");
				for ($i = 0; $i < sizeof($kode_komoditas); $i++) {
					$dat = array("id_detail" => null, "id_komoditas" => $kode_komoditas[$i], "id_kelompok" => $id_kelompok[$i], "id_sektor" => $id_sektor[$i], "luas_lahan" => $luas_lahan[$i], "nama_latin" => $nama_latin[$i], "id_layanan" => $id_jenis, "nama_jenis_komoditas" => $nama_komoditas[$i]);
					$this->model_user->insertData("detail_komoditas", $dat);
				}
			}
		}
		if ($isSuccess) {
			$this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Berhasil mencatat data</div>");
		} else {
			$this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Gagal mencatat data</div>");
		}

		redirect("dashboard", "redirect");
	}
	function pernyataan_kesanggupan()
	{
		$this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}
	// DAFTAR END

	//------------------------------------------------ Pelaku Usaha ------------------------------------
	function identitas_usaha()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$variable = $this->model_user->getDataWhere("identitas_usaha", "id_user", $data['datalogin']['id_user']);
		foreach ($variable as $data['usaha']);
		$data['kota'] = $this->model_user->getDataKota();
		$data['menu'] = 'ubah';

		if ($data['datalogin']['punya_usaha'] == 0 && $data['datalogin']['kode_role'] == "pelaku") :
			$data['menu'] = 'tambah';

		endif;

		$this->loadView('dashboard_view/fragment/daftar_usaha_fragment', $data);
	}
	function daftar($kode_layanan = null)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		if ($kode_layanan == "psat") {
			$this->loadView('dashboard_view/pages/pelaku/daftar_psat', $data);
		} else if ($kode_layanan == null) {
			echo "null";
		}
	}

	function permohonan($jenis = null, $id_layanan = null)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		if ($jenis == "ditolak") {
			$data['jenis'] = "Ditolak";
			$data['permohonan'] = $this->model_user->getDataWhere("layanan", "alasan_penolakan", "is not null");
		} else if ($jenis == "diterima") {
			$idUsaha = $this->model_user->getIdUsaha($data['datalogin']['id_user']);
			$data['jenis'] = "Diterima";
			// getDokumenDiterima
			$data['permohonan'] = $this->model_user->getDataSertifikat($idUsaha);
		}
		if ($data['datalogin']['kode_role'] == 'pelaku') {
			// var_dump($data['datalogin']);
			if ($jenis == 'ditolak') {
				$data['permohonan'] = $this->model_user->getDokumenTolakSaya($data['datalogin']['id_user']);
			} else {
				$data['permohonan'] = $this->model_user->getDataSertifikat($idUsaha);
			}
			$this->loadView('dashboard_view/pages/pelaku/daftar_permohonan', $data);
		} else {
			$this->loadView('dashboard_view/pages/pelaku/daftar_permohonan', $data);
		}
	}


	//------------------------------------------------ Pelaku Usaha END------------------------------------

	//------------------------------------------------ Manager Administrasi ------------------------------------
	function lihat_foto($file = null)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['file'] = $file;
		if ($this->post->input("file") != "") {
			$data['file'] = $this->post->input("file");
		}
		$this->loadView('dashboard_view/lihat_foto', $data);
	}
	function dokumen_kelengkapan($id_dokumen)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$file = $this->model_user->getDokumenById($id_dokumen);
		foreach ($file as $file);
		$data['tipe'] = $file['mime_type'];
		$data['dokumen'] = $file['dokumen'];
		$data['nama'] = $file['nama_dokumen'];
		$this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
	}
	function lihat_surat_tugas($id_layanan)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$file = $this->model_user->getDataWhere('layanan', 'uid', $id_layanan);
		foreach ($file as $file);
		$data['tipe'] = $file['tipe_surat_tugas'];
		$data['dokumen'] = $file['surat_tugas'];
		$data['nama'] = "Surat Tugas";
		$this->load->view('dashboard_view/dokumen/lihat_dokumen', $data);
	}
	function update_status_layanan()
	{

		$i = $this->input;
		$alasan_penolakan = $i->post("alasan_penolakan");
		$id_layanan = $i->post("id_layanan");
		$level = $i->post("level");
		$status = $i->post("status");
		$arr = array();
		if ($alasan_penolakan != "") {
			$arr = array(
				"alasan_penolakan" => $alasan_penolakan,
				"status" => $status
			);
		} else {
			$arr = array(
				"manager_adm" => date("Y-m-d"),
				"level" => $level
			);
		}

		if ($this->model_user->updateData('layanan', $id_layanan, 'uid', $arr)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Gagal menyimpan data</div>");
		}

		redirect("dashboard/penilaian_dokumen");

		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}
	function permohonan_diterima()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		// echo $data['datalogin']['kode_role'];
		$data['dokumen'] = $this->model_user->getLayananDiterima($data['datalogin']['kode_role']);
		$this->loadView('dashboard_view/pages/m_admin/permohonan_diterima', $data);
		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}
	function riwayat_permohonan()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['dokumen'] = $this->model_user->getLayananDiterima($data['datalogin']['kode_role'], $data['datalogin']['id_user']);
		$this->loadView('dashboard_view/pages/m_admin/permohonan_diterima', $data);
		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}
	function permohonan_ditolak()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['dokumen'] = $this->model_user->getDokumenDitolakOleh($this->id_saya());
		$this->loadView('dashboard_view/permohonan_ditolak', $data);
		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	function penilaian_dokumen()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['dokumen'] = $this->model_user->getDokumenLevel(1);
		$data['id_saya'] = $this->id_saya();

		$this->loadView('dashboard_view/penilaian_dokumen', $data);
		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	function cetak_sertifikat($menu = null, $kode_layanan = null)
	{
		$data['layanan'] = $menu;
		$data['datalogin'] = $this->session->userdata("dataLogin");
		if ($menu == null) {
			$data['layanan'] = $this->model_user->getDataWhere("master_layanan", "status", 1);
			$this->loadView("dashboard_view/pages/m_admin/pilih_layanan_cetak", $data);
		} else if ($menu != null) {
			$data['menu'] = $menu;
			$data['dokumen'] = $this->model_user->getDokumenDiterima($menu, 'cetak');
			if ($menu == 'prima_3' || $menu == 'prima_2') {
				if ($menu == 'prima_3') {
					$data['jenis'] = "Prima 3";
				} else if ($menu == 'prima_2') {
					$data['jenis'] = "Prima 2";
				} else if ($menu == 'kemas') {
					$data['jenis'] = "Rumah Kemas";
				}
				$this->loadView('dashboard_view/pages/m_admin/sertifikat_komoditas', $data);
			} else if ($menu == 'kemas') {
				$this->loadView('dashboard_view/pages/m_admin/sertifikat_kemas', $data);
			} else if ($menu == 'sppb') {
				$this->loadView('dashboard_view/pages/m_admin/sertifikat_sppb', $data);
			} else if ($menu == 'psat') {
				$this->loadView('dashboard_view/pages/m_admin/sertifikat_psat', $data);
			} else if ($menu == 'hc') {
				$this->loadView('dashboard_view/pages/m_admin/sertifikat_hc', $data);
			}
		}
	}

	function ubah_sertifikat()
	{
		$id_detail_komoditas = $this->input->post('id_detail');
		$jenis = $this->input->post('jenis');
		$nomor_sertifikat = $this->input->post('nomor_sertifikat');

		$tabel = "";
		$nama_kolom = "id";
		$arr = array("nomor_sertifikat" => $nomor_sertifikat);

		if ($jenis == 'prima_3' || $jenis == 'prima_2') {
			$nama_kolom = 'id_detail';
			$tabel = "detail_komoditas";
		} else if ($jenis == 'psat') {
			$tabel = "detail_identitas_produk";
		} else if ($jenis == 'kemas') {
			$tabel = "detail_identitas_kemas";
		} else if ($jenis == 'sppb') {
			$tabel = "detail_identitas_sppb";
		} else if ($jenis == 'hc') {
			$tabel = "detail_identitas_ekspor";
		}

		if ($this->model_admin->updateData($tabel, $id_detail_komoditas, $nama_kolom, $arr)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Gagal menyimpan data</div>");
		}
		redirect("dashboard/cetak_sertifikat/" . $jenis);
	}

	// function daftar_sertifikat($menu = null,$kode_layanan = null,$id_layanan = null,$cetak = null){
	// 	$data['datalogin'] = $this->session->userdata("dataLogin");
	// 	if($menu == null &&  $kode_layanan == null && $id_layanan == null){
	// 		$data['dokumen'] = $this->model_user->getDokumenDiterima();
	// 		$data['cetak'] = false;
	// 		$data['layanan'] = $kode_layanan;
	// 		$data['id'] = $id_layanan;
	// 		$this->loadView('dashboard_view/pages/m_admin/daftar_sertifikat',$data);
	// 	}else if($menu != null &&  $kode_layanan != null && $id_layanan != null){
	// 		if($kode_layanan == 'prima_3' || $kode_layanan == 'prima_2' || $kode_layanan == 'kemas'){
	// 			$data['dokumen'] = $this->model_user->getSertifikatkomoditas($id_layanan,$cetak);
	// 			$data['layanan'] = $kode_layanan;
	// 			$data['id'] = $id_layanan;
	// 			$this->loadView('dashboard_view/pages/m_admin/sertifikat_komoditas',$data);
	// 		}else if($kode_layanan == 'psat'){
	// 			$data['dokumen'] = $this->model_user->getProdukPsat($id_layanan);
	// 			$data['layanan'] = $kode_layanan;
	// 			$data['id'] = $id_layanan;
	// 			$this->loadView('dashboard_view/pages/m_admin/sertifikat_psat',$data);
	// 		}else if($kode_layanan == 'hc'){
	// 			$data['dokumen'] = $this->model_user->getProdukHC($id_layanan);
	// 			$data['layanan'] = $kode_layanan;
	// 			$data['id'] = $id_layanan;
	// 			$this->loadView('dashboard_view/pages/m_admin/sertifikat_hc',$data);
	// 		}
	// 	}
	// }

	// ========================
	function daftar_sertifikat($menu = null)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		if ($menu == null) {
			$data['layanan'] = $this->model_user->getDataWhere("master_layanan", "status", 1);
			$data['jumlah_sertifikat'] = $this->model_user->getCountSertifikat();
			$this->loadView("dashboard_view/pages/m_admin/pilih_layanan", $data);
		} else if ($menu != null) {
			$data['menu'] = $menu;
			if ($menu == 'prima_3' || $menu == 'prima_2' || $menu == 'kemas'  || $menu == 'sppb') {
				if ($menu == 'prima_3') {
					$data['jenis'] = "Prima 3";
				} else if ($menu == 'prima_2') {
					$data['jenis'] = "Prima 2";
				} else if ($menu == 'kemas') {
					$data['jenis'] = "Rumah Kemas";
				} else if ($menu == 'sppb') {
					$data['jenis'] = "SPPB-PSAT";
				}

				$data['cetak'] = false;
			} else if ($menu == 'psat') {
				$data['jenis'] = "PSAT";
				$data['cetak'] = false;
			} else if ($menu == 'hc') {
				$data['jenis'] = "Health Certificate";
				$data['cetak'] = false;
			}
			$kategori = $this->input->get("category");
			$cari = $this->input->get("cari");

			$data['layanan'] = $menu;
			$data['dokumen'] = $this->model_user->getDokumenDiterima($menu, 'daftar', $kategori, $cari);

			$this->loadView('dashboard_view/pages/m_admin/daftar_sertifikat', $data);
		}
	}

	function unggah_sertifikat_komoditas()
	{
		$id_detail = $this->input->post('id_detail');
		$kode_layanan = $this->input->post('kode_layanan');
		$id = $this->input->post('id');
		$files = $_FILES;
		// $lokasi = "./upload/Dokumen_Dinas/Sertifikat/";
		// $isUpload = $this->upload_dokumen($_FILES,'gambar',$lokasi)

		$pelaku = $this->model_admin->getUsernamePelaku($id);
		foreach ($pelaku as $pelaku) {
			$data['nama'] = $pelaku['nama_lengkap'];
			$data['kode'] = $pelaku['kode_pendaftaran'];
			$message = $this->load->view('default/email/notifikasi_sertifikat_terbit', $data, true);
			$this->kirim_email("Pemberitahuan", $pelaku['username'], $message);
		}

		if ($this->uploads($_FILES, 'gambar') == null) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Dokumen tidak dapat diunggah</div>");
			redirect("dashboard/cetak_sertifikat/" . $kode_layanan);
		} else {
			$gambar_temp = $this->uploads($_FILES, 'gambar');
			$gambar = file_get_contents($gambar_temp['full_path']);
			$data = array("sertifikat" => $gambar, "mime_type" => $_FILES['gambar']['type']);
			if ($kode_layanan == 'psat') {
				$this->model_user->updateData('detail_identitas_produk', $id_detail, 'id', $data);
			} else if ($kode_layanan == 'hc') {
				$this->model_user->updateData('detail_identitas_ekspor', $id_detail, 'id', $data);
			} else if ($kode_layanan == 'sppb') {
				$this->model_user->updateData('detail_identitas_sppb', $id_detail, 'id', $data);
			} else if ($kode_layanan == 'kemas') {
				$this->model_user->updateData('detail_identitas_kemas', $id_detail, 'id', $data);
			} else {
				$this->model_user->updateData('detail_komoditas', $id_detail, 'id_detail', $data);
			}
			redirect("dashboard/cetak_sertifikat/" . $kode_layanan);
		}
	}

	function bekukan_sertifikat()
	{
		$id_detail = $this->input->post('id_detail');
		$kode_layanan = $this->input->post('kode_layanan');
		$data['status'] = $this->input->post('status');

		if ($kode_layanan == 'psat') {
			$this->model_user->updateData('detail_identitas_produk', $id_detail, 'id', $data);
		} else if ($kode_layanan == 'hc') {
			$this->model_user->updateData('detail_identitas_ekspor', $id_detail, 'id', $data);
		} else if ($kode_layanan == 'sppb') {
			$this->model_user->updateData('detail_identitas_sppb', $id_detail, 'id', $data);
		} else if ($kode_layanan == 'kemas') {
			$this->model_user->updateData('detail_identitas_kemas', $id_detail, 'id', $data);
		} else {
			$this->model_user->updateData('detail_komoditas', $id_detail, 'id_detail', $data);
		}
		$this->session->set_flashdata("status", "<div class='alert alert-info'>Dokumen telah dibekukan</div>");
		redirect("dashboard/daftar_sertifikat/" . $kode_layanan);
	}


	function getDokumen($id_layanan)
	{

		$dokumen = $this->model_user->getDokumen($id_layanan);
		$syarat_teknis = $this->model_dokumen->getSyaratTeknis($id_layanan);
		$identitas = $this->model_user->getDataUsahaByLayanan($id_layanan);

		$data['datalogin'] = $this->session->userdata("dataLogin");

		echo "<div class='row'>";

		foreach ($identitas as $identitas);

		// echo '<img width="100%" class="tp-bgimg defaultimg" src="data:image/jpeg;base64,'.base64_encode( $data[0] ).'" alt="Card image">';



		foreach ($dokumen as $dokumen) {
			if ($dokumen['file'] != null || $dokumen['file'] != "") {
				$class = "";
				if ($dokumen['mime_type'] == 'image/png' || $dokumen['mime_type'] == 'image/jpeg' || $dokumen['mime_type'] == 'image/jpg') {
					$class = "fas fa-image fa-7x";
				} else if ($dokumen['mime_type'] == 'application/msword' || $dokumen['mime_type'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
					$class = "fas fa-file-word fa-7x";
				} else if ($dokumen['mime_type'] == 'application/vnd.ms-excel' || $dokumen['mime_type'] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					$class = "fas fa-file-excel fa-7x";
				} else if ($dokumen['mime_type'] == 'application/pdf') {
					$class = "fas fa-file-pdf fa-7x";
				}

				$folder = $this->getNamaFolderDokumen($id_layanan);

				echo
				'<div class="col-md-6">
								<div class="card card-white" style="background:white;border:1px solid #dadada">

								<div class="card-body">
								<h5>' . $dokumen['nama_dokumen'] . '</h5><br/>
								<a href="' . base_url() . $folder . $dokumen['file'] . '" target="_t" class="btn btn-info btn-block">Lihat Dokumen</a>
								</div>
								</div>
								</div>';
			}
		}
		echo
		'<div class="col-md-12">
						<hr/>
						</div>';

		echo
		'<div class="col-md-6">
						<div class="card card-white" style="background:white;border:1px solid #dadada">

						<div class="card-body">
						<h5>Foto KTP</h5><br/>';
		if ($identitas['foto_ktp'] == null || $identitas['foto_ktp'] == '') {
			echo "Tidak ada gambar";
		} else {
			echo '<img class="img img-responsive" src="data:image/jpeg;base64,' . base64_encode($identitas['foto_ktp']) . '" alt="Card image">';
		}
		echo '</div>
						</div>
						</div>';
		echo
		'<div class="col-md-6">
						<div class="card card-white" style="background:white;border:1px solid #dadada">

						<div class="card-body">
						<h5>Foto NPWP</h5><br/>';

		if ($identitas['foto_npwp'] == null || $identitas['foto_npwp'] == '') {
			echo "Tidak ada gambar";
		} else {
			echo '<img class="tp-bgimg defaultimg" src="data:image/jpeg;base64,' . base64_encode($identitas['foto_npwp']) . '" alt="Card image">';
		}

		echo '</div>
						</div>
						</div>';

		//<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $dokumen['dokumen'] ).'" alt="Card image">
		// foreach ($syarat_teknis as $syarat);
		// $split = explode("<>",$syarat['syarat_teknis']);
		// echo "
		// <div class='col-md-12'>
		// 		<h4>Syarat Teknis</h4>
		// 		<ul>";
		// 		$i =1;
		// 		foreach ($split as $data) {
		// 			if($data != ""){
		// 				echo "<li>".$i.". ".$data."</li>";
		// 				$i++;
		//
		// 			}
		// 		}
		// 		echo "</ul>
		// </div>";
		// echo "</div>";

		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	//------------------------------------------------ Manager Administrasi END ------------------------------------
	function update_mt()
	{
		$id_layanan = $this->input->post("id_layanan");
		$inspektor = explode(";", $this->input->post("inspektor"));
		$ppc = explode(";", $this->input->post("ppc"));
		$pelaksana = explode(";", $this->input->post("pelaksana"));

		$tanggal_inspeksi = $this->input->post("tanggal_inspeksi");
		$tanggal_ppc = $this->input->post("tanggal_pc");
		$waktu_inspeksi = $this->input->post("waktu_inspeksi");
		$waktu_ppc = $this->input->post("waktu_pc");

		$dateInspeksi = date("Y-m-d", strtotime($tanggal_inspeksi)) . " " . $waktu_inspeksi[0] . ":" . $waktu_inspeksi[1];
		$datePPC = date("Y-m-d", strtotime($tanggal_ppc)) . " " . $waktu_ppc[0] . ":" . $waktu_ppc[1];

		$data = array("inspektor" => $inspektor[0], "nama_inspektor" => $inspektor[1], "ppc" => $ppc[0], "nama_ppc" => $ppc[1], "pelaksana" => $pelaksana[0], "nama_pelaksana" => $pelaksana[1], "tanggal_inspeksi" => $dateInspeksi, "tanggal_pc" => $datePPC);
		if ($this->model_user->updateData("layanan", $id_layanan, "uid", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data tersimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect('dashboard/penugasan_petugas_inspeksi');
	}
	function update_mt_status()
	{
		$id_layanan = $this->input->post("id_layanan");
		$pelaksana = $this->model_admin->getEmailPelaksana($id_layanan);

		foreach ($pelaksana as $pelaksana) {
			$data['nama'] = $pelaksana['nama_lengkap'];
			$data['alamat'] = $pelaksana['alamat'];
			$tgl_pc = strtotime($pelaksana['tanggal_pc']);
			$tgl_inspeksi = strtotime($pelaksana['tanggal_inspeksi']);
			$tahun = date('Y', $tgl_pc);
			$bulan = date('m', $tgl_pc);
			$tanggal = date('d', $tgl_pc);
			$tahun1 = date('Y', $tgl_inspeksi);
			$bulan1 = date('m', $tgl_inspeksi);
			$tanggal1 = date('d', $tgl_inspeksi);
			if ($pelaksana['kode_role'] == 'ppc') {
				$data['tanggal'] = $tanggal . ' ' . $this->bulan[$bulan - 1] . ' ' . $tahun;
			} else {
				$data['tanggal'] = $tanggal1 . ' ' . $this->bulan[$bulan1 - 1] . ' ' . $tahun1;
			}
			$message = $this->load->view('default/email/notifikasi_pelaksana', $data, true);
			$this->kirim_email("Surat Tugas", $pelaksana['username'], $message);
		}

		$data = array("manager_tek" => date("Y-m-d"));
		if ($this->model_user->updateData("layanan", $id_layanan, "uid", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data tersimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect('dashboard');
	}
	function update_status_ppc()
	{
		$id_layanan = $this->input->post("id_layanan");
		$data = array("status_ppc" => "1");
		if ($this->model_user->updateData("layanan", $id_layanan, "uid", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data tersimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect('dashboard/penugasan_inspektor');
	}
	function update_status_komtek()
	{
		$id_layanan = $this->input->post("id_layanan");
		$data = array("status_komtek" => "1", 'surat_pengantar_uji_sampel' => '1');
		if ($this->model_user->updateData("layanan", $id_layanan, "uid", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data tersimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect('dashboard/penugasan_ppc');
	}

	function unggah_surat_tugas()
	{
		$id_layanan = $this->input->post("id_layanan_surat");
		$files = $_FILES;
		$tipe_dokumen;

		$lokasi = $this->getNamaFolder($id_layanan);
		$isUpload = $this->upload_dokumen($_FILES, 'surat_tugas', $lokasi);

		if ($isUpload == null) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Dokumen Kosong</div>");
			redirect("dashboard/penugasan_petugas_inspeksi");
		} else {
			$st_temp = $isUpload;
			$surat_tugas = $st_temp["file_name"];
			$tipe_dokumen = $_FILES['surat_tugas']['type'];
		}

		$data = array("surat_tugas" => $surat_tugas, 'tipe_surat_tugas' => $tipe_dokumen);
		if ($this->model_user->updateData("layanan", $id_layanan, "uid", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data tersimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect('dashboard/penugasan_petugas_inspeksi');
	}

	function penugasan_petugas_inspeksi()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['inspeksi'] = $this->model_user->getDataInspeksi();
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView('dashboard_view/pages/m_teknis/penugasan_petugas_inspeksi', $data);
	}
	function penugasan_inspektor()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['inspeksi'] = $this->model_user->getPenugasanInspeksi();
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView("dashboard_view/penugasan_inspeksi", $data, $this->bulan);
	}
	function penugasan_ppc()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['ppc'] = $this->model_user->getPenugasanPPC();
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView("dashboard_view/penugasan_ppc", $data);
	}

	function produk($kode_layanan, $id)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$surat = $this->model_dokumen->getDataDokumen($id);
		foreach ($surat as $surat);
		$dir = $this->getDirectoryLayanan($id);

		if (sizeof($surat) == 0) {
			$data['file'] = "";
		} else {
			$data['file'] = './upload/Dokumen_Usaha/' . $dir . '/' . $surat['file'];
		}
		if ($kode_layanan == 'prima_3') {
			$data['produk'] = $this->model_user->getDaftarKomoditas($id);
			$this->loadView("dashboard_view/dokumen/produk_prima3", $data);
		} else if ($kode_layanan == 'prima_2') {
			$data['produk'] = $this->model_user->getDaftarKomoditas($id);
			$this->loadView("dashboard_view/dokumen/produk_prima2", $data);
		} else if ($kode_layanan == 'kemas') {
			$data['produk'] = $this->model_user->getDaftarKomoditas($id);
			$this->loadView("dashboard_view/dokumen/produk_kemas", $data);
		} else if ($kode_layanan == 'hc') {
			$data['produk'] = $this->model_user->getDataWhere('detail_identitas_ekspor', 'id_layanan', $id);
			$this->loadView("dashboard_view/dokumen/produk_hc", $data);
		} else if ($kode_layanan == 'psat') {
			$data['produk'] = $this->model_user->getProdukPsat($id);
			$this->loadView("dashboard_view/dokumen/produk_psat", $data);
		}
	}

	function kelola_form($jenis = null, $menu = null)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['jenis'] = $jenis;
		$data['kode_layanan'] = $menu;
		$data['dokumen_inspeksi'] = $this->model_user->getMasterForm($jenis, $menu);

		//$data['dokumen_inspeksi'] = $this->model_user->getDataWhere("master_dokumen_inspeksi","kode_layanan",$menu);
		if ($jenis == null && $menu == null) {
			redirect("dashboard");
		} else if ($menu == null) {
			$data['layanan'] = $this->model_user->getDataWhere("master_layanan", "status", 1);
			$this->loadView("dashboard_view/fragment/pilih_layanan", $data);
		} else {
			$data['form_uji'] = $this->model_user->getDataWhere("master_form_uji", "kode_layanan", $menu);
			if ($menu == "prima_3") {
				$data['menu'] = "Prima 3";
			} else if ($menu == "prima_2") {
				$data['menu'] = "Prima 2";
			} else if ($menu == "psat") {
				$data['menu'] = "PSAT";
			} else if ($menu == "kemas") {
				$data['menu'] = "Rumah Kemas";
			} else if ($menu == "hc") {
				$data['menu'] = "Health Certificate";
			}
			$this->loadView("dashboard_view/pages/m_teknis/kelola_form", $data);
		}
	}

	function unggah_form_uji()
	{
		$id = $this->input->post("kode_layanan");
		$jenis = $this->input->post("jenis");
		$nama_dokumen = $this->input->post("nama_dokumen");
		$id_dokumen = $this->input->post("id_dokumen");

		$files = $_FILES;
		$tipe_dokumen = $_FILES['gambar']['type'];
		$lokasi = $this->lokasi('dokumen_dinas');

		$isUpload = $this->upload_dokumen($_FILES, 'gambar', $lokasi);

		if ($isUpload == null) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>File tidak ditemukan</div>");
			redirect("dashboard");
		} else {
			$st_temp = $isUpload;
			$dokumen = file_get_contents($st_temp['full_path']);

			$file = $lokasi . $st_temp["file_name"];

			$data = array("id_dokumen" => $id_dokumen, "nama_dokumen" => $nama_dokumen, /*"dokumen"=>$dokumen,*/ "tipe_dokumen" => $tipe_dokumen, "jenis" => $jenis, "kode_layanan" => $id, 'file' => $file);
			$isSuccess = false;
			if ($id_dokumen != "") {
				$isSuccess = $this->model_user->updateData("master_dokumen_inspeksi", $id_dokumen, "id_dokumen", $data);
			} else {
				$isSuccess = $this->model_user->insertData("master_dokumen_inspeksi", $data);
			}
			if ($isSuccess) {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
			}
			redirect("dashboard/kelola_form/" . $jenis . "/" . $id);
		}
	}

	function hapus_dokumen_inspeksi()
	{
		$id = $this->input->post("id_dokumen_hapus");
		if ($this->model_user->deleteData("master_dokumen_inspeksi", $id, "id_dokumen")) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil dihapus</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menghapus data</div>");
		}
		redirect("dashboard/kelola_form/" . $this->input->post('jenis') . "/" . $this->input->post('kode_layanan'));
	}

	function tambah_form()
	{
		$keterangan = $this->input->post("keterangan");
		$kode_layanan = $this->input->post("kode_layanan");
		$jenis_form = $this->input->post("jenis_form");
		$jenis = $this->input->post("jenis");
		$data = array("keterangan" => $keterangan, "kode_layanan" => $kode_layanan, "jenis_form" => $jenis_form, "jenis" => $jenis);
		if ($this->model_user->insertData("master_form_uji", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data tersimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		$menu = "dashboard/kelola_form/" . $jenis . "/" . $kode_layanan;
		redirect($menu);
	}
	function hapus_form()
	{
		$kode_layanan = $this->input->post("kode_layanan");
		$jenis_form = $this->input->post("jenis_form");
		$jenis = $this->input->post("jenis");
		$id = $this->input->post("id_hapus");
		if ($this->model_user->deleteData("master_form_uji", $id, "id")) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data dihapus</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menghapus data</div>");
		}
		$menu = "dashboard/kelola_form/" . $jenis . "/" . $kode_layanan;
		redirect($menu);
	}
	function ubah_form()
	{
		$keterangan = $this->input->post("keterangan");
		$kode_layanan = $this->input->post("kode_layanan");
		$jenis_form = $this->input->post("jenis_form");
		$jenis = $this->input->post("jenis");
		$id = $this->input->post("id_ubah");
		$data = array("keterangan" => $keterangan, "kode_layanan" => $kode_layanan, "jenis_form" => $jenis_form, "jenis" => $jenis);
		if ($this->model_user->updateData("master_form_uji", $id, "id", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Perubahan data disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan perubahan data</div>");
		}
		$menu = "dashboard/kelola_form/" . $jenis . "/" . $kode_layanan;
		redirect($menu);
	}
	function hasil_laboratorium()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['uji_sampel'] = $this->model_user->getDataUjiSampel();
		$this->loadView("dashboard_view/pages/m_teknis/hasil_laboratorium", $data);
	}

	function unggah_surat_lab()
	{
		$id = $this->input->post("uid");
		$files = $_FILES;

		$lokasi = $this->getNamaFolder($id);
		$isUpload = $this->upload_dokumen($_FILES, 'surat_lab', $lokasi);

		if ($isUpload == null) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>File tidak ditemukan</div>");
			redirect("dashboard");
		} else {
			$st_temp = $isUpload;
			$file = $lokasi . $st_temp["file_name"];
			$data = array('tipe_surat_pengantar' => $_FILES['surat_lab']['type'], 'laporan_hasil_uji' => $file);
			if ($this->model_user->updateData("layanan", $id, "uid", $data)) {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
			}
			redirect("dashboard/hasil_laboratorium");
		}
	}

	function ubah_status_sampling()
	{
		$tolak = $this->input->post('Tolak');
		$simpan = $this->input->post('Simpan');
		$id_sampling = $this->input->post('id_sampling');
		$data;
		if ($tolak == '1') {
			$data = array('status' => '1');
		} else if ($simpan == '2') {
			$data = array('status' => '2');
		}
		if ($this->model_user->updateData('data_sampling_plan', $id_sampling, 'id_sampling', $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect('dashboard/penugasan_ppc', 'redirect');
	}

	function ijin()
	{
		$role = $this->input->post("role");
		$id_layanan = $this->input->post("id_layanan");
		$data = array();
		$isTrue = false;
		$url = "update_status_ppc";
		if ($role == "pelaksana") {
			$data = array("ijin_pelaksana" => "1");
			$isTrue = true;
		} else if ($role == 'inspektor') {
			$data = array("ijin_inspektor" => "1");
			$isTrue = true;
		} else if ($role == 'ppc') {
			$data = array("ijin_ppc" => "1");
			$isTrue = true;
			$url = "update_status_komtek";
		}
		if ($isTrue) {
			if ($this->model_user->updateData('layanan', $id_layanan, 'uid', $data)) {
				if ($this->model_user->statusInspektor($id_layanan) == true) {
					// echo '<form class="inline" action="'.base_url().'dashboard/'.$url.'" method="post">
					// <input type="hidden" name="id_layanan" value="'.$id_layanan.'"/>
					// <button type="sumbit" name="button" class="btn btn-info">Lanjut</button>
					// </form>';
					echo '<a href="" class="btn btn-warning">Tunda</a>';
				} else {
					echo "1";
				}
			} else {
				echo "0";
			}
		} else {
			echo "0";
		}
	}

	function terima_hasil_uji($val = null)
	{
		$value = null;
		$msg = "";
		$redirect = "";

		$uid = $this->input->post("uid");
		$id_user = $this->input->post("id_user");
		$berita_acara = $this->input->post("berita_acara");

		$datalogin = $this->session->userdata("dataLogin");
		$id_saya = $datalogin['id_user'];
		$email = $this->model_user->getEmail($id_user);
		$data;

		if ($val != null) {
			$value = $val;
			$msg = "Rekomendasi layanan berhasil";
			$redirect = "dashboard";
			//$arr = array("dari"=>$id_saya,"kepada"=>$id_user,"title"=>"Pengajuan Diterima","body"=>"Pengajuan Layanan Diterima, Silahkan datang ke kantor untuk dapat mencetak sertifikat");
			//$this->model_user->insertData("notification",$arr);
			$data['datalogin'] = $this->session->userdata("dataLogin");

			$email_to = $email;
			$subject = "Pengajuan Diterima";
			$message = 'Pengajuan Layanan Diterima, Silahkan datang ke kantor untuk dapat mencetak sertifikat';

			$this->kirim_email($subject, $email_to, $message);
			$data = array("berita_acara" => $berita_acara, "status_hasil_uji" => $value, 'w_komtek' => date('Y-m-d'));
		} else {
			$value = "1";
			$msg = "Proses verifikasi hasil uji / contoh berhasil";
			$redirect = "dashboard/hasil_laboratorium";
			$data = array("status_hasil_uji" => $value, 'w_hasil_mt' => date('Y-m-d'));
		}
		if ($this->model_user->updateData("layanan", $uid, "uid", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>" . $msg . "</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect($redirect);
	}

	function tolak_dokumen()
	{
		$uid = $this->input->post("uid");
		$id_user = $this->input->post("id_user");
		$alasan_penolakan = $this->input->post("alasan_penolakan");
		$tanggal_ditolak = date("Y-m-d");

		$datalogin = $this->session->userdata("dataLogin");
		$id_saya = $datalogin['id_user'];
		$data;

		$arr = array("dari" => $id_saya, "kepada" => $id_user, "title" => "Perubahan status dokumen", "body" => "Dokumen ditolak, segera daftar ulang pengajuan layanan anda");
		$this->model_user->insertData("notification", $arr);

		$data = array("ditolak_oleh" => $id_saya, "alasan_penolakan" => $alasan_penolakan, "tanggal_ditolak" => $tanggal_ditolak);

		if ($this->model_user->updateData("layanan", $uid, "uid", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data tersimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
		}
		redirect('Dashboard');
	}
	//------------------------------------------------ Manager Teknis END ------------------------------------

	//------------------------------------------------ Manager Administrasi END ------------------------------------

	// ---------------------------------------------- KOMTEK --------------------------------------------------

	// ---------------------------------------------- KOMTEK END --------------------------------------------------

	//------------------------------------------------ INSPEKTOR ------------------------------------
	function inspeksi_jenis_layanan()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['inspeksi'] = $this->model_user->getDataJenisInspeksi("inspektor");
		$this->loadView('dashboard_view/pages/inspektor/inspeksi_jenis_layanan', $data);
	}
	function form_inspeksi($id)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$ins = $this->model_user->getDataWhere("layanan", 'uid', $id);
		$data['data_form'] = $this->get_data($ins)['hasil_inspeksi'];
		$data['jenis_layanan'] = $this->model_user->getJenisLayanan($id);
		$data['form'] = $this->model_user->getForm("inspeksi", $data['jenis_layanan']);

		$data['uid'] = $id;
		$data['dokumen'] = $this->model_user->getDokumenInspeksi('inspeksi', 'dokumen', $id);
		$data['dokumen_inspeksi'] = $this->model_user->getDetailForm("inspeksi", $data['jenis_layanan'], $id);

		$this->loadView('dashboard_view/pages/inspektor/form_pelaksanaan_inspeksi', $data);
	}
	function unggah_dokumen_hasil_uji()
	{
		$id_dokumen = $this->input->post("id_dokumen");
		$id_layanan = $this->input->post("id_layanan");
		$nama_dokumen = $this->input->post("nama_dokumen");
		$isUpload = $this->input->post("up");
		$jenis = $this->input->post("jenis");
		$tipe_dokumen = $_FILES['gambar']['type'];


		$upload = $this->upload_dokumen($_FILES, 'gambar', $this->getNamaFolder($id_layanan));

		$files = $_FILES;
		if ($upload == null) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>File gagal diunggah</div>");
			redirect("dashboard/form_inspeksi/" . $id_layanan);
		} else {
			$st_temp = $upload;
			$dokumen = file_get_contents($st_temp['full_path']);
			$file = $this->getNamaFolder($id_layanan) . $st_temp["file_name"];
			$data = array("id_dokumen" => $id_dokumen, "id_layanan" => $id_layanan,	"nama_dokumen" => $nama_dokumen,	"dokumen" =>	$dokumen, "tipe_dokumen" => $tipe_dokumen, 'file' => $file);

			$isSUccess = false;
			if ($isUpload == 0) {
				$isSUccess = $this->model_user->insertData("detail_dokumen_inspeksi", $data);
			} else {
				$isSUccess = $this->model_user->updateDetailForm($id_dokumen, $id_layanan, $data);
			}

			if ($isSUccess) {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
			}
			if ($jenis == 'ppc') {
				redirect("dashboard/form_ppc/" . $id_layanan);
			} else {
				redirect("dashboard/form_inspeksi/" . $id_layanan);
			}
		}
	}

	function simpan_hasil_inspeksi()
	{
		$isClear = true;
		$i = $this->input;
		$status = $i->post("status");
		$keterangan = $i->post("keterangan");
		$jenis = $i->post("jenis");
		$deskripsi = $i->post("deskripsi");

		$uid = $i->post("uid");

		if (sizeof($deskripsi) > 0) {
			for ($a = 0; $a < sizeof($deskripsi); $a++) {
				$stat = "";
				$status = $i->post("status" . ($a + 1));
				if ($status == "on") {
					$stat = "ada";
				} else {
					$stat = "tidak";
				}
				$data = array("id" => NULL, "keterangan" => $keterangan[$a], "status" => $stat, "deskripsi" => $deskripsi[$a], "jenis" => $jenis[$a], "id_layanan" => $uid);
				if ($this->model_user->insertData("data_form_uji", $data)) {
				} else {
					$isClear = false;
				}
			}
		} else {
			$isClear = true;
		}


		if ($isClear) {
			$dat = array('hasil_inspeksi' => 1, 'w_inspeksi' => date("Y-m-d"));
			$this->model_user->updateData("layanan", $uid, 'uid', $dat);

			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Terdapat kesalahan ketika menyimpan data</div>");
		}
		redirect("dashboard/form_inspeksi/" . $uid);
	}

	function simpan_hasil_pelaksana()
	{
		$id = $this->input->post("uid");
		$dat = array('hasil_pelaksana' => 1);
		$this->model_user->updateData("layanan", $id, 'uid', $dat);

		redirect("dashboard/pelaksanaan_jenis_layanan");
	}

	function pelaksanaan_jenis_layanan()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['pelaksana'] = $this->model_user->getDataJenisInspeksi("pelaksana");
		$this->loadView('dashboard_view/pages/pelaksana/pelaksanaan_jenis_layanan', $data);
	}

	function ulang_inspektor($id)
	{
		$data = array('hasil_inspeksi' => '0');
		$this->model_user->updateData('layanan', $id, 'uid', $data);
		$this->model_user->deleteData('data_form_uji', $id, 'id_layanan');
		$this->model_user->deleteData('detail_dokumen_inspeksi', $id, 'id_layanan');
		//$this->loadView('dashboard_view/pages/pelaksana/pelaksanaan_jenis_layanan',$data);
		redirect('dokumen/lihat_hasil/inspeksi/' . $id);
	}
	function ulang_ppc($id)
	{
		$data = array('hasil_ppc' => '0');
		$this->model_user->updateData('layanan', $id, 'uid', $data);
		$this->model_user->deleteData('data_form_uji', $id, 'id_layanan');
		$this->model_user->deleteData('detail_dokumen_inspeksi', $id, 'id_layanan');
		//$this->loadView('dashboard_view/pages/pelaksana/pelaksanaan_jenis_layanan',$data);
		redirect('dokumen/lihat_hasil/inspeksi/' . $id);
	}

	function form_hasil_pelaksana($uid)
	{

		if ($this->input->post("upload") != "") {
			$id_gambar = $this->input->post("id");
			$id_layanan = $this->input->post("layanan");
			$temp = $this->uploads($_FILES, 'gambars');
			if ($temp != null) {
				$gambar = file_get_contents($temp['full_path']);
				$data = array("id_gambar" => $id_gambar, "id_layanan" => $id_layanan, "gambar" => $gambar);
				$isUpload = false;

				if ($this->model_user->getCountGambar($id_gambar, $id_layanan) > 0) {
					$data["id_hasil"] = $this->input->post('id_hasil');
					if ($this->model_user->updateGambar($id_gambar, $id_layanan, "gambar_hasil_inspeksi", $data)) {
						$isUpload = true;
					}
				} else {
					$data["id_hasil"] = NULL;

					if ($this->model_user->insertData("gambar_hasil_inspeksi", $data)) {
						$isUpload = true;
					}
				}

				if ($isUpload) {
					$this->session->set_flashdata("status", "<div class='alert alert-success'>Gambar berhasil diunggah</div>");
				} else {
					$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gambar gagal diunggah</div>");
				}
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Tidak ada gambar yang diunggah</div>");
			}
		}
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['id_layanan'] = $uid;
		$data['gambar'] = $this->model_user->getGambarHasilInspeksi($uid);
		$this->loadView('dashboard_view/pages/pelaksana/form_hasil_pelaksana', $data);
	}

	//------------------------------------------------ INSPEKTOR END ------------------------------------
	//------------------------------------------------ PPC  ------------------------------------
	function pc_jenis_layanan()
	{
		if ($this->input->post("id") != "") {
			$id_layanan = $this->input->post("id");
			$data = array("surat_pengantar_uji_sampel" => "1");
			if ($this->model_user->updateData("layanan", $id_layanan, "uid", $data)) {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Pengambilan contoh berhasil</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Gagal menyimpan data</div>");
			}
		}
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['ppc'] = $this->model_user->getDataJenisInspeksi("ppc");
		$this->loadView('dashboard_view/pages/ppc/pc_jenis_layanan', $data);
	}
	function unggah_sampling_plan()
	{
		$id_sampling = $this->input->post('id_sampling');
		$status = $this->input->post('status');
		$id_layanan = $this->input->post('id_layanan');
		$deskripsi = $this->input->post('sampling_plan');
		$isNew = false;
		if ($status == '') {
			$status = '0';
			$isNew = true;
		} else if ($status == '1') {
			$isNew = false;
			$status == '0';
		}
		$data = array('status' => $status, 'id_layanan' => $id_layanan, 'deskripsi' => $deskripsi);
		if ($isNew) {
			$this->model_user->insertData('data_sampling_plan', $data);
		} else {
			$this->model_user->updateData('data_sampling_plan', $id_sampling, 'id_sampling', $data);
		}

		$this->session->set_flashdata("status", "<div class='alert alert-success'>Sampling plan terkirim</div>");
		$msg = array('dari' => $this->id_saya(), 'kepada' => '7', 'title' => 'Sampling plan', 'body' => 'Pengajuan sampling plan');
		$this->model_user->insertData('notification', $msg);

		redirect('dashboard/pc_jenis_layanan');
	}
	function form_ppc($id)
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$ins = $this->model_user->getDataWhere("layanan", 'uid', $id);
		$data['data_form'] = $this->get_data($ins)['hasil_ppc'];
		$data['jenis_layanan'] = $this->model_user->getJenisLayanan($id);
		$data['form'] = $this->model_user->getForm("ppc", $data['jenis_layanan']);

		$data['uid'] = $id;
		$data['dokumen'] = $this->model_user->getDokumenInspeksi('ppc', 'dokumen', $id);
		$data['dokumen_inspeksi'] = $this->model_user->getDetailForm("ppc", $data['jenis_layanan'], $id);


		$this->loadView('dashboard_view/pages/ppc/form_pelaksanaan_ppc', $data);
	}
	function simpan_hasil_ppc()
	{
		$i = $this->input;
		$status = $i->post("simpanPPC");
		$uid = $i->post("uid");
		if ($status == '') {
			redirect("dashboard/form_inspeksi/" . $uid);
		} else {
			$dat = array('hasil_ppc' => '1', 'surat_pengantar_uji_sampel' => '1', 'w_ppc' => date('Y-m-d'));
			if ($this->model_user->updateData("layanan", $uid, 'uid', $dat)) {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Terdapat kesalahan ketika menyimpan data</div>");
			}
			redirect("dashboard/form_ppc/" . $uid);
		}
	}
	//------------------------------------------------ PPC  END ------------------------------------

	//------------------------------------------------ ADMIN ------------------------------------
	function kelola_user()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView('dashboard_view/kelola_user', $data);
	}
	function user_nonaktif($jenis, $idUser, $status)
	{
		$data = array("status" => $status);
		if ($this->model_user->updateData('user', $idUser, 'id_user', $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Terdapat kesalahan ketika menyimpan data</div>");
		}

		if ($jenis == 'pelaku') {
			//	redirect('dashboard/akun_pelaku_usaha');
		} else {
			redirect('dashboard/kelola_user');
		}
	}

	function reset_password_user($idUser)
	{
		$pass = sha1("Okkpd2018!12345678");
		$data = array("password" => $pass);
		if ($this->model_user->updateData('user', $idUser, 'id_user', $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Reset password berhasil</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Terdapat kesalahan ketika mereset password</div>");
		}

		if ($jenis == 'pelaku') {
			//	redirect('dashboard/akun_pelaku_usaha');
		} else {
			redirect('dashboard/kelola_user');
		}
	}

	function cek_username()
	{
		$username = $this->input->post("email");
		$jml = $this->model_user->cek_username($username);
		echo $jml;
	}

	//------------------------------------------------ ADMIN END------------------------------------


	public function logout($dashboard = "true")
	{
		$this->session->unset_userdata("dataLogin");

		redirect("", "");
	}

	public function verifikasi_pengurus()
	{
		$i = $this->input;


		if ($this->model_user->validasi($i->post('username'), $i->post('password'), $i->post('role'))) {
			redirect("dashboard", "redirect");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Username / password tidak ditemukan</div>");
			redirect("dashboard/sign_in", "redirect");
		}
	}

	public function getKodePendaftaran($id_layanan)
	{
		$nama_usaha = str_replace(" ", "X", $this->model_user->getNamaUsahaByLayanan($id_layanan));
		$arr_nama_usaha = str_split($nama_usaha);
		$jml_arr = sizeof($arr_nama_usaha);
		$kode = '';
		for ($i = 0; $i < 3; $i++) {
			$kode .= $arr_nama_usaha[rand(0, $jml_arr - 1)];
		}
		$timestamp = time();

		$kode =  strtoupper($kode) . date('Ym') . substr($timestamp, 7, 3);
		return $kode;
	}

	public function uploadDokumen()
	{
		$this->load->library('upload');
		$data['datalogin'] = $this->session->userdata("dataLogin");

		$identitas = $this->model_user->getDataUsaha($data['datalogin']['id_user']);
		foreach ($identitas as $identitas);

		$id_prima_tiga = $this->input->post("id_prima_tiga");
		$syarat_teknis = $this->input->post("syarat_teknis");
		$jenis = $this->input->post("jenis");
		$limit = 0;
		if ($jenis == "prima_3" || $jenis == "kemas") {
			$limit = 4;
		} else if ($jenis == "hs" || $jenis == "hc") {
			$limit = 3;
		} else if ($jenis == "prima_2") {
			$limit = 5;
		} else {
			$limit = 16;
		}

		$cpt = count($_FILES['gambar']['name']);
		$files = $_FILES;
		$layanan = $this->model_user->getDetailDokumen($jenis);

		if ($cpt < $limit) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Dokumen yang diunggah masih kurang</div>" . $jenis . ' ' . $limit . " " . $cpt);
			redirect("dashboard/dokumen/" . $jenis . "/" . $id_prima_tiga);
		} else {
			$uploads = array();
			$id_dokumen = array();
			$req_perorangan = array();
			$req_non_perorangan = array();
			$i = 0;
			foreach ($layanan as $layanan) {
				$uploads[$i] = $layanan['nama_dokumen'];
				$id_dokumen[$i] = $layanan['kode_dokumen'];
				$req_perorangan[$i] = $layanan['req_perorangan'];
				$req_non_perorangan[$i] = $layanan['req_non_perorangan'];
				$i++;
			}

			$kode = $this->getKodePendaftaran($id_prima_tiga);
			$dir = $this->getDirectoryLayanan($id_prima_tiga);
			$lokasi = $this->lokasi("pelaku", "Dokumen_Usaha/" . $dir . "/");
			$folderUpload = './upload/Dokumen_Usaha/' . $dir . '/Upload';

			if (!is_dir($folderUpload)) {
				mkdir($folderUpload, 0777, TRUE);
			}


			for ($i = 0; $i < $cpt; $i++) {
				$_FILES['gambar']['name'] = $files['gambar']['name'][$i];
				$_FILES['gambar']['type'] = $files['gambar']['type'][$i];
				$_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];
				$_FILES['gambar']['error'] = $files['gambar']['error'][$i];
				$_FILES['gambar']['size'] = $files['gambar']['size'][$i];
				$this->upload->initialize($this->set_upload_options($lokasi));

				if (!$this->upload->do_upload('gambar')) {
					if (($identitas['jenis_usaha'] == 'Perorangan' && $req_perorangan[$i] == 0) || ($req_perorangan[$i] == 0 && $req_non_perorangan[$i] == 0)) {
						$dat = array('id_dokumen' => null, 'dokumen' => null, 'file' => $files['gambar']['name'][$i],	'nama_dokumen' => $uploads[$i], 'id_layanan' => $id_prima_tiga, 'mime_type' => $_FILES['gambar']['type']);
						$this->model_user->insertData("dokumen_layanan", $dat);
					} else {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("status", "<div class='alert alert-success'>File gagal di " . $i . "</div>");
						$isGagal = true;
						$uploadData[$i]['file_name'] = null;
					}

					// if($id_dokumen[$i] == 2 || $id_dokumen[$i] == 7 || $id_dokumen[$i] == 3 || $id_dokumen[$i] == 11){
					//
					// 	echo "KOSONG ".$i."<br/>";
					// }else{
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->session->set_flashdata("status","<div class='alert alert-success'>File gagal di ".$i."</div>");
					// 	$isGagal = true;
					// 	$uploadData[$i]['file_name'] = null;
					// 	//redirect("dashboard");
					// }
					//$this->load->view('upload_form', $error);
				} else {
					//SINI

					$fileData = $this->upload->data();
					$dokumen = file_get_contents($fileData['full_path']);
					$src 		= './upload/Dokumen_Usaha/' . $dir . '/' . $fileData['file_name'];
					$target = './upload/Dokumen_Usaha/' . $dir . '/Upload/' . $fileData['file_name'];
					echo $src;

					copy($src, $target);

					$dat = array('id_dokumen' => null,/*'dokumen'=>$dokumen,*/ 'file' => $fileData['file_name'],	'nama_dokumen' => $uploads[$i], 'id_layanan' => $id_prima_tiga, 'mime_type' => $_FILES['gambar']['type']);

					$datMedia = array('id_media' => null, 'id_identitas_usaha' => $data['datalogin']['punya_usaha'], 'nama_media' => $fileData['file_name'], 'mime_type' => $_FILES['gambar']['type'], 'kode_dokumen' => $id_dokumen[$i]);
					$this->model_user->insertData("dokumen_layanan", $dat);
					$this->model_user->insertData("identitas_usaha_media", $datMedia);
				}
			}

			$str = "";
			foreach ($syarat_teknis as $syarat) {
				$str .= $syarat . "<>";
			}

			// $kode = $this->getKodePendaftaran($id_prima_tiga);
			$dat = array("syarat_teknis" => $str, 'kode_pendaftaran' => $kode);
			$data['datalogin'] = $this->session->userdata("dataLogin");

			$email_to = $data['datalogin']['username'];
			$subject = "Pendaftaran Layanan - Kode Pendaftaran";

			$data['link'] = base_url() . "dokumen/berkas_pendaftaran/?q=" . sha1($kode);
			$data['nama'] = $data['datalogin']['nama_lengkap'];
			$data['kode'] = $kode;
			$message = $this->load->view('default/email/notifikasi_daftar_layanan', $data, true);
			$this->kirim_email($subject, $email_to, $message);

			$this->kirimMA($kode, $data['nama']);
			if ($this->model_user->updateData("layanan", $id_prima_tiga, "uid", $dat)) {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan. Silahkan cek email anda untuk melihat kode pendaftaran anda</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Data gagal disimpan</div>");
			}
			redirect("dashboard");
		}
		// end --------------------

	}


	public function kirimMA($kode, $nama)
	{
		$user = $this->model_admin->getDataWhere("user", "kode_role", "m_adm");
		foreach ($user as $usr) {
			$data['nama'] = $this->session->userdata("dataLogin")['nama_lengkap'];
			$data['kode'] = $kode;
			$message = $this->load->view('default/email/notifikasi_ma_daftar_layanan', $data, true);
			$this->kirim_email("Pendaftaran Layanan Baru", $usr['username'], $message);
		}
	}

	public function kirim()
	{
		$kode = $this->getKodePendaftaran(1);
		echo $kode;
		$email_to = $data['datalogin']['username'];
		$subject = "Pendaftaran Layanan - Kode Pendaftaran";
		$message = "Berikut adalah kode registrasi anda yang dapat digunakan untuk keperluan tracking pengajuan layanan<br/><br/>
						<h3>" . $kode . "</h3><br/><br/>
						Berikut link untuk download kartu pendaftaran anda : <br/>
						" . base_url() . "dokumen/berkas_pendaftaran/?q=" . sha1($kode) . "
						Mohon untuk digunakan sebagaimana mestinya. Terima Kasih";
		echo $message;

		//	$this->kirim_email($subject,$email_to,$message);

	}

	public function do_upload()
	{
		$this->load->library('upload');
		$dataInfo = array();
		$files = $_FILES;
		$cpt = count($_FILES['gambar']['name']);
		$uploadData = array();
		$isEmpty = false;
		$isGagal = false;
		for ($i = 0; $i < $cpt; $i++) {
			if ($files['gambar']['name'][$i] == "") {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Dokumen yang diunggah masih kurang</div>");
				redirect("dashboard/unggah/dokumen_prima3");
				break;
			}
		}
		for ($i = 0; $i < $cpt; $i++) {
			$_FILES['gambar']['name'] = $files['gambar']['name'][$i];
			$_FILES['gambar']['type'] = $files['gambar']['type'][$i];
			$_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];
			$_FILES['gambar']['error'] = $files['gambar']['error'][$i];
			$_FILES['gambar']['size'] = $files['gambar']['size'][$i];
			$this->upload->initialize($this->set_upload_options());
			if (!$this->upload->do_upload('gambar')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata("status", "<div class='alert alert-success'>File gagal</div>");
				$isGagal = true;
				$uploadData[$i]['file_name'] = null;
				//redirect("dashboard/unggah/dokumen_prima3");
				//$this->load->view('upload_form', $error);
			} else {
				$fileData = $this->upload->data();
				$uploadData[$i]['file_name'] = $fileData['file_name'];
				$this->session->set_flashdata("status", "<div class='alert alert-success'>File berhasil diunggah</div>");
				//$this->load->view('upload_success', $data);
			}
		}


		$arr = array('kesanggupan' => $uploadData[0]['file_name'], 'legalitas' => $uploadData[1]['file_name'], 'struktur_organisasi' => $uploadData[2]['file_name'], 'jenis_komoditas' => $uploadData[3]['file_name']);
		if ($this->model_user->updateData('prima_tiga', $this->input->post('id'), 'id_prima_tiga', $arr)) {
			if ($isGagal) {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Ada beberapa file gagal diunggah, cek kembali</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>File berhasil diunggah</div>");
			}
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Gagal menyimpan data</div>");
		}
		redirect("dashboard");
	}
	public function upload_array($files, $nama, $index)
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'pdf|gif|jpg|png|xls|xlsx|doc|docx|rar|zip';
		$config['max_size']             = 0;

		$files = $_FILES;
		$_FILES[$nama]['name'] = $files[$nama]['name'][$index];
		$_FILES[$nama]['type'] = $files[$nama]['type'][$index];
		$_FILES[$nama]['tmp_name'] = $files[$nama]['tmp_name'][$index];
		$_FILES[$nama]['error'] = $files[$nama]['error'][$index];
		$_FILES[$nama]['size'] = $files[$nama]['size'][$index];
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($nama)) {
			return null;
		} else {
			return $this->upload->data();
		}
	}


	public function uploads($files, $nama)
	{
		$files = $_FILES;
		$_FILES[$nama]['name'] = $files[$nama]['name'];
		$_FILES[$nama]['type'] = $files[$nama]['type'];
		$_FILES[$nama]['tmp_name'] = $files[$nama]['tmp_name'];
		$_FILES[$nama]['error'] = $files[$nama]['error'];
		$_FILES[$nama]['size'] = $files[$nama]['size'];
		$config = array();
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'pdf|gif|jpg|png|xls|xlsx|doc|docx|rar|zip';
		$config['max_size']             = 0;
		$this->load->library('upload', $config);


		if (!$this->upload->do_upload($nama)) {
			$error = array('error' => $this->upload->display_errors());
			return null;
		} else {
			if ($_FILES[$nama]['type'] == 'image/jpeg' || $_FILES[$nama]['type'] == 'image/png') {
				$data = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './upload/' . $data["file_name"];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				if ($data['file_size'] > 700) {
					$config['width'] = 500;
				}
				$config['new_image'] = './upload/' . $data["file_name"];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}

			return $this->upload->data();
		}
	}



	private function set_upload_options($location = null)
	{
		//upload an image options
		if ($location == null) {
			$location = "./upload/";
		}
		if (!is_dir($location)) {
			mkdir($location, 0777, TRUE);
		}
		$config = array();
		$config['upload_path']          = $location;
		$config['allowed_types']        = 'pdf|gif|jpg|png|xls|xlsx|doc|docx|rar|zip';
		$config['max_size']             = 0;
		$this->load->library('upload', $config);

		return $config;
	}

	public function keluhan_saran()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['keluhan'] = $this->model_user->getAllData("keluhan_saran");
		$this->loadView('dashboard_view/admin/keluhan_saran', $data);
	}

	public function getKeluhanDansaran($jenis)
	{
		$dat = $this->model_admin->getKeluhanSaran($jenis);
		foreach ($dat as $dat) {
			echo '<tr>
									<td>' . $dat['nama'] . '</td>
									<td>' . $dat['email'] . '</td>
									<td>' . $dat['pesan'] . '</td>
									<td>' . date("d/m/Y", strtotime($dat['tanggal_keluhan'])) . '</td>
									<td></td>
								</tr>';
		}
	}

	function valid_sample()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['sample'] = $this->model_ujimutu->getValidSampleLab();
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView("dashboard_view/analislabvalidsample", $data);
	}


	function valid_hasilpengujian()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['sample'] = $this->model_ujimutu->getValidPengujian();
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView("dashboard_view/analislabvalidmutu", $data);
	}

	function mteklist_validujimutu()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['sample'] = $this->model_ujimutu->getDataUjiMutuValidLab();
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView("dashboard_view/mteklabvalidmutu", $data);
	}


	function update_valid_uji()
	{

		$i = $this->input;
		$id_layanan = $i->post("id_layanan");
		$kode_pendaftaran = $i->post("kode_pendaftaran");
		$idjenis = $i->post("idjenis");
		$idjenisdetail = $i->post("idjenisdetail");
		$kesimpulan = $i->post("kesimpulan");
		$data['id_layanan'] = $id_layanan;
		$data['kode_pendaftaran'] = $kode_pendaftaran;
		$data['idjenis'] = $idjenis;
		$data['idjenisdetail'] = $idjenisdetail;
		$data['namajenis'] = $i->post("namajenis");
		$data['berat'] = $i->post("berat");
		$data['kondisi'] = $i->post("kondisi");
		$data['kesimpulan'] = $i->post("kesimpulan");
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['detaildata'] = $this->model_ujimutu->getDataHasilUjiMutuLHUByIDTolak($id_layanan);
		$data['headerdata'] = $this->model_ujimutu->getDataHasilUjiMutuByUID($id_layanan);
		if ($idjenisdetail == "1") {
			//gabah

			$this->loadView("dashboard_view/pages/analislab/prosesgabah", $data);
		} elseif ($idjenisdetail == "2") {
			//padi

			$this->loadView("dashboard_view/pages/analislab/prosespadi", $data);
		} elseif ($idjenisdetail == "3") {
			//kopi

			$this->loadView("dashboard_view/pages/analislab/proseskopi", $data);
		} elseif ($idjenisdetail == "4") {
			//kedelai

			$this->loadView("dashboard_view/pages/analislab/proseskedelai", $data);
		} elseif ($idjenisdetail == "5") {
			//jagung

			$this->loadView("dashboard_view/pages/analislab/prosesjagung", $data);
		} elseif ($idjenisdetail == "6") {
			//sorgum

			$this->loadView("dashboard_view/pages/analislab/prosesjagung", $data);
		} elseif ($idjenisdetail == "7") {
			//polong

			$this->loadView("dashboard_view/pages/analislab/proseskacangpolong", $data);
		} elseif ($idjenisdetail == "8") {
			//tanah biji

			$this->loadView("dashboard_view/pages/analislab/proseskacangtanahbiji", $data);
		} elseif ($idjenisdetail == "9") {
			//kacang hijau

			$this->loadView("dashboard_view/pages/analislab/proseskacanghijau", $data);
		} elseif ($idjenisdetail == "10") {
			//ubi jalar

			$this->loadView("dashboard_view/pages/analislab/prosesubijalar", $data);
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Laporan Pengujian jenis tersebut belum tersedia.</div>");

			redirect("dashboard/valid_hasilpengujian");
		}

		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	function proses_valid_ujilab()
	{

		$i = $this->input;
		$id_layanan = $i->post("id_layanan");
		$kode_pendaftaran = $i->post("kode_pendaftaran");
		$idjenis = $i->post("idjenis");
		$idjenisdetail = $i->post("idjenisdetail");
		$kesimpulan = $i->post("kesimpulan");
		$data['id_layanan'] = $id_layanan;
		$data['kode_pendaftaran'] = $kode_pendaftaran;
		$data['idjenis'] = $idjenis;
		$data['idjenisdetail'] = $idjenisdetail;

		if ($idjenisdetail == "1") {
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);


			$jenisuji = $i->post("jenisuji2");
			$satuan = $i->post("satuan2");
			$metodeuji = $i->post("metodeuji2");
			$hasiluji = $i->post("hasiluji2");
			$kelasmutu = $i->post("kelasmutu2");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji3");
			$satuan = $i->post("satuan3");
			$metodeuji = $i->post("metodeuji3");
			$hasiluji = $i->post("hasiluji3");
			$kelasmutu = $i->post("kelasmutu3");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "2") {
			//padi
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);


			$jenisuji = $i->post("jenisuji2");
			$satuan = $i->post("satuan2");
			$metodeuji = $i->post("metodeuji2");
			$hasiluji = $i->post("hasiluji2");
			$kelasmutu = $i->post("kelasmutu2");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji3");
			$satuan = $i->post("satuan3");
			$metodeuji = $i->post("metodeuji3");
			$hasiluji = $i->post("hasiluji3");
			$kelasmutu = $i->post("kelasmutu3");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji4");
			$satuan = $i->post("satuan4");
			$metodeuji = $i->post("metodeuji4");
			$hasiluji = $i->post("hasiluji4");
			$kelasmutu = $i->post("kelasmutu4");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji5");
			$satuan = $i->post("satuan5");
			$metodeuji = $i->post("metodeuji5");
			$hasiluji = $i->post("hasiluji5");
			$kelasmutu = $i->post("kelasmutu5");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji6");
			$satuan = $i->post("satuan6");
			$metodeuji = $i->post("metodeuji6");
			$hasiluji = $i->post("hasiluji6");
			$kelasmutu = $i->post("kelasmutu6");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji7");
			$satuan = $i->post("satuan7");
			$metodeuji = $i->post("metodeuji7");
			$hasiluji = $i->post("hasiluji7");
			$kelasmutu = $i->post("kelasmutu7");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "3") {
			//kopi
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);


			$jenisuji = $i->post("jenisuji2");
			$satuan = $i->post("satuan2");
			$metodeuji = $i->post("metodeuji2");
			$hasiluji = $i->post("hasiluji2");
			$kelasmutu = $i->post("kelasmutu2");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji3");
			$satuan = $i->post("satuan3");
			$metodeuji = $i->post("metodeuji3");
			$hasiluji = $i->post("hasiluji3");
			$kelasmutu = $i->post("kelasmutu3");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji4");
			$satuan = $i->post("satuan4");
			$metodeuji = $i->post("metodeuji4");
			$hasiluji = $i->post("hasiluji4");
			$kelasmutu = $i->post("kelasmutu4");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji5");
			$satuan = $i->post("satuan5");
			$metodeuji = $i->post("metodeuji5");
			$hasiluji = $i->post("hasiluji5");
			$kelasmutu = $i->post("kelasmutu5");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => "",
				"kelasmutu" => ""
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji6");
			$satuan = $i->post("satuan6");
			$metodeuji = $i->post("metodeuji6");
			$hasiluji = $i->post("hasiluji6");
			$kelasmutu = $i->post("kelasmutu6");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji7");
			$satuan = $i->post("satuan7");
			$metodeuji = $i->post("metodeuji7");
			$hasiluji = $i->post("hasiluji7");
			$kelasmutu = $i->post("kelasmutu7");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji8");
			$satuan = $i->post("satuan8");
			$metodeuji = $i->post("metodeuji8");
			$hasiluji = $i->post("hasiluji8");
			$kelasmutu = $i->post("kelasmutu8");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "4") {
			//kedelai
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);


			$jenisuji = $i->post("jenisuji2");
			$satuan = $i->post("satuan2");
			$metodeuji = $i->post("metodeuji2");
			$hasiluji = $i->post("hasiluji2");
			$kelasmutu = $i->post("kelasmutu2");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji3");
			$satuan = $i->post("satuan3");
			$metodeuji = $i->post("metodeuji3");
			$hasiluji = $i->post("hasiluji3");
			$kelasmutu = $i->post("kelasmutu3");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji4");
			$satuan = $i->post("satuan4");
			$metodeuji = $i->post("metodeuji4");
			$hasiluji = $i->post("hasiluji4");
			$kelasmutu = $i->post("kelasmutu4");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji5");
			$satuan = $i->post("satuan5");
			$metodeuji = $i->post("metodeuji5");
			$hasiluji = $i->post("hasiluji5");
			$kelasmutu = $i->post("kelasmutu5");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "5") {
			//jagung
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "6") {
			//sorgum
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "7") {
			//polong
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);


			$jenisuji = $i->post("jenisuji2");
			$satuan = $i->post("satuan2");
			$metodeuji = $i->post("metodeuji2");
			$hasiluji = $i->post("hasiluji2");
			$kelasmutu = $i->post("kelasmutu2");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji3");
			$satuan = $i->post("satuan3");
			$metodeuji = $i->post("metodeuji3");
			$hasiluji = $i->post("hasiluji3");
			$kelasmutu = $i->post("kelasmutu3");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji4");
			$satuan = $i->post("satuan4");
			$metodeuji = $i->post("metodeuji4");
			$hasiluji = $i->post("hasiluji4");
			$kelasmutu = $i->post("kelasmutu4");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji5");
			$satuan = $i->post("satuan5");
			$metodeuji = $i->post("metodeuji5");
			$hasiluji = $i->post("hasiluji5");
			$kelasmutu = $i->post("kelasmutu5");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => "",
				"kelasmutu" => ""
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "8") {
			//polong
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);


			$jenisuji = $i->post("jenisuji2");
			$satuan = $i->post("satuan2");
			$metodeuji = $i->post("metodeuji2");
			$hasiluji = $i->post("hasiluji2");
			$kelasmutu = $i->post("kelasmutu2");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji3");
			$satuan = $i->post("satuan3");
			$metodeuji = $i->post("metodeuji3");
			$hasiluji = $i->post("hasiluji3");
			$kelasmutu = $i->post("kelasmutu3");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji4");
			$satuan = $i->post("satuan4");
			$metodeuji = $i->post("metodeuji4");
			$hasiluji = $i->post("hasiluji4");
			$kelasmutu = $i->post("kelasmutu4");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji5");
			$satuan = $i->post("satuan5");
			$metodeuji = $i->post("metodeuji5");
			$hasiluji = $i->post("hasiluji5");
			$kelasmutu = $i->post("kelasmutu5");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => "",
				"kelasmutu" => ""
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "9") {
			//polong
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);


			$jenisuji = $i->post("jenisuji2");
			$satuan = $i->post("satuan2");
			$metodeuji = $i->post("metodeuji2");
			$hasiluji = $i->post("hasiluji2");
			$kelasmutu = $i->post("kelasmutu2");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji3");
			$satuan = $i->post("satuan3");
			$metodeuji = $i->post("metodeuji3");
			$hasiluji = $i->post("hasiluji3");
			$kelasmutu = $i->post("kelasmutu3");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);

			$jenisuji = $i->post("jenisuji4");
			$satuan = $i->post("satuan4");
			$metodeuji = $i->post("metodeuji4");
			$hasiluji = $i->post("hasiluji4");
			$kelasmutu = $i->post("kelasmutu4");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		} elseif ($idjenisdetail == "10") {
			//jagung
			$jenisuji = $i->post("jenisuji1");
			$satuan = $i->post("satuan1");
			$metodeuji = $i->post("metodeuji1");
			$hasiluji = $i->post("hasiluji1");
			$kelasmutu = $i->post("kelasmutu1");


			$arr = array();
			$arr = array(
				"idlayanan_ujimutu" => $id_layanan,
				"jenisuji" => $jenisuji,
				"satuan" => $satuan,
				"metodeuji" => $metodeuji,
				"hasiluji" => $hasiluji,
				"kelasmutu" => $kelasmutu
			);
			$this->model_user->insertData("layanan_ujimutu_hasil", $arr);
		}
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$arr = array();
		$arr = array(
			"validManTek" => 0,
			"tanggalValidLab" => date("Y-m-d h:i"),
			"validLab" => 1,
			"userValidLab" => $data['datalogin']['id_user'],
			"kesimpulan" => $kesimpulan
		);

		if ($this->model_user->updateData('layanan_ujimutu', $id_layanan, 'uid', $arr)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Gagal menyimpan data</div>");
		}

		redirect("dashboard/valid_hasilpengujian");

		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	function proses_valid_ujimantek()
	{

		$i = $this->input;
		$id_layanan = $i->post("id_layanan");
		$kode_pendaftaran = $i->post("kode_pendaftaran");
		$idjenis = $i->post("idjenis");
		$idjenisdetail = $i->post("idjenisdetail");
		$data['id_layanan'] = $id_layanan;
		$data['kode_pendaftaran'] = $kode_pendaftaran;
		$data['idjenis'] = $idjenis;
		$data['idjenisdetail'] = $idjenisdetail;
		$tahun = date("Y");
		$bulan = date("m");
		$kodeKota = "SKA";
		if ($idjenis == 1) {
			$kodeKota = "UNG";
		}
		//$sSQL = "SELECT max(SUBSTRING(kode_pendaftaran, 17, 3)) as maxID FROM layanan_ujimutu WHERE kode_pendaftaran like '%".$tahun."'";
		//$sSQL = "SELECT max(SUBSTRING(kodelhu, 11, 3)) as maxID FROM layanan_ujimutu WHERE kodelhu like '%".$kodeKota."/%".$tahun."'";
		$sSQL = "SELECT max(SUBSTRING(kodelhu, 8, 3)) as maxID FROM layanan_ujimutu WHERE kodelhu like '%" . "/" . $tahun . "'";
		$datakota = $this->model_user->getDataBySQL($sSQL);
		$idMax = $datakota->maxID;
		$noUrut = (int) $idMax;
		$noUrut++;
		$month = array('01' => 'I', '02' => 'II', '03' => 'III', '04' => 'IV', '05' => 'V', '06' => 'VI', '07' => 'VII', '08' => 'VIII', '09' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII');
		//$kodependaftaran = $kota."/BPMKP/PSAT".sprintf("%03s", $noUrut)."/".$month[$bulan]."/".$tahun;
		$kodependaftaran = "526.31/" . sprintf("%03s", $noUrut) . "/" . "LHU/" . $month[$bulan] . "/" . $tahun;

		$arr = array();
		$arr = array(
			"tanggalManTek" => date("Y-m-d h:i"),
			"validManTek" => 1,
			"kodelhu" => $kodependaftaran,
			"userValidMantek" => $data['datalogin']['id_user']
		);
		print_r($arr);
		/*if($this->model_user->updateData('layanan_ujimutu',$id_layanan,'uid',$arr)){
								$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil disimpan</div>");
							}else{
								$this->session->set_flashdata("status","<div class='alert alert-success'>Gagal menyimpan data</div>");
							}
	
							redirect("dashboard/valid_hasilpengujian");
	*/
		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	function update_valid_sample()
	{

		$i = $this->input;
		$alasan_penolakan = $i->post("alasan_penolakan");
		$id_layanan = $i->post("id_layanan");
		$berat = $i->post("berat");
		$kondisi = $i->post("kondisi");
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$arr = array();
		$arr = array(
			"tanggalsampleLab" => date("Y-m-d h:i"),
			"sampleLab" => 1,
			"berat" => $berat,
			"kondisi" => $kondisi,
			"userValidSample" => $data['datalogin']['id_user']
		);

		if ($this->model_user->updateData('layanan_ujimutu', $id_layanan, 'uid', $arr)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Data berhasil disimpan</div>");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Gagal menyimpan data</div>");
		}

		redirect("dashboard/valid_sample");

		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	function helloword()
	{
		echo "Hello";
	}


	function update_valid_ujimtek()
	{

		$i = $this->input;
		$id_layanan = $i->post("id_layanan");
		$kode_pendaftaran = $i->post("kode_pendaftaran");
		$idjenis = $i->post("idjenis");
		$idjenisdetail = $i->post("idjenisdetail");
		$data['id_layanan'] = $id_layanan;
		$data['kode_pendaftaran'] = $kode_pendaftaran;
		$data['idjenis'] = $idjenis;
		$data['idjenisdetail'] = $idjenisdetail;
		$data['namajenis'] = $i->post("namajenis");
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['detail'] = $this->model_ujimutu->getDataUjiMutuValidLabByID($id_layanan);
		$data['hasil'] = $this->model_ujimutu->getDataHasilUjiMutuByID($id_layanan);
		/*if($idjenisdetail == "1"){
			//gabah
		
			$this->loadView("dashboard_view/pages/m_teknis/prosesgabah",$data);
		}elseif($idjenisdetail == "2"){
			//padi
		
			$this->loadView("dashboard_view/pages/m_teknis/prosesgabah",$data);*/
		if ($idjenisdetail > 0) {
			//gabah

			$this->loadView("dashboard_view/pages/m_teknis/prosesgabah", $data);
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Laporan Pengujian jenis tersebut belum tersedia.</div>");

			redirect("dashboard/mteklist_validujimutu");
		}

		// $this->loadView('dashboard_view/cetak/pernyataan_kesanggupan');
	}

	function mtek_validasi_ujimutu()
	{
		$i = $this->input;
		$id_layanan = $i->post("id_layanan");
		$idjenis = $i->post("id_jenis");
		$arr = array("valid" => 1);

		$data['datalogin'] = $this->session->userdata("dataLogin");
		$tahun = date("Y");
		$bulan = date("m");
		$kodeKota = "SKA";
		if ($idjenis == 1) {
			$kodeKota = "UNG";
		}
		//$sSQL = "SELECT max(SUBSTRING(kode_pendaftaran, 17, 3)) as maxID FROM layanan_ujimutu WHERE kode_pendaftaran like '%".$tahun."'";
		$sSQL = "SELECT max(SUBSTRING(kodelhu, 8, 3)) as maxID FROM layanan_ujimutu WHERE kodelhu like '%" . "/" . $tahun . "'";
		$datakota = $this->model_user->getDataBySQL($sSQL);
		$idMax = $datakota->maxID;
		$noUrut = (int) $idMax;
		$noUrut++;
		$month = array('01' => 'I', '02' => 'II', '03' => 'III', '04' => 'IV', '05' => 'V', '06' => 'VI', '07' => 'VII', '08' => 'VIII', '09' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII');
		//$kodependaftaran = $kota."/BPMKP/PSAT".sprintf("%03s", $noUrut)."/".$month[$bulan]."/".$tahun;
		$kodependaftaran = "526.31/" . "" . sprintf("%03s", $noUrut) . "/" . "LHU/" . $month[$bulan] . "/" . $tahun;

		$arr2 = array(
			"tanggalManTek" => date("Y-m-d h:i"),
			"validManTek" => 1,
			"kodelhu" => $kodependaftaran,
			"userValidMantek" => $data['datalogin']['id_user']
		);
		$this->db->trans_begin();
		if ($this->model_user->updateLayananmutuDetail('layanan_ujimutu_hasil', $id_layanan, $arr) && $this->model_user->updateData('layanan_ujimutu', $id_layanan, 'uid', $arr2)) {
			$this->db->trans_commit();
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Proses berhasil disimpan</div>");
			redirect("dashboard/mteklist_validujimutu", 'redirect');
		} else {
			$this->db->trans_rollback();
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Proses Gagal Disimpan</div>");
			redirect("dashboard/mteklist_validujimutu", 'redirect');
		}
	}


	function mtek_tolak_ujimutu()
	{
		$i = $this->input;
		$id_layanan = $i->post("id_layanan");
		$alasan = $i->post("alasan");
		$arr = array("valid" => 2);

		$data['datalogin'] = $this->session->userdata("dataLogin");
		$arr2 = array(
			"alasantolakmtek" => $alasan,
			"validManTek" => 2,
			"userValidMantek" => $data['datalogin']['id_user']
		);
		$this->db->trans_begin();
		if ($this->model_user->updateData('layanan_ujimutu_hasil', $id_layanan, 'idlayanan_ujimutu', $arr) && $this->model_user->updateData('layanan_ujimutu', $id_layanan, 'uid', $arr2)) {
			$this->db->trans_commit();
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Proses berhasil disimpan</div>");
			redirect("dashboard/mteklist_validujimutu", 'redirect');
		} else {
			$this->db->trans_rollback();
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Proses Gagal Disimpan</div>");
			redirect("dashboard/mteklist_validujimutu", 'redirect');
		}
	}

	function u_layanan_cetakLHU()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['sample'] = $this->model_ujimutu->getDataUjiMutuLHUDetail();
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$this->loadView("dashboard_view/analislabvalidLHU", $data);
	}

	function cetakLHU()
	{
		$i = $this->input;
		$id_layanan = $i->post("id_layanan");

		$tanggal = $i->post("tanggal");
		$arr2 = array(
			"tglcetak" => $tanggal
		);
		$this->db->trans_begin();
		if ($this->model_user->updateData('layanan_ujimutu', $id_layanan, 'uid', $arr2)) {
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
		$data['detail'] = $this->model_ujimutu->getDataUjiMutuLHUDetailByID($id_layanan);
		$data['hasil'] = $this->model_ujimutu->getDataHasilUjiMutuLHUByID($id_layanan);
		$data['balai'] = $this->model_ujimutu->getPimpinanBalai();
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
		$data['tanggal'] = $tanggal;
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = './assets/'; //string, the default is application/cache/
		$config['errorlog']     = './assets/'; //string, the default is application/logs/
		$config['imagedir']     = ''; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
		$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name = 'qrcode.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $data['detail'][0]['kodelhu']; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		$data['qrcode'] = $image_name;
		$cetak = $this->loadView('dashboard_view/cetak/lhu', $data, TRUE);
		$mpdf = new \Mpdf\Mpdf([
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 5,
			'margin_bottom' => 5,
			'margin_header' => 9,
			'margin_footer' => 9
		]);
		//$cetak = $this->load->view('hasilPrint', [], TRUE);
		$cetak = $this->load->view('dashboard_view/cetak/lhu', $data, TRUE);
		$mpdf->WriteHTML($cetak);
		$mpdf->Output();
	}

	function uploadLHU()
	{
		$id_layanan = $this->input->post('id_layananu');
		$uploademail = $this->input->post('uploademail');
		$uploadnama = $this->input->post('uploadnama');
		$uploadkode = $this->input->post('uploadkode');
		$files = $_FILES;
		// $lokasi = "./upload/Dokumen_Dinas/Sertifikat/";
		// $isUpload = $this->upload_dokumen($_FILES,'gambar',$lokasi)

		$data['nama'] = $uploadnama;
		$data['kode'] = $uploadkode;
		$message = $this->load->view('default/email/notifikasi_sertifikat_terbit', $data, true);
		$this->kirim_email("Pemberitahuan", $uploademail, $message);
		if ($this->uploads($_FILES, 'gambar') == null) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Dokumen tidak dapat diunggah</div>");
			redirect("dashboard/u_layanan_cetakLHU");
		} else {
			$gambar_temp = $this->uploads($_FILES, 'gambar');
			$gambar = file_get_contents($gambar_temp['full_path']);
			$data = array("sertifikat" => $gambar, "mime_type" => $_FILES['gambar']['type']);
			$this->model_user->updateData('layanan_ujimutu', $id_layanan, 'uid', $data);

			redirect("dashboard/u_layanan_cetakLHU");
		}
	}

	function survey()
	{
		$id_layanan = $this->input->get("uid") ?? 0;
		$kode_layanan = $this->input->get("layanan") ?? 0;

		$userdata = $this->session->userdata("dataLogin");
		$layanan = $this->model_admin->getDataWhere($kode_layanan == "ujimutu" ? "layanan_ujimutu" : "layanan", "uid", $id_layanan);
		$identitas_usaha = $this->model_admin->getDataWhere("identitas_usaha", "id_user", $userdata['id_user']);
		if (sizeof($identitas_usaha) == 0) {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Anda tidak memiliki akses ke halaman ini</div>");
			redirect("dashboard");
		}

		if ($layanan[0]["kode_layanan"] == "prima_2" || $layanan[0]["kode_layanan"] == "prima_3")
			$jenis = "okkpd";
		else
			$jenis = "ujimutu";
		$data["properties"] = array(
			"jenis_kelamin" => data_jenis_kelamin(),
			"pendidikan" => data_pendidikan(), "pekerjaan" => data_pekerjaan(), "pelayanan" => data_pelayanan($jenis)
		);
		$data['id_layanan'] = $id_layanan;
		$data['jenis'] = $jenis;
		$data["identitas"] = data_identitas_survey($jenis);
		$periode = date("Y");
		$surveyData = $this->model_admin->getKuesioner($periode, $jenis);
		$data['list_survey'] = array_filter($surveyData, function ($k) {
			return $k["deleted"] == 0;
		});
		$this->loadView("dashboard_view/survey/index", $data);
	}

	function simpan_survey()
	{
		$input = $this->input;
		$jenis = $input->post("jenis");
		$param = array();
		foreach (data_identitas_survey($jenis) as $element) {
			if ($element[0] != "tanggal_survey" && $element[0] != "kecamatan" && $element[0] != "kota" && $element[0] != "provinsi") {
				if ($element[0] == "alamat" && $jenis == "okkpd") {
					$param[$element[0]] = $input->post($element[0]) . " Kec. " . $input->post("kecamatan") . " Kota/Kab " . $input->post("kota") . ", " . $input->post("provinsi");
				} else {
					$param[$element[0]] = $input->post($element[0]);
				}
			}
		}
		$param["saran"] = $input->post("saran");
		$answers = $input->post("kuesioner");
		$id_survey = $this->model_admin->insertGetID("survey_data", $param);
		if ($jenis == "ujimutu") {
			$this->model_admin->updateData("layanan_ujimutu", $input->post("layanan"), "uid", array("id_survey" => $id_survey));
		} else {
			$this->model_admin->updateData("layanan", $input->post("layanan"), "uid", array("id_survey" => $id_survey));
		}
		foreach ($answers as $element) {
			$param_survey = array();
			$param_survey["id_kuesioner"] = $element['pertanyaan'][1];
			$param_survey["id_survey"] = $id_survey;
			$param_survey["nilai"] = $element['pertanyaan'][0];
			$param_survey["pertanyaan"] = $element['soal'][0];
			$param_survey["kepentingan"] = array_key_exists("kepentingan", $element) ? $element['kepentingan'][0] : 0;
			$this->model_admin->insertData("survey_kuesioner", $param_survey);
		}
		$this->session->set_flashdata("status", "<div class='alert alert-success'>Data survey berhasil disimpan</div>");
		redirect("dashboard");
	}
}
