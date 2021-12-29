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
              <a href="index.html">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              <li class="breadcrumb-item active">Daftar Usaha</li>
              <li class="breadcrumb-item active">Hygiene Sanitation</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">Hygiene Sanitation</h2>
              <form class="" action="<?= base_url("dashboard/insert/hs") ?>" class="text-white" method="post">
              <h2 class="card-inside-title">Identitas Usaha</h2>

                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div class="input-field">
                      <input type="hidden" name="kode_layanan" value="hs" readonly>
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
                  <!-- <div class="col-sm-12">
                    <div style="margin-bottom:10px;">
                      <h2 class="card-inside-title" style="display:inline">Daftar Identitas Komoditas Ekspor</h2>
                      <button class="btn btn-primary fas fa-plus" type="button" data-toggle="modal" data-target="#modalTambah"></button>
                    </div>
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode Consignment</th>
                          <th>Nama Komoditas</th>
                          <th>No. Sertifikat Hygiene Sanitation</th>
                          <th>Jumlah Tonase (Ton)</th>
                          <th>Negara Tujuan</th>
                          <th>Jenis Transportasi</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">

                      </tbody>

                    </table>

                  </div> -->

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
        <h4 class="modal-title">Tambah Identitas Produk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="consigment">Kode Consignment</label>
              <input class="text-black" type="text" id="consigment" placeholder="Consigment">
            </div>
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <label class="text-small">Komoditas</label>
              <select class="form-control text-black" id="komoditas">
                <?php foreach ($komoditas as $komoditas): ?>
                  <option value="<?= $komoditas['kode_komoditas'].';'.$komoditas['deskripsi'] ?>" ><?= $komoditas['deskripsi'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="tonase">Jumlah Tonase (Ton)</label>
              <input class="text-black" type="number" id="tonase" placeholder="m2">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="sertifikat">No. Sertifikat Hygiene Sanitation</label>
              <input class="text-black" type="text" id="sertifikat" placeholder="m2">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="negara">Negara Tujuan</label>
              <input class="text-black" type="text" id="negara" placeholder="m2">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="transportasi">Jenis Transportasi</label>
              <input class="text-black" type="text" id="transportasi" placeholder="m2">
            </div>
          </div>


        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-info" data-dismiss="modal" onClick="tambahProduk()">Tambah</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
var urutan = 1;
  function tambahProduk(){
    var body = '<tr><td>'+urutan+'.</td>';

    var consigment = document.getElementById("consigment").value;
    var komoditas = document.getElementById("komoditas").value;
    var tonase = document.getElementById("tonase").value;
    var sertifikat = document.getElementById("sertifikat").value;
    var negara = document.getElementById("negara").value;
    var transportasi = document.getElementById("transportasi").value;

    var splitData = komoditas.split(";");


    body += '<td><input readonly class="text-white" type="text" name="kode_consigment[]" value="'+consigment+'"/></td>';
    body += '<td><input type="hidden" name="kode_komoditas[]"  value="'+splitData[0]+'"/><input readonly class="text-white" type="text" name="nama_komoditas[]" value="'+splitData[1]+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="no_sertifikat[]" value="'+sertifikat+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="jumlah_tonase[]" value="'+tonase+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="negara_tujuan[]" value="'+negara+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="jenis_transportasi[]" value="'+transportasi+'"/></td>';
//
    body += '</tr>';
    document.getElementById("tbody").innerHTML += body;
    document.getElementById("consigment").value = "";
    document.getElementById("tonase").value = "";
    document.getElementById("sertifikat").value = "";
    document.getElementById("negara").value = "";
    document.getElementById("transportasi").value = "";

    urutan++;
  }
</script>
