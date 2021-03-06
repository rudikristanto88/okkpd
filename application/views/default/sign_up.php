<div class="page_content">
  <section class="fullwidth_section news_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="card">
            <div class="card-body">

              <h4>Pendaftaran Online</h4>
              <hr>
              <form class="" id="form_registration" action="<?= base_url("home/sign_up_process") ?>" method="post">
                <h5>Data Akun Login</h5>
                <div class="form-container">
                  <label for="">Username (Email) *pastikan email aktif untuk menerima pesan aktivasi akun</label>
                  <input type="email" name="username" class="form-input form-block" required id="username">
                  <span class="text-danger" id="email_alert" style="display:none">Email sudah digunakan, silahkan gunakan email lainnya</span>

                </div>
                <div class="form-container">
                  <label for="">Password *</label>
                  <input type="password" name="password" id="sign_up_password" value="" class="form-input form-block" required>
                </div>
                <div class="form-container">
                  <label for="">Ulangi Password *</label>
                  <input type="password" value="" id="sign_up_password_retype" class="form-input form-block" required>
                </div>
                <div id="retype_password_status"></div>
                <hr>
                <h5>Profil Akun</h5>
                <div class="form-container">
                  <label for="">Nama Lengkap *</label>
                  <input type="text" name="nama_lengkap" value="" class="form-input form-block" required>
                </div>
                <div class="form-container">
                  <label for="">Alamat *</label>
                  <textarea name="alamat" rows="6" cols="80" class="form-input form-block" required></textarea>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-container">
                      <label for="">Provinsi</label>
                      <!--<input type="text" readonly value="Jawa Tengah" class="form-input form-block">-->
                      
                      <select class="form-input form-block" name="provinsi" id="provinsi">
                        <option value="">- Pilih Provinsi -</option>
                        <?php foreach ($propinsi as $val) : ?>
                          <option value="<?= $val['kode_provinsi']; ?>"><?= $val['nama_provinsi']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-container">
                      <label for="">Kota / Kabupaten *</label>
                      <select class="form-input form-block" id="kode_kota" name="kode_kota">
                        <?php foreach ($kota as $kota) : ?>
                          <option value="<?= $kota['kode_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="form-container">
                  <label for="">Nomor KTP</label>
                  <input type="text" name="nomor_ktp" class="form-input form-block">
                </div>
                <div class="form-container">
                  <label for="">SIUP</label>
                  <input type="text" name="siup" value="" class="form-input form-block">
                </div>
                <!-- <div class="form-container">
                                      <label for="">Gambar KTP (Scan/Foto)</label>
                                      <input type="file" name="foto_ktp" class="form-input form-block" >
                                    </div> -->
                <div class="form-container">
                  <input type="submit" style="margin-top:12px;" class="btn btn-primary btn-block" name="" value="Daftar">

                </div>
                Keterangan: (*) Wajib diisi
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#form_registration').captcha();
    $('#provinsi').change(function(){
        var provinsi = $("#provinsi").val();
        if(provinsi != ""){
          $('#kode_kota').empty();
          $.ajax({
              url: "<?php echo base_url() . "home/getKotaByProvinsi"?>",
              data: { "provinsi": provinsi},
              dataType:"html",
              type: "post",
              success: function(data){
                $('#kode_kota').append(data);
              }
          });
        }
        
    });
  });
</script>