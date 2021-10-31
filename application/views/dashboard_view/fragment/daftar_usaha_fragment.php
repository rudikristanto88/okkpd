<?php
$id_identitas_usaha = '';
$jenis_usaha = '';
$nama_pemohon= '';
$jabatan_pemohon= '';
$nomor_ktp= '';
$foto_ktp= '';
$nomor_npwp= '';
$foto_npwp= '';
$nama_perusahaan= '';
$alamat_perusahaan= '';
$rt= '';
$rw= '';
$kotanya= '';
$kecamatannya= '';
$kelurahannya= '';
$no_telp= '';
$no_hp= '';
$kop_surat= '';
$unit_kerja= '';
$nama_pimpinan= '';

if($menu == 'ubah'){
  $id_identitas_usaha =  $usaha['id_identitas_usaha'];
  $jenis_usaha = $usaha['jenis_usaha'];
  $nama_pemohon = $usaha['nama_pemohon'];
  $jabatan_pemohon = $usaha['jenis_usaha'];
  $nomor_ktp = $usaha['no_ktp_pemohon'];
  $foto_ktp = $usaha['foto_ktp'];
  $nomor_npwp = $usaha['no_npwp'];
  $foto_npwp = $usaha['foto_npwp'];
  $nama_perusahaan = $usaha['nama_usaha'];
  $alamat_perusahaan = $usaha['alamat_usaha'];
  $rt = $usaha['rt'];
  $rw = $usaha['rw'];
  $kotanya = $usaha['kota'];
  $kecamatannya = $usaha['kecamatan'];
  $kelurahannya = $usaha['kelurahan'];
  $no_telp = $usaha['no_telp'];
  $no_hp = $usaha['no_hp_pemohon'];
  $kop_surat = $usaha['kop_surat'];
  $unit_kerja = $usaha['unit_kerja'];
  $nama_pimpinan = $usaha['nama_pimpinan'];
}

?>

