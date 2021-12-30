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
              
              <li class="breadcrumb-item active">Kepala BPMKP</li>
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
                                <strong>Kepala</strong> BPMKP</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url('admin/tambah_identitas_kepala_dinas') ?>">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kepala Dinas</th>
                                        <th>Jabatan</th>
                                        <th>NIP</th>
                                        <th>Awal Menjabat</th>
                                        <th>Akhir Menjabat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; foreach ($identitas as $data) : ?>
                                    <tr>
                                      <td><?=$i ?>.</td>
                                      <td><?= $data['nama_kepala_dinas']?></td>
                                      <td><?= $data['pangkat']?></td>
                                      <td><?= $data['nip']?></td>
                                      <td><?= date('M Y',strtotime($data['t_jabatan_awal']))?></td>
                                      <td><?php if($data['t_jabatan_akhir'] == null || $data['t_jabatan_akhir'] == '') {
                                        ECHO '-';
                                      }else{
                                        echo date('M Y',strtotime($data['t_jabatan_akhir']));
                                      }?></td>
                                      <td>
                                        <?php if($data['status'] == 1){
                                          echo 'Aktif';
                                        }else{
                                          echo 'Non Aktif';
                                        }?>
                                      </td>

                                      <td>
                                        <form action="<?= base_url() ?>admin/ubah_identitas_kepala_dinas" method="post">
                                          <input type="hidden" name="nip" value="<?= $data['nip'] ?>">
                                          <button class="btn btn-info">Ubah</button>
                                        </form>
                                      </td>

                                        <!-- <a href='<?= base_url() ?>admin/ubah_identitas_kepala_dinas/<?= $data['nip'] ?>' class="btn btn-info"><button class="text-white">Ubah</button></a></td> -->
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
