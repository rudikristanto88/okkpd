<?php
foreach ($identitas_usaha as $usaha);
?>
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
              <li class="breadcrumb-item bcrumb-2">
                <a href="javascript:void(0);">Forms</a>
              </li>
              <li class="breadcrumb-item active">Unggah Dokumen Hygiene Sanitation</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Basic Example | Horizontal Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">

            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header">
                    <h2>
                      <strong>Dokumen Hygiene Sanitation</strong></h2>

                    </div>
                    <div class="body">
                      
                      <form id="wizard_with_validation" action="<?= base_url() ?>dashboard/uploadDokumen" method="POST" class="wizard_custom" enctype="multipart/form-data">
                        <input type="hidden" name="id_prima_tiga" value="<?= $id ?>">
                        <input type="hidden" name="jenis" value="hs">

                        <h3>Unduh Surat Pernyataan Kesanggupan</h3>
                        <fieldset>
                          <a href="<?= base_url() ?>dashboard/pernyataan_kesanggupan" class="btn btn-info">Unduh <span class="fas fa-download"></span></a>
                        </fieldset>

                        <h3>Unggah Surat Pernyataan Kesanggupan Rumah Kemas</h3>
                        <fieldset>
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Upload File</span>
                              <input type="file" name="gambar[]" required>
                            </div>
                            <div class="file-path-wrapper">
                              <input  class="file-path validate text-white" type="text">
                            </div>
                          </div>
                        </fieldset>
                        <h3>Dokumen Legalitas Usaha</h3>
                        <fieldset>
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Upload File</span>
                              <input type="file" name="gambar[]" required>
                            </div>
                            <div class="file-path-wrapper">
                              <input  class="file-path validate text-white" type="text">
                            </div>
                          </div>
                        </fieldset>

                        <h3>Dokumen Akta Perusahaan</h3>
                        <fieldset>
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Upload File</span>
                              <input type="file" name="gambar[]" required>
                            </div>
                            <div class="file-path-wrapper">
                              <input  class="file-path validate text-white" type="text">
                            </div>
                          </div>
                        </fieldset>
                        <!-- <h3>Syarat Teknis</h3> -->
                        <!-- <fieldset> -->
                          <?php foreach ($syarat_teknis as $syarat): ?>
                            <label style="display:none">
                              <input type="checkbox" checked  value="<?= $syarat['deskripsi'] ?>" name="syarat_teknis[]" />
                              <span><?= $syarat['deskripsi'] ?></span>
                            </label>
                          <?php endforeach; ?>
                        <!-- </fieldset> -->
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    <!-- #END# Basic Example | Horizontal Layout -->
    <!-- Basic Example | Vertical Layout -->

    <!-- #END# Basic Example | Vertical Layout -->
    <!-- Advanced Form Example With Validation -->

    <!-- #END# Advanced Form Example With Validation -->
  </div>
</section>
