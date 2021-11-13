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
              <li class="breadcrumb-item active">Hasil Inspeksi</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div >
            <div class="body">
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>

              <?php if(sizeof($dokumen) == 0):
                echo "Belum ada data hasil inspeksi";
              else: ?>
              <h4 class="card-inside-title">Daftar Hasil Inspeksi
              <?php
                if($role_saya == 'm_teknis' && $status != 2){
                  echo '<a href="'.base_url().'dashboard/ulang_inspektor/'.$uid.'" class="btn btn-warning"><button class="text-white">Ulang</button></a>';
                }
              ?>
              </h4>
              <br/>

              <?php
              if(sizeof($dokumen) > 0){
                echo "<div class='row'>";
                foreach ($dokumen as $dokumen) {
                  echo
                  "
                  <div class='col-md-3'>
                  <div class='card card-border' style='border:1px solid #dadada;border-radius:5px'>

                    <div class='card-body'>
                    <div style='padding-bottom:10px'><center><i class='fas fa-file-alt fa-3x'></i><center></div>"
                    .$dokumen['nama_dokumen']."<br/>";

                    echo "</div>

                    <div class='card-footer'>
                      <div class='row'>"; ?>
                        <div class='col-sm-12'><a target="_t" href="<?= base_url() ?><?= $dokumen['file_hasil'] ?>" class='btn btn-warning btn-block'><button class="text-white" ><i class='fas fa-download'></i></button></a></div>
                        <!-- <div class='col-sm-6'><button class='btn btn-info btn-block' data-toggle='modal' onclick='setDataUbahDokumen(<?= $dokumen['id_dokumen'] ?>, "<?= $dokumen['nama_dokumen'] ?>",<?= $dokumen['isUploaded'] ?>)' data-target='#modalUnggah'><i class='fas fa-upload'></i></button></div> -->

                      <?php echo "</div>
                    </div>
                  </div>
                  </div>";
                }
                echo "</div>";
              }else{
                echo "Tidak ada dokumen yang ditampilkan";
              }
              ?>


              <?php if($dokumen == null){ ?>
                <!-- <button type="button" name="button" class="btn btn-warning">Tidak ada dokumen hasil form</button> -->
              <?php }else{ ?>
                <!-- <button type="button" name="button" class="btn btn-info"><a target="_t" href="<?= base_url()?>dokumen/unduh_dokumen/inspeksi/dokumen/<?= $uid ?>">Unduh Hasil Inspeksi</a></button> -->
              <?php } ?>
              <br/><hr/>
              <div class="table-responsive-md">
                <form class="" action="<?= base_url() ?>dashboard/simpan_hasil_inspeksi" method="post">
                    <input type="hidden" value="<?= $uid ?>" name="uid"/>

                <table class="table table-hover display" id="table-datatable" >
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Form</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($data_form != 0){

                     $i=1; foreach ($data_form as $form): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $form['deskripsi'] ?>
                        </td>
                        <td>
                          <?= $form['status'] ?>
                        </td>
                        <td>
                        <?= $form['keterangan'] ?>

                        </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                      </tbody>

                    <?php } ?>
                    </table>
                  </form>

                  </div>

                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
          <!-- #END# Input -->


        </div>

      </div>
    </div>

  </section>
