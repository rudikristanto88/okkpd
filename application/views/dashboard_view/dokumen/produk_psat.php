
<section class="content">
  <div class="container-fluid">
    <div class="block-header">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
                <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Daftar Produk Pangan</li>
              <li class="breadcrumb-item active">PSAT</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">Daftar Produk Pangan PSAT</h2>
                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div style="margin-bottom:10px;">
                    </div>
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Produk Pangan</th>
                          <th>Nama Dagang</th>
                          <th>Kemasan</th>
                          <th>Netto</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php $i=1; foreach ($produk as $produk): ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $produk['nama_produk_pangan'] ?></td>
                            <td><?= $produk['nama_dagang'] ?></td>
                            <td><?= $produk['nama_kemasan'] ?></td>
                            <td><?= $produk['netto'].' '.$produk['satuan'] ?></td>
                          </tr>
                        <?php $i++;endforeach; ?>

                      </tbody>

                    </table>
                    <!-- <button class="btn btn-info"><a href="<?= base_url()?>dokumen/dokumen_produk/psat/<?= $produk['id_layanan'] ?>" target="_blank" class="text-white">Lihat Dokumen <i class="fas fa-eye"></i></a></button> -->

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
