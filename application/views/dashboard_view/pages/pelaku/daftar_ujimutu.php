 
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
              <li class="breadcrumb-item active">Daftar </li>
              <li class="breadcrumb-item active">Uji Mutu</li>
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
              <form id="kirimujimutu" class="" action="<?= base_url("dashboard/insert/ujimutu") ?>" class="text-white" method="post">
              <h2 class="card-inside-title">Identitas Usaha</h2>

                <div class="row clearfix">

                  <div class="col-sm-12">
                    <div class="input-field">
                      <input type="hidden" name="kode_layanan" value="ujimutu" readonly>
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
                      <h2 class="card-inside-title" style="display:inline">Daftar Identitas Produk PSAT</h2> <button class="btn btn-primary fas fa-plus" type="button" data-toggle="modal" data-target="#modalTambah"></button>
                    </div>
                    <table class="table" id="tabel">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Jenis Komoditas</th>
                          <th>Nama Dagang</th>
                          <th>Kemasan</th> 
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                      </tbody>

                    </table>

                  </div>

                </div>  
                <textarea name="tandatangan" id="tandatangan" hidden="hidden"></textarea>   
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSignature">AJUKAN PERMOHONAN</button>
                <!--<button data-toggle="modal" data-target="#modalSignature" class="btn btn-info waves-effect" name="button"></button>
-->
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
        <h4 class="modal-title">Tambah Uji Mutu Produk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama_produk">Jenis Produk</label>
              <select required class="form-control text-black" id="jenis">
                <option value=""></option>
                <?php foreach ($jenis as $row): ?>
                  
                  <option value="<?= $row['idjenis'].';'.$row['namajenis'] ?>" ><?= $row['namajenis'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama_produk">Detail Produk</label>
              <div id="detail">
                
                </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_dagang">Nama Dagang</label>
              <input class="text-black" type="text" id="nama_dagang" placeholder="m2">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label class="text-small">Jenis Kemasan</label>
              <select class="form-control text-black" id="kemasan">
                <?php foreach ($kemasan as $kemasan): ?>
                  <option value="<?= $kemasan['id_kemasan'].';'.$kemasan['nama_kemasan'] ?>" ><?= $kemasan['nama_kemasan'] ?></option>
                <?php endforeach; ?>
                
              </select>
            </div>
          </div>
          
          <div class="col-sm-6" id="kemasanlain">
            <div class="form-group">
              <label for="nama_produk">Kemasan Lain</label>
              <input class="text-black" type="text" id="txtkemasanlain" placeholder="m2">
            </div>
          </div>
          
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_dagang">&nbsp;</label>

                                 
              
            </div>
            <label class="text-black"  for="nama_dagang">
            Sanggup Mengirimkan Sampel dalam kurun waktu maksimal 7 (tujuh) hari : </label> 
            <label class="text-black"  for="nama_dagang">1.	Uji Laboratorium Beras seberat 2 Kg </label>
            <label class="text-black"  for="nama_dagang">2.	Uji Laboratorium Komoditas Lainnya seberat 1 Kg</label>
              <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" id="cekBersedia" type="checkbox" value="1"> Bersedia
                                            
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
          </div>

        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-info" data-dismiss="modal" id="tblAjukan" onClick="tambahProduk()">Ajukan</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="modalSignature">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Persetujuan Tanda Tangan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_produk">Tanda Tangan Anda</label>
              
<div id="sig"></div>
            </div>
          </div>
           
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-info" data-dismiss="modal"  id="tambahTandaTangan">Ajukan</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
var urutan = 1;

  function tambahProduk(){
    var body = '<tr id="'+urutan+'"><td>'+urutan+'.</td>';
    var jenis = document.getElementById("jenis").value;
    var detail = $('.jenisdetail:checked').val();
    // var detail = document.getElementById("jenisdetail").value;
    var kemasan = document.getElementById("kemasan").value;
    var nama_dagang = document.getElementById("nama_dagang").value; 
    var kemasanlain = document.getElementById("txtkemasanlain").value; 
 
    var splitDataJ = jenis.split(";");
    var splitDataJ1 = detail.split(";");
    var splitDataK = kemasan.split(";"); 
    var boleh = 1;
    var pesan = "";
    if(kemasan == ""){
      pesan += "Kemasan harus diisi. \n";
      boleh = 0;
    }
    if(splitDataJ1[0] == ""){
      pesan += "Detail harus diisi. \n";
      boleh = 0;
    }

    if(boleh == 1){
      body += '<td><input readonly class="text-white" type="text" name="nama_produk[]" value="'+splitDataJ[1]+' - '+splitDataJ1[1]+'"/></td>';
      body += '<td><input readonly class="text-white" type="text" name="nama_dagang[]" value="'+nama_dagang+'"/></td>';
      body += '<td><input type="hidden" name="id_kemasan[]"  value="'+splitDataK[0]+'"/><input readonly class="text-white" type="text" name="nama_kemasan[]" value="'+splitDataK[1]+' '+ kemasanlain+'"/></td>';
      body += '<td><input type="hidden" name="id_jenis[]"  value="'+splitDataJ[0]+'"/>';
      body += '<td><input type="hidden" name="id_detail[]"  value="'+splitDataJ1[0]+'"/>';
      body += '<td><input type="hidden" name="kemasanlain[]"  value="'+kemasanlain+'"/>';
      
      body +='<td><button type="button" onclick="removeElement('+urutan+')" class="btn btn-warning"><i class="fas fa-minus"></i></button></td>';
  //
      body += '</tr>';
      document.getElementById("tbody").innerHTML += body; 
      document.getElementById("nama_dagang").value = ""; 
      document.getElementById("txtkemasanlain").value = ""; 
    }else{
      alert(pesan);
    }
    
    $("#kemasanlain").hide();
    $("#tblAjukan").hide();
    $('#cekBersedia').prop('checked', false);
    urutan++;
  }
  function removeElement(elementId) {
    $("#"+elementId).remove();
  }
  
$(document).ready(function(){
	var sig = $('#sig').signature({syncField: '#tandatangan'});
  
  sig.signature('clear');
  $("#tandatangan").val("");
  $('#tambahTandaTangan').on('click', function() { 
      $("#tandatangan").val(sig.signature('toDataURL'));
      
      $("#kirimujimutu").submit();
  });
  $("#kemasanlain").hide();
  $("#tblAjukan").hide();
  $("#cekBersedia").change(function() {
    if(this.checked) {
        //Do stuff
  $("#tblAjukan").show();
    }else{
      
  $("#tblAjukan").hide();
    }
});
  $('#jenis').on('change', function() {
    var id = this.value;
    $.ajax({
      url: "<?= base_url()?>dashboard/getDataJenisDetail",
      data:{kode: id},
      type: "POST",
      success: function(result){
        $("#detail").html(result);
      }
    });
  });

  $('#kemasan').on('change', function() {
    var id = this.value.split(";"); 
    if(id[1] == "Lain-lain"){
      
      $("#kemasanlain").show();
    }else{
      
  $("#kemasanlain").hide();
    }
  });
   
});
</script>
