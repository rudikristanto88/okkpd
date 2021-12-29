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
              <li class="breadcrumb-item active">Form Pelaksanaan Inspeksi</li>
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

              <?php if($data_form != 0){
                echo "Anda sudah melakukan inspeksi terhadap usaha ini";
              }else{ ?>

              <h4 class="card-inside-title">Form inspeksi</h4><br/>
              <!-- <button type="button" name="button" class="btn btn-info"><a target="_t" href="<?= base_url() ?>dokumen/unduh_dokumen/inspeksi/<?= $jenis_layanan ?>">Unduh <span class="fas fa-download"><span></a></button>
              <?php if($dokumen == null){ ?>
                <button type="button" name="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUnggah">Unggah<span class="fas fa-upload"><span></button>
<?php } else{?>
                <button type="button" name="button" class="btn btn-success" >Dokumen telah diunggah<span class="fas fa-upload"><span></button>
<?php } ?>
<br/><br/><hr/> -->

          <?php
          if(sizeof($dokumen_inspeksi) > 0){
            echo "<div class='row'>";
            foreach ($dokumen_inspeksi as $dokumen) {
              echo
              "
              <div class='col-md-3'>
              <div class='card card-border' style='border:1px solid #dadada;border-radius:5px'>

                <div class='card-body'>
                <div style='padding-bottom:10px'><center><i class='fas fa-file-alt fa-3x'></i><center></div>"
                .$dokumen['nama_dokumen']."<br/>";
                  if($dokumen['isUploaded'] != 0){
                    echo "---------<br/><span>Dokumen sudah diupload</span>";
                  }
                echo "</div>

                <div class='card-footer'>
                  <div class='row'>"; ?>
                    <div class='col-sm-6'><button class='btn btn-warning btn-block' ><a target="_t" href="<?= base_url() ?><?= $dokumen['file'] ?>"><i class='fas fa-download'></i></a></button></div>
                    <div class='col-sm-6'><button class='btn btn-info btn-block' data-toggle='modal' onclick='setDataUbahDokumen(<?= $dokumen['id_dokumen'] ?>, "<?= $dokumen['nama_dokumen'] ?>",<?= $dokumen['isUploaded'] ?>)' data-target='#modalUnggah'><i class='fas fa-upload'></i></button></div>

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


              <h4 class="card-inside-title">Daftar Pertanyaan Inspeksi</h4><br/>

              <div class="table-responsive-md">
                <form class="" action="<?= base_url() ?>dashboard/simpan_hasil_inspeksi" method="post">
                    <input type="hidden" value="<?= $uid ?>" name="uid"/>
                <table class="table table-hover" class="display">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Syarat Teknis Tambahan</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($form as $form): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $form['keterangan'] ?>
                          <input type="hidden" value="<?= $form['keterangan'] ?>" name="deskripsi[]"/>
                          <input type="hidden" value="<?= $form['jenis'] ?>" name="jenis[]"/>
                        </td>
                        <td>
                          <div class="demo-switch">
                              <div class="switch">
                                  <label>Tidak Ada<input type="checkbox" name="status<?= $i ?>">
                                      <span class="lever"></span>Ada</label>
                              </div>

                          </div>
                        </td>
                        <td>
                          <div class="input-field col s12">
                              <textarea id="textarea2" class="materialize-textarea text-white text-small" name="keterangan[]" data-length="120"></textarea>
                              <label for="textarea2">Keterangan</label>
                          </div>
                        </td>
                        </tr>
                        <?php $i++; endforeach; ?>

                        <tr>
                          <td colspan="4"><input type="submit" value="Simpan" class="btn btn-info"/></td>
                        </tr>

                      </tbody>
                    </table>
                  </form>

                  </div>

                  <?php } ?>

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
        <form class="" action="<?= base_url() ?>dashboard/unggah_dokumen_hasil_uji/" method="post"  enctype="multipart/form-data">
        <div class="modal-header">
          <!-- Modal Header -->
          <h4 class="modal-title">Unggah Hasil Dokumen Form Uji </h4>
          <span>Ukuran maksimum : 1 MB</span>
          <input type="hidden" name="id_layanan" id="id_layanan" value="<?= $uid ?>">
          <input type="hidden" name="id_dokumen" id="id_dokumen">
          <input type="hidden" name="up" id="up">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="input-field">
                <input id="nama_dokumen" type="text" name="nama_dokumen" class="">
                <label for="nama_dokumen">Nama Form</label>
              </div>

            </div>
            <div class="col-sm-12">
              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload File</span>
                  <input type="file" name="gambar" required>
                </div>
                <div class="file-path-wrapper">
                  <input  class="file-path validate" type="text">
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="hapus" value="1">Unggah</button>
        </div>
      </form>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    function setDataUbahDokumen(id,nama,up){
      $("#id_dokumen").val(id)
      $("#nama_dokumen").val(nama)
      $("#up").val(up)
    }
  </script>
