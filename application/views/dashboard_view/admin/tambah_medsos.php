<?php
$email = '';
$facebook = '';
$twitter = '';
$instagram = '';

    foreach ($kontak as $kontak);
    $email = $kontak['email'];
    $facebook = $kontak['facebook'];
    $twitter = $kontak['twitter'];
    $instagram = $kontak['instagram'];


?>

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
              <li class="breadcrumb-item active">Kontak Kami </li>
              <li class="breadcrumb-item active">Kelola Medsos </li>
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
                      <h2 class="card-inside-title">Alamat Medsos</h2>

                      <?php

                      $attribute = array("class"=>"text-white");
                      echo form_open_multipart('admin/insert_medsos',$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="email" name="email" type="text" class="text-white" data-length="10" value="<?= $email ?>" >
                              <label for="email">Email</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="facebook" name="facebook" type="text" class="text-white" value="<?= $facebook ?>" >
                              <label for="facebook">Facebook</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="twitter" name="twitter" type="text" class="text-white" data-length="10" value="<?= $twitter ?>" >
                              <label for="twitter">Twitter</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="instagram" name="instagram" type="text" class="text-white" data-length="10" value="<?= $instagram ?>" >
                              <label for="instagram">Instagram</label>
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
