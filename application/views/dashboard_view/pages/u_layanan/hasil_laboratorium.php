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
              <li class="breadcrumb-item active">Hasil Uji Laboratorium</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div>
            <div class="body">
              <h4 class="card-inside-title">Pilih Perusahaan</h4><br/>
                <hr/>
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th width="30px">No.</th>
                      <th>Nama Usaha</th>
                      <th>Layanan yang Diajukan</th>
                      <!-- <th>Unduh Surat Pengantar Laboratorium</th> -->
                      <th>Unggah Laporan Hasil Uji Laboratorium</th>
                      <th width="120px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($uji_sampel as $form): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $form['nama_usaha'] ?></td>
                        <td><?= $form['nama_layanan'] ?></td>
                        <!-- <td><button class="btn btn-info" >Unduh</button></td> -->
                        <td>
                          <?php if($form['laporan_hasil_uji']==null && $form['kode_layanan']!='kemas'){ ?>
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalUpload" onClick="sendData(<?= $form['uid'] ?>)">Unggah</button>
                          <?php }else if($form['kode_layanan']=='kemas'){echo '-';}else{ echo "Dokumen telah diunggah";} ?>
                        </td>
                        <td>
                          <?php if($form['status_hasil_uji']==0){ ?>
                            <form method="post" class="inline" action="<?= base_url() ?>dashboard/terima_hasil_uji"><input type="hidden" name="uid" value="<?= $form['uid'] ?>"/><button class="btn btn-info">Setuju</button></form>&nbsp;<button class="btn btn-warning inline"  data-toggle="modal" onClick="setDataTolak(<?= $form['uid'] ?>)" data-target="#modalTolak">Tolak</button>
                          <?php }else if($form['kode_layanan']=='kemas'){echo '-';}else{
                            echo '<a href="'.base_url().''.$form['laporan_hasil_uji'].'" target="_blank" class="btn btn-info"><button class="text-white">Lihat</button></a>';
                          } ?>
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


  <div class="modal" id="modalTolak">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/tolak_dokumen" method="post">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Alasan Penolakan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

            <input type="hidden" name="uid" id="id_tolak" value="">
            <input type="hidden" name="id_user"  value="<?= $id_profile_saya ?>">
            <label for=""></label>
              <textarea name="alasan_penolakan" id="ckeditor" style="height:500px"></textarea>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-info" >Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="modalUpload">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/unggah_surat_lab/" method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Unggah Surat Pengantar Laboratorium</h4>&nbsp;&nbsp;&nbsp;
          <span style="color:black">Ukuran File Maksimal 1Mb</span>


          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="input-field">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Upload File</span>
                    <input type="hidden" name="uid" value="" id="uid">
                    <input type="file" name="surat_lab">
                  </div>
                  <div class="file-path-wrapper">
                    <input  class="file-path validate" type="text" placeholder="Surat Laboratorium">
                  </div>
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
    function sendData(id){
      $("#uid").val(id);
    }
    function setDataTolak(id){
      $("#id_tolak").val(id);
    }

    let editor
    ClassicEditor
        .create( document.querySelector( '#ckeditor' ) )
        .then(newEditor =>{
          editor = newEditor;
        })
        .catch( error => {
            console.error( error );
        } );

  </script>
