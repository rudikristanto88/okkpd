<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <?php
        foreach ($profile as $profile);
      ?>
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              <li class="breadcrumb-item active">Profile</li>
            </ul>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <?php
            if($this->session->flashdata("status")){
              echo $this->session->flashdata("status");
            }
            ?>

              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="body">
                      <h2 class="card-inside-title">Ubah Profile</h2>
                      <?php
                      $attribute = array("class"=>"text-white","id"=>"form_profile");
                      echo form_open_multipart('dashboard/ubah_profile',$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-3">
                            <div class="photo-profile-holder" style="width:100%;height: 190px;text-align:center">
                              <?php if($profile['foto_profil'] == '' || $profile['foto_profil'] == null): ?>
                                <img src="<?= base_url() ?>assets/dashboard/images/profile.png" alt="" style="height:150px" >
                              <?php else: ?>
                                <?php
                                echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $profile['foto_profil'] ).'"  style="height:150px;width:auto" alt="Card image">' ?>
                              <?php endif; ?><br/><br/>
                              <button type="button" class="btn btn-info btn-block" id="ubah-foto" name="button">Ubah Foto</button>
                              <div class="input-field" id="form-foto" style="display:none">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Upload File</span>
                                        <input type="file" id="foto-profile" name="foto_profil">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input  class="file-path validate text-white" type="text" placeholder="Foto Profil">
                                    </div>
                                </div>
                              </div>
                            </div>



                          </div>
                          <div class="col-sm-9">
                            <div class="row clearfix">
                              <div class="col-sm-12">
                                <div class="input-field">
                                  <input id="id_user" name="id_user" type="hidden" value="<?= $profile['id_user']?>">
                                  <input id="nama_lengkap" name="nama_lengkap" type="text" class="text-white" data-length="10" value="<?= $profile['nama_lengkap']?>">
                                  <label for="nama_lengkap">Nama Lengkap</label>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="input-field">
                                  <input id="username" name="username" type="text" class="text-white" data-length="10" value="<?= $profile['username']?>" readonly>
                                  <label for="username">Email</label>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="input-field">
                                  <input id="role" name="role" type="text" class="text-white" data-length="10" value="<?= $profile['nama_role']?>" readonly>
                                  <label for="role">Jabatan</label>
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

                              <div class="col-md-12">
                                <button type="button" id="btn-show" name="button" class="btn btn-primary">Ubah Password</button>
                              </div>
                              <div class="col-sm-12" id="form_ubah_passwd" style="display:none">
                                <div class="row clearfix">

                                  <div class="col-sm-12">
                                    <div class="input-field">
                                      <input id="pass_baru" name="pass_baru" type="password" class="text-white"  >
                                      <label for="username">Password Baru</label>
                                    </div>
                                  </div>

                                  <div class="col-sm-12">
                                    <div class="input-field">
                                      <input id="pass_ulang" name="pass_ulang" type="password" class="text-white" >
                                      <label for="username">Ulangi Password</label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-12">
                                <span>Biarkan password kosong jika tidak diubah</span><br/>

                                  <div id="btn-submit" class="btn btn-info waves-effect" name="button">Simpan Data</div>
                              </div>
                            </div>
                          </div>



                      </form>

                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>



        <script type="text/javascript">
        $(document).ready(function(){
          var isSubmitted = false;
          $("#btn-submit").click(function(){
            var baru = $("#pass_baru").val();
            var ulang = $("#pass_ulang").val();

              if(baru != ulang){
                alert('Password tidak cocok');
              }else{
                isSubmitted = true;
                $('#form_profile').submit();
              }
          })

          $("#btn-show").click(function(){
            $("#pass_baru").val();
            $("#pass_ulang").val();
            $("#form_ubah_passwd").toggle();
          })

          $("#ubah-foto").click(function(){
            if(isSubmitted){

            }else{
              $("#foto-profile").val();
              $("#form-foto").toggle();
            }

          })


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
