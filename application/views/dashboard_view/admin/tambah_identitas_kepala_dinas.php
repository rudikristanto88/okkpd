<?php
if($jenis == 'ubah'){
  foreach ($kepala as $kepala);
}

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
                Beranda</a>
              </li>
              
              <li class="breadcrumb-item active">Tambah Identitas Kepala BPMKP</li>
            </ul>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            
            <?php if($datalogin['kode_role'] == 'admin'){ ?>

              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="body">
                      <h2 class="card-inside-title">Identitas Kepala BPMKP</h2>
                      <?php
                      $attribute = array("class"=>"text-white");
                      echo form_open_multipart('admin/kelola_identitas/'.$jenis,$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nama_kepala_dinas" name="nama_kepala_dinas" type="text" class="text-white" value="<?php if($jenis == 'ubah'){ echo $kepala['nama_kepala_dinas']; }?>">
                              <label for="nama_kepala_dinas">Nama Kepala Dinas</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nama_kepala_dinas" name="pangkat" type="text" class="text-white" data-length="10" value="<?php if($jenis == 'ubah'){ echo $kepala['pangkat']; }?>">
                              <label for="nama_kepala_dinas">Jabatan</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nip" name="nip" type="text" class="text-white" data-length="10"  <?php if($jenis == 'ubah'){ echo 'value="'.$kepala['nip'].'" readonly'; }?>>
                              <label for="nip">NIP</label>
                            </div>
                          </div>

                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="text-small">Tahun Awal Jabatan</label>
                                <input class="text-white" type="date" name="awal_menjabat" class="text-white" id="tahun" value="<?php if($jenis == 'ubah'){echo   date('Y-m-d',strtotime($kepala['t_jabatan_awal'])); }?>">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="text-small">Tahun Akhir Jabatan</label>
                                <input class="text-white" type="date" name="akhir_menjabat" class="text-white" id="tahun" value="<?php if($jenis == 'ubah'){echo   date('Y-m-d',strtotime($kepala['t_jabatan_akhir'])); }?>">
                              </div>
                            </div>
                            <?php if($jenis == 'ubah'){ ?>
                              <div class="col-sm-12">
                                <label>
                                  <input type="checkbox"  value="1" name="status" <?php if($kepala['status'] == 1){echo 'checked';  } ?> />
                                  <span>Aktif</span>
                                </label>
                                <!-- <div class="input-field">
                                  <input type="checkbox" name="checkbox" <?php if($kepala['status'] == 1){echo 'checked';  } ?> >
                                  <label for="nip">NIP</label>
                                </div> -->
                              </div>
                            <?php } ?>
                          <div class="col-sm-6">
                            <div class="input-field">
                              <div class="file-field input-field">
                                  <div class="btn">
                                      <span>Upload Foto Kepala Dinas</span>
                                      <input type="file" name="foto_kepala_dinas">
                                  </div>
                                  <div class="file-path-wrapper">
                                      <input  class="file-path validate text-white" type="text" placeholder="Foto Kepala Dinas">
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
