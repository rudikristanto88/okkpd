<section class="content">
  <div class="container-fluid">
    <div class="block-header">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <!-- <div class="loader"></div> -->

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
              <h4 class="card-inside-title">Daftar Foto Hasil Inspeksi</h4>
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Keterangan</th>
                      <th>Foto</th>
                      <th>Unggah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;$countImage = 0; foreach ($gambar as $gambar): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $gambar['keterangan'] ?></td>
                        <td><?php if($gambar['gambar'] == ""){echo "-";}else { $countImage++;echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $gambar['gambar'] ).'" alt="Card image" style="width:200px">'; } ?></td>
                        <td>
                          <a class="btn btn-info" data-toggle="modal" onClick="sendData(<?= $gambar['uid_gambar'] ?>,<?= $gambar['id_hasil'] ?>)" data-target="#modalUpload" style="display:inline">
                            <?php if($gambar['gambar'] == ""){echo "Unggah";}else{echo "Ubah";} ?>
                          </a>
                          <!-- <a href="<?= base_url() ?>dashboard/unggah_gambar/<?= $id_layanan ?>" class="btn btn-default"><?php if($gambar['gambar'] == ""){echo "Unggah";}else{echo "Ubah";} ?></a></td> -->
                        </tr>
                        <?php $i++; endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                  <div style="margin-bottom:50px">

                    <?php
                    if ($countImage == 10): ?>
                      <form class="" action="<?= base_url() ?>dashboard/simpan_hasil_pelaksana" method="post">
                        <input type="hidden" name="uid" value="<?= $id_layanan ?>">
                      <button type="submit" class="btn btn-info" name="simpan_pelaksana">Simpan</button>
                    </form>
                    <?php endif; ?>

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
        <form class="" action="<?= base_url() ?>dashboard/form_hasil_pelaksana/<?= $id_layanan ?>" method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Unggah gambar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload File</span>
                  <input type="file" name="gambars" required>
                  <input type="hidden" name="id" id="ids">
                  <input type="hidden" name="id_hasil" id="id_hasil">
                  <input type="hidden" name="layanan" value="<?= $id_layanan ?>">
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
          <button type="submit" class="btn btn-info" name="upload" value="1">Tambah</button>
        </div>
      </form>

      </div>
    </div>
  </div>


<script type="text/javascript">
  function sendData(id_gambar,id_hasil){
    $("#ids").val(id_gambar);
    $("#id_hasil").val(id_hasil);
  }
</script>
