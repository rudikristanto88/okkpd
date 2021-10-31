
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
                    Setting Printer : Ukuran F4, Orientasi Portrait
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
                          <th>Consigment Code</th>
                          <th>Jumlah Lot</th>
                          <th>Berat Masing-masing Lot</th>
                          <th>Jumlah Kemasan</th>
                          <th>Jenis Kemasan</th>
                          <th>Berat Kotor</th>
                          <th>Berat Bersih</th>

                          <th>Sertifikat</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php $i=1; foreach ($dokumen as $produk): ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td width="200px"><?= $produk['nama_produk'] ?></td>
                            <td><?= $produk['jenis_produk'] ?></td>
                            <td><?= $produk['nomor_hs'] ?></td>
                            <td><?= $produk['nama_eksportir'] ?></td>
                            <td><?= $produk['alamat_kantor'] ?></td>
                            <td><?= $produk['consignment_code'] ?></td>
                            <td><?= $produk['jumlah_lot'] ?></td>
                            <td><?= $produk['berat_lot'] ?></td>
                            <td><?= $produk['jumlah_kemasan'] ?></td>
                            <td><?= $produk['jenis_kemasan'] ?></td>
                            <td><?= $produk['berat_kotor'] ?></td>
                            <td><?= $produk['berat_bersih'] ?></td>

                            <td>
                              <?php
                              if($produk['sertifikat'] == null){ ?>
                                <a href="<?= base_url()?>dokumen/sertifikat/<?= $layanan ?>/<?= $produk['id']?>" target="_blank"><button class="btn btn-success">Unduh</button></a>
                                <button data-toggle="modal" onClick="setData(<?= $produk['id'] ?>,<?= $produk['uid'] ?>)" data-target="#modalUpload" class='btn btn-info'>Unggah <i class="fas fa-upload"></i></button>
                              <?php }else{ ?>
                                <button data-toggle="modal" onClick="setData(<?= $produk['id'] ?>)" data-target="#modalUpload" class='btn btn-info'>Unggah <i class="fas fa-upload"></i></button>
                                <a href="<?= base_url()?>dokumen/cetak_sertifikat/<?= $layanan ?>/<?= $produk['id']?>" target="_blank"><button class="btn btn-success">Cetak</button></a>

                            <?php  }
                               ?>
                             </td>
                            </td>
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

<div class="modal" id="modalUpload">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="" action="<?= base_url() ?>dashboard/unggah_sertifikat_komoditas" method="post" enctype="multipart/form-data">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Unggah Sertifikat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="file-field input-field">
              <div class="btn">
                <span>Upload File</span>
                <input type="file" name="gambar" required>
                <input type="hidden" name="id_detail" id="id_detail">
                <input type="hidden" name="kode_layanan" value="<?= $layanan ?>">
                <input type="hidden" name="id" id="id">

              </div>
              <div class="file-path-wrapper">
                <input  class="file-path validate" type="text">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
        <button type="submit" class="btn btn-info" name="upload" value="1">Unggah</button>
      </div>
    </form>

    </div>
  </div>
</div>

<script type="text/javascript">
function setData(id,uid){
  $("#id_detail").val(id);
  $("#id").val(uid);
}
</script>
