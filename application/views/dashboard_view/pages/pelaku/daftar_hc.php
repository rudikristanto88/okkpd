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
                Home</a>
              </li>
              <li class="breadcrumb-item active">Daftar Usaha</li>
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
              <h2 class="card-inside-title">Health Certificate</h2>
              <form class="" action="<?= base_url("dashboard/insert/hc") ?>" class="text-white" method="post">
              <h2 class="card-inside-title">Identitas Usaha</h2>

                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div class="input-field">
                      <input type="hidden" name="kode_layanan" value="hc" readonly>
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
                      <label for="nomor_hp_pemohon">Nomor HP Pemohon</label>
                    </div>
                  </div>
                  <br/>
                  <br/>
                  <div class="col-sm-12">
                    <div style="margin-bottom:10px;">
                      <h2 class="card-inside-title" style="display:inline">Daftar Identitas HC</h2> <button class="btn btn-primary fas fa-plus" type="button" data-toggle="modal" data-target="#modalTambah"></button>
                    </div>
                    <div class="table-responsive">
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th></th>
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
                      </tbody>

                    </table>
                  </div>

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
        <h4 class="modal-title">Tambah Identitas Produk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input class="text-black" type="text" id="nama_produk" placeholder="Consigment">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="jenis_produk">Jenis Produk</label>
              <input class="text-black" type="text" id="jenis_produk" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nomor_hs">Nomor HS</label>
              <input class="text-black" type="text" id="nomor_hs" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama_eksportir">Nama Eksportir</label>
              <input class="text-black" type="text" id="nama_eksportir" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
                  <label for="alamat_perusahaan">Alamat Kantor</label>
                  <textarea id="alamat_kantor" class="materialize-textarea form-control no-resize text-black" style="color:black" data-length="120" ></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
                  <label for="alamat_gudang">Alamat Gudang</label>
                  <textarea id="alamat_gudang" class="materialize-textarea form-control no-resize text-black" style="color:black" data-length="120" ></textarea>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="consigment_code">Consigment Code</label>
              <input class="text-black" type="text" id="consigment_code" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="jumlah_lot">Jumlah Lot</label>
              <input class="text-black" type="number" id="jumlah_lot" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="berat_lot">Berat Masing-masing lot</label>
              <input class="text-black" type="text" id="berat_lot" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="jumlah_kemasan">Jumlah Kemasan</label>
              <input class="text-black" type="number" id="jumlah_kemasan" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="jenis_kemasan">Jenis Kemasan</label>
              <input class="text-black" type="text" id="jenis_kemasan" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="berat_kotor">Berat Kotor</label>
              <input class="text-black" type="text" id="berat_kotor" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="berat_bersih">Berat Bersih</label>
              <input class="text-black" type="text" id="berat_bersih" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="pelabuhan_berangkat">Tempat/Pelabuhan Pemberangkatan</label>
              <input class="text-black" type="text" id="pelabuhan_berangkat" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="identitas_transportasi">Identitas Transportasi</label>
              <input class="text-black" type="text" id="identitas_transportasi" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="pelabuhan_tujuan">Pelabuhan Tujuan</label>
              <input class="text-black" type="text" id="pelabuhan_tujuan" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="negara_tujuan">Negara Tujuan</label>
              <input class="text-black" type="text" id="negara_tujuan" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="negara_transit">Negara Transit</label>
              <input class="text-black" type="text" id="negara_transit" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="pelabuhan_transit">Pelabuhan Transit</label>
              <input class="text-black" type="text" id="pelabuhan_transit" placeholder="Jenis Produk">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="transportasi_transit">Identitas Transportasi</label>
              <input class="text-black" type="text" id="transportasi_transit" placeholder="Jenis Produk">
            </div>
          </div>

        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" data-dismiss="modal" onClick="tambahProduk()">Tambah</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
var urutan = 1;
  function tambahProduk(){
    var body = '<tr id="'+urutan+'">';
    body +='<td><button type="button" onclick="removeElement('+urutan+')" class="btn btn-warning"><i class="fas fa-minus"></i></button></td>';
    body+= '<td>'+urutan+'.</td>';

    var nama_produk =  document.getElementById("nama_produk").value;
    var jenis_produk =  document.getElementById("jenis_produk").value;
    var nomor_hs =  document.getElementById("nomor_hs").value;
    var nama_eksportir =  document.getElementById("nama_eksportir").value;
    var alamat_kantor =  document.getElementById("alamat_kantor").value;
    var alamat_gudang =  document.getElementById("alamat_gudang").value;
    var consigment_code =  document.getElementById("consigment_code").value;
    var jumlah_lot =  document.getElementById("jumlah_lot").value;
    var berat_lot =  document.getElementById("berat_lot").value;
    var jumlah_kemasan =  document.getElementById("jumlah_kemasan").value;
    var jenis_kemasan =  document.getElementById("jenis_kemasan").value;
    var berat_kotor =  document.getElementById("berat_kotor").value;
    var berat_bersih =  document.getElementById("berat_bersih").value;
    var pelabuhan_berangkat =  document.getElementById("pelabuhan_berangkat").value;
    var identitas_transportasi =  document.getElementById("identitas_transportasi").value;
    var pelabuhan_tujuan =  document.getElementById("pelabuhan_tujuan").value;
    var negara_tujuan =  document.getElementById("negara_tujuan").value;
    var negara_transit =  document.getElementById("negara_transit").value;
    var pelabuhan_transit =  document.getElementById("pelabuhan_transit").value;
    var transportasi_transit =  document.getElementById("transportasi_transit").value;



    body += '<td><input readonly class="text-white" type="text" name="nama_produk[]" value="'+nama_produk+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="jenis_produk[]"  value="'+jenis_produk+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="nomor_hs[]" value="'+nomor_hs+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="nama_eksportir[]" value="'+nama_eksportir+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="alamat_kantor[]" value="'+alamat_kantor+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="alamat_gudang[]" value="'+alamat_gudang+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="consigment_code[]" value="'+consigment_code+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="jumlah_lot[]" value="'+jumlah_lot+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="berat_lot[]" value="'+berat_lot+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="jumlah_kemasan[]" value="'+jumlah_kemasan+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="jenis_kemasan[]" value="'+jenis_kemasan+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="berat_kotor[]" value="'+berat_kotor+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="berat_bersih[]" value="'+berat_bersih+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="pelabuhan_berangkat[]" value="'+pelabuhan_berangkat+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="identitas_transportasi[]" value="'+identitas_transportasi+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="pelabuhan_tujuan[]" value="'+pelabuhan_tujuan+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="negara_tujuan[]" value="'+negara_tujuan+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="negara_transit[]" value="'+negara_transit+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="pelabuhan_transit[]" value="'+pelabuhan_transit+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="transportasi_transit[]" value="'+transportasi_transit+'"/></td>';
//
    body += '</tr>';
    document.getElementById("tbody").innerHTML += body;
    document.getElementById("nama_produk").value ="";
    document.getElementById("jenis_produk").value ="";
    document.getElementById("nomor_hs").value ="";
    document.getElementById("nama_eksportir").value ="";
    document.getElementById("alamat_kantor").value ="";
    document.getElementById("alamat_gudang").value ="";
    document.getElementById("consigment_code").value ="";
    document.getElementById("jumlah_lot").value ="";
    document.getElementById("berat_lot").value ="";
    document.getElementById("jumlah_kemasan").value ="";
    document.getElementById("jenis_kemasan").value ="";
    document.getElementById("berat_kotor").value ="";
    document.getElementById("berat_bersih").value ="";
    document.getElementById("pelabuhan_berangkat").value ="";
    document.getElementById("identitas_transportasi").value ="";
    document.getElementById("pelabuhan_tujuan").value ="";
    document.getElementById("negara_tujuan").value ="";
    document.getElementById("negara_transit").value ="";
    document.getElementById("pelabuhan_transit").value ="";
    document.getElementById("transportasi_transit").value ="";

    urutan++;
  }
  function removeElement(elementId) {
    $("#"+elementId).remove();
  }
</script>
