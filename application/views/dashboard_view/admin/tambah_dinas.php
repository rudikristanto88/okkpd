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
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">Tambahkan Dinas</li>
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
                      <h2 class="card-inside-title">Kelola Unit Dinas</h2>
                      <?php
                      $attribute = array("class"=>"text-white");
                      echo form_open_multipart('admin/insert_dinas',$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nama_lengkap" name="nama_lengkap" type="text" class="text-white" data-length="10">
                              <label for="nama_dinas">Nama Dinas</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nama_kepala_dinas" name="nama_kepala_dinas" type="text" class="text-white" data-length="10">
                              <label for="nama_kepala_dinas">Nama Kepala Dinas</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="kode_kota">Kota</label>
                              <select  class="form-control col-12"  name="kode_kota" onchange="jenisUsaha(this.value)" id="kode_kota">
                                <?php foreach ($kota as $kota) {
                                  echo '<option value="'.$kota['kode_kota'].'">'.$kota['nama_kota'].'</option>';

                                }?>
                              </select>
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



        <script type="text/javascript">
        $(document).ready(function(){
          // $("#btn-daftar").click(function(){
          //   $.ajax({url: "<?= base_url()?>dashboard/dashboard/main_fragment", success: function(result){
          //         $("#konten").html("asdasd");
          //     }});
          //   window.location.replace("<?= base_url()?>dashboard/daftar_usaha");
          // })

        })
      </script>


    </div>

    <!-- Widgets -->

    <!-- #END# Widgets -->

  </div>
</section>
