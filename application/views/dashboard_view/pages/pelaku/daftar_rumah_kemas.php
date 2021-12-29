<?php
foreach ($identitas_usaha as $usaha);
?>
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
              <li class="breadcrumb-item active">Daftar Usaha</li>
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
              <h2 class="card-inside-title">Rumah Kemas</h2>
              <form class="" action="<?= base_url("dashboard/insert/rumah_kemas") ?>" class="text-white" method="post">
              <h2 class="card-inside-title">Identitas Usaha</h2>

                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div class="input-field">
                      <input type="hidden" name="kode_layanan" value="kemas" readonly>
                      <input type="hidden" name="id_identitas_usaha" value="<?= $usaha['id_identitas_usaha'] ?>" readonly>
                      <input id="nama_perusahaan" type="text" name="nama_perusahaan" class="text-white" data-length="10" value="<?= $usaha['jenis_usaha'] ?>" readonly>
                      <label for="nama_perusahaan">Jenis Perusahaan</label>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="input-field">
                      <input id="nama_perusahaan" type="text" name="nama_perusahaan" class="text-white" data-length="10" value="<?= $usaha['nama_usaha'] ?>" readonly>
                      <label for="nama_perusahaan">Nama Usaha</label>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="form-line">
                        <div class="input-field">
                          <textarea id="alamat_perusahaan" class="materialize-textarea form-control no-resize text-white" name="alamat_perusahaan" data-length="120" readonly><?= $usaha['alamat_usaha'] ?></textarea>
                          <label for="alamat_perusahaan">Alamat Usaha</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-field">
                      <input id="nama_pemohon" name="nama_pemohon" type="text" class="text-white" data-length="10" value="<?= $usaha['nama_pemohon'] ?>" readonly>
                      <label for="nama_pemohon">Nama Pemohon</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-field">
                      <input id="no_ktp_pemohon" type="text" name="no_ktp_pemohon" class="text-white"  data-length="10" value="<?= $usaha['no_ktp_pemohon'] ?>" readonly>
                      <label for="no_ktp_pemohon">Nomor KTP Pemohon</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-field">
                      <input id="nomor_hp_pemohon" type="text" name="nomor_hp_pemohon" class="text-white" data-length="10"  value="<?= $usaha['no_hp_pemohon'] ?>" >
                      <label for="nomor_hp_pemohon">Nomor Whatsapp Aktif Telepon</label>
                    </div>
                  </div>
                  <br/>
                  <br/>
                  <div class="col-sm-12">
                    <div style="margin-bottom:10px;">
                      <h2 class="card-inside-title" style="display:inline">Identitas Komoditas dan Lahan</h2> <button class="btn btn-primary fas fa-plus" type="button" data-toggle="modal" data-target="#modalTambah"></button>
                    </div>
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Komoditas</th>
                          <th>Luas Lahan (Ha)</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                      </tbody>

                    </table>

                  </div>

                </div>
                <button type="submit " class="btn btn-info waves-effect" name="button">Simpan</button>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Input -->


    </div>

  </div>
</div>

</section>





<div class="modal" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah komoditas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label class="text-small">Sektor</label>

              <select class="form-control text-black" id="sektor">
                <option value="null" >-- Pilih Sektor --</option>

                <?php foreach ($komoditas_sektor as $sektor): ?>
                  <option value="<?= $sektor['id_sektor'] ?>" ><?= $sektor['nama_sektor_komoditas'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label class="text-small">Kelompok</label>

              <select class="form-control text-black" id="kelompok">
                <!-- <?php foreach ($komoditas_sektor as $sektor): ?>
                  <option value="<?= $sektor['id_sektor'] ?>" ><?= $sektor['nama_sektor_komoditas'] ?></option>
                <?php endforeach; ?> -->
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label class="text-small">Komoditas</label>

              <select class="form-control text-black" id="komoditas">
                <!-- <?php foreach ($komoditas as $komoditas): ?>
                  <option value="<?= $komoditas['kode_komoditas'].';'.$komoditas['deskripsi'] ?>" ><?= $komoditas['deskripsi'] ?></option>
                <?php endforeach; ?> -->
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="luas_lahan">Luas Lahan (Ha)</label>
              <input class="text-black" type="number" name="luas_lahan" id="luas_lahan" placeholder="0" min="0" step=".01">
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-info" data-dismiss="modal" onClick="tambahKomoditas()">Tambah</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
var id_sektor;
var id_kelompok;
$('#sektor').on('change', function() {
  id_sektor = this.value;
  $.ajax({
    url: "<?= base_url()?>dashboard/getKomoditasKelompok",
    data:{id_sektor: id_sektor},
    type: "POST",
    success: function(result){
      $("#kelompok").html(result);
    }
  });
});
$('#kelompok').on('change', function() {
  id_kelompok = this.value;

  $.ajax({
    url: "<?= base_url()?>dashboard/getMasterKomoditas",
    data:{id_sektor: id_sektor,id_kelompok: id_kelompok},
    type: "POST",
    success: function(result){

      $("#komoditas").html(result);
    }
  });
});


var urutan = 1;
  function tambahKomoditas(){

    var data = document.getElementById("komoditas").value;
    var id_sektor = document.getElementById("sektor").value;
    var id_kelompok = document.getElementById("kelompok").value;
    var splitData = data.split(";");
    var nama_komoditas = splitData[1];
    var kode_komoditas = splitData[0];
    var nama_latin = splitData[2];
    var luas_lahan = document.getElementById("luas_lahan").value;
    if(luas_lahan <= 0){
      luas_lahan = 0;
    }

      var body = '<tr id='+urutan+'><td>';
body += '<input type="hidden" name="id_kelompok[]"  value="'+id_kelompok+'"/><input type="hidden" name="nama_latin[]"  value="'+nama_latin+'"/><input type="hidden" name="id_sektor[]"  value="'+id_sektor+'"/><input type="hidden" name="kode_komoditas[]"  value="'+kode_komoditas+'"/><input readonly class="text-white" type="text" name="nama_komoditas[]" value="'+nama_komoditas+'"/>';
//
body +='</td><td><input class="text-white" name="luas_lahan[]" type="number" value="'+luas_lahan+'" placeholder="0" min="0" step=".01"></td>';
body +='<td><button type="button" onclick="removeElement('+urutan+')" class="btn btn-warning"><i class="fas fa-minus"></i></button></td>';
body += '</tr>';
    document.getElementById("tbody").innerHTML += body;
    document.getElementById("komoditas").value = "";
    document.getElementById("luas_lahan").value = "";
    urutan++;
  }

  function removeElement(elementId) {
    // Removes an element from the document
    $("#"+elementId).remove();
    console.log("asd")

}
</script>