<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="index.html">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Identitas Usaha </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">Daftar Usaha</h2>
              <?php
              if($this->session->flashdata("status")){
                echo $this->session->flashdata("status");
              }
              ?>
              <?php

              $attribute = array("class"=>"text-white","id"=>"form_identitas");
              echo form_open_multipart("dashboard/insert_identitas_usaha/".$menu,$attribute);?>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <div class="input-field">
                    <input type="hidden" name="id_identitas_usaha" value="<?= $id_identitas_usaha ?>">

                      <div class="form-group">
                        <?php if($menu == 'tambah'){ ?>
                          <select class="form-control" name="jenis_usaha" id="jenis_usaha" required <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                            <option value="Perorangan">Perorangan</option>
                            <option value="Kelompok">Kelompok</option>
                            <option value="Perusahaan">Perusahaan</option>
                          </select>
                        <?php }else{ ?>
                          <input type="text" class="text-white" name="id_identitas_usaha" value="<?= $jenis_usaha ?>" readonly>
                        <?php }?>

                      </div>

                    <!-- <input id="jenis_usaha" name="jenis_usaha" type="text" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> class="text-white" data-length="10" value="<?= $jenis_usaha ?>" readonly required> -->
                    <!-- <label for="jenis_usaha">Jenis Usaha</label> -->
                  </div>
                </div>



                <div class="col-sm-12">
                  <div class="input-field">
                    <input id="nama_pemohon" name="nama_pemohon" type="text" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> class="text-white" data-length="10" value="<?= $nama_pemohon ?>" required>
                    <label for="nama_pemohon">Nama Pemohon</label>
                  </div>
                </div>
                <div class="col-sm-12" id="kolom_jabatan">
                  <div class="input-field">
                    <input id="jabatan_pemohon" type="text" name="jabatan_pemohon" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> class="text-white" value="<?= $jabatan_pemohon ?>" data-length="10" required>
                    <label for="jabatan_pemohon">Jabatan Pemohon</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-field">
                    <input id="no_ktp_pemohon" type="text" name="no_ktp_pemohon" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> class="text-white" value="<?= $nomor_ktp ?>"   data-length="10" required>
                    <label for="no_ktp_pemohon">Nomor KTP Pemohon</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-field">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload File</span>
                        <input type="file" name="foto_ktp" <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                      </div>
                      <div class="file-path-wrapper">
                        <input  class="file-path validate text-white" type="text" placeholder="Foto KTP" >
                      </div>
                    </div>
                  </div>
                </div>



                <div class="col-sm-6">
                  <div class="input-field">
                    <input id="no_npwp" type="text" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> name="no_npwp" class="text-white" value="<?= $nomor_npwp ?>" data-length="10">
                    <label for="no_npwp">Nomor NPWP <span id="npwp_required">(Tidak Wajib)</span></label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-field">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload File</span>
                        <input type="file" name="foto_npwp" <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                      </div>
                      <div class="file-path-wrapper">
                        <input  class="file-path validate text-white" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> type="text"  placeholder="Foto NPWP">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-field">
                    <input id="nama_usaha" type="text" name="nama_usaha" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> class="text-white" value="<?= $nama_perusahaan ?>" data-length="10" required>
                    <label for="nama_usaha">Nama Perusahaan / Kelompok / Perorangan </label>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="form-line">
                      <div class="input-field">
                        <textarea id="alamat_usaha" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> required class="materialize-textarea form-control no-resize text-white" name="alamat_usaha" data-length="120"><?= $alamat_perusahaan ?></textarea>
                        <label for="alamat_usaha">Alamat Perusahaan / Kelompok / Perorangan</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="input-field">
                    <input id="rt" type="number" name="rt" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> class="text-white" value="<?= $rt ?>" data-length="10" required>
                    <label for="rt">RT *</label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="input-field">
                    <input id="rw" type="number" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> name="rw" class="text-white" value="<?= $rw ?>" data-length="10" required>
                    <label for="rw">RW *</label>
                  </div>
                </div>

                <!-- $foto_ktp= ''; -->
                <!-- $foto_npwp= ''; -->
                <!-- $kota= ''; -->
                <!-- $kecamatan= ''; -->
                <!-- $kelurahan= ''; -->

                <!-- $no_telp= ''; -->
                <!-- $no_hp= ''; -->
                <!-- $kop_surat= ''; -->
                <!-- $unit_kerja= ''; -->
                <!-- $nama_pimpinan= ''; -->

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="kota">Kota</label>
                    <?php if($menu == 'tambah'){ ?>
                      <select class="form-control" name="kota" id="kota" required <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                        <?php foreach ($kota as $kota): ?>
                          <option value="<?= $kota['kode_kota'].";".$kota['nama_kota'] ?>" <?php if($kotanya == $kota['nama_kota']){ echo 'selected'; } ?>><?= $kota['nama_kota'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    <?php }else{ ?>
                      <input id="no_hp_pemohon" type="text" name="no_hp_pemohon" value="<?= $kotanya ?>" class="text-white" data-length="10" readonly>
                    <?php } ?>
                    <!-- <select class="form-control" name="kota" id="kota" required <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                      <?php foreach ($kota as $kota): ?>
                        <option value="<?= $kota['kode_kota'].";".$kota['nama_kota'] ?>" <?php if($kotanya == $kota['nama_kota']){ echo 'selected'; } ?>><?= $kota['nama_kota'] ?></option>
                      <?php endforeach; ?>
                    </select> -->
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>

                    <?php if($menu == 'tambah'){ ?>
                      <select class='form-control' name="kecamatan" id="kecamatan" required <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                      </select>
                    <?php }else{ ?>
                      <input id="no_hp_pemohon" type="text" name="no_hp_pemohon" value="<?= $kecamatannya ?>" class="text-white" data-length="10" readonly>
                    <?php } ?>

                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <?php if($menu == 'tambah'){ ?>

                      <select class="form-control" name="kelurahan"  id="kelurahan" required <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                      </select>
                    <?php }else{ ?>
                      <input id="no_hp_pemohon" type="text" name="no_hp_pemohon" value="<?= $kelurahannya ?>" class="text-white" data-length="10" readonly>
                    <?php } ?>

                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="input-field">
                    <input id="no_telp" type="text" name="no_telp" class="text-white" value="<?= $no_telp ?>" data-length="10" <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                    <label for="no_telp">Nomor Telepon Kantor</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-field">
                    <input id="no_hp_pemohon" type="text" name="no_hp_pemohon" value="<?= $no_hp ?>" class="text-white" data-length="10" <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                    <label for="no_hp_pemohon">Nomor HP Pemohon</label>
                  </div>
                </div>

                <div class="col-sm-12" id="kop">
                  <div class="input-field">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload File</span>
                        <input type="file" name="kop_surat" id="kop_surat" <?php if($menu == 'ubah'){ echo 'readonly'; } ?>>
                      </div>
                      <div class="file-path-wrapper">
                        <input  class="file-path validate text-white" type="text" placeholder="Kop Surat">
                        <span>Ukuran yang dianjurkan 1150 px X 250 px</span>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="input-field">
                    <input id="nama_unit_kerja" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> type="text" name="nama_unit_kerja" class="text-white" data-length="10" value="<?= $unit_kerja ?>" readonly value=" ">
                    <!-- <label for="nama_unit_kerja">Nama Unit Kerja</label> -->
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-field">
                    <input id="nama_pimpinan_unit_kerja" <?php if($menu == 'ubah'){ echo 'readonly'; } ?> type="text" name="nama_pimpinan_unit_kerja" class="text-white" value="<?= $nama_pimpinan ?>" data-length="10" readonly value=" ">
                    <!-- <label for="nama_pimpinan_unit_kerja">Nama Pimpinan Unit Kerja</label> -->
                  </div>
                </div>

              </div>
              <?php if($menu == 'tambah'){
                echo '<input type="text" value="" id="lanjut" name="lanjut" style="display:none" required />';
                echo '<div class="alert alert-warning" style="display:none" id="alert_identitas">Identitas usaha sudah didaftarkan sebelumnya</div>';
                // echo '<label>
                //   <input type="checkbox"  value="Setuju" name="persyaratan" required />
                //   <span>Klik disini jika data yang dimasukkan sudah benar dan saya mengerti data tidak dapat diubah kembali</span>
                // </label><br/>';
                echo '<button class="btn btn-info waves-effect" data-toggle="modal" data-target="#myModal" id="simpan" type="button">Simpan</button>';
                echo '<button class="btn btn-info waves-effect" id="submits" style="display:none" type="submit">Simpan</button>';} ?>

            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- #END# Input -->


  </div>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Peringatan</h4>
      </div>
      <div class="modal-body">
        <p>Data yang dimasukkan adalah data yang benar dan saya mengerti bahwa data tidak dapat diubah kembali</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal" id="btn_lanjut">Lanjutkan</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal End -->


<!-- Widgets -->

<!-- #END# Widgets -->

</section>


<script type="text/javascript">
$(document).ready(function(){

$("#btn_lanjut").click(function(){
  var id = $("#kota").val().split(";");
  $.ajax({
    url: "<?= base_url()?>beranda/PelakuUsaha/cekIdentitasUsaha",
    data:{kota: id[1], alamat:$("#alamat_usaha").val(), nama_usaha : $("#alamat_usaha").val()},
    type: "POST",
    success: function(result){
      console.log(result);
      if(result == 0){
        $("#alert_identitas").css("display","none");
        $("#lanjut").val("ok");
        $("#submits").trigger("click");
      }else{
        $("#lanjut").val("");
        $("#alert_identitas").css("display","block");
      }

    }
  });


});

/*  $("#simpan").click(function(){
    var txt;
    var r = confirm("Perhatian, data yang sudah dimasukkan tidak akan dapat diubah dikemudian hari. Apakah anda yakin dengan data anda?");
    if (r == true) {
      $("#form_identitas").submit();
    } else {
      txt = "You pressed Cancel!";
    }
  })*/
})

/*
function jenisUsaha(value){
  if(value == "perorangan"){
    document.getElementById("kop").style.display = "none";
    document.getElementById("kop_surat").value = "";
  }else{
    document.getElementById("kop").style.display = "block";
  }
}*/

$('#jenis_usaha').on('change', function() {
  console.log("jahsdk");

  var jenis = this.value;
  if(jenis == "Perorangan"){
    $("#kop").css("display","none");
    $("#kop_surat").val("");
    document.getElementById("no_npwp").required = false;
    $("#npwp_required").html("(Tidak wajib)");
    // document.getElementById("kop").style.display = "none";
    // document.getElementById("kop_surat").value = "";
  }else{
    if(jenis == 'Kelompok'){
      $("#npwp_required").html("(Tidak wajib)");
      document.getElementById("no_npwp").required = false;
    }else if(jenis == 'Perusahaan'){
      $("#npwp_required").html("*");
      document.getElementById("no_npwp").required = true;
    }
    document.getElementById("kop").style.display = "block";
  }
});

$('#kota').on('change', function() {
  var id = this.value.split(";");
  $.ajax({
    url: "<?= base_url()?>dashboard/getDataKecamatan",
    data:{kode_kota: id[0]},
    type: "POST",
    success: function(result){
      $("#kecamatan").html(result);
      $.ajax({
        url: "<?= base_url()?>dashboard/getInstansi",
        data:{kode_kota: id[0]},
        type: "POST",
        success: function(result){
          var dat = result.split("<>");
          $("#nama_unit_kerja").val(dat[0]);
          $("#nama_pimpinan_unit_kerja").val(dat[1]);

        }
      });
    }
  });
});

$('#kecamatan').on('change', function() {
  var id = this.value.split(";");
  $.ajax({
    url: "<?= base_url()?>dashboard/getDataKelurahan",
    data:{kode_kec: id[0]},
    type: "POST",
    success: function(result){
      $("#kelurahan").html(result);
    }
  });
});
</script>
