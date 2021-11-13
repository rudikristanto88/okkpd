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
              <li class="breadcrumb-item active">Penugasan Inspektor</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div >
            <div class="body">
              <h4 class="card-inside-title">Daftar Penugasan Inspektor</h4>
              <hr>
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
                      <th colspan="2">Inspektor</th>
                      <th colspan="2">Pelaksana</th>
                      <th rowspan="2">Tanggal Inspeksi</th>
                      <th rowspan="2">Waktu Inspeksi</th>
                      <th rowspan="2" width="150px">Aksi <br/>Lanjut / Tunda</th>
                    </tr>
                    <tr>
                      <th>Ijin</th>
                      <th>Hasil</th>
                      <th>Ijin</th>
                      <th>Hasil</th>
                    </tr>


                  </thead>
                  <tbody>

                    <?php $i=1; foreach ($inspeksi as $inspeksi): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $inspeksi['nama_usaha'] ?></td>
                        <td><?= $inspeksi['nama_layanan'] ?></td>
                        <td><?= $inspeksi['kota'] ?></td>
                        <td id="inspektor<?= $inspeksi['uid'] ?>">
                          <?php

                          if($inspeksi['ijin_inspektor'] == 1) {?>
                            <button class='btn btn-success btn-block fas fa-check'></button>
                          <?php }else{?>
                            <button class="btn btn-default"  onClick="ijinInspektor(<?= $inspeksi['uid'] ?>)">Ijin</button>
                          <?php } ?>
                        </td>
                        <td><a href="<?= base_url().'dokumen/lihat_hasil/inspeksi/'.$inspeksi['uid'] ?>" <?php if($inspeksi['hasil_inspeksi'] == 1){echo 'class="btn btn-info"';}else{echo 'class="btn btn-danger"';} ?>><i class="fas fa-eye"></a></td>
                        <td id="pelaksana<?= $inspeksi['uid'] ?>">
                          <?php if($inspeksi['ijin_pelaksana'] == 1) {?>
                            <button class='btn btn-success btn-block fas fa-check'></button>
                          <?php }else{?>
                            <button class="btn btn-default"  onClick="ijinPelaksana(<?= $inspeksi['uid'] ?>)">Ijin</button>
                          <?php } ?>
                        </td>
                        <td><a href="<?= base_url().'dokumen/lihat_hasil/pelaksana/'.$inspeksi['uid'] ?>" <?php if($inspeksi['hasil_pelaksana'] == 1){echo 'class="btn btn-info"';}else{echo 'class="btn btn-danger"';} ?>><i class="fas fa-eye"></a></td>
                        <td><?php
                        $tgl =  strtotime($inspeksi['tanggal_inspeksi']);
                          echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl);
                        ?></td>
                        <td><?php
                          echo date("H",$tgl).":".(date("i",$tgl));
                        ?></td>
                          <td id="action<?= $inspeksi['uid'] ?>"><?php
                          if($inspeksi['status_ppc'] == "0"){
                          if($inspeksi['ijin_inspektor'] == 1 && $inspeksi['ijin_pelaksana'] == 1 && $inspeksi['hasil_inspeksi'] == 1 && $inspeksi['hasil_pelaksana'] == 1 && $inspeksi['surat_tugas']!=null){ ?>
                            <form class="inline" action="<?= base_url() ?>dashboard/update_status_ppc" method="post">
                            <input type="hidden" name="id_layanan" value="<?= $inspeksi['uid'] ?>">
                            <button type="sumbit" name="button" class="btn btn-info">Lanjut</button>
                          </form> <?php } ?>
                          <button class="btn btn-warning inline"><a href="" >Tunda</a></button>
                        <?php } ?>
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







    <script type="text/javascript">
    function sendData(id_layanan){
      $("#id_layanan").val(id_layanan);
    }
    function sendDataUpload(id_layanan){
      $("#id_layanan_surat").val(id_layanan);
    }
    function ijinInspektor(id_layanan){
      $.ajax({
        url: "<?= base_url()?>dashboard/ijin",
        data:{role: "inspektor", id_layanan: id_layanan},
        type: "POST",
        success: function(result){
          if(result == "1"){
            $("#inspektor"+id_layanan).html("<button class='btn btn-success btn-block fas fa-check'></button>");
          }else if(result == "0"){
            console.log("gagal");
          }else{
            $("#inspektor"+id_layanan).html("<button class='btn btn-success btn-block fas fa-check'></button>");
            if(result != 1){
              $("#action"+id_layanan).html(result);
            }
          }
        }
      });
    }
    function ijinPelaksana(id_layanan){
      $.ajax({
        url: "<?= base_url()?>dashboard/ijin",
        data:{role: "pelaksana", id_layanan: id_layanan},
        type: "POST",
        success: function(result){
          if(result == "1"){
            $("#pelaksana"+id_layanan).html("<button class='btn btn-success btn-block fas fa-check'></button>");
          }else if(result == "0"){
            console.log("gagal");
          }else{
            $("#pelaksana"+id_layanan).html("<button class='btn btn-success btn-block fas fa-check'></button>");
            if(result != 1){
              $("#action"+id_layanan).html(result);
            }
          }
        }
      });
    }



  </script>
