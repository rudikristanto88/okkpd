
<section class="content">
  <div class="container-fluid">
    <div class="block-header">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
                <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              <li class="breadcrumb-item active">Daftar Komoditas</li>
              <li class="breadcrumb-item active">Rumah Kemas</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">Daftar Komoditas Rumah Kemas</h2>
                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div style="margin-bottom:10px;">
                    </div>
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Produk</th>
                          <th>Luas Lahan</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php $i=1; foreach ($produk as $produk): ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $produk['nama_jenis_komoditas'] ?></td>
                            <td><?= $produk['luas_lahan'] ?> m2</td>
                          </tr>
                        <?php $i++;endforeach; ?>

                      </tbody>

                    </table>

                  </div>

                </div>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Input -->


    </div>

  </div>
</div>

</section>
