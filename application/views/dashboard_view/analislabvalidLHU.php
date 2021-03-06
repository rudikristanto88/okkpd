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
              
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th rowspan="2">No.</th>
                      <th rowspan="2">Nama Pemohon</th> 
                      <th rowspan="2">Nama Usaha</th> 
                      <th rowspan="2">Kab/Kota</th>
                      <th colspan="3" style="text-align:center">Pengajuan Mutu</th>
                      
                      <th rowspan="2" width="150px">Aksi <br/>Valid</th>
                    </tr>
                    <tr>
                      <th>Kode Pendaftaran</th>
                      <th>Tanggal</th>
                      <th>Status SKM</th>
                    </tr>


                  </thead>
                  <tbody>

                    <?php $i=1; foreach ($sample as $ppc): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $ppc['nama_pemohon'] ?></td> 
                        <td><?= $ppc['nama_usaha'] ?></td>
                        <td><?= $ppc['kota'] ?></td>
                        <td><?= $ppc['kode_pendaftaran'] ?>
                        </td>
                        <td><?php $tgl =  strtotime($ppc['tanggal_buat']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?></td>
                       
                        <td>
                          <?php if($ppc['id_survey'] == "0" || $ppc['id_survey'] == null){
                            echo "<span class='label label-danger'>Belum</span>";
                          }else{
                            
                            echo "<span class='label label-success'>Sudah</span>";
                          }

                          ?>
                        </td>
                        <td>
                          <?php  // if($ppc['id_survey'] == null):?>
                            <!--<a href="<?= base_url() ?>dashboard/survey?id=<?= $ppc['uid']?>" class="btn btn-primary">Isi Survey</a>-->
                            <?php //else :?>
                               
                            <button onclick="openModal(<?= $ppc['uid'] ?>)" type="sumbit" name="button" class="btn btn-info col-md-12">Download Draft LHU</button>
                            <?php if($ppc['mime_type'] == ""){?>
                            <button onclick="modalUpload(<?= $ppc['uid'] ?>,'<?= $ppc['username'] ?>','<?= $ppc['nama_pemohon'] ?>','<?= $ppc['kode_pendaftaran'] ?>')" type="sumbit" name="button" class="btn btn-danger col-md-12">Upload LHU</button>
                            <?php }else if($ppc['mime_type'] != ""){?>
                            <button onclick="modalUpload(<?= $ppc['uid'] ?>,'<?= $ppc['username'] ?>','<?= $ppc['nama_pemohon'] ?>','<?= $ppc['kode_pendaftaran'] ?>')" type="sumbit" name="button" class="btn btn-success col-md-12">Upload LHU</button>
                              <a href="<?= base_url()?>dokumen/cetak_sertifikat/ujimutu/<?= $ppc['uid'] ?>" target="_blank"><button class="btn btn-success  col-md-12">Unduh Sertifikat</button></a>
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
          <input type="hidden" name="kodelhu" id="kodelhu">
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
     
    function modalUpload(id,email,nama,kode){
      $("#id_layananu").val(id);
      $("#uploademail").val(email);
      $("#uploadnama").val(nama);
      $("#uploadkode").val(kode);
      $('#modalUpload').modal();
    }
    function openModal(kode){
      $("#id_layanan").val(kode); 
      $('#modalUnggah').modal();
    }
   

  </script>
