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
              <li class="breadcrumb-item active">Kelola Layanan</li>
              <li class="breadcrumb-item active">Migrasi Layanan</li>
            </ul>
          </div>
        </div>
      </div>
      <?php
      if($this->session->flashdata("status")){
        echo $this->session->flashdata("status");
      }
      ?>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="card">

            <div class="header">
              <h2><strong>Unduh</strong> Form Migrasi</h2>
            </div>
            <div class="body">
              <div class="" style="text-align:center">
                <img src="<?= base_url() ?>assets/image/excel.png" alt="" width="120">
                <br/><br/>
                <div class="col-sm-12">
                  <div class="form-group">
                    <a href="<?= base_url() ?>upload/Dokumen_Dinas/form_prima.xlsx" style="margin-top:8px;" class="btn btn-info waves-effect" name="button">Form Prima 2 & 3</a>
                    <a href="<?= base_url() ?>upload/Dokumen_Dinas/form_sppb.xlsx" style="margin-top:8px;" class="btn btn-info waves-effect" name="button">From SPPB-PSAT</a>
                    <a href="<?= base_url() ?>upload/Dokumen_Dinas/form_psat.xlsx" style="margin-top:8px;" class="btn btn-info waves-effect" name="button">Form PSAT-PD</a>
                    <a href="<?= base_url() ?>upload/Dokumen_Dinas/form_kemas.xlsx" style="margin-top:8px;" class="btn btn-info waves-effect" name="button">Form Ijin Rumah Pengamasan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
                <h2><strong>Unggah</strong> Form Migrasi</h2>
            </div>
            <div class="body">
              <p>*Pastikan mengunggah file dengan format yang benar</p>

              <?php
              $attribute = array("class"=>"text-white");
              echo form_open_multipart('admin/migrasi',$attribute);?>
                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Pilih Form</span>
                        <input type="file" name="form_migrasi" required />
                      </div>
                      <div class="file-path-wrapper">
                        <input  class="file-path validate text-white" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit " class="btn btn-info waves-effect" name="button">Unggah Form</button>
                    </div>
                  </div>


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
