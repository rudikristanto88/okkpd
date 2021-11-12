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
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>dashboard/hasil_survey">
                Hasil Survey</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
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
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th colspan="2">
                            <h4>IDENTITAS RESPONDEN</h4>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($identitas as $element) :
                          if ($element[0] != "kecamatan" && $element[0] != "kota" && $element[0] != "provinsi") : ?>
                            <tr>
                              <td width="300"><?= $element[1] ?></td>
                              <td>: <?= $data_survey[$element[0]] ?></td>
                            </tr>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </tbody>
                    </table>

                    <table class="table table-hover" style="margin-top:50px">
                      <thead>
                        <tr>
                          <th colspan="4">
                            <h4> Pendapat Responden Tentang Kualitas Pelayanan dan Tingkat Kepentingannya</h4>
                          </th>
                        </tr>

                        <tr>
                          <th style="vertical-align: middle;">No</th>
                          <th width="auto" style="vertical-align: middle;">Pertnyaan</th>
                          <th width="250">Kinerja</th>
                          <th width="250">Tingkat Kepuasan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($detail_survey as $element) : ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $element['pertanyaan'] ?></td>
                            <?php if ($element['tipe'] == "Skor") : ?>
                              <td>
                                <div id="star-rating" class="rating" data-rate-value=<?= $element["nilai"] ?>>
                                  <span><?= $element["nilai"] ?></span>
                                </div>
                              </td>
                              <td>
                                <div id="star-rating" class="rating" data-rate-value=<?= $element["kepentingan"] ?>>
                                  <span><?= $element["kepentingan"] ?></span>
                                </div>
                              </td>
                            <?php else :
                              $progressYa = $element['nilai'] * 100;
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