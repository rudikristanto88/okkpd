<?php
  $lanjut = false;
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div >
            <div class="body">
              <h4 class="card-inside-title">Daftar LHU</h4>
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th rowspan="2">No.</th>
                      <th rowspan="2">Nama Pemohon</th> 
                      <th rowspan="2">Kab/Kota</th>
                      <th colspan="2" style="text-align:center">Pengajuan Mutu</th>
                      
                      <th rowspan="2" width="150px">Aksi <br/>Valid</th>
                    </tr>
                    <tr>
                      <th>Kode Pendaftaran</th>
                      <th>Tanggal</th>
                    </tr>


                  </thead>
                  <tbody>

                    <?php $i=1; foreach ($sample as $ppc): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $ppc['nama_pemohon'] ?></td> 
                        <td><?= $ppc['kota'] ?></td>
                        <td><?= $ppc['kode_pendaftaran'] ?>
                        </td>
                        <td><?php $tgl =  strtotime($ppc['tanggal_buat']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?></td>
                       
                        <td>
                          <?php// if($ppc['id_survey'] == null):?>
                            <!--<a href="<?= base_url() ?>dashboard/survey?id=<?= $ppc['uid']?>" class="btn btn-primary">Isi Survey</a>-->
                            <?php //else :?>
                               
                            <button onclick="openModal(<?= $ppc['uid'] ?>)" type="sumbit" name="button" class="btn btn-info">Download Draft LHU</button>&nbsp;
                            <button onclick="modalUpload(<?= $ppc['uid'] ?>,'<?= $ppc['username'] ?>','<?= $ppc['nama_usaha'] ?>','<?= $ppc['kode_pendaftaran'] ?>')" type="sumbit" name="button" class="btn btn-danger">Upload LHU</button>
                            <?php if($ppc['mime_type'] != ""){?>
                              <a href="<?= base_url()?>dokumen/cetak_sertifikat/ujimutu/<?= $ppc['uid'] ?>" target="_blank"><button class="btn btn-success">Unduh Sertifikat</button></a>
                            <?php }?>
                              <?php //endif; ?>
                        
                    </td>
                        </tr>
                        <?php $i++; endforeach; ?>

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
      <form enctype="multipart/form-data" class="inline" action="<?= base_url() ?>dashboard/uploadLHU" method="post">
        <div class="modal-header">
        <h4 class="modal-title">Unggah Sertifikat</h4>
          <input type="hidden" name="id_layananu" id="id_layananu">
          <input type="hidden" name="uploademail" id="uploademail">
          <input type="hidden" name="uploadnama" id="uploadnama">
          <input type="hidden" name="uploadkode" id="uploadkode">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              
          <div class="col-sm-12">
            <div class="form-group">
                <label for="nama_dagang">Upload File</label> 
                <input type="file" name="gambar" required>
              </div>
            </div>
            </div>

          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer"> 
          <button type="submit" class="btn btn-warning" name="Tolak" value="1">Simpan</button>  
        </div>
      </form>

      </div>
    </div>
  </div>

  <div class="modal" id="modalUnggah">
    <div class="modal-dialog">
      <div class="modal-content">
      <form target="_blank" class="inline" action="<?= base_url() ?>dashboard/cetakLHU" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Update tanggal download </h4>
          <input type="hidden" name="id_layanan" id="id_layanan">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              
          <div class="col-sm-12">
            <div class="form-group">
                <label for="nama_dagang">Tanggal Cetak</label>
                <input class="text-black" type="date" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy" value=""
        min="1997-01-01" max="2030-12-31">
              </div>
            </div>
            </div>

          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer"> 
          <button type="submit" class="btn btn-warning" name="Tolak" value="1">Cetak</button>  
        </div>
      </form>

      </div>
    </div>
  </div>




    <script type="text/javascript">
    function setDataSampling(id_sampling,deskripsi){
      $("#id_sampling").val(id_sampling);
      $("#deskripsi").html(deskripsi);

    }
    function sendData(id_layanan){
      $("#id_layanan").val(id_layanan);
    }
    function sendDataUpload(id_layanan){
      $("#id_layanan_surat").val(id_layanan);
    }
    
    function modalUpload(kode,email,nama,kode){
      $("#id_layananu").val(kode);
      $("#uploademail").val(email);
      $("#uploadnama").val(nama);
      $("#uploadkode").val(kode);
      $('#modalUpload').modal();
    }
    function openModal(kode){
      $("#id_layanan").val(kode);
      $('#modalUnggah').modal();
    }
    function ijinPPC(id_layanan){
      $.ajax({
        url: "<?= base_url()?>dashboard/ijin",
        data:{role: "ppc", id_layanan: id_layanan},
        type: "POST",
        success: function(result){
          if(result == "1"){
            $("#ppc"+id_layanan).html("<button class='btn btn-success btn-block fas fa-check'></button>");
          }else if(result == "0"){
            console.log("gagal");
          }else{
            $("#ppc"+id_layanan).html("<button class='btn btn-success btn-block fas fa-check'></button>");
            $("#action"+id_layanan).html(result);
          }
        }
      });
    }

  </script>
