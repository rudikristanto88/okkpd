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
              <li class="breadcrumb-item active">Kelola Form</li>
              <li class="breadcrumb-item active"><?= $menu ?></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
          <div>
            <div class="body">
              <h4 class="card-inside-title">
                <?php if($jenis == 'inspeksi'){ echo 'Dokumen Form Uji '; }else{ echo 'Dokumen Berita Acara '; } ?>
                <?= $menu ?>
              </h4><br/>
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>

              <?php if($jenis == 'inspeksi'){ ?>
              <button type="button" name="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambah">Syarat Teknis <i class="fas fa-plus"></i></button>
              <?php } ?>
              <button type="button" name="button" class="btn btn-info" data-toggle="modal" onclick="setTambah()" data-target="#modalUnggah">
                <?php if($jenis == 'inspeksi'){ echo 'Unggah Dokumen'; }else{ echo 'Unggah Berita Acara'; }?>
              <i class="fas fa-plus"></i></button>
                <br/>
                <hr/>
                <h4 class="card-inside-title">
                  <?php if($jenis == 'inspeksi'){ echo 'Dokumen Form Uji'; }else{ echo 'Dokumen Berita Acara'; }?>

                </h4>
                <?php
                if(sizeof($dokumen_inspeksi) > 0){
                  echo "<div class='row'>";
                  foreach ($dokumen_inspeksi as $dokumen) {
                    $alamat = "";
                    // if($dokumen['dokumen'] == null || $dokumen['dokumen'] == ""){
                    //   $alamat = base_url()."upload/Dokumen_Dinas/".$dokumen['file'];
                    // }else{
                    //   $alamat = base_url()."upload/Dokumen_Dinas/".$dokumen['file'];
                    // }
                    echo
                    "
                    <div class='col-md-3'>
                    <div class='card card-border' style='border:1px solid #dadada;border-radius:5px'>
                    <a href='".base_url().$dokumen['file']."' target='_blank' class='text-white'>

                      <div class='card-body'>
                      <div style='padding-bottom:10px'><center><i class='fas fa-file-alt fa-3x'></i><center></div>"
                      .$dokumen['nama_dokumen']."</div>
                      </a>

                      <div class='card-footer'>
                        <div class='row'>"; ?>
                          <div class='col-sm-6'><button class='btn btn-info btn-block' data-toggle='modal' onclick='setDataUbahDokumen(<?= $dokumen['id_dokumen'] ?>, "<?= $dokumen['nama_dokumen'] ?>")' data-target='#modalUnggah'><i class='fas fa-edit'></i></button></div>
                          <?php echo "<div class='col-sm-6'><button class='btn btn-warning btn-block' data-toggle='modal' onclick='setDataDokumen(".$dokumen['id_dokumen'].")' data-target='#modalHapusDokumen' ><i class='fas fa-trash'></i></button></div>
                        </div>
                      </div>
                    </div>
                    </div>";
                  }
                  echo "</div>";
                }else{
                  echo "Tidak ada dokumen yang ditampilkan";
                }
                ?>
              <hr/>

                <?php if($jenis == 'inspeksi'){ ?>
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th width="30px">No.</th>
                      <th>Syarat Teknis Tambahan</th>
                      <!-- <th>Jenis Form</th> -->
                      <th width="120px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($form_uji as $form): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $form['keterangan'] ?></td>
                        <!-- <td><?= $form['jenis_form'] ?></td> -->
                        <td><button class="btn btn-info"  data-toggle="modal" onclick="setUbah(<?= $form['id'] ?>,'<?= $form['keterangan'] ?>')" data-target="#modalUbah">Ubah</button>&nbsp;<button class="btn btn-warning" data-toggle="modal" onclick="setData(<?= $form['id'] ?>)" data-target="#modalHapus">Hapus</button></td>
                        </tr>
                        <?php $i++; endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                <?php } ?>

                </div>
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


  <div class="modal" id="modalTambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/tambah_form/" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Tambahan Syarat Teknis <?= $jenis." ".$menu ?></h4>
            <input type="hidden" name="kode_layanan" value="<?= $kode_layanan ?>">
            <input type="hidden" name="jenis" value="<?= $jenis ?>">
            <input type="hidden" name="jenis_form" value="ceklis">


            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="input-field">
                <input  type="text" name="keterangan" class="">
                <label for="keterangan">Nama Syarat Teknis</label>
              </div>

            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="hapus" value="1">Tambah</button>
        </div>
      </form>

      </div>
    </div>
  </div>


  <div class="modal" id="modalUbah">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/ubah_form/" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Form <?= $jenis." ".$menu ?></h4>
            <input type="hidden" name="kode_layanan" value="<?= $kode_layanan ?>">
            <input type="hidden" name="jenis" value="<?= $jenis ?>">
            <input type="hidden" name="jenis_form" value="ceklis">
            <input type="hidden" name="id_ubah" id="id_ubah">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="input-field">
                <input id="keterangan" type="text" name="keterangan" class="">
                <label for="keterangan">Nama Form</label>
              </div>

            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="hapus" value="1">Ubah</button>
        </div>
      </form>

      </div>
    </div>
  </div>



  <div class="modal" id="modalHapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/hapus_form/" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Form <?= $jenis." ".$menu ?></h4>
            <input type="hidden" name="kode_layanan" value="<?= $kode_layanan ?>">
            <input type="hidden" name="jenis" value="<?= $jenis ?>">
            <input type="hidden" name="id_hapus" id="id_hapus">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              Apakah anda yakin untuk menghapus data ini?

            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="hapus" value="1">Hapus</button>
        </div>
      </form>

      </div>
    </div>
  </div>



    <div class="modal" id="modalUnggah">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="" action="<?= base_url() ?>dashboard/unggah_form_uji/" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title">Unggah Form <?= $jenis." ".$menu ?></h4>
              <input type="hidden" name="kode_layanan" value="<?= $kode_layanan ?>">
              <input type="hidden" name="jenis" value="<?= $jenis ?>">
              <input type="hidden" name="id_dokumen" id="id_dokumen">
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
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
            <button type="submit" class="btn btn-info" name="hapus" value="1">Unggah</button>
          </div>
        </form>

        </div>
      </div>
    </div>

    <div class="modal" id="modalHapusDokumen">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="" action="<?= base_url() ?>dashboard/hapus_dokumen_inspeksi/" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Form <?= $jenis." ".$menu ?></h4>
              <input type="hidden" name="kode_layanan" value="<?= $kode_layanan ?>">
              <input type="hidden" name="jenis" value="<?= $jenis ?>">
              <input type="hidden" name="id_dokumen_hapus" id="id_dokumen_hapus">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                Apakah anda yakin untuk menghapus data ini?

              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
            <button type="submit" class="btn btn-info" name="hapus" value="1">Hapus</button>
          </div>
        </form>

        </div>
      </div>
    </div>





<script type="text/javascript">
  function setData(value){
    $("#id_hapus").val(value);
  }
  function setUbah(value,keterangan){
    $("#keterangan").val(keterangan);
    $("#id_ubah").val(value);
  }
  function setDataUbahDokumen(id,nama_form){
    $("#id_dokumen").val(id);
    $("#nama_dokumen").val(nama_form);
  }
  function setTambah(){
    $("#id_dokumen").val('');
    $("#nama_dokumen").val('');
  }
  function setDataDokumen(id){
    $("#id_dokumen_hapus").val(id);


  }
</script>


  <div class="modal" id="modalTambahs">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/tambah_form/" method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambahan Syarat Teknis <?= $jenis." ".$menu ?></h4>
          <input type="hidden" name="kode_layanan" value="<?= $kode_layanan ?>">
          <input type="hidden" name="jenis" value="<?= $jenis ?>">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
                <div class="input-field">
                  <input id="keterangan" type="text" name="keterangan" class="">
                  <label for="keterangan">Nama Syarat Teknis</label>
                </div>

                <div class="form-group">
