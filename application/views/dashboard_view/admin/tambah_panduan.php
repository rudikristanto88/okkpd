<?php
foreach($panduan as $panduan);
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
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active"><?= ucfirst($judul) ?> Panduan</li>
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
                      <h2 class="card-inside-title">Panduan</h2>
                      <?php
                      $attribute = array("class"=>"text-white");
                      echo form_open_multipart('admin/insert_panduan',$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nama_panduan" required name="nama_panduan" type="text" value="Panduan" readonly class="text-white" data-length="10">
                              <input required name="jenis" value="<?= $judul; ?>" type="hidden">
                              <input required name="id" value="<?php  if($panduan!=null){echo $panduan['id'];} ?>" type="hidden">
                              <label for="judul">Judul Panduan</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-field">
                              <div class="file-field input-field">
                                  <div class="btn">
                                      <span>Upload File Panduan</span>
                                      <input type="file" name="panduan">
                                  </div>
                                  <div class="file-path-wrapper">
                                      <input  class="file-path validate text-white" type="text" required placeholder="File Panduan">
                                      <span class="text-small">jika dokumen sama, maka tidak perlu untuk upload ulang</span>
                                  </div>
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
