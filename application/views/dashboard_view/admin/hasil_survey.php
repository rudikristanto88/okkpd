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
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">Periode</div>
                      <div class="col-md-4">
                        <form id="formTahun" method="get" action="<?= base_url() ?>dashboard/hasil_survey">
                        <select class="form-control text-black" name="periode" id="periode" style="color:black" onchange="lihatSurvey(this)">
                          <?php
                          foreach ($list_periode as $period) { ?>
                            <option <?= $period['id'] == $periode ? 'selected' : '' ?> value="<?= $period['id'] ?>"><?= $period['nama_periode'] ?></option>
                          <?php } ?>
                        </select>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="body table-responsive">
                    <table class="table table-hover mb-8" >
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;">No</th>
                          <th width="400" style="vertical-align: middle;">Unsur Pelayanan</th>
                          <td width="250">Nilai IKM</td>
                          <td width="250">Nilai Konversi</td>
                          <td width="250">Mutu Pelayanan</td>
                          <td width="250">Ukuran Kinerja</td>
                        </tr>

                      </thead>
                      <tbody>
                        <?php $i = 1;
                        $total_ikm = 0;
                        $total_konversi = 0;
                        foreach ($report_survey['data'] as $element) : ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $element['nama_parameter'] ?></td>
                            <td><?= $element['avg_nilai'] ?></td>
                            <td><?= $element['nilai_konversi'] ?></td>
                            <td><?= $element['mutu_pelayanan'] ?></td>
                            <td><?= $element['ukuran_kinerja'] ?></td>
                          </tr>
                        <?php $i++;
                        endforeach; ?>
                        <tr>
                            <td ></td>
                            <td ><b>JUMLAH</b></td>
                            <td><?= $report_survey['total_nilai'] ?></td>
                            <td><?= $report_survey['total_konversi'] ?></td>
                            <td></td>
                            <td></td>
                          </tr>
                         <tr>
                           <td ></td>
                           <td ><b>NILAI IKM</b></td>
                            <td><?= $report_survey['avg_total_nilai'] ?></td>
                            <td><?= $report_survey['avg_total_konversi'] ?></td>
                            <td><?= $report_survey['mutu_pelayanan'] ?></td>
                            <td><?= $report_survey['ukuran_kinerja'] ?></td>
                          </tr>
                      </tbody>
                    </table>
                    <div style="height:50px"></div>
                    <h5 class="mb-4 mt-8"><strong>Daftar</strong> Responden</h5>
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
                            <td><?= $element['show_nama'] == 0 ? 'NN' : $element['nama'] ?></td>
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

  function lihatSurvey(tahun){
    $("#formTahun").submit();
  }
</script>