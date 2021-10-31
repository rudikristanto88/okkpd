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
                Home</a>
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
              <h4 class="card-inside-title">Daftar Penugasan PPC</h4>
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th rowspan="2">No.</th>
                      <th rowspan="2">Nama Perusahaan / Kelompok</th>
                      <th rowspan="2">Layanan yang Diajukan</th>
                      <th rowspan="2">Kab/Kota</th>
                      <th colspan="2" style="text-align:center">PPC</th>
                      <th rowspan="2">Tanggal PC</th>
                      <th rowspan="2">Sampling Plan</th>
                      <th rowspan="2">Waktu PC</th>
                      <th rowspan="2" width="150px">Aksi <br/>Lanjut / Tunda</th>
                    </tr>
                    <tr>
                      <th>Ijin</th>
                      <th>Hasil</th>
                    </tr>


                  </thead>
                  <tbody>

                    <?php $i=1; foreach ($ppc as $ppc): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $ppc['nama_usaha'] ?></td>
                        <td><?= $ppc['nama_layanan'] ?></td>
                        <td><?= $ppc['kota'] ?></td>
                        <td id="ppc<?= $ppc['uid'] ?>">
                          <?php

                          if($ppc['ijin_ppc'] == 1) {?>
                            <button class='btn btn-success btn-block fas fa-check'></button>
                          <?php }else{?>
                            <button class="btn btn-default"  onClick="ijinPPC(<?= $ppc['uid'] ?>)">Ijin</button>
                          <?php } ?>
                        </td>
                        <td><a href="<?= base_url().'dokumen/lihat_hasil/ppc/'.$ppc['uid'] ?>" <?php if($ppc['hasil_ppc'] == 1){echo 'class="btn btn-info"';}else{echo 'class="btn btn-warning"';} ?>><i class="fas fa-eye"></i></a></td>
                        <td><?php $tgl =  strtotime($ppc['tanggal_pc']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?></td>
                        <td>

                          <?php if ($ppc['id_sampling'] != '' && $ppc['status_sampling'] != 2): ?>
                            <button type="button" class="btn btn-info" data-toggle='modal' data-target='#modalUnggah' onclick="setDataSampling('<?= $ppc['id_sampling'] ?>','<?= $ppc['deskripsi'] ?>')"><i class="fas fa-eye"></button></td>
                          <?php elseif($ppc['status_sampling'] == '' || $ppc['status_sampling'] == null): echo ""; ?>
                          <?php else: echo "Setuju"; endif;?>


                        <td><?php
                          echo date("H",$tgl).":".(date("i",$tgl));
                        ?></td>
                          <td id="action<?= $ppc['uid'] ?>" align="center"><?php
                          if($ppc['status_komtek'] == 0){

                          if($ppc['ijin_ppc'] == 1 && $ppc['hasil_ppc'] == 1 && $ppc['surat_tugas']!=null){ ?>
                            <form class="inline" action="<?= base_url() ?>dashboard/update_status_komtek" method="post">
                            <input type="hidden" name="id_layanan" value="<?= $ppc['uid'] ?>">
                            <button type="sumbit" name="button" class="btn btn-info">Lanjut</button>
                          </form> <?php } ?>
                          <button class="btn btn-warning inline"><a href="" >Tunda</a></button>
                        <?php } ?></td>
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
