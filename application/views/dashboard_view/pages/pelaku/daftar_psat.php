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
              <li class="breadcrumb-item active">PSAT</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">PSAT</h2>
              <form class="" action="<?= base_url("dashboard/insert/psat") ?>" class="text-white" method="post">
              <h2 class="card-inside-title">Identitas Usaha</h2>

                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div class="input-field">
                      <input type="hidden" name="kode_layanan" value="psat" readonly>
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
                      <h2 class="card-inside-title" style="display:inline">Daftar Identitas Produk PSAT</h2> <button class="btn btn-primary fas fa-plus" type="button" data-toggle="modal" data-target="#modalTambah"></button>
                    </div>
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Produk</th>
                          <th>Nama Dagang</th>
                          <th>Kemasan</th>
                          <th>Netto</th>
                          <th>Satuan</th>
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
        <h4 class="modal-title">Tambah Identitas Produk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input class="text-black" type="text" id="nama_produk" placeholder="m2">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_dagang">Nama Dagang</label>
              <input class="text-black" type="text" id="nama_dagang" placeholder="m2">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label class="text-small">Jenis Kemasan</label>
              <select class="form-control text-black" id="kemasan">
                <?php foreach ($kemasan as $kemasan): ?>
                  <option value="<?= $kemasan['id_kemasan'].';'.$kemasan['nama_kemasan'] ?>" ><?= $kemasan['nama_kemasan'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="netto">Netto</label>
              <input class="text-black" type="number" id="netto" placeholder="m2" min="0" step=".01">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label class="text-small">Satuan Kemasan</label>
              <select class="form-control text-black" id="satuan">
                <?php foreach ($satuan as $satuan): ?>
                  <option value="<?= $satuan['id_satuan'].';'.$satuan['nama_satuan'] ?>" ><?= $satuan['nama_satuan'] ?></option>
                <?php endforeach; ?>
              </select>
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
    var body = '<tr id="'+urutan+'"><td>'+urutan+'.</td>';
    var kemasan = document.getElementById("kemasan").value;
    var satuan = document.getElementById("satuan").value;
    var nama_produk = document.getElementById("nama_produk").value;
    var nama_dagang = document.getElementById("nama_dagang").value;
    console.log(nama_produk);

    var netto = document.getElementById("netto").value;
    var splitDataK = kemasan.split(";");
    var splitDataS = satuan.split(";");


    body += '<td><input readonly class="text-white" type="text" name="nama_produk[]" value="'+nama_produk+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="nama_dagang[]" value="'+nama_dagang+'"/></td>';
    body += '<td><input type="hidden" name="id_kemasan[]"  value="'+splitDataK[0]+'"/><input readonly class="text-white" type="text" name="nama_kemasan[]" value="'+splitDataK[1]+'"/></td>';
    body += '<td><input readonly class="text-white" type="text" name="netto[]" value="'+netto+'"/></td>';
    body += '<td><input type="hidden" name="id_satuan[]"  value="'+splitDataS[0]+'"/><input readonly class="text-white" type="text" name="nama_satuan[]" value="'+splitDataS[1]+'"/></td>';
    body +='<td><button type="button" onclick="removeElement('+urutan+')" class="btn btn-warning"><i class="fas fa-minus"></i></button></td>';
//
    body += '</tr>';
    document.getElementById("tbody").innerHTML += body;
    document.getElementById("nama_produk").value = "";
    document.getElementById("nama_dagang").value = "";
    document.getElementById("netto").value = "";
    urutan++;
  }
  function removeElement(elementId) {
    $("#"+elementId).remove();
  }
</script>
