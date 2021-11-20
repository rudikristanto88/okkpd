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
            <li class="breadcrumb-item active">Pendaftaran</li>
          </ul>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <?php
          if ($this->session->flashdata("status")) {
            echo $this->session->flashdata("status");
          }
          ?>
          <?php if ($datalogin['punya_usaha'] == 0 && $datalogin['kode_role'] == 'pelaku') : ?>
            <span>Daftarkan usaha anda</span><br />
            <a href="<?= base_url() ?>dashboard/daftar_usaha" id="btn-daftar" class="btn btn-primary">Daftar</a>
          <?php elseif ($datalogin['punya_usaha'] != 0 && $datalogin['kode_role'] == 'pelaku') : ?>
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <a href="<?= base_url('dashboard/pendaftaran/prima_3') ?>">
                    <div class="image-180">
                      <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/prima_3.png" alt="Card image">
                    </div>
                    <div class="card-body">
                      <div class="text-center">
                        <h4 class="card-title">Pendaftaran PRIMA 3</h4>
                      </div>
                    </div>
                  </a>

                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <a href="<?= base_url('dashboard/pendaftaran/prima_2') ?>">
                    <div class="image-180">
                      <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/prima_2.png" alt="Card image">
                    </div>
                    <div class="card-body">
                      <div class="text-center">
                        <h4 class="card-title">Pendaftaran PRIMA 2</h4>
                      </div>
                    </div>
                  </a>

                </div>
              </div>
              <!-- <div class="col-md-4">
                  <div class="card">
                    <a href="<?= base_url('dashboard/pendaftaran/psat') ?>">
                      <div class="image-180">
                        <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/psat.png" alt="Card image">
                      </div>
                      <div class="card-body">
                        <div class="text-center">
                          <h4 class="card-title">Pendaftaran PSAT</h4>
                        </div>
                      </div>
                    </a>

                  </div>
                </div> -->
              <!-- <div class="col-md-4">
                  <div class="card">
                    <a href="<?= base_url('dashboard/pendaftaran/rumah_kemas') ?>">
                      <div class="image-180">
                        <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/kemas.png" alt="Card image">
                      </div>
                      <div class="card-body">
                        <div class="text-center">
                          <h4 class="card-title">Pendaftaran Rumah Kemas</h4>
                        </div>
                      </div>
                    </a>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <a href="<?= base_url('dashboard/pendaftaran/health_care') ?>">
                      <div class="image-180">
                        <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/hc.png" alt="Card image">
                      </div>
                      <div class="card-body">
                        <div class="text-center">
                          <h4 class="card-title">Pendaftaran Health Certificate</h4>
                        </div>
                      </div>
                    </a>

                  </div>
                </div> -->
              <div class="col-md-4">
                <div class="card">
                  <a href="<?= base_url('dashboard/pendaftaran/ujimutu') ?>">
                    <div class="image-180">
                      <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/ujimutu.png" alt="Card image">
                    </div>
                    <div class="card-body">
                      <div class="text-center">
                        <h4 class="card-title">Pendaftaran Uji Mutu Pangan</h4>
                      </div>
                    </div>
                  </a>

                </div>
              </div>
            </div>



          <?php endif; ?>
        </div>
      </div>



      <script type="text/javascript">
        $(document).ready(function() {
          // $("#btn-daftar").click(function(){
          //   $.ajax({url: "<?= base_url() ?>dashboard/dashboard/main_fragment", success: function(result){
          //         $("#konten").html("asdasd");
          //     }});
          //   window.location.replace("<?= base_url() ?>dashboard/daftar_usaha");
          // })

        })
      </script>


    </div>

    <!-- Widgets -->

    <!-- #END# Widgets -->

  </div>
</section>