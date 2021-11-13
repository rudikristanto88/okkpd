<style>
  .loaders {
    border: 5px solid #f3f3f3;
    /* Light grey */
    border-top: 5px solid #3498db;
    /* Blue */
    border-radius: 100%;
    animation: spin 2s linear infinite;
    position: absolute;
    top: 55px;
    left: 230px;
    height: 30px;
    width: 30px;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
</style>
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
            </li>

          </ul>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if ($this->session->flashdata('status') != "") {
          echo $this->session->flashdata('status');
        } ?>
      </div>
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            Daftar Kontak Kami
          </div>
          <div class="card-body">

            <br />
            <div class="table-responsive">
              <table class="table table-hover" id="table-datatable" class="display">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody id="body_table">
                  <?php

                  foreach ($keluhan_saran as $keluhan) : ?>
                    <tr>
                      <td><?= $keluhan['nama'] ?></td>
                      <td><?= $keluhan['email'] ?></td>
                      <td><?= $keluhan['pesan'] ?></td>
                      <td><?= date("d/m/Y H:i:s", strtotime($keluhan['tanggal'])) ?></td>
                    </tr>

                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    $("#selector").change(function() {
      $("#loaders").toggle();
      $.ajax({
        url: "dashboard/getKeluhanDansaran/" + this.value,
        type: "POST",
        success: function(result) {
          $("#loaders").toggle();
          $("#body_table").html(result);
        }
      });
    });
  });
</script>