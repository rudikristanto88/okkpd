
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
              <li class="breadcrumb-item active">Daftar Produk Ekspor</li>
              <li class="breadcrumb-item active">Health Certificate</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">Daftar Produk Ekspor Health Certificate</h2>
                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div style="margin-bottom:10px;">
                    </div>
                    <div class="table-responsive">

                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th width="200px">Nama Produk</th>
                          <th>Jenis Produk</th>
                          <th>Nomor HS</th>
                          <th>Nama Eksportir</th>
                          <th>Alamat Kantor</th>
                          <th>Alamat Gudang</th>
                          <th>Consigment Code</th>
                          <th>Jumlah Lot</th>
                          <th>Berat Masing-masing Lot</th>
                          <th>Jumlah Kemasan</th>
                          <th>Jenis Kemasan</th>
                          <th>Berat Kotor</th>
                          <th>Berat Bersih</th>
                          <th>Pelabuhan Berangkat</th>
                          <th>Identitas Transportasi</th>
                          <th>Pelabuhan Tujuan</th>
                          <th>Negara Tujuan</th>
                          <th>Negara Transit</th>
                          <th>Pelabuhan Transit</th>
                          <th>Identitas Transportasi</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php $i=1; foreach ($produk as $produk): ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td width="200px"><?= $produk['nama_produk'] ?></td>
                            <td><?= $produk['jenis_produk'] ?></td>
                            <td><?= $produk['nomor_hs'] ?></td>
                            <td><?= $produk['nama_eksportir'] ?></td>
                            <td><?= $produk['alamat_kantor'] ?></td>
                            <td><?= $produk['alamat_gudang'] ?></td>
                            <td><?= $produk['consignment_code'] ?></td>
                            <td><?= $produk['jumlah_lot'] ?></td>
                            <td><?= $produk['berat_lot'] ?></td>
                            <td><?= $produk['jumlah_kemasan'] ?></td>
                            <td><?= $produk['jenis_kemasan'] ?></td>
                            <td><?= $produk['berat_kotor'] ?></td>
                            <td><?= $produk['berat_bersih'] ?></td>
                            <td><?= $produk['pelabuhan_berangkat'] ?></td>
                            <td><?= $produk['identitas_transportasi'] ?></td>
                            <td><?= $produk['pelabuhan_tujuan'] ?></td>
                            <td><?= $produk['negara_tujuan'] ?></td>
                            <td><?= $produk['negara_transit'] ?></td>
                            <td><?= $produk['pelabuhan_transit'] ?></td>
                            <td><?= $produk['transportasi_transit'] ?></td>
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
      </div>
      <!-- #END# Input -->


    </div>

  </div>
</div>

</section>
