<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['dashboard'] = 'dashboard/index';
$route['dashboard/sign_in'] = 'dashboard/sign_in';
$route['dashboard/registrasi_user'] = 'dashboard/registrasi_user';
$route['dashboard/pendaftaran'] = 'dashboard/pendaftaran';
$route['dashboard/pernyataan_kesanggupan'] = 'dashboard/pernyataan_kesanggupan';
$route['dashboard/unggah/dokumen_prima3'] = 'dashboard/dokumen_prima3';
$route['dashboard/unggah/dokumen_prima3/(:any)'] = 'dashboard/dokumen_prima3/$1';
$route['dashboard/unggah'] = 'dashboard';
$route['dashboard/info_layanan'] = 'admin/info_layanan';
$route['dashboard/akun_pelaku_usaha'] = 'admin/akun_pelaku_usaha';
$route['dashboard/gambar_slider'] = 'admin/gambar_slider';
$route['dashboard/kontak_kami'] = 'admin/kontak_kami';
$route['dashboard/kelola_dinas'] = 'admin/unit_dinas';
$route['dashboard/identitas_kepala_dinas'] = 'admin/identitas_kepala_dinas';
$route['dashboard/tautan_terkait'] = 'admin/tautan_terkait';
$route['dashboard/konsultasi_online'] = 'admin/konsultasi_online';
$route['dashboard/migrasi_layanan'] = 'admin/migrasi_layanan';
$route['dashboard/berita'] = 'admin/berita';
$route['dashboard/cek_status_layanan'] = 'admin/cek_status_layanan';
$route['dashboard/panduan'] = 'admin/panduan';
$route['dashboard/tentang_kami'] = 'admin/tentang_kami';
$route['dashboard/produk_hukum'] = 'admin/produk_hukum';
$route['dashboard/kelola_komoditas'] = 'admin/kelola_komoditas';


//================ manager Teknis
$route['dashboard/kelola_form/(:any)/(:any)'] = 'dashboard/kelola_form/$1/$2';

//================ manager Teknis END
//================ INSPEKTOR
$route['dokumen/unduh_dokumen/(:any)/(:any)'] = 'dokumen/unduh_dokumen/$1/$2';
$route['dashboard/master_kemasan'] = 'admin/master_kemasan';
$route['dashboard/master_satuan'] = 'admin/master_satuan';

// $route['dashboard/(:any)'] = 'dashboard/dashboard/index/$1';

// $route['dashboard/pendaftaran/prima_3'] = 'dashboard/prima_3';
$route['dashboard/user/daftar_usaha'] = 'dashboard/daftar_usaha';
$route['sign_in'] = 'dashboard/sign_in';
$route['sign_up'] = 'home/sign_up';
$route['verifikasi'] = 'home/verifikasi';
$route['logout'] = 'dashboard/logout';
$route['logout/(:any)'] = 'dashboard/logout/$1';
$route['translate_uri_dashes'] = FALSE;
