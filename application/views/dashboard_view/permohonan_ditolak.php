<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="index.html">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              <li class="breadcrumb-item active">Permohonan Ditolak</li>
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
                          <?php
                          if($this->session->flashdata("status")){
                            echo $this->session->flashdata("status");
                          }
                          ?>
                            <h2>
                                <strong>Permohonan</strong> Ditolak</h2>
                            <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                      aria-haspopup="true" aria-expanded="false">
                                      <i class="material-icons">more_vert</i>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li>
                                          <a href="<?= base_url('admin/tambah_kemasan') ?>">Tambah</a>
                                      </li>
                                  </ul>
                              </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table class="table table-hover" id="table-datatable" class="display">
                                <thead>
                                  <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama User</th>
                                    <th style="vertical-align: middle;">Nama Perusahaan</th>
                                    <th style="vertical-align: middle;">Jenis Pengajuan</th>
                                    <th style="vertical-align: middle;">Tanggal Ditolak</th>
                                    <th style="text-align: center;">Alasan Penolakan</th>
                                  </tr>

                                </thead>
                                <tbody>
                                  <?php $i = 1;foreach ($dokumen as $dokumen) : ?>
                                    <tr>
                                      <td><?=$i ?>.</td>
                                      <td><?= $dokumen['nama_lengkap']?></td>
                                      <td><?= $dokumen['nama_usaha'] ?></td>
                                      <td><?= $dokumen['nama_layanan'] ?></td>
                                      <td><?= $dokumen['tanggal_ditolak'] ?></td>
                                      <td><?= $dokumen['alasan_penolakan'] ?></td>
                                    </tr>
                                  <?php $i++;endforeach; ?>
                                </tbody>
                            </table>
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
