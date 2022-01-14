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
              <li class="breadcrumb-item active">Kelola Akun Pelaku Usaha</li>
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
                                <strong>Akun</strong> Pelaku Usaha</h2>
                            <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                      aria-haspopup="true" aria-expanded="false">
                                      <i class="material-icons">more_vert</i>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li>
                                          <a href="#">Tambah</a>
                                      </li>
                                  </ul>
                              </li>
                            </ul>
                        </div>
                        
                        <div class="body table-responsive">
                            <table class="table table-hover display" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Akun</th>
                                        <th>Nama Pelaku Usaha</th>
                                        <th>Email</th>
                                        <th>Nomor HP</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; foreach ($akun as $akun): ?>
                                    <tr>
                                        <td><?= $i; ?> </td>
                                        <td><?= $akun['nama_lengkap']; ?></td>
                                        <td><?= $akun['nama_pemohon'] == '' || $akun['nama_pemohon'] == null ? '-' :  $akun['nama_pemohon']; ?></td>
                                        <td><?= $akun['username']; ?></td>
                                        <td><?= $akun['no_hp_pemohon'] == '' || $akun['no_hp_pemohon'] == null ? $akun['no_telp'] : $akun['no_hp_pemohon']; ?></td>
                                        <td><?php if($akun['status'] == 1){echo "Aktif"; $akun['status'] = 0;}else {echo 'Non Aktif';$akun['status'] = 1;} ?></td>

                                        <td><a href="<?=base_url() ?>dashboard/user_nonaktif/pelaku/<?= $akun['user_id'] ?>/<?= $akun['status'] ?>" class="<?= $akun['status'] == 1 ? 'btn btn-info' : 'btn btn-warning' ?> "> <?= $akun['status'] == 1 ? "Aktifkan" : 'Non Aktifkan'; ?></a></td>
                                        <td>
                                          <?php if( $akun['nama_pemohon'] != '' && $akun['nama_pemohon'] != null) : ?>
                                            <a href="<?=base_url() ?>dashboard/akun_pelaku_usaha/<?= $akun['user_id'] ?>" class="btn btn-primary"> Detail </a>
                                          <?php endif; ?>
                                        </td>

                                    </tr>
                                  <?php $i++; endforeach; ?>

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
