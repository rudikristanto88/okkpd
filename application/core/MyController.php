<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->model('model_user');
    $data['datalogin'] = $this->session->userdata("dataLogin");
    $this->bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  }

	public function index()
	{
		$this->load->view('welcome_message');
	}
  public function loadView($view,$data)
	{
    $this->load->view('dashboard_view/template/header',$data);
    $this->load->view('dashboard_view/template/top_nav');
    $this->load->view('dashboard_view/template/side_nav');
    $this->load->view($view,$data);
    $this->load->view('dashboard_view/template/footer');
	}
}
