<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('model_user');
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->menu =  $this->model_user->getMenu($this->saya());
		$this->bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
	}
	public function index()
	{
		if($this->session->userdata("dataLogin") == null){
			redirect("home/pendaftaran_online","redirect");
		}
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->load->view('dashboard_view/template/header',$data,$this->menu);
		$this->load->view('dashboard_view/template/top_nav');
		$this->load->view('dashboard_view/template/side_nav',$this->menu);
		if($this->saya() == "admin"){
			$this->load->view('dashboard_view/dashboard_view',$data);
		}else if($this->saya() == "pelaku"){
			$idUsaha = $this->model_user->getIdUsaha($data['datalogin']['id_user']);
			$data['layanan'] = $this->model_user->getDataLayanan($idUsaha);
			$this->load->view('dashboard_view/main_dashboard',$data,$this->bulan);
		}else if($this->saya() == "m_teknis"){
			$data['inspeksi'] = $this->model_user->getDataInspeksi();
			$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
			$this->load->view('dashboard_view/dashboard_mt',$data);
		}
		$this->load->view('dashboard_view/template/footer');
	}

	public function saya(){
		$datalogin = $this->session->userdata("dataLogin");
		return $datalogin['kode_role'];
	}

	public function main()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->load->view('dashboard_view/fragment/main_fragment',$data);
	}

	public function daftar_usaha()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->load->view('dashboard_view/template/header',$data);
		$this->load->view('dashboard_view/template/top_nav');
		$this->load->view('dashboard_view/template/side_nav');
		$this->load->view('dashboard_view/fragment/daftar_usaha_fragment',$data);
		$this->load->view('dashboard_view/template/footer');
	}
	public function daftarkan_aktor()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$data['role'] = $this->model_user->getAllData("master_role");
		$data['kota'] = $this->model_user->getDataKota();
		$this->load->view('dashboard_view/template/header',$data);
		$this->load->view('dashboard_view/template/top_nav');
		$this->load->view('dashboard_view/template/side_nav');
		$this->load->view('dashboard_view/daftarkan_aktor',$data);
		$this->load->view('dashboard_view/template/footer');
	}

	public function registrasi_user()
	{
		$data['datalogin'] = $this->session->userdata("dataLogin");
		$this->load->view('dashboard_view/template/header',$data);
		$this->load->view('dashboard_view/template/top_nav');
		$this->load->view('dashboard_view/template/side_nav');
		$this->load->view('dashboard_view/fragment/daftar_usaha_fragment',$data);
		$this->load->view('dashboard_view/template/footer');
	}

	public function sign_in()
	{
		if($this->session->userdata("dataLogin") != null){
			redirect("dashboard","redirect");
		}
		$this->load->view('dashboard_view/template/header');
		$this->load->view('dashboard_view/sign-in');
		$this->load->view('dashboard_view/template/footer');
	}
	public function sign_up()
	{
		$data['islogin'] = false;
		$data['kota'] = $this->model_user->getDataKota();
		if($this->session->userdata("dataLogin") != null){
			$data['islogin'] = true;
		}
		$this->load->view('default/template/header',$data);
		$this->load->view('default/template/navigation-small');
		$this->load->view('default/sign_up',$data);
		$this->load->view('default/template/footer');
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
		$foto_ktp = $i->post("foto_ktp");

		$data = array('id_user'=>null,
		'nama_lengkap'=>$nama_lengkap,
		'username'=>$username,
		'password'=>sha1('Okkpd2018!'.$password),
		'alamat_lengkap'=>$alamat,
		'kode_kota'=>$kode_kota,
		'no_ktp'=>$nomor_ktp,
		'foto_ktp'=>"",
		'role'=>'pelaku_usaha');

		if($this->model_user->insertData('user',$data)){
			$this->session->set_flashdata("status_registrasi","<div class='alert alert-success'>Berhasil mendaftar, Silahkan aktifkan akun anda melalui email</div>");
			redirect("home/pendaftaran_online","redirect");
		}else{
			$this->session->set_flashdata("status_registrasi","<div class='alert alert-warning'>Terjadi kesalahan saat pendaftaran</div>");
			redirect("home/sign_up","redirect");

		}
	}

	public function insert_identitas_usaha(){
		$i = $this->input;
		$nama_pemohon = $i->post("nama_pemohon");
		$jabatan_pemohon = $i->post("jabatan_pemohon");
		$no_ktp_pemohon = $i->post("no_ktp_pemohon");
		$foto_ktp = null;
		$no_npwp = $i->post("no_npwp");
		$foto_npwp = null;//foto
		$nama_usaha = $i->post("nama_usaha");
		$alamat_usaha = $i->post("alamat_usaha");
		$rt = $i->post("rt");
		$rw = $i->post("rw");
		$kelurahan = $i->post("kelurahan");
		$kecamatan = $i->post("kecamatan");
		$kota = $i->post("kota");
		$no_telp = $i->post("no_telp");
		$no_hp_pemohon = $i->post("no_hp_pemohon");
		$kop_surat = null; //foto
		$unit_kerja = $i->post("nama_unit_kerja");
		$nama_pimpinan = $i->post("nama_pimpinan_unit_kerja");
		$jenis_usaha = $i->post("jenis_usaha");
		$max = 1000000;

		$foto_ktp_temp = $this->uploads($_FILES,'foto_ktp');
		$foto_npwp_temp = $this->uploads($_FILES,'foto_npwp');
		$kop_surat_temp = $this->uploads($_FILES,'kop_surat');

		if($_FILES['foto_ktp']['size'] > $max || $_FILES['foto_npwp']['size'] > $max || $_FILES['kop_surat']['size'] > $max){
			$this->session->set_flashdata("status","<div class='alert alert-warning'>File terlalu besar</div>");
			redirect("dashboard/identitas_usaha","redirect");
		}

		if($foto_ktp_temp!=null){
			$foto_ktp = file_get_contents($foto_ktp_temp['full_path']);
		}
		if($foto_npwp_temp!=null){
			$foto_npwp = file_get_contents($foto_npwp_temp['full_path']);
		}
		if($kop_surat_temp!=null){
			$kop_surat = file_get_contents($kop_surat_temp['full_path']);
		}

		$id_user = $this->session->userdata("dataLogin")['id_user'];

		$arr = array(
			"nama_pemohon" => $nama_pemohon,
			"jabatan_pemohon" => $jabatan_pemohon,
			"no_ktp_pemohon" => $no_ktp_pemohon,
			"foto_ktp" => $foto_ktp,
			"no_npwp" => $no_npwp,
			"foto_npwp" => $foto_npwp,
			"nama_usaha"=>$nama_usaha,
			"alamat_usaha"=>$alamat_usaha,
			"rt"=>$rt,
			"rw"=>$rw,
			"kelurahan"=>$kelurahan,
			"kecamatan"=>$kecamatan,
			"kota"=>$kota,
			"no_telp"=>$no_telp,
			"no_hp_pemohon"=>$no_hp_pemohon,
			"kop_surat"=>$kop_surat,
			"unit_kerja"=>$unit_kerja,
			"nama_pimpinan"=>$nama_pimpinan,
			"id_user"=>$id_user,
			"jenis_usaha"=>$jenis_usaha);
			if($this->model_user->insertData("identitas_usaha",$arr)){
				$ses = $this->session->userdata("dataLogin");
				$ses['punya_usaha'] = 1;
				$this->session->set_userdata("dataLogin",$ses);
				$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil disimpan</div>");

				redirect("dashboard","redirect");
			}else{
				$this->session->set_flashdata("status","<div class='alert alert-warning'>Gagal menyimpan data</div>");
				redirect("dashboard/identitas_usaha","redirect");
			}

		}
		public function insert_aktor(){
			$i = $this->input;
			$nama_lengkap = $i->post("nama_lengkap");
			$username = $i->post("username");
			$alamat_lengkap = $i->post("alamat_lengkap");
			$kode_kota = $i->post("kode_kota");
			$no_ktp = $i->post("no_ktp");
			$foto_ktp = "";
			$kode_role = $i->post("kode_role");
			$status = 1;
			$password = sha1("Okkpd2018!12345678");

			$files = $_FILES;

			if($this->uploads($_FILES,'foto_ktp') == null){
				$this->session->set_flashdata("status","<div class='alert alert-warning'>Foto KTP Kosong</div>");
				var_dump($_FILES);
				redirect("dashboard");
			}else{
				$foto_ktp_temp = $this->uploads($_FILES,'foto_ktp');
				$foto_ktp = file_get_contents($foto_ktp_temp['full_path']);
			}


			$arr = array(
				"id_user"=>null,
				"nama_lengkap" => $nama_lengkap,
				"username" => $username,
				"alamat_lengkap" => $alamat_lengkap,
				"kode_kota"=>$kode_kota,
				"no_ktp"=>$no_ktp,
				"foto_ktp"=>$foto_ktp,
				"kode_role"=>$kode_role,
				"status"=>$status,
				"password"=>$password);
				if($this->model_user->insertData("user",$arr)){
					$this->session->set_flashdata("status","<div class='alert alert-success'>Data user berhasil disimpan</div>");
				}else{
					$this->session->set_flashdata("status","<div class='alert alert-warning'>Gagal menambah data user</div>");
				}
				redirect("dashboard");

			}

			// Daftar
			public function pendaftaran(){
				$data['datalogin'] = $this->session->userdata("dataLogin");
				$this->load->view('dashboard_view/template/header',$data);
				$this->load->view('dashboard_view/template/top_nav');
				$this->load->view('dashboard_view/template/side_nav');
				$this->load->view('dashboard_view/pendaftaran',$data);
				$this->load->view('dashboard_view/template/footer');
			}
			public function prima_3(){
				$data['datalogin'] = $this->session->userdata("dataLogin");
				$data['identitas_usaha'] = $this->model_user->getDataUsaha($data['datalogin']['id_user']);
				$data['komoditas'] = $this->model_user->getKomoditas();
				$this->load->view('dashboard_view/template/header',$data);
				$this->load->view('dashboard_view/template/top_nav');
				$this->load->view('dashboard_view/template/side_nav');
				$this->load->view('dashboard_view/daftar_prima_3',$data);
				$this->load->view('dashboard_view/template/footer');
			}
			public function dokumen_prima3($id =0){
				$data['datalogin'] = $this->session->userdata("dataLogin");
				$data['identitas_usaha'] = $this->model_user->getDataUsaha($data['datalogin']['id_user']);
				$data['syarat_teknis'] = $this->model_user->getDetailSyaratTeknis("prima_3");
				$data['id'] = $id;
				$this->load->view('dashboard_view/template/header',$data);
				$this->load->view('dashboard_view/template/top_nav');
				$this->load->view('dashboard_view/template/side_nav');
				$this->load->view('dashboard_view/dokumen_prima3',$data);
				$this->load->view('dashboard_view/template/footer');
			}
			public function insert_prima3(){
				$data['datalogin'] = $this->session->userdata("dataLogin");

				$i = $this->input;
				$kode_komoditas = $i->post("kode_komoditas");
				$luas_lahan = $i->post("luas_lahan");

				$kode_layanan = $i->post("kode_layanan");
				$id_identitas_usaha = $i->post("id_identitas_usaha");
				$isSuccess = false;

				$arr = array("uid"=>null,"kode_layanan" => $kode_layanan,"id_identitas_usaha"=>$id_identitas_usaha);
				if($this->model_user->insertData("layanan",$arr)){
					$isSuccess = true;
					$id_jenis = $this->model_user->getLastId("layanan","uid");
					for ($i=0; $i < sizeof($kode_komoditas); $i++) {
						$dat = array("id_detail"=>null,"id_komoditas"=>$kode_komoditas[$i],"luas_lahan"=>$luas_lahan[$i],"id_layanan"=>$id_jenis);
						$this->model_user->insertData("detail_komoditas",$dat);
					}
				}

				if($isSuccess){
					$this->session->set_flashdata("status_registrasi","<div class='alert alert-success'>Berhasil mencatat data</div>");
				}else{
					$this->session->set_flashdata("status_registrasi","<div class='alert alert-warning'>Gagal mencatat data</div>");
				}

				redirect("dashboard","redirect");
			}
			function pernyataan_kesanggupan(){
				$this->load->view('dashboard_view/cetak/pernyataan_kesanggupan');
			}
			// DAFTAR END

			//------------------------------------------------ Pelaku Usaha ------------------------------------
			function identitas_usaha(){
				$data['datalogin'] = $this->session->userdata("dataLogin");
				$variable = $this->model_user->getDataWhere("identitas_usaha","id_user",$data['datalogin']['id_user']);
				foreach ($variable as $data['usaha']);
				$this->load->view('dashboard_view/template/header',$data);
				$this->load->view('dashboard_view/template/top_nav');
				$this->load->view('dashboard_view/template/side_nav');
				$this->load->view('dashboard_view/identitas_usaha',$data);
				$this->load->view('dashboard_view/template/footer');
			}


			//------------------------------------------------ Pelaku Usaha END------------------------------------

			//------------------------------------------------ Manager Administrasi ------------------------------------
			function lihat_foto($file){
				$data['datalogin'] = $this->session->userdata("dataLogin");
				$data['file'] =$file;
				$this->load->view('dashboard_view/template/header',$data);
				$this->load->view('dashboard_view/lihat_foto',$data);
				$this->load->view('dashboard_view/template/footer');
			}
			function lihat_foto_dokumen($id_dokumen){
				$data['datalogin'] = $this->session->userdata("dataLogin");
				$file = $this->model_user->getDokumenById($id_dokumen);
				foreach ($file as $file);
				$data['file'] = $file['dokumen'];
				$this->load->view('dashboard_view/template/header',$data);
				$this->load->view('dashboard_view/lihat_foto',$data);
				$this->load->view('dashboard_view/template/footer');
			}
			function lihat_surat_tugas($id_layanan){
				$data['datalogin'] = $this->session->userdata("dataLogin");
				$file = $this->model_user->getDataWhere('layanan','uid',$id_layanan);
				foreach ($file as $file);
				$data['file'] = $file['surat_tugas'];
				$this->load->view('dashboard_view/template/header',$data);
				$this->load->view('dashboard_view/lihat_foto',$data);
				$this->load->view('dashboard_view/template/footer');
			}
			function update_status_layanan(){

				$i = $this->input;
				$alasan_penolakan = $i->post("alasan_penolakan");
				$id_layanan = $i->post("id_layanan");
				$level = $i->post("level");
				$status = $i->post("status");
				$arr = array();
				if($alasan_penolakan!=""){
					$arr = array(
						"alasan_penolakan"=>$alasan_penolakan,
						"status" => $status);
					}else{
						$arr = array(
							"manager_adm"=>date("Y-m-d"),
							"level"=>$level);
						}

						if($this->model_user->updateData('layanan',$id_layanan,'uid',$arr)){
							$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil disimpan</div>");
						}else{
							$this->session->set_flashdata("status","<div class='alert alert-success'>Gagal menyimpan data</div>");
						}

						redirect("dashboard/penilaian_dokumen");

						// $this->load->view('dashboard_view/cetak/pernyataan_kesanggupan');
					}
					function permohonan_ditolak(){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$data['dokumen'] = $this->model_user->getDokumenDitolak(1);

						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/permohonan_ditolak',$data);
						$this->load->view('dashboard_view/template/footer');
						// $this->load->view('dashboard_view/cetak/pernyataan_kesanggupan');
					}

					function penilaian_dokumen(){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$data['dokumen'] = $this->model_user->getDokumenLevel(1);

						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/penilaian_dokumen',$data);
						$this->load->view('dashboard_view/template/footer');
						// $this->load->view('dashboard_view/cetak/pernyataan_kesanggupan');
					}

					function getDokumen($id_layanan){

						$dokumen = $this->model_user->getDokumen($id_layanan);
						echo "<div class='row'>";

						foreach ($dokumen as $dokumen) {
							echo
							'<div class="col-md-6">
								<div class="card card-white" style="background:white;border:1px solid #dadada">
									<div style="height:200px;overflow:hidden">
								  <img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $dokumen['dokumen'] ).'" alt="Card image">
									</div>
									<hr/>
								  <div class="card-body">
								    <h5>'.$dokumen['nama_dokumen'].'</h5><br/>
								    <a href="'.base_url().'dashboard/lihat_foto_dokumen/'.$dokumen['id_dokumen'].'" target="_t" class="btn btn-info btn-block">Lihat gambar</a>
								  </div>
								</div>
							</div>';

						}
						echo "</div>";

						// $this->load->view('dashboard_view/cetak/pernyataan_kesanggupan');
					}

					//------------------------------------------------ Manager Administrasi END ------------------------------------
					function update_mt(){
						$id_layanan = $this->input->post("id_layanan");
						$inspektor = $this->input->post("inspektor");
						$ppc = $this->input->post("ppc");
						$pelaksana = $this->input->post("pelaksana");

						$tanggal_inspeksi = $this->input->post("tanggal_inspeksi");
						$tanggal_ppc = $this->input->post("tanggal_pc");
						$waktu_inspeksi = $this->input->post("waktu_inspeksi");
						$waktu_ppc = $this->input->post("waktu_pc");

						$dateInspeksi = date("Y-m-d",strtotime($tanggal_inspeksi))." ".$waktu_inspeksi[0].":".$waktu_inspeksi[1];
						$datePPC = date("Y-m-d",strtotime($tanggal_ppc))." ".$waktu_ppc[0].":".$waktu_ppc[1];

						$data = array("inspektor"=>$inspektor,"ppc"=>$ppc,"pelaksana"=>$pelaksana,"tanggal_inspeksi"=>$dateInspeksi,"tanggal_pc"=>$datePPC);
						if($this->model_user->updateData("layanan",$id_layanan,"uid",$data)){
							$this->session->set_flashdata("status","<div class='alert alert-success'>Data tersimpan</div>");
						}else{
							$this->session->set_flashdata("status","<div class='alert alert-warning'>Gagal menyimpan data</div>");

						}
						redirect('dashboard');
					}
					function update_mt_status(){
						$id_layanan = $this->input->post("id_layanan");
						$data = array("manager_tek"=>date("Y-m-d"));
						if($this->model_user->updateData("layanan",$id_layanan,"uid",$data)){
							$this->session->set_flashdata("status","<div class='alert alert-success'>Data tersimpan</div>");
						}else{
							$this->session->set_flashdata("status","<div class='alert alert-warning'>Gagal menyimpan data</div>");
						}
						redirect('dashboard');
					}
					function update_status_ppc(){
						$id_layanan = $this->input->post("id_layanan");
						$data = array("status_ppc"=>"1");
						if($this->model_user->updateData("layanan",$id_layanan,"uid",$data)){
							$this->session->set_flashdata("status","<div class='alert alert-success'>Data tersimpan</div>");
						}else{
							$this->session->set_flashdata("status","<div class='alert alert-warning'>Gagal menyimpan data</div>");
						}
						redirect('dashboard/penugasan_inspektor');
					}
					function update_status_komtek(){
						$id_layanan = $this->input->post("id_layanan");
						$data = array("status_komtek"=>"1");
						if($this->model_user->updateData("layanan",$id_layanan,"uid",$data)){
							$this->session->set_flashdata("status","<div class='alert alert-success'>Data tersimpan</div>");
						}else{
							$this->session->set_flashdata("status","<div class='alert alert-warning'>Gagal menyimpan data</div>");
						}
						redirect('dashboard/penugasan_ppc');
					}

					function unggah_surat_tugas(){
						$id_layanan = $this->input->post("id_layanan_surat");
						$files = $_FILES;
						if($this->uploads($_FILES,'surat_tugas') == null){
							$this->session->set_flashdata("status","<div class='alert alert-warning'>Foto KTP Kosong</div>");
							var_dump($_FILES);
							redirect("dashboard");
						}else{
							$st_temp = $this->uploads($_FILES,'surat_tugas');
							$surat_tugas = file_get_contents($st_temp['full_path']);
						}

						$data= array("surat_tugas"=>$surat_tugas);
						if($this->model_user->updateData("layanan",$id_layanan,"uid",$data)){
							$this->session->set_flashdata("status","<div class='alert alert-success'>Data tersimpan</div>");
						}else{
							$this->session->set_flashdata("status","<div class='alert alert-warning'>Gagal menyimpan data</div>");

						}
						redirect('dashboard');
					}
					function penugasan_inspektor(){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$data['inspeksi'] = $this->model_user->getPenugasanInspeksi();
						$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/penugasan_inspeksi',$data);
						$this->load->view('dashboard_view/template/footer');
					}
					function penugasan_ppc(){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$data['ppc'] = $this->model_user->getPenugasanPPC();
						$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/penugasan_ppc',$data);
						$this->load->view('dashboard_view/template/footer');
					}
					function ijin(){
						$role = $this->input->post("role");
						$id_layanan = $this->input->post("id_layanan");
						$data = array();
						$isTrue = false;
						$url = "update_status_ppc";
						if($role == "pelaksana"){
							$data = array("ijin_pelaksana"=>"1");
							$isTrue = true;
						}else if($role == 'inspektor'){
							$data = array("ijin_inspektor"=>"1");
							$isTrue = true;
						}else if($role == 'ppc'){
							$data = array("ijin_ppc"=>"1");
							$isTrue = true;
							$url = "update_status_komtek";

						}
						if($isTrue){
							if($this->model_user->updateData('layanan',$id_layanan,'uid',$data)){
								if($this->model_user->statusInspektor($id_layanan) == true){
									echo '<form class="" action="'.base_url().'dashboard/'.$url.'" method="post">
									<input type="hidden" name="id_layanan" value="'.$id_layanan.'">
									<button type="sumbit" name="button" class="btn btn-info">Lanjut</button>
									</form> <a href="" class="btn btn-warning">Tunda</a>';
								}else{
									echo "1";
								}

							}else{
								echo "0";
							}
						}else{
							echo "0";
						}
					}
					//------------------------------------------------ Manager Teknis END ------------------------------------

					//------------------------------------------------ Manager Administrasi END ------------------------------------
					//------------------------------------------------ INSPEKTOR ------------------------------------
					function inspeksi_jenis_layanan(){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$data['inspeksi'] = $this->model_user->getDataJenisInspeksi("inspektor");
						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/pages/inspektor/inspeksi_jenis_layanan',$data);
						$this->load->view('dashboard_view/template/footer');
					}
					function pelaksanaan_jenis_layanan(){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$data['pelaksana'] = $this->model_user->getDataJenisInspeksi("pelaksana");
						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/pages/pelaksana/pelaksanaan_jenis_layanan',$data);
						$this->load->view('dashboard_view/template/footer');
					}
					function form_hasil_pelaksana($uid){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/pages/pelaksana/form_hasil_pelaksana',$data);
						$this->load->view('dashboard_view/template/footer');
					}

					//------------------------------------------------ INSPEKTOR END ------------------------------------

					//------------------------------------------------ ADMIN ------------------------------------
					function kelola_user(){
						$data['datalogin'] = $this->session->userdata("dataLogin");
						$data['user'] = $this->model_user->getAllUser($data['datalogin']['id_user']);
						$this->load->view('dashboard_view/template/header',$data);
						$this->load->view('dashboard_view/template/top_nav');
						$this->load->view('dashboard_view/template/side_nav');
						$this->load->view('dashboard_view/kelola_user',$data);
						$this->load->view('dashboard_view/template/footer');
					}


					//------------------------------------------------ ADMIN END------------------------------------




					public function logout($dashboard = "true")
					{
						$this->session->unset_userdata("dataLogin");

						redirect("","");
					}
					public function verifikasi()
					{
						$i = $this->input;
						if($this->model_user->validasi($i->post('username'),$i->post('password'))){
							redirect("dashboard","redirect");
						}else{
							redirect("home/pendaftaran_online","redirect");
						}

					}
					public function verifikasi_pengurus()
					{
						$i = $this->input;
						if($this->model_user->validasi($i->post('username'),$i->post('password'), true)){
							redirect("dashboard","redirect");
						}else{
							redirect("home/pendaftaran_online","redirect");
						}
					}

					public function uploadDokumen()
					{
						$this->load->library('upload');

						$id_prima_tiga = $this->input->post("id_prima_tiga");
						$syarat_teknis = $this->input->post("syarat_teknis");
						$cpt = count($_FILES['gambar']['name']);
						$files = $_FILES;
						$layanan = $this->model_user->getDetailDokumen("prima_3");



						if($cpt < 4){
							$this->session->set_flashdata("status","<div class='alert alert-warning'>Dokumen yang diunggah masih kurang</div>");
							redirect("dashboard/dokumen_prima3/".$id_prima_tiga);
						}else{
							$uploads = array();
							$i = 0;
							foreach ($layanan as $layanan){
								$uploads[$i] = $layanan['nama_dokumen'];
								$i++;
							}

							for ($i=0; $i<$cpt; $i++) {
								$_FILES['gambar']['name']= $files['gambar']['name'][$i];
								$_FILES['gambar']['type']= $files['gambar']['type'][$i];
								$_FILES['gambar']['tmp_name']= $files['gambar']['tmp_name'][$i];
								$_FILES['gambar']['error']= $files['gambar']['error'][$i];
								$_FILES['gambar']['size']= $files['gambar']['size'][$i];
								$this->upload->initialize($this->set_upload_options());
								if ( ! $this->upload->do_upload('gambar'))
								{
									$error = array('error' => $this->upload->display_errors());
									$this->session->set_flashdata("status","<div class='alert alert-success'>File gagal</div>");
									$isGagal = true;
									$uploadData[$i]['file_name'] = null;
									redirect("dashboard/dokumen_prima3");
									//$this->load->view('upload_form', $error);
								}
								else
								{
									$fileData = $this->upload->data();
									$dokumen = file_get_contents($fileData['full_path']);

									$dat = array('id_dokumen'=>null,'dokumen'=>$dokumen,	'nama_dokumen'=>$uploads[$i], 'id_layanan' => $id_prima_tiga);
									$this->model_user->insertData("dokumen_layanan",$dat);
								}
							}

							$str = "";
							foreach ($syarat_teknis as $syarat) {
								$str .= $syarat."<>";
							}
							$dat = array("syarat_teknis"=>$str);

							if($this->model_user->updateData("layanan",$id_prima_tiga,"uid",$dat)){
								$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil disimpan</div>");
							}else{
								$this->session->set_flashdata("status","<div class='alert alert-warning'>Data gagal disimpan</div>");
							}
							redirect("dashboard");
						}
						// end --------------------

						// $foto_ktp_temp = $this->uploads($_FILES,'foto_ktp');
						// $foto_npwp_temp = $this->uploads($_FILES,'foto_npwp');
						// $kop_surat_temp = $this->uploads($_FILES,'kop_surat');
						//
						// if($foto_ktp_temp!=null){
						// 	$foto_ktp = file_get_contents($foto_ktp_temp['full_path']);
						// }
						// if($foto_npwp_temp!=null){
						// 	$foto_npwp = file_get_contents($foto_npwp_temp['full_path']);
						// }
						// if($kop_surat_temp!=null){
						// 	$kop_surat = file_get_contents($kop_surat_temp['full_path']);
						// }
						//redirect("dashboard");


					}
					public function do_upload()
					{


						$this->load->library('upload');

						$dataInfo = array();
						$files = $_FILES;
						$cpt = count($_FILES['gambar']['name']);
						$uploadData=array();
						$isEmpty = false;
						$isGagal = false;
						for ($i=0; $i<$cpt; $i++) {
							if($files['gambar']['name'][$i] == ""){
								$this->session->set_flashdata("status","<div class='alert alert-success'>Dokumen yang diunggah masih kurang</div>");
								redirect("dashboard/unggah/dokumen_prima3");
								break;
							}
						}
						for ($i=0; $i<$cpt; $i++) {
							$_FILES['gambar']['name']= $files['gambar']['name'][$i];
							$_FILES['gambar']['type']= $files['gambar']['type'][$i];
							$_FILES['gambar']['tmp_name']= $files['gambar']['tmp_name'][$i];
							$_FILES['gambar']['error']= $files['gambar']['error'][$i];
							$_FILES['gambar']['size']= $files['gambar']['size'][$i];
							$this->upload->initialize($this->set_upload_options());
							if ( ! $this->upload->do_upload('gambar'))
							{
								$error = array('error' => $this->upload->display_errors());
								$this->session->set_flashdata("status","<div class='alert alert-success'>File gagal</div>");
								$isGagal = true;
								$uploadData[$i]['file_name'] = null;
								//redirect("dashboard/unggah/dokumen_prima3");
								//$this->load->view('upload_form', $error);
							}
							else
							{
								$fileData = $this->upload->data();
								$uploadData[$i]['file_name'] = $fileData['file_name'];
								$this->session->set_flashdata("status","<div class='alert alert-success'>File berhasil diunggah</div>");
								//$this->load->view('upload_success', $data);
							}
						}


						$arr = array('kesanggupan' => $uploadData[0]['file_name'],'legalitas' => $uploadData[1]['file_name'],'struktur_organisasi' => $uploadData[2]['file_name'],'jenis_komoditas' => $uploadData[3]['file_name'] );
						if($this->model_user->updateData('prima_tiga',$this->input->post('id'),'id_prima_tiga',$arr)){
							if($isGagal){
								$this->session->set_flashdata("status","<div class='alert alert-warning'>Ada beberapa file gagal diunggah, cek kembali</div>");
							}else{
								$this->session->set_flashdata("status","<div class='alert alert-success'>File berhasil diunggah</div>");
							}
						}else{
							$this->session->set_flashdata("status","<div class='alert alert-success'>Gagal menyimpan data</div>");

						}

						redirect("dashboard");




					}
					public function upload_array($files,$nama,$index)
					{
						$config['upload_path']          = './upload/';
						$config['allowed_types']        = 'gif|jpg|png';
						$config['max_size']             = 0;

						$files = $_FILES;
						$_FILES[$nama]['name']= $files[$nama]['name'][$index];
						$_FILES[$nama]['type']= $files[$nama]['type'][$index];
						$_FILES[$nama]['tmp_name']= $files[$nama]['tmp_name'][$index];
						$_FILES[$nama]['error']= $files[$nama]['error'][$index];
						$_FILES[$nama]['size']= $files[$nama]['size'][$index];
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload($nama))
						{
							return null;
						}
						else
						{
							return $this->upload->data();
						}
					}


					public function uploads($files,$nama)
					{
						$config['upload_path']          = './upload/';
						$config['allowed_types']        = 'gif|jpg|png';
						$config['max_size']             = 0;

						$files = $_FILES;
						$_FILES[$nama]['name']= $files[$nama]['name'];
						$_FILES[$nama]['type']= $files[$nama]['type'];
						$_FILES[$nama]['tmp_name']= $files[$nama]['tmp_name'];
						$_FILES[$nama]['error']= $files[$nama]['error'];
						$_FILES[$nama]['size']= $files[$nama]['size'];
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload($nama))
						{
							return null;
						}
						else
						{
							return $this->upload->data();
						}
					}



					private function set_upload_options()
					{
						//upload an image options
						$config = array();
						$config['upload_path']          = './upload/';
						$config['allowed_types']        = 'gif|jpg|png|pdf';
						$config['max_size']             = 0;
						return $config;
					}
				}
