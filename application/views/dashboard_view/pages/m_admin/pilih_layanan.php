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
            <li class="breadcrumb-item active">Daftar Sertifikat</li>
          </ul>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <?php
          if ($this->session->flashdata("status")) {
            echo $this->session->flashdata("status");
          }

          $prima3 = 0;
          $prima2 = 0;
          $kemas = 0;
          $hc = 0;
          $psat = 0;

          foreach ($jumlah_sertifikat as $jumlah_sertifikat) {
            if ($jumlah_sertifikat['kode_layanan'] == 'prima_3') {
              $prima3 = $jumlah_sertifikat['jumlah'];
            } else if ($jumlah_sertifikat['kode_layanan'] == 'prima_2') {
              $prima2 = $jumlah_sertifikat['jumlah'];
            } else if ($jumlah_sertifikat['kode_layanan'] == 'kemas') {
              $kemas = $jumlah_sertifikat['jumlah'];
            } else if ($jumlah_sertifikat['kode_layanan'] == 'hc') {
              $hc = $jumlah_sertifikat['jumlah'];
            }              // code...
          }
          ?>

          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <a href="<?= base_url('dashboard/daftar_sertifikat/prima_3') ?>">
                  <div class="image-180">
                    <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/prima_3.png" alt="Card image">
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h4 class="card-title">Sertifikat PRIMA 3</h4>
                    </div>
                  </div>
                </a>

              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <a href="<?= base_url('dashboard/daftar_sertifikat/prima_2') ?>">
                  <div class="image-180">
                    <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/prima_2.png" alt="Card image">
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h4 class="card-title">Sertifikat PRIMA 2</h4>
                    </div>
                  </div>
                </a>

              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <a href="<?= base_url('dashboard/daftar_sertifikat/psat') ?>">
                  <div class="image-180">
                    <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/psat.png" alt="Card image">
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h4 class="card-title">Sertifikat PSAT</h4>
                    </div>
                  </div>
                </a>

              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <a href="<?= base_url('dashboard/daftar_sertifikat/kemas') ?>">
                  <div class="image-180">
                    <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/kemas.png" alt="Card image">
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h4 class="card-title">Sertifikat Rumah Kemas</h4>
                    </div>
                  </div>
                </a>

              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <a href="<?= base_url('dashboard/daftar_sertifikat/sppb') ?>">
                  <div class="image-180">
                    <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/sppb.png" alt="Card image">
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h4 class="card-title">Sertifikat SPPB-PSAT</h4>
                    </div>
                  </div>
                </a>

              </div>
            </div>
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