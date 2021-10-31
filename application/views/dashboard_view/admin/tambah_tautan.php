<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">Tambah Tautan Terkait</li>
            </ul>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <?php
            if($this->session->flashdata("status")){
              echo $this->session->flashdata("status");
            }
            ?>
            <?php if($datalogin['kode_role'] == 'admin'){ ?>

              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="body">
                      <h2 class="card-inside-title">Tautan Terkait</h2>
                      <?php
                      $attribute = array("class"=>"text-white");
                      echo form_open_multipart('admin/insert_tautan',$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nama_tautan" name="nama_tautan" type="text" class="text-white" data-length="10">
                              <label for="nama_tautan">Nama Tautan</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="alamat_tautan" name="alamat_tautan" type="text" class="text-white" data-length="10">
                              <label for="alamat_tautan">Alamat Tautan</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <button type="submit " class="btn btn-info waves-effect" name="button">Simpan</button>
                            </div>
                          </div>


                      </form>

                    </div>
                  </div>
                </div>
              </div>



            <?php }else{echo "Anda tidak diijinkan untuk mengakses halaman ini";}?>
          </div>
        </div>
    </div>

    <!-- Widgets -->

    <!-- #END# Widgets -->

  </div>
</section>
