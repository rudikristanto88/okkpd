<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		$this->load->model('model_dokumen');
	}

	public function testEmail()
	{
		$data['nama'] = "Yoga Adi Dharma";
		$data['alamat'] = "Yoga Adi Dharma";
		$time = strtotime('10/16/2003 14:00');
		$tahun = date('Y', $time);
		$bulan = date('m', $time);
		$tanggal = date('d', $time);
		$menit = date('mi', $time);
		$detik = date('s', $time);
		$data['tanggal'] = $tahun . ' ' . $this->bulan[$bulan - 1];

		$this->load->view('default/email/notifikasi_pelaksana', $data);
		// $this->kirim_email("test","suwju@ashotmail.com",$message);

	}

	public function index()
	{
		$data['islogin'] = false;

		if ($this->session->userdata("dataLogin") != null) {
			$data['islogin'] = true;
		}
		$data['slider'] = $this->model_user->getAllData('gambar_slider');
		$data['berita'] = $this->model_user->getberitahome();
		$data['footer'] = $this->model_user->getAllData('kontak_kami');
		$data['link'] = $this->model_user->getAllData('tautan');
		$data['panduan'] = $this->model_user->getAllData('panduan');


		$this->load->view('default/template/header', $data);
		$this->load->view('default/template/navigation');
		$this->load->view('default/index', $data);
		$this->load->view('default/template/footer', $data);
		$this->load->view('default/template/footer_navigation', $data);
	}

	public function sign_up($status = null)
	{
		$data['islogin'] = false;
		$data['kota'] = $this->model_user->getDataKota();
		if ($this->session->userdata("dataLogin") != null) {
			$data['islogin'] = true;
		}

		if ($status != null && $status == "success") {
			$this->loadView('default/sign_up_success', $data);
		} else {
			$this->loadView('default/sign_up', $data);
		}
	}

	public function verifikasi()
	{
		$i = $this->input;

		$validate = $this->model_user->validasi($i->post('username'), $i->post('password'), "pelaku");
		if ($validate == 1) {
			redirect("dashboard", "redirect");
		} else if ($validate == 2) {
			$this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Akun anda belum aktif, silahkan aktivasi melalui email</div>");
			redirect("home/pendaftaran_online", "redirect");
		} else {
			$this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Username atau password tidak ditemukan</div>");
			redirect("home/pendaftaran_online", "redirect");
		}
	}

	public function sign_up_process()
	{
		$i = $this->input;
		$username = $i->post("username");
		$password = $i->post("password");
		$nama_lengkap = $i->post("nama_lengkap");
		$alamat = $i->post("alamat");
		$kode_kota = $i->post("kode_kota");
		$nomor_ktp = $i->post("nomor_ktp");
		$siup = $i->post("siup");
		$foto_ktp = $i->post("foto_ktp");

		$data = array(
			'id_user' => null,
			'nama_lengkap' => $nama_lengkap,
			'username' => $username,
			'password' => sha1('Okkpd2018!' . $password),
			'alamat_lengkap' => $alamat,
			'kode_kota' => $kode_kota,
			'no_ktp' => $nomor_ktp,
			'siup' => $siup,
			// 'foto_ktp'=>"",
			'kode_role' => 'pelaku'
		);

		if ($this->model_user->cek_username($username) > 0) {
			$this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Maaf, username / email tersebut sudah pernah digunakan, silahkan gunakan email lainnya</div>");
			redirect("home/sign_up", "redirect");
		}

		$email_to = $username;
		$subject = "Aktivasi Pendaftaran";

		if ($this->model_user->insertData('user', $data)) {

			$data['link'] = base_url() . '/home/activation/?verify=' . sha1($email_to) . sha1($subject);
			$data['nama'] = $nama_lengkap;
			$message = $this->load->view('default/email/user_validation', $data, true);

			$this->kirim_email($subject, $email_to, $message);
			$this->session->set_flashdata("status_registrasi", "<div class='alert alert-success'>Berhasil mendaftar, Silahkan aktifkan akun anda melalui email</div>");
			redirect("home/sign_up/success", "redirect");
		} else {
			$this->session->set_flashdata("status_registrasi", "<div class='alert alert-warning'>Terjadi kesalahan saat pendaftaran</div>");
			redirect("home/sign_up", "redirect");
		}
	}


	public function loadView($halaman, $data)
	{
		$data['islogin'] = false;

		if ($this->session->userdata("dataLogin") != null) {
			$data['islogin'] = true;
		}
		$data['footer'] = $this->model_user->getAllData('kontak_kami');
		$data['link'] = $this->model_user->getAllData('tautan');
		$data['panduan'] = $this->model_user->getAllData('panduan');
		$this->load->view('default/template/header', $data);
		$this->load->view('default/template/navigation-small');
		$this->load->view($halaman, $data);
		$this->load->view('default/template/footer', $data);
	}

	public function kirim()
	{
		$this->kirim_email("coba", 'yogaadidr@gmail.com', 'ini pesan coba cona');
	}

	public function berita($slug)
	{
		if ($slug == null) {
			redirect("Home");
		} else {
			$berita = $this->model_user->getDataWhere('berita', 'slug', $slug);
			foreach ($berita as $data['berita']);
			$this->loadView('default/berita', $data);
		}
	}

	public function visi_misi()
	{
		$data['menu'] = 'Visi Misi';

		$data['visi'] = $this->model_admin->getAllData("tentang_kami");
		$this->loadView('default/about', $data);
	}

	public function struktur_organisasi()
	{
		$data['menu'] = 'Struktur Organisasi';
		$data['about'] = $this->model_admin->getAllData("tentang_kami");
		$this->loadView('default/struktur', $data);
	}


	public function maklumat()
	{
		$data['menu'] = 'Maklumat';
		$data['maklumat'] = $this->model_admin->getAllData("tentang_kami");
		$this->loadView('default/maklumat', $data);
	}

	public function tugas_fungsi()
	{
		$data['menu'] = 'Tugas dan Fungsi';
		$data['tugas_fungsi'] = $this->model_admin->getAllData("tentang_kami");
		$this->loadView('default/tugas', $data);
	}

	public function legalitas()
	{
		$data['menu'] = 'Legalitas';
		$data['legalitas'] = $this->model_admin->getAllData("tentang_kami");
		$this->loadView('default/legalitas', $data);
	}

	public function pendaftaran_online()
	{
		$data['menu'] = 'Pendaftaran Online';
		$this->loadView('default/pendaftaran_online', $data);
	}

	public function lupa_sandi()
	{
		$data['menu'] = 'Lupa Sandi';
		$this->loadView('default/lupa_sandi', $data);
	}
	public function notifikasi_reset_password($berhasil = false)
	{
		$email = $this->input->post('username');
		$email_to = $email;
		$subject = "Atur Ulang Sandi";
		$message = 'Silahkan untuk mengikuti tautan dibawah ini untuk mereset sandi anda : <br/>
		' . base_url() . 'home/reset_password/?reset=' . sha1($email_to) . sha1($subject);
		$data['send'] = true;

		if ($berhasil == false) {
			$data['kata'] = "Silahkan cek email anda untuk melihat tautan penggantian sandi";
			$this->kirim_email($subject, $email_to, $message);
		} else {
			$data['kata'] = "Kata sandi telah diubah";
		}

		$this->loadView('default/reset_password', $data);
	}

	public function reset_password($menu = null)
	{

		if ($menu == null) {
			$data['verify'] = $_GET['reset'];
			$data['send'] = false;
			$this->loadView('default/reset_password', $data);
		} else if ($menu == 'send') {
			$password_baru = $this->input->post('password_baru');
			$ulang_password = $this->input->post('ulang_password');
			$verify = $this->input->post('verify');

			if ($password_baru != $ulang_password) {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Password yang dimasukkan belum sesuai</div>");
				redirect("home/reset_password/?reset=" . $verify, "redirect");
			}
			if ($this->model_user->resetPassword($password_baru, $verify)) {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Kata</div>");
				redirect("home/notifikasi_reset_password/true", "redirect");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Kata</div>");
				redirect("home/reset_password", "redirect");
			}
		} else {
			redirect('home/reset_password');
		}
	}

	public function hubungi_kami()
	{
		$data['menu'] = 'Hubungi Kami';
		$this->loadView('default/kontak', $data);
	}



	public function kontak_kami()
	{
		$data['menu'] = 'Kontak Kami';

		$i = $this->input;
		$nama = $i->post("nama");
		$email = $i->post("email");
		$judul = $i->post("judul");
		$pesan = $i->post("pesan");


		$data = array('nama' => $nama, 'email' => $email, 'judul' => $judul, 'pesan' => $pesan);

		if ($this->model_admin->insertData("pesan", $data)) {
			$this->session->set_flashdata("status", "<div class='alert alert-success'>Pesan terkirim</div>");
			redirect("home/hubungi_kami", "redirect");
		} else {
			$this->session->set_flashdata("status", "<div class='alert alert-warning'>Ups! gagal mengirim pesan</div>");
			redirect("home/hubungi_kami", "redirect");
		}
	}

	public function keluhan_saran($menu = null)
	{
		$data['menu'] = 'Keluhan dan Saran';
		if ($menu == null || $menu != "kirim") {
			$this->loadView('default/saran', $data);
		} else {
			if ($this->input->post('nama') == '' || $menu != 'kirim') {
				redirect("home/keluhan_saran", "redirect");
			}


			$lokasi = $this->lokasi("dokumen_dinas") . 'Keluhan_Saran/';
			$dokumen = null;
			$dokumen_temp = $this->upload_dokumen($_FILES, 'dokumen', $lokasi);
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$pesan = $this->input->post('pesan');
			$jenis = $this->input->post('jenis');
			$no_telp = $this->input->post('no_telp');

			$data = array('nama' => $nama, 'email' => $email, 'pesan' => $pesan, 'jenis' => $jenis, "no_telp" => $no_telp);

			if ($dokumen_temp != null) {
				$file = $lokasi . $dokumen_temp["file_name"];
				$data["dokumen"] = $file;
			}

			if ($this->model_user->insertData('keluhan_saran', $data)) {
				$this->session->set_flashdata("status", "<div class='alert alert-success'>Terima Kasih. Keluhan / Saran anda sudah terkirim</div>");
			} else {
				$this->session->set_flashdata("status", "<div class='alert alert-warning'>Ups! Terjadi kesalahan ketika mengirim data, coba lagi</div>");
			}
			redirect("home/keluhan_saran", "redirect");
		}
	}


	public function status_perizinan()
	{
		$data['menu'] = 'Status Perizinan';
		$this->loadView('default/status', $data);
	}

	public function regulasi()
	{
		$data['menu'] = 'Regulasi';
		$data['produk_hukum'] = $this->model_user->getAllData('produk_hukum');
		$this->loadView('default/regulasi', $data);
	}

	public function info_layanan($jenis = null)
	{
		$data['menu'] = 'Info Layanan';

		$data['islogin'] = false;
		if ($this->session->userdata("dataLogin") != null) {
			$data['islogin'] = true;
		}
		if ($jenis == null) {
			$data['layanan'] = $this->model_user->getDataWhere("master_layanan", "status", 1);
			$this->loadViewHome('default/layanan', $data);
		} else {
			$data['jenis'] = $jenis;
			$data['info_layanan'] = $this->model_user->getDataWhere('info_layanan', 'kode_layanan', $jenis);
			$data['layanan'] =  $this->model_user->getDataWhere("master_layanan", "kode_layanan", $jenis)[0];
			$this->loadViewHome('default/info_layanan', $data);
		}
	}

	public function sertifikasi_prima_2()
	{
		$data['menu'] = 'Info Layanan';
		$this->loadView('default/prima2', $data);
	}

	public function sertifikasi_prima_3()
	{
		$data['menu'] = 'Info Layanan';
		$this->loadView('default/prima3', $data);
	}

	public function pendaftaran_psat()
	{
		$data['menu'] = 'Info Layanan';

		$this->loadView('default/psat', $data);
	}

	public function pendaftaran_rumah_kemas()
	{
		$data['menu'] = 'Info Layanan';

		$this->loadView('default/rumah_kemas', $data);
	}

	public function penerbitan_health_certificate()
	{
		$data['menu'] = 'Info Layanan';

		$this->loadView('default/hc', $data);
	}

	public function penerbitan_hygne_sanitation()
	{
		$data['menu'] = 'Info Layanan';

		$this->loadView('default/hs', $data);
	}
	//
	// public function penerbitan_hygne_sanitation()
	// {
	// 	$data['islogin'] = false;
	//
	// 	if($this->session->userdata("dataLogin") != null){
	// 		$data['islogin'] = true;
	// 	}
	// 	$this->load->view('default/template/header',$data);
	// 	$this->load->view('default/template/navigation-small');
	// 	$this->load->view('default/hs');
	// 	$this->load->view('default/template/footer');
	// }

	public function aktivasi()
	{
		$email_to = 'yogaadidr@gmail.com';
		$subject = "Aktivasi Pendaftaran";

		$message = base_url() . '/home/activation/?verify=' . sha1($email_to) . sha1($subject);
		$this->kirim_email($subject, $email_to, $message);
	}
	public function activation()
	{
		$data =  $_GET['verify'];
		if ($this->model_user->verificationUser($data)) {
			$this->load->view('default/template/header');
			$this->load->view('default/verifikasi_akun', $data);
		}
	}


	public function getStatusLayanan()
	{
		$kode_pendaftaran = $this->input->post("nomor_pendaftaran");
		$hasil = $this->model_dokumen->getStatusLayanan($kode_pendaftaran);
		if (sizeof($hasil) < 1) {
			echo "<div class='alert alert-warning'>Tidak ditemukan informasi layanan dengan nomor pendaftaran <b>" . $kode_pendaftaran . "</b></div>";
		} else {
			foreach ($hasil as $data['status']);
			$data['kode'] = $kode_pendaftaran;
			$data['bulan'] = $this->bulan;
			$this->load->view('default/timeline', $data);
		}
	}

	public function getStatusSertifikat()
	{
		$nomor_sertifikat = $this->input->post("nomor_sertifikat");
		$hasil = $this->model_dokumen->getStatusSertifikat($nomor_sertifikat);
		if (sizeof($hasil) < 1) {
			echo "<div class='alert alert-warning'>Tidak ditemukan informasi layanan dengan nomor sertifikat <b>" . $nomor_sertifikat . "</b></div>";
		} else {
			foreach ($hasil as $data['status']);

			$this->load->view('default/status_sertifikat', $data);
		}
	}

	public function basis_data($menu = null, $submenu = null)
	{
		$data = [];
		if ($menu == null) {
			$data["menu"] = array(array("url" => "uji_mutu", "title" => "UJI MUTU PSAT"), array("url" => "okkpd", "title" => "OKKPD/SERTIFIKASI"));
			$this->loadViewHome('default/basis_data/index', $data, false);
		} else {

			if ($menu != null && $submenu == null) {
				if ($menu == "okkpd") {
					$data["menu"] = $menu;
					$data["submenu"] = array(array("url" => "prima_3", "title" => "Sertifikasi Prima 3"), array("url" => "prima_2", "title" => "Sertifikasi Prima 2"));
				}
				$this->loadViewHome('default/basis_data/' . $menu, $data, false);
			} else {
				$temp = $this->model_admin->getsertifikat();
				$data['layanan'] = $this->model_user->getDataWhere("master_layanan", "kode_layanan", $submenu)[0];
				$temp = array_filter($temp, function ($k) use ($submenu) {
					return $k["kode_layanan"] == $submenu;
				});
				$data['data'] = $temp;
				$data['submenu'] = $submenu;
				$this->loadViewHome('default/basis_data/detail', $data, false);
			}
		}
	}

	public function basis_data_okkpd($submenu = null)
	{
		if ($submenu == null) {
			$data["menu"] = "okkpd";
			$data["submenu"] = array(array("url" => "prima_3", "title" => "Sertifikasi Prima 3"), array("url" => "prima_2", "title" => "Sertifikasi Prima 2"));
			$this->loadViewHome('default/basis_data/okkpd', $data, false);
		} else {
			if ($submenu != 'prima_2' && $submenu != 'prima_3' && $submenu != "mutupangan") {
				header("location:" . base_url());
			}
			$temp = $this->model_admin->getsertifikat();
			$data['layanan'] = $this->model_user->getDataWhere("master_layanan", "kode_layanan", $submenu);
			$temp = array_filter($temp, function ($k) use ($submenu) {
				return $k["kode_layanan"] == $submenu;
			});
			$data['data'] = $temp;
			$data['submenu'] = $submenu;
			$this->loadViewHome('default/basis_data/detail', $data, false);
		}
	}
}
