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
              <li class="breadcrumb-item active"><?= $menu ?> Produk Hukum</li>
            </ul>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            
            <?php if($datalogin['kode_role'] == 'admin'){ ?>

              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="body">
                      <h2 class="card-inside-title">Produk Hukum</h2>
                      <?php
                      $attribute = array("class"=>"text-white");
                      echo form_open_multipart('admin/insert_produk_hukum/'.$jenis,$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                          <input id="id_produk" name="id_produk" type="hidden" class="text-white" data-length="10" value="<?php if(isset($id_produk)){echo  $id_produk;} ?>">

                            <div class="input-field">
                              <input id="nama_produk_hukum" name="nama_produk_hukum" type="text" class="text-white" data-length="10" value="<?= $nama_produk_hukum ?>">
                              <label for="nama_produk_hukum">Nama Produk Hukum</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-field">
                              <div class="file-field input-field">

                                  <div class="btn">
                                      <span>Upload File Produk Hukum</span>
                                      <input type="file" name="produk_hukum">
                                  </div>
                                  <div class="file-path-wrapper">
                                      <input  class="file-path validate text-white" type="text" placeholder="File Produk Hukum">
                                  </div>
                                  <?php if($jenis == 'ubah'){echo 'Biarkan kosong apabila dokumen tidak diubah';} ?>

                              </div>
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
