<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
    $this->load->helper('url_helper');
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->model('model_user');
    $this->load->model('model_admin');
    $this->load->library('email');


    $this->menu =  $this->model_admin->getMenu($this->saya());
    $this->bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  }

  protected function index()
  {
    $this->load->view('welcome_message');
  }

  protected function saya()
  {
    $datalogin = $this->session->userdata("dataLogin");
    return $datalogin['kode_role'];
  }
  protected function id_saya()
  {
    $datalogin = $this->session->userdata("dataLogin");
    return $datalogin['id_user'];
  }

  protected function loadView($view, $data = [])
  {
    $data['datalogin'] = $this->session->userdata("dataLogin");

    $data['notification'] = $this->model_user->getMessage(5, $this->id_saya());
    $data['notification_unread'] = $this->model_user->getUnreadMessage($this->id_saya());
    $data['id_profile_saya'] = $this->id_saya();
    $data['role_saya'] = $this->saya();
    $data['foto_profil_saya'] = $this->model_user->getFotoProfil($this->id_saya());
    $this->load->view('dashboard_view/template/header', $data);
    $this->load->view('dashboard_view/template/top_nav', $data);
    $this->load->view('dashboard_view/template/side_nav', $data);
    $this->load->view($view, $data);
    $this->load->view('dashboard_view/template/footer');
  }

  // $is_pelaku = pelaku usaha atau bukan. jika pelaku, wajib isi $user
  protected function checkUser($is_pelaku = false, $user = null, $redirect = "home")
  {
    if (getenv("MODE") == "DEVELOPMENT") {
      $allow = true;
      if ($is_pelaku) {
        $allowed_user = explode(",", getenv("ALLOWED_USER"));
        if (!in_array($user, $allowed_user)) $allow = false;
      }
      if(!$allow){
        $this->session->set_flashdata("status", "<div class='alert alert-warning'>Maaf, Aplikasi OKKPD dan UJI MUTU PANGAN sedang dalam tahap perbaikan. Terima Kasih</div>");
        redirect($redirect, "redirect");
      }
    }
    
  }

  protected function loadViewHome($halaman, $data, $with_navigation = true)
  {
    $data['islogin'] = false;

    if ($this->session->userdata("dataLogin") != null) {
      $data['islogin'] = true;
    }
    $data['footer'] = $this->model_user->getAllData('kontak_kami');
    $data['link'] = $this->model_user->getAllData('tautan');
    $data['panduan'] = $this->model_user->getAllData('panduan');
    $this->load->view('default/template/header', $data);
    if ($with_navigation) $this->load->view('default/template/navigation-small');
    $this->load->view($halaman, $data);
    $this->load->view('default/template/footer_navigation');

    $this->load->view('default/template/footer', $data);
  }


  protected function get_data($data)
  {
    foreach ($data as $hasil);
    return $hasil;
  }

  protected function kirim_email($subject, $email_to, $message)
  {
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'mail.dishanpan.jatengprov.go.id';
    $config['smtp_port']    = '587';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'okkpd@dishanpan.jatengprov.go.id';
    $config['smtp_pass']    = 'Okkpd2018';
    $config['charset']    = 'utf-8';
    $config['mailtype'] = 'html'; // or html
    //    $config['validation'] = TRUE; // bool whether to validate email or not

    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    $this->email->from('okkpd@dishanpan.jatengprov.go.id', 'Sistem Notifikasi OKKPD JATENG');
    $this->email->to($email_to);

    $this->email->subject($subject);
    $this->email->message($message);

    if (!$this->email->send()) {
      echo $this->email->print_debugger(array('headers'));
    } else {
      echo'email terkirim';
    }
  }
  protected function validateCaptcha($captcha)
  {
    if ($captcha == null || $captcha == "") {
      return 2;
    } else {
      $secret = '6LfOq40UAAAAAJaXUcPgnRj7y-IUKWQKTrlzFZ5u';
      //get verify response data
      $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha);
      $response = json_decode($verify);
      if ($response->success) {
        return 1;
      } else {
        return 0;
      }
    }
  }

  protected function getNamaUsaha()
  {
    $data = $this->model_user->getDataUsaha($this->id_saya());
    foreach ($data as $data);
    return $data['nama_usaha'];
  }

  protected function getNamaFolder($id_layanan)
  {
    $nama_usaha = $this->model_user->getNamaUsahaByLayanan($id_layanan);
    $kode = $this->model_user->getKodePendaftaran($id_layanan);
    return "./upload/Dokumen_Usaha/" . $nama_usaha . "/" . $kode . '/';
  }

  protected function lokasi($menu, $lokasi = null)
  {
    if ($menu == 'dokumen_dinas') {
      return './upload/Dokumen_Dinas/';
    } else if ($menu == "pelaku") {
      return './upload/' . $lokasi;
    }
  }

  protected function upload_dokumen($files, $nama, $location)
  {
    if (!is_dir($location)) {
      mkdir($location, 0777, TRUE);
    }

    $files = $_FILES;
    $_FILES[$nama]['name'] = $files[$nama]['name'];
    $_FILES[$nama]['type'] = $files[$nama]['type'];
    $_FILES[$nama]['tmp_name'] = $files[$nama]['tmp_name'];
    $_FILES[$nama]['error'] = $files[$nama]['error'];
    $_FILES[$nama]['size'] = $files[$nama]['size'];

    $config = array();
    $config['upload_path']          = $location;
    $config['allowed_types']        = 'pdf|gif|jpg|png|xls|xlsx|doc|docx|rar|zip';
    $config['max_size']             = 0;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload($nama)) {
      $error = array('error' => $this->upload->display_errors());
      var_dump($error);
      //echo "<p> namanya : ".$location.$_FILES[$nama]['name']."</p>";
      return null;
    } else {
      if ($_FILES[$nama]['type'] == 'image/jpeg' || $_FILES[$nama]['type'] == 'image/png') {
        $data = $this->upload->data();
        $config['image_library'] = 'gd2';
        $config['source_image'] = './upload/' . $data["file_name"];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = '50%';
        $config['width'] = 500;
        $config['new_image'] = './upload/' . $data["file_name"];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
      }
      return $this->upload->data();
    }
  }
}
