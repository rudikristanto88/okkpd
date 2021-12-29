<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <?php if($this->session->flashdata('status')!= ""){
        echo $this->session->flashdata('status');
      } ?>
      <div class="table-responsive">
        <table class="table table-hover display" id="table-datatable">
        <thead>
          <tr>
            <th style="vertical-align: middle;">No</th>
            <th style="vertical-align: middle;">Jenis Layanan</th>
            <th style="vertical-align: middle;">Kode Pendaftaran</th>
            <th  style="vertical-align: middle;">Tanggal Pengajuan</th>
            <th  style="vertical-align: middle;">Nama Pemohon</th>
            <th style="vertical-align: middle;">Nama Perusahaan</th>
            <th  style="text-align: center;">Dokumen Kelengkapan <br/>dan Syarat Teknis</th>
            <!-- <th  style="text-align: center;">Lihat Produk</th> -->
            <th style="vertical-align: middle;text-align:center;width:200px">Aksi</th>
          </tr>

        </thead>
        <tbody>
          <?php $i = 1; foreach ($dokumen as $dokumen) { ?>
            <tr>
              <td><?= $i ?>.</td>
              <td><?= $dokumen['nama_layanan'] ?></td>
              <td><?= $dokumen['kode_pendaftaran'] ?></td>
              <td><?= $dokumen['tanggal_buat'] ?></td>
              <td><?= $dokumen['nama_lengkap'] ?></td>
              <td><?= $dokumen['nama_usaha'] ?></td>
              <td><center><button class="btn btn-info" data-toggle="modal" onClick="setId(<?= $dokumen['uid'] ?>)" data-target="#modalDokumen" style="display:inline"><i class="fas fa-eye"></i></button></center></td>
              <!-- <td>
                <button  class="btn btn-info inline" ><a href="<?= base_url() ?>dashboard/produk/<?= $dokumen['kode_layanan']?>/<?= $dokumen['uid']?>" class="text-white"><i class="fas fa-eye"></i></a></button>

              </td> -->
              <td>
                <?php if($dokumen['status']==1 && $dokumen['alasan_penolakan'] != null) {?>
                  Ditolak
                <?php }else{?>
                  <form class="" action="<?= base_url() ?>dashboard/update_status_layanan" method="post" style="display:inline">
                    <input type="hidden" name="id_layanan" id="id_layanan" value="<?= $dokumen['uid'] ?>">
                    <input type="hidden" name="level"  value="2">

                    <button type="submit" class="btn btn-success">Terima</button>
                  </form>
                  <button class="btn btn-warning" data-toggle="modal" onClick="setData(<?= $dokumen['uid'] ?>)" data-target="#myModal" style="display:inline">Tolak</button>

                <?php }?>
              </td>
            </tr>
            <?php $i++;}
            if($i == 1){
              echo "<tr>
              <td colspan='8'><center>Tidak ada data yang ditampilkan</center></td></tr>";
            }

            ?>

          </tbody>
        </table>
      </div>

      </div>
    </div>
  </section>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/tolak_dokumen" method="post">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Alasan Penolakan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

            <input type="hidden" name="uid" id="id_prima" value="">
            <input type="hidden" name="id_user"  value="<?= $id_saya ?>">
            <label for=""></label>
            <textarea class="form-control" name="alasan_penolakan" rows="8" cols="80"></textarea>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-info" >Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="modalDokumen">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/update_status_surat" method="post">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Dokumen</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="gambar">



          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>&nbsp;&nbsp;
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function setData(id){
    document.getElementById("id_prima").value = id;
  }
  function setId(id){
    var loading = '<div class="text-center">';
    loading += '<div class="spinner" style="margin:auto"></div>';
    loading += '<div>Loading...</div></div>';
    $("#gambar").html(loading);

    console.log(id);

    $.ajax({
      url: "<?= base_url()?>dashboard/getDokumen/"+id,
      success: function(result){
        $("#gambar").html(result);
      }
    });


  }

  $(document).ready(function(){

  })
</script>
