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
            <li class="breadcrumb-item active">Daftar Cetak Sertifikat</li>
            <li class="breadcrumb-item active"><?= $jenis ?></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Input -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div>
          <div class="body">
            <h4 class="card-inside-title">Pilih Perusahaan</h4><br />
            <hr />
            

            <div class="row">
              <div class="col-md-12">
                Cari berdasarkan<br /><br />
              </div>
              <div class="col-md-12">
                <form class="" action="" method="get">
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" style="color:black" name="category">
                        <option value="noreg" <?php if (isset($_GET['category'])) {
                                                if ($_GET['category'] == 'noreg') {
                                                  echo 'selected';
                                                }
                                              } ?>>Nomor Registrasi</option>
                        <option value="nosertifikat" <?php if (isset($_GET['category'])) {
                                                        if ($_GET['category'] == 'nosertifikat') {
                                                          echo 'selected';
                                                        }
                                                      } ?>>Nomor Sertifikat</option>
                        <!-- <option value="merk" <?php if ($_GET['category'] == 'merk') {
                                                    echo 'selected';
                                                  } ?>>Merek</option> -->
                        <option value="usaha" <?php if (isset($_GET['category'])) {
                                                if ($_GET['category'] == 'usaha') {
                                                  echo 'selected';
                                                }
                                              } ?>>Nama Usaha</option>
                        <option value="pemohon" <?php if (isset($_GET['category'])) {
                                                  if ($_GET['category'] == 'pemohon') {
                                                    echo 'selected';
                                                  }
                                                } ?>>Nama Pemohon</option>
                      </select>

                    </div>
                    <div class="col-md-3">
                      <input type="text" class="placeholder-black" name="cari" style="color:black;background:white; padding-left:16px;" <?php if (isset($_GET['cari'])) {
                                                                                                                                          echo 'value="' . $_GET['cari'] . '"';
                                                                                                                                        } ?>>
                    </div>
                    <div class="col-md-6"><button class="btn btn-info" style="background:white">Cari</button></div>
                  </div>


                </form>
              </div>
            </div>
            <br /><br />
            <div class="table-responsive-md">
              <table class="table table-hover" id="table-datatable" class="display">
                <thead>
                  <tr>
                    <th width="30px">No.</th>
                    <th>Nama Usaha</th>
                    <th>Nama Pemohon</th>
                    <th>Layanan yang Diajukan</th>
                    <th>Kode Registrasi</th>
                    <th width="220px"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($dokumen as $form) :
                    $nama_produk = "";
                    $id = $form['id'];
                    if ($menu == 'prima_3' || $menu == 'prima_2') {
                      $nama_produk = $form['nama_jenis_komoditas'];
                      $id = $form['id_detail'];
                    } else if ($menu == 'psat') {
                      $nama_produk = $form['nama_produk_pangan'];
                      $id = $form['id'];
                    } else if ($menu == 'hc') {
                      $nama_produk = $form['nama_produk'];
                      $id = $form['id'];
                    }
                  ?>
                    <tr>
                      <td>
                        <?= $i ?>.
                      </td>
                      <td><?= $form['nama_usaha'] ?></td>
                      <td><?= $form['nama_pemohon'] ?></td>
                      <td><?= $form['nama_layanan'] ?></td>
                      <td><?= $form['kode_pendaftaran'] ?></td>
                      <!-- <td><?= $nama_produk ?></td> -->
                      <td>
                        <?php if ($cetak == true) : ?>
                          <a href="<?= base_url() ?>dokumen/sertifikat/<?= $form['kode_layanan'] ?>/<?= $id ?>" target="_blank"><button class="btn btn-success">Unduh Form</button></a>
                          <button data-toggle="modal" onClick="setData(<?= $id ?>,<?= $form['uid'] ?>,'<?= $form['kode_layanan'] ?>')" data-target="#modalUpload" class='btn btn-info'>Unggah <i class="fas fa-upload"></i></button>
                        <?php else : ?>
                          <a href="<?= base_url() ?>dokumen/cetak_sertifikat/<?= $form['kode_layanan'] ?>/<?= $id ?>" target="_blank"><button class="btn btn-success">Unduh Sertifikat</button></a>
                          <button data-toggle="modal" onClick="setDataBekukan(<?= $id ?>,<?= $form['uid'] ?>,'<?= $form['kode_layanan'] ?>','<?= $form['status'] ?>')" data-target="#modalBekukan" class='btn btn-info'><?= $form['status'] == "Dibekukan" ? "Aktifkan" : "Bekukan" ?> Sertifikat </button>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php $i++;
                  endforeach; ?>

                </tbody>
              </table>
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
                  <input type="hidden" name="kode_layanan" id="kode_layanan">
                  <input type="hidden" name="id" id="uid">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="upload" value="1">Tambah</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal" id="modalBekukan">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="" action="<?= base_url() ?>dashboard/bekukan_sertifikat" method="post">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="title-bekukan">Bekukan Sertifikat</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              Anda yakin untuk membekukan sertifikat ini?
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="id_detail" id="id_detail_beku">
          <input type="hidden" name="kode_layanan" id="kode_layanan_beku">
          <input type="hidden" name="id" id="uid_beku">
          <input type="hidden" name="status" id="status">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="upload" value="1">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script type="text/javascript">
  function setData(id, uid, kode_layanan) {
    $("#id_detail").val(id);
    $("#kode_layanan").val(kode_layanan);
    $("#uid").val(uid);
  }

  function setDataBekukan(id, uid, kode_layanan, status) {
    $("#id_detail_beku").val(id);
    $("#kode_layanan_beku").val(kode_layanan);
    $("#uid_beku").val(uid);
    $("#title-bekukan").html(status == "Dibekukan" ? "Aktifkan Sertifikat" : "Bekukan Sertifikat")
    $("#status").val(status == "Dibekukan" ? null : "Dibekukan")
  }
</script>