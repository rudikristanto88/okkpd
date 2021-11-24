<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php if ($this->session->flashdata('status') != "") {
          echo $this->session->flashdata('status');
        } ?>
      </div>
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-header">
          Daftar Permohonan Layanan
          </div>
          <div class="card-body">

            <br />
            <div class="table-responsive-md">
              <table class="table table-hover" id="table-datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Kode Registrasi</th>
                    <th>Jenis Layanan</th>
                    <th>Komoditas</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  if ($layanan != null) {

                    // header("Content-type: image/jpeg");
                    foreach ($layanan as $layanan) {
                      if ($layanan['alasan_penolakan'] == null || $layanan['alasan_penolakan'] == '') :

                  ?>
                        <tr>
                          <td><?= $i ?>.</td>
                          <td><?php
                              $tanggal = strtotime($layanan['tanggal_buat']);
                              $bulan = date("m", $tanggal) - 1;
                              echo date("d", $tanggal) . " " . $this->bulan[$bulan] . " " . date("Y", $tanggal) ?></td>
                          <td><?= $layanan['kode_pendaftaran'] ?></td>
                          <td><?= $layanan['nama_layanan'] ?></td>
                          <td></td>
                          <td><?php if ($layanan['status_layanan'] == 0) {
                                echo "Menunggu";
                              } else if ($layanan['status_layanan'] == 1) {
                                echo "Ditolak";
                              } ?></td>
                          <td>
                            <?php if ($layanan['syarat_teknis'] == null) { ?>
                              <a href="dashboard/dokumen/<?= $layanan['kode_layanan'] ?>/<?= $layanan['uid'] ?>" class="btn btn-info">Lengkapi Dokumen</a>
                            <?php } else {
                              echo "Dokumen telah diunggah";
                            } ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php $i++;
                    }
                  } ?>

                  <?php
                  if ($layananujimutu != null) {

                    // header("Content-type: image/jpeg");
                    foreach ($layananujimutu as $layanan) {
                  ?>
                      <tr>
                        <td><?= $i ?>.</td>
                        <td><?php
                            $tanggal = strtotime($layanan['tanggal_buat']);
                            $bulan = date("m", $tanggal) - 1;
                            echo date("d", $tanggal) . " " . $this->bulan[$bulan] . " " . date("Y", $tanggal) ?></td>
                        <td><?= $layanan['kode_pendaftaran'] ?></td>
                        <td><?= $layanan['nama_layanan'] ?></td>
                          <td><?= $layanan['namadetail'] ?></td>
                        <td><?php 
                        if($layanan['mime_type'] != ""){
?>
   <?php if($layanan['id_survey'] == 0):?>
                            <a href="<?= base_url() ?>dashboard/survey?uid=<?= $layanan['uid']?>&layanan=ujimutu" class="btn btn-primary">Isi Survey</a>
                            <?php else :?>
                              <a href="<?= base_url()?>dokumen/cetak_sertifikat/ujimutu/<?=  $layanan['uid'] ?>" target="_blank"><button class="btn btn-success">Unduh LHU</button></a>
                        <?php endif?>
<?php 
                        
                    }else if ($layanan['validManTek'] == 1) {
                              echo "Proses Validasi LHU";
                            } else if ($layanan['validLab'] == 1) {
                              echo "Proses Validasi Hasil Lab";
                            } else if ($layanan['sampleLab'] == 1) {
                              echo "Proses Pengujian Lab";
                            } else if ($layanan['sampleLab'] == 0) {
                              echo "Menunggu Pengiriman Sample max " . $layanan['selisih'] . " hari lagi";
                            }  ?>
                            </td>
                        <td>

                        </td>
                      </tr>
                      <?php  ?>
                  <?php $i++;
                    }
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>