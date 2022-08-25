<?php
$id_identitas_usaha = '';
$jenis_usaha = '';
$nama_pemohon = '';
$jabatan_pemohon = '';
$nomor_ktp = '';
$foto_ktp = '';
$nomor_npwp = '';
$foto_npwp = '';
$nama_perusahaan = '';
$alamat_perusahaan = '';
$rt = '';
$rw = '';
$kotanya = '';
$kecamatannya = '0';
$kelurahannya = '0';
$no_telp = '';
$no_hp = '';
$kop_surat = '';
$unit_kerja = '';
$nama_pimpinan = '';
$kode_kota = '';

if ($menu == 'ubah') {
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
  $kode_kota = usaha['kode_kota'];
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
                Beranda</a>
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

            $attribute = array("class" => "text-white", "id" => "form_identitas");
            echo form_open_multipart("dashboard/insert_identitas_usaha/" . $menu, $attribute); ?>
            <div class="row clearfix">
              <div class="col-sm-12">
                <span style="font-size:12px">(*) Wajib diisi</span>
                <div class="input-field">
                  <input type="hidden" name="id_identitas_usaha" value="<?= $id_identitas_usaha ?>">
                  <input id="nama_unit_kerja" type="hidden" name="nama_unit_kerja" class="text-white" data-length="10" value="<?= $unit_kerja ?>" readonly value=" ">
                  <input id="nama_pimpinan_unit_kerja" type="hidden" name="nama_pimpinan_unit_kerja" class="text-white" value="<?= $nama_pimpinan ?>" data-length="10" readonly value=" ">

                  <div class="form-group">
                  <label for="kecamatan">Pilih Jenis Usaha *</label>
                    <?php if ($menu == 'tambah') { ?>
                      <select class="form-control text-white" name="jenis_usaha" id="jenis_usaha" required <?php if ($menu == 'ubah') {
                                                                                                  echo 'readonly';
                                                                                                } ?>>
                        <option value="Perorangan">Perorangan</option>
                        <option value="Kelompok">Kelompok</option>
                        <option value="Perusahaan">Perusahaan</option>
                      </select>
                    <?php } else { ?>
                      <input type="text" class="text-white" name="jenis_usaha" value="<?= $jenis_usaha ?>" readonly>
                    <?php } ?>

                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="input-field">
                  <input id="nama_pemohon" name="nama_pemohon" type="text" <?php if ($menu == 'ubah') {
                                                                              echo 'readonly';
                                                                            } ?> class="text-white" data-length="10" value="<?= $nama_pemohon ?>" required>
                  <label for="nama_pemohon">Nama Pemohon *</label>
                </div>
              </div>
              <div class="col-sm-12" id="kolom_jabatan">
                <div class="input-field">
                  <input id="jabatan_pemohon" type="text" name="jabatan_pemohon" <?php if ($menu == 'ubah') {
                                                                                    echo 'readonly';
                                                                                  } ?> class="text-white" value="<?= $jabatan_pemohon ?>" data-length="10" required>
                  <label for="jabatan_pemohon">Jabatan Pemohon</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-field">
                  <input id="no_ktp_pemohon" type="text" name="no_ktp_pemohon" class="text-white" value="<?= $nomor_ktp ?>" data-length="10">
                  <label for="no_ktp_pemohon">Nomor KTP Pemohon <span id="npwp_required">(Tidak Wajib)</span></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-field">
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Upload File</span>
                      <input type="file" name="foto_ktp">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate text-white" type="text" placeholder="Foto KTP (Tidak Wajib)">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-field">
                  <input id="no_npwp" type="text" name="no_npwp" class="text-white" value="<?= $nomor_npwp ?>" data-length="10">
                  <label for="no_npwp">Nomor NPWP <span id="npwp_required">(Tidak Wajib)</span></label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-field">
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Upload File</span>
                      <input type="file" name="foto_npwp">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate text-white" type="text" placeholder="Foto NPWP (Tidak Wajib)">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="input-field">
                  <input id="nama_usaha" type="text" name="nama_usaha" <?php if ($menu == 'ubah') {
                                                                          echo 'readonly';
                                                                        } ?> class="text-white" value="<?= $nama_perusahaan ?>" data-length="10" required>
                  <label for="nama_usaha">Nama Usaha / Kelompok / Perorangan *</label>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <div class="form-line">
                    <div class="input-field">
                      <textarea id="alamat_usaha" required class="materialize-textarea form-control no-resize text-white" name="alamat_usaha" data-length="120"><?= $alamat_perusahaan ?></textarea>
                      <label for="alamat_usaha">Alamat Usaha / Kelompok / Perorangan *</label>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kota">Propinsi *</label>
                  <select class="form-control  text-white" name="propinsi" id="propinsi" required>
                    <?php foreach ($propinsi as $propinsi) : ?>
                      <option value="<?= $propinsi['kode_provinsi'] . ";" . $propinsi['nama_provinsi'] ?>" <?php if ($kode_kota == "" && $propinsi['kode_provinsi'] == "33") {
                                                                                          echo 'selected';
                                                                                        }elseif(substr($kode_kota,0,2) == $propinsi['kode_provinsi']){echo 'selected';} ?>><?= $propinsi['nama_provinsi'] ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kota">Kab/Kota *</label>
                  <select class="form-control  text-white" name="kota" id="kota" required>
                    <?php foreach ($kota as $kota) : ?>
                      <option value="<?= $kota['kode_kota'] . ";" . $kota['nama_kota'] ?>" <?php if ($kotanya == $kota['nama_kota']) {
                                                                                          echo 'selected';
                                                                                        } ?>><?= $kota['nama_kota'] ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
              </div>                                                              
              <div class="col-sm-3">
                <div class="input-field">
                  <input id="rt" type="number" name="rt" class="text-white" value="<?= $rt ?>" data-length="10" >
                  <label for="rt">RT *</label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="input-field">
                  <input id="rw" type="number" name="rw" class="text-white" value="<?= $rw ?>" data-length="10">
                  <label for="rw">RW *</label>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kecamatan">Kecamatan *</label>
                  <input type="hidden" value="<?= $kecamatannya ?>" id="id_kecamatan"/>
                  <select class='form-control text-white' name="kecamatan" id="kecamatan" required>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kelurahan">Kelurahan *</label>
                  <input type="hidden" value="<?= $kelurahannya ?>" id="id_kelurahan"/>
                  <select class="form-control text-white" name="kelurahan" id="kelurahan" required>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-field">
                  <input id="no_telp" type="text" name="no_telp" class="text-white" value="<?= $no_telp ?>" data-length="10">
                  <label for="no_telp">Nomor Telepon Kantor</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-field">
                  <input id="no_hp_pemohon" type="text" name="no_hp_pemohon" value="<?= $no_hp ?>" required class="text-white" data-length="10">
                  <label for="no_hp_pemohon">Nomor Whatsapp Aktif Telepon *</label>
                </div>
              </div>
            </div>
            <input type="text" value="" id="lanjut" name="lanjut" style="display:none" required />
            <input type="text" value="<?= $menu ?>" id="menu" name="menu" style="display:none" required />
            <div class="alert alert-warning" style="display:none" id="alert_identitas">Identitas usaha sudah didaftarkan sebelumnya</div>
            <div class="alert alert-warning" style="display:none" id="alert_required">Kolom dengan tanda (*) wajib diisi</div>

            <button class="btn btn-info waves-effect" data-toggle="modal" data-target="#myModal" id="simpan" type="button">Simpan</button>
            <button class="btn btn-info waves-effect" id="submits" style="display:none" type="submit">Simpan</button>

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
          <p>Data yang dimasukkan adalah data yang benar dan saya mengerti bahwa data <b>Nama Pemohon</b> dan <b>Nama Usaha</b> tidak dapat diubah kembali</p>
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
    console.log("kota = "+$("#id_kecamatan").val()+"|0");
  var id_kecamatan = $("#id_kecamatan").val() ?? 0;
  var id_kelurahan = $("#id_kelurahan").val() ?? 0;
  $(document).ready(function() {
    console.log("kota = "+$("#kota").val());
    getKota($("#kota").val());

    $('#propinsi').change(function(){
        var provinsi = $("#propinsi").val();
        if(provinsi != ""){
          $('#kota').empty();
          var test = provinsi.split(";");
          $.ajax({
              url: "<?php echo base_url() . "Dashboard/getKotaByProvinsi"?>",
              data: { "provinsi": test[0]},
              dataType:"html",
              type: "post",
              success: function(data){
                $('#kota').append(data);
              }
          });
        }
        
    });

    $("#btn_lanjut").click(function() {
      var id = $("#kota").val().split(";");
      $.ajax({
        url: "<?= base_url() ?>beranda/PelakuUsaha/cekIdentitasUsaha",
        data: {
          kota: id[1],
          alamat: $("#alamat_usaha").val(),
          nama_usaha: $("#nama_usaha").val()
        },
        type: "POST",
        success: function(result) {
          var menu = $("#menu").val();

          if($("#kecamatan").val() == "X;X" || $("#kelurahan").val() == "X;X"){
            $("#lanjut").val("");
            $("#alert_required").css("display", "block");
            return;
          }

          if ((result == 0 && menu == "tambah") || menu == "ubah") {
            $("#alert_required").css("display", "none");
            $("#alert_identitas").css("display", "none");
            $("#lanjut").val("ok");
            $("#submits").trigger("click");
          } else {
            $("#lanjut").val("");
            $("#alert_identitas").css("display", "block");
          }
        }
      });
    });
  })

  function getKota(value){
    var id = value.split(";");
    $.ajax({
      url: "<?= base_url() ?>dashboard/getDataKecamatan/"+id_kecamatan,
      data: {
        kode_kota: id[0]
      },
      type: "POST",
      success: function(result) {
        $("#kecamatan").html(result);
        getKecamatan($("#kecamatan").val());
        $.ajax({
          url: "<?= base_url() ?>dashboard/getInstansi",
          data: {
            kode_kota: id[0]
          },
          type: "POST",
          success: function(result) {
            var dat = result.split("<>");
            $("#nama_unit_kerja").val(dat[0]);
            $("#nama_pimpinan_unit_kerja").val(dat[1]);

          }
        });
      }
    });
  }
  function getKecamatan(value){
    var id = value.split(";");
    $.ajax({
      url: "<?= base_url() ?>dashboard/getDataKelurahan/"+id_kelurahan,
      data: {
        kode_kec: id[0]
      },
      type: "POST",
      success: function(result) {
        $("#kelurahan").html(result);
      }
    });
  }

  $('#jenis_usaha').on('change', function() {
    var jenis = this.value;
    if (jenis == "Perorangan") {
      $("#kop").css("display", "none");
      $("#kop_surat").val("");
      document.getElementById("no_npwp").required = false;
      $("#npwp_required").html("(Tidak wajib)");
    } else {
      if (jenis == 'Kelompok') {
        $("#npwp_required").html("(Tidak wajib)");
        document.getElementById("no_npwp").required = false;
      } else if (jenis == 'Perusahaan') {
        $("#npwp_required").html("*");
        document.getElementById("no_npwp").required = true;
      }
      document.getElementById("kop").style.display = "block";
    }
  });

  $('#kota').on('change', function() {
    getKota(this.value);
  });

  $('#kecamatan').on('change', function() {
    getKecamatan(this.value);
  });
</script>