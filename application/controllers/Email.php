<?php
class Email extends MY_Controller {

    public function __construct()
  	{
  		parent::__construct();
  		$this->load->helper('url_helper');
  		$this->load->helper(array('form', 'url'));
  		$this->load->library('email');
      $this->load->model('model_ujimutu');
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

    function cobaemailbaru(){
      $mailto = "rudi.kristanto@gmail.com";
      $namaLengkap = "rudi kristanto";
      $kode = "123";
      $subject = "Pendaftaran Layanan - Kode Pendaftaran";

      $data['link'] = base_url()."dokumen/berkas_pendaftaran/?q=".sha1($kode);
      $data['nama'] = $namaLengkap;
      $data['kode'] = $kode;
      $message = $this->load->view('default/email/notifikasi_daftar_layanan',$data,true);
      $this->kirim_email($subject,$mailto,$message);
    }


    function kirimemailbelumkirimsampel(){
      $list = $this->model_ujimutu->daftarBelumKirimSampel();
      if(count($list)>0){
        foreach($list as $row){
          $mailto = $row['username'];
          $namaLengkap =  $row['nama_lengkap'];
          $kode = $row["kode_pendaftaran"];
          $subject = "Pengingat Kirim Sampel: ".$kode;

          $data['link'] = base_url()."dokumen/berkas_pendaftaran/?q=".sha1($kode);
          $data['nama'] = $namaLengkap;
          $data['kode'] = $kode;
          $message = "Pengingat Kirim Sampel: No Registrasi Uji Mutu Pangan Anda $kode belum mengirim sampel. Batas waktu kirim tinggal " . ($row["kurang"]) . " hari.";
          $this->kirim_email($subject,$mailto,$message);
        }
      }
    }

    function sendemailmanual(){
      $from = 'okkpd@dishanpan.jatengprov.go.id';
      $to = "rudi.kristanto@gmail.com";
      $subject = " Informasi LHU telah terbit";
      $message = " Informasi LHU telah terbit: No Registrasi Uji Mutu Pangan Anda ................... telah terbit. Silahkan unduh berkas dokumen digital LHU di sistem informasi OKKPD https://okkpd.dishanpan.jatengprov.go.id.
        Berkas LHU asli dapat diambil di kantor BPMKP Ungaran pada jam kerja.
        Terima kasih.";
      $headers = "From:" . $from;
      $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: $from" . "\r\n" .
"Reply-To: $from" . "\r\n" .
"X-Mailer: PHP/" . phpversion();
      mail($to,$subject,$message, $headers,'-f noreplyokkpd@dishanpan.jatengprov.go.id');
      echo "The email message was sent.";
    }
}
