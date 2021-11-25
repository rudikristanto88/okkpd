<?php
class Email extends MY_Controller {

    public function __construct()
  	{
  		parent::__construct();
  		$this->load->helper('url_helper');
  		$this->load->helper(array('form', 'url'));
      $this->load->library('session');
  		$this->load->library('email');
  	}

    function index()
    {
        $config['smtp_host']    = 'mail.dishanpan.jatengprov.go.id';
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'okkpd@dishanpan.jatengprov.go.id';
        $config['smtp_pass']    = 'Okkpd2018';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->from('okkpd@dishanpan.jatengprov.go.id', 'Sistem Notifikasi OKKPD JATENG');
        $this->email->to('rudi.kristanto@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo'email terkirim';
    }

    function send(){
      $mailto = $_POST['mailto'];
      $namaLengkap = $_POST['mailto'];
      $kode = $_POST['mailto'];
      $subject = "Pendaftaran Layanan - Kode Pendaftaran";

      $data['link'] = base_url()."dokumen/berkas_pendaftaran/?q=".sha1($kode);
      $data['nama'] = $namaLengkap;
      $data['kode'] = $kode;
      $message = $this->load->view('default/email/notifikasi_daftar_layanan',$data,true);
      $this->kirim_email($subject,$mailto,$message);
    }
}
