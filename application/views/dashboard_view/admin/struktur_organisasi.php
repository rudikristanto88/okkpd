<?php foreach ($tentang as $tentang): ?>

<?php endforeach; ?>
<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Struktur Organisasi</li>
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
                            <h2>
                                <strong>Struktur </strong>Organisasi</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url('admin/tambah_struktur_organisasi') ?>">Ubah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                          <div class="row">
                            <div class="col-md-12">
                              <?php 
                              if($tentang == null){
                                  echo 'Tidak ada data yang ditampilkan.<br/><br/>';
                                  $url = base_url().'admin/tambah_struktur_organisasi';
                                  echo "<a href='".$url."' class='btn btn-info text-white' >Ubah</a>";
                              }else{
                                  echo '<img  class="tp-bgimg defaultimg" src="data:image/jpeg;base64,'.base64_encode( $tentang['struktur_organisasi'] ).'" alt="Card image">';
                              } ?>

                            </div>
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
