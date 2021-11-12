<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dashboard/css/starability-minified/starability-all.min.css" />

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
            <li class="breadcrumb-item active">Hasil Survey</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Input -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        if ($this->session->flashdata("status")) {
          echo $this->session->flashdata("status");
        }
        ?>
        <div class="card">
          <div class="body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header">
                    <h2><strong>Hasil</strong> Survey</h2>
                  </div>
                  <div class="body table-responsive">
                    <table class="table table-hover" id="table-datatable">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;">No</th>
                          <th width="auto" style="vertical-align: middle;">Pertnyaan</th>
                          <td width="250">Kinerja</td>
                          <td width="250">Tingkat Kepuasan</td>
                        </tr>

                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($report_survey as $element) : ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $element['pertanyaan'] ?></td>
                            <?php if ($element['tipe'] == "Skor") : ?>
                              <td>
                                <div id="star-rating" class="rating" data-rate-value=<?= $element["avg_nilai"] ?>>
                                  <span><?= $element["avg_nilai"] ?></span>
                                </div>
                              </td>
                              <td>
                                <div id="star-rating" class="rating" data-rate-value=<?= $element["avg_kepentingan"] ?>>
                                  <span><?= $element["avg_kepentingan"] ?></span>
                                </div>
                              </td>
                            <?php else :
                              $progressYa = $element['avg_nilai'] * 100;
                              $progressTidak = 100 - ($progressYa); ?>
                              <td>
                                <div class="row">
                                  <div class="col-md-3">Ya</div>
                                  <div class="col-md-9">
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="<?= $progressYa  ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $progressYa ?>%">
                                      <?= $progressYa  ?>%</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">Tidak</div>
                                  <div class="col-md-9">
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="<?= $progressTidak  ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $progressTidak ?>%">
                                      <?= $progressTidak  ?>%</div>
                                    </div>
                                  </div>
                                </div>

                              </td>
                              <td></td>
                            <?php endif; ?>

                          </tr>

                        <?php $i++;
                        endforeach; ?>
                      </tbody>
                    </table>

                    <table class="table table-hover" id="table-datatable2">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;">No</th>
                          <th style="vertical-align: middle;">Nama</th>
                          <th style="vertical-align: middle;">Email</th>
                          <th style="vertical-align: middle;">Usia</th>
                          <th style="vertical-align: middle;">No Telp</th>
                          <th style="vertical-align: middle;">Alamat</th>
                          <th style="vertical-align: middle;">Pendidikan</th>
                          <th style="vertical-align: middle;">Layanan</th>
                          <th style="vertical-align: middle;">Tanggal</th>
                          <th style="vertical-align: middle;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($hasil_survey as $element) : ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $element['nama'] ?></td>
                            <td><?= $element['email'] ?></td>
                            <td><?= $element['umur'] ?></td>
                            <td><?= $element['no_telp'] ?></td>
                            <td><?= $element['alamat'] ?></td>
                            <td><?= $element['pendidikan'] ?></td>
                            <td><?= $element['kode_layanan'] ?></td>
                            <td><?= $element['tanggal_survey'] ?></td>
                            <td><a href="<?= base_url() ?>dashboard/hasil_survey/detail?id=<?= $element["id"] ?>" class="btn btn-primary">Detail</a></td>
                          </tr>

                        <?php $i++;
                        endforeach; ?>
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

<script>
  var options = {
    max_value: 5,
    step_size: 0.1,
    readonly: true,
    selected_symbol_type: 'utf8_star',
    convert_to_utf8: false
  }
  $(".rating").rate(options);
</script>