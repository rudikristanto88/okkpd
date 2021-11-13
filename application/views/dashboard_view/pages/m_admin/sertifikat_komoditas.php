
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
              <li class="breadcrumb-item active">Daftar Sertifikat</li>
              <li class="breadcrumb-item active">Daftar Produk</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">Daftar Produk <?= $jenis ?></h2>
                <div class="row clearfix">

                  <div class="col-sm-12">
                    Setting Printer : <?php if($layanan == 'kemas'){echo 'Ukuran A4, Orientasi Portrait';}else{echo 'Ukuran A4, Orientasi Landscape';} ?>
                    <div style="margin-bottom:10px;">
                    </div>
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Usaha</th>
                          <th>Nama Produk</th>
                          <th>Luas Lahan</th>
                          <th>Sertifikat</th>
                          <th>Nomor Sertifikat</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php $i=1;
                        if($dokumen == null){

                        }else{

                        foreach ($dokumen as $produk): ?>
                          <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $produk['nama_usaha'] ?></td>
                            <td><?= $produk['nama_jenis_komoditas'] ?></td>
                            <td><?= $produk['luas_lahan'] ?> m2</td>
                            <td>
                              <?php
                              if($produk['sertifikat'] == null){ ?>
                                <a href="<?= base_url()?>dokumen/sertifikat/<?= $layanan ?>/<?= $produk['id_detail']?>" target="_blank"><button class="btn btn-success">Unduh</button></a>
                                <button data-toggle="modal" onClick="setData(<?= $produk['id_detail'] ?>,<?= $produk['uid'] ?>)" data-target="#modalUpload" class='btn btn-info'>Unggah <i class="fas fa-upload"></i></button>
                              <?php }else{ ?>
                                <!-- <button data-toggle="modal" onClick="setData(<?= $produk['id_detail'] ?>)" data-target="#modalUpload" class='btn btn-info'>Unggah <i class="fas fa-upload"></i></button> -->
                                <a href="<?= base_url()?>dokumen/cetak_sertifikat/<?= $layanan ?>/<?= $produk['id_detail']?>" target="_blank"><button class="btn btn-success">Lihat</button></a>

                            <?php  }

                               ?>
                            </td>
                            <td><?= $produk['nomor_sertifikat'] ?></td>
                            <td><button data-toggle="modal" onClick="setDataNomor(<?= $produk['id_detail'] ?>,'<?= $produk['nomor_sertifikat'] ?>','<?= $produk['kode_layanan'] ?>')" data-target="#modalUbah" class='btn btn-info'>Ubah Nomor </button></td>
                          </tr>
                        <?php $i++;endforeach; } ?>

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
        <button type="submit" class="btn btn-info" name="upload" value="1">Tambah</button>
      </div>
    </form>

    </div>
  </div>
</div>

<div class="modal" id="modalUbah">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="" action="<?= base_url() ?>dashboard/ubah_sertifikat" method="post">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ubah nomor sertifikat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label class="text-small">Nomor Sertifikat</label>
              <input class="form-control text-black" id="id_detail_nomor" name="id_detail" type="hidden">
              <input class="form-control text-black" id="jenis" name="jenis" type="hidden">
              <input class="form-control text-black" id="nomor_sertifikat" name="nomor_sertifikat" type="text" style="color:black;font-size:16px">
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
        <button type="submit" class="btn btn-info" name="upload" value="1">Tambah</button>
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
  function setDataNomor(id,nomor,jenis){
    $("#id_detail_nomor").val(id);
    $("#jenis").val(jenis);
    $("#nomor_sertifikat").val(nomor);
  }
</script>
