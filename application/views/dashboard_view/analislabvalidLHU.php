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
              <h4 class="card-inside-title">Daftar Valid Sample Uji Mutu</h4>
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th rowspan="2">No.</th>
                      <th rowspan="2">Nama Usaha</th> 
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
                        <td><?= $ppc['nama_usaha'] ?></td> 
                        <td><?= $ppc['kota'] ?></td>
                        <td><?= $ppc['kode_pendaftaran'] ?>
                        </td>
                        <td><?php $tgl =  strtotime($ppc['tanggal_buat']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?></td>
                       
                        <td>
                          <?php// if($ppc['id_survey'] == null):?>
                            <!--<a href="<?= base_url() ?>dashboard/survey?id=<?= $ppc['uid']?>" class="btn btn-primary">Isi Survey</a>-->
                            <?php //else :?>
                              <form target="_blank" class="inline" action="<?= base_url() ?>dashboard/cetakLHU" method="post">
                            <input type="hidden" name="id_layanan" value="<?= $ppc['uid'] ?>">
                            <button type="sumbit" name="button" class="btn btn-info">Cetak</button>
                          </form>
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


  <div class="modal" id="modalUnggah">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/ubah_status_sampling/" method="post"  enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Lihat Sampling Plan </h4>
          <input type="hidden" name="id_sampling" id="id_sampling">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div id='deskripsi'>

              </div>

            </div>

          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-warning" name="Tolak" value="1">Tolak</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="Simpan" value="2">Setuju</button>
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
