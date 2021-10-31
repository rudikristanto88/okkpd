<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="index.html">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">Daftarkan Aktor</li>
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
                      <h2 class="card-inside-title">Daftar Aktor</h2>
                      <?php
                      $attribute = array("class"=>"text-white");
                      echo form_open_multipart('dashboard/insert_aktor',$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="nama_lengkap" name="nama_lengkap" type="text" class="text-white" data-length="10">
                              <label for="nama_lengkap">Nama Lengkap</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input id="username" name="username" type="text" class="text-white" data-length="10">
                              <label for="username">Email</label>
                            </div>
                          </div>

                          <!-- <div class="col-sm-12">
                            <div class="form-group">
                              <div class="form-line">
                                <div class="input-field">
                                  <textarea id="alamat_lengkap" class="materialize-textarea form-control no-resize text-white" name="alamat_lengkap" data-length="120"></textarea>
                                  <label for="alamat_lengkap">Alamat Lengkap</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="kode_kota">Kota</label>
                              <select class="col-12 form-control" name="kode_kota" id="kode_kota">
                                <?php foreach ($kota as $kota) {
                                  echo '<option value="'.$kota['kode_kota'].'">'.$kota['nama_kota'].'</option>';

                                }?>
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="input-field">
                              <input id="no_ktp" type="text" name="no_ktp" class="text-white" data-length="10">
                              <label for="no_ktp">Nomor KTP</label>
                            </div>
                          </div> -->
                          <!-- <div class="col-sm-6">
                            <div class="input-field">
                              <div class="file-field input-field">
                                  <div class="btn">
                                      <span>Upload File</span>
                                      <input type="file" name="foto_ktp">
                                  </div>
                                  <div class="file-path-wrapper">
                                      <input  class="file-path validate text-white" type="text" placeholder="Foto KTP">
                                  </div>
                              </div>
                              <label for="nomor_hp_pemohon">Foto KTP</label>
                            </div>
                          </div> -->

                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="kode_role">Jabatan</label>
                              <select class="col-12 form-control" name="kode_role" id="kode_role">
                                <?php foreach ($role as $role) {
                                  echo '<option value="'.$role['kode_role'].'">'.$role['nama_role'].'</option>';

                                } ?>
                              </select>

                            </div>
                          </div>

                          <div class="col-sm-12">
                            <div class="form-group">
                              <span>Password adalah default (1-8)</span><br/>
                              <button id="btn-submit" type="submit " class="btn btn-info waves-effect" name="button">Simpan</button>
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

          $( "#username" ).change(function() {
            var data = $( "#username" ).val();
            console.log(data);
            $.ajax({url: "<?= base_url()?>dashboard/cek_username/",
            method: "POST",
            data: { email: data },
            success: function(result){
              if(result == 1){
                alert("Email sudah digunakan, silahkan gunakan email lainnya");
                $("#btn-submit").css('display','none');
              }else{
                $("#btn-submit").css('display','block');

              }
            }});
          });

        })
      </script>


    </div>

    <!-- Widgets -->

    <!-- #END# Widgets -->

  </div>
</section>
