<!-- <link rel="stylesheet" type="text/css" href="rating_style.css"> -->
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
            <li class="breadcrumb-item active">Survey Kepuasan Masyarakat</li>
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
                  <?php if (
                    $this->session->flashdata('status')
                  ) {
                    echo $this->session->flashdata(
                      'status'
                    );
                  } ?>
                  <div class="header">
                    <!-- <h2>
                                            <strong>Survey</strong> Kepuasan Masyarakat
                                        </h2> -->

                  </div>
                  <form method="post" action="<?= base_url() ?>dashboard/simpan_survey">
                    <table width="100%">
                      <thead>
                        <tr>
                          <td colspan="3" class="text-center">
                            <h3>SURVEY KEPUASAN MASYARAKAT DI BALAI PENINGKATAN MUTU DAN KEAMANAN PANGAN DISHANPAN JAWA TENGAH<h3>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3" class="text-center">
                            <h4>IDENTITAS RESPONDEN</h4>
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($identitas
                          as $element) : ?>
                          <tr>
                            <td width="50"><?= $no ?>.</td>
                            <td width="200"><?= $element[1] ?></td>
                            <td>
                              <?php if (
                                $element[2] ==
                                'pendidikan' ||
                                $element[2] ==
                                'jenis_kelamin' ||
                                $element[2] ==
                                'pelayanan'
                              ) : ?>
                                <div class="form-group">
                                  <label class="text-small"><?= $element[1] ?></label>
                                  <select required class="form-control text-white" id="<?= $element[0] ?>" name="<?= $element[0] ?>">
                                    <?php foreach ($properties[$element[2]]
                                      as $arr) : ?>
                                      <option value="<?= $arr['key'] ?>"><?= $arr['value'] ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              <?php elseif (
                                $element[2] ==
                                'pekerjaan'
                              ) : ?>
                                <div class="form-group">
                                  <label class="text-small"><?= $element[1] ?></label>
                                  <select required class="form-control text-white" id="<?= $element[0] ?>" name="<?= $element[0] ?>" onchange="selectPekerjaan(this)">
                                    <?php foreach ($properties[$element[2]]
                                      as $pekerjaan) : ?>
                                      <option value="<?= $pekerjaan ?>"><?= $pekerjaan ?></option>
                                    <?php endforeach; ?>
                                  </select>

                                </div>
                                <div id="lainnya" style="display: none;">
                                  <label for="pekerjaan_lainnya">Sebutkan</label>
                                  <input id="pekerjaan_lainnya" type="text" name="pekerjaan_lainnya" class="text-white">
                                </div>
                              <?php else : ?>
                                <div class="input-field">
                                  <input required id="<?= $element[0] ?>" type="<?= $element[2] ?>" name="<?= $element[0] ?>" class="text-white" value="<?php if (
                                                                                                                                                          $element[1] == 'Tanggal Survey'
                                                                                                                                                        ) {
                                                                                                                                                          echo date('d/m/Y');
                                                                                                                                                        } ?>" <?php if ($element[1] == 'Tanggal Survey') {
                                                                                                                                                                echo 'readonly';
                                                                                                                                                              } ?>>
                                  <label for="<?= $element[0] ?>"><?= $element[1] ?></label>
                                </div>
                              <?php endif; ?>
                              <?php if (
                                $element[0] ==
                                'nama'
                              ) : ?>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" name="show_nama" type="checkbox" checked value="1"> Tampilkan Identitas / Profil
                                    <span class="form-check-sign"><span class="check"></span></span>
                                  </label>
                                </div>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php $no += 1;
                        endforeach;
                        ?>

                      </tbody>
                    </table>
                    <table width="100%" class="table table-hover" style="margin-top:50px">
                      <thead>
                        <tr>
                          <th colspan="4" class="text-center">
                            <h4>Pendapat Responden Tentang Kualitas Pelayanan dan Tingkat Kepentingannya</h4>
                            </td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>No</td>
                          <td>Pertanyaan</td>
                          <td width="250">Kinerja</td>
                          <td width="250">Tingkat Kepuasan</td>
                        </tr>
                        <?php
                        $index = 1;
                        foreach ($list_survey
                          as $element) : ?>
                          <tr>
                            <td><?= $index ?>.</td>
                            <td><?= $element['pertanyaan'] ?>
                              <input type="hidden" name="kuesioner[soal-<?= $index ?>][soal][]" value="<?= $element['pertanyaan'] ?>" />
                              <input type="hidden" name="kuesioner[soal-<?= $index ?>][parameter][]" value="<?= $element['nama_parameter'] ?>" />
                            </td>
                            <?php if (
                              $element['tipe'] ===
                              'Yes/No'
                            ) : ?>
                              <?php $name =
                                'kuesioner[soal-' .
                                $index .
                                '][pertanyaan][]'; ?>
                              <td colspan="2">
                                <input style="opacity: 100;" type="radio" id="<?= $index .
                                                                                '-1' ?>" name="<?= $name ?>" value="1">
                                <label for="<?= $index .
                                              '-1' ?>">Ya</label>
                                <input style="opacity: 100;" type="radio" id="<?= $index .
                                                                                '-2' ?>" name="<?= $name ?>" value="0">
                                <label for="<?= $index .
                                              '-2' ?>">Tidak</label>
                                <input type="hidden" name="<?= $name ?>" value="<?= $element['id'] ?>" />
                              </td>
                            <?php else : ?>
                              <?php for (
                                $a = 0;
                                $a < 2;
                                $a++
                              ) :
                                $prop =
                                  $a == 0
                                  ? 'pertanyaan'
                                  : 'kepentingan'; ?>
                                <td>
                                  <fieldset class="starability-basic">
                                    <?php for (
                                      $x = 0;
                                      $x <=
                                        4;
                                      $x++
                                    ) :

                                      $name =
                                        'kuesioner[soal-' .
                                        $index .
                                        '][' .
                                        $prop .
                                        '][]';
                                      $id =
                                        $prop .
                                        '-' .
                                        $index .
                                        '-' .
                                        $x;
                                    ?>
                                      <?php if (
                                        $x ==
                                        0
                                      ) : ?>
                                        <input type="radio" id="no-rate" class="input-no-rate" name="<?= $name ?>" value="0" checked aria-label="No rating." />
                                      <?php else : ?>
                                        <input type="radio" id="<?= $id ?>" name="<?= $name ?>" value="<?= $x ?>" />
                                        <label for="<?= $id ?>"></label>
                                      <?php endif; ?>
                                    <?php
                                    endfor; ?>
                                    <input type="hidden" name="<?= $name ?>" value="<?= $element['id'] ?>" />
                                  </fieldset>
                                </td>
                              <?php
                              endfor; ?>
                            <?php endif; ?>
                          </tr>
                        <?php $index += 1;
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                    <input type="hidden" name="layanan" value=<?= $id_layanan ?>>
                    <input type="hidden" name="jenis" value=<?= $jenis ?>>
                    <label for="saran" style="margin-top:50px">Masukkan / Saran untuk perbaikan pelayanan (Jika terdapat jawaban yang kurang, isikan saran / masukan.)</label>
                    <input id="saran" type="text" height="300" name="saran" class="form-control text-white">
                    <div class="contact100-form-checkbox">

                      <button type="submit" class="btn btn-primary" style="margin-top:20px;width:200px">Simpan Kuesioner</button>
                  </form>

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

</section>

<script>
  function selectPekerjaan(e) {
    if (e.value === "Lainnya") {
      $("#lainnya").css("display", "block");
    } else {
      $("#lainnya").css("display", "none");
    }
  }
</script>