<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelakuUsaha extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->model('model_user');
    $this->load->model('model_admin');
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->menu =  $this->model_user->getMenu($this->saya());

  }
	public function index()
	{
		$this->load->view('welcome_message');
	}

  public function cekIdentitasUsaha()
	{
    $nama_usaha = $this->input->post("nama_usaha");
    $alamat = $this->input->post("alamat");
		$kota = $this->input->post("kota");
    $data = array("nama_usaha"=>$nama_usaha, "alamat"=>$alamat,"kota"=>$kota);
    echo $this->model_user->cekIdentitasUsaha($data);
	}
}
