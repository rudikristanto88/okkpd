<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              
              <li class="breadcrumb-item active">Panduan</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Panduan</strong></h2>
                            
                        </div>
                        
                        <div class="body table-responsive">
                            <div class="card">
                                <?php foreach ($panduan as $data); 
                                    if($panduan==null){
                                        echo "Tidak ada data yang ditampilkan.<br/><br/>";
                                        $url = base_url('admin/kelola_panduan/tambah');
                                        echo "<span><a class='btn btn-info text-white' href='".$url."'>Tambah Panduan</a></span>";
                                    }else{
                                        
                                        
                                        $url_unduh = base_url('Dokumen/unduh_panduan');
                                        $url_ubah = base_url('admin/kelola_panduan/ubah');
                                        $url_hapus = base_url('admin/hapus_panduan');
                                        echo '<div style="width: 200px;
                                                    border: 1px solid #dadada;
                                                    border-radius: 8px;
                                                    padding: 16px;
                                                    text-align: center;
                                            "><i class="fa fa-file fa-5x"></i><br/><br/>
                                            Nama Panduan : '.$data['nama_panduan'].'<br/><br/>
                                            <span><a class="btn btn-success text-white" href="'.$url_unduh.'">Unduh Panduan <i class="fa fa-download"></i></a><span>
                                            </div><br/><br/>';
                                        echo "<span><a class='btn btn-info text-white' href='".$url_ubah."'>Ubah Panduan</a>&nbsp;&nbsp;&nbsp;";
                                        echo '<form style="display:inline" method="post" action="'.$url_hapus.'">
                                              <input type="hidden" value="'.$data['id'].'" name="id_panduan"/>
                                              <input type="submit" class="btn btn-warning" value="Hapus"/>
                                          </form></span>';
                                    }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->


          </div>
        </div>
      </div>
    </div>
    <!-- #END# Input -->


  </div>

</div>

<!-- Widgets -->

<!-- #END# Widgets -->

</div>
</section>
