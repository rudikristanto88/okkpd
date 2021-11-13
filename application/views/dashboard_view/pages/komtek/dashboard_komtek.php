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
              <li class="breadcrumb-item active">Rekomendasi Layanan</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div>
            <div class="body">
              <h4 class="card-inside-title">Daftar Permohonan Verifikasi</h4><br/>
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
                      <th>Hasil Inspektor</th>
                      <th>Hasil PPC</th>
                      <th>Hasil Pelaksana</th>
                      <th>Laporan Hasil Uji Lab </th>
                      <th width="120px">Aksi Rekomendasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($rekomendasi as $form): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $form['nama_usaha'] ?></td>
                        <td><?= $form['nama_layanan'] ?></td>
                        <td><button class="btn btn-info"><a href="<?= base_url() ?>dokumen/lihat_hasil/inspeksi/<?= $form['uid']?>">Lihat</a></button></td>
                        <td>
                          <?php if($form['kode_layanan'] != 'kemas'){ ?>
                            <button class="btn btn-info"><a href="<?= base_url() ?>dokumen/lihat_hasil/ppc/<?= $form['uid']?>">Lihat</a></button>
                          <?php }else{ ?>
                            <button class="btn btn-default">Lihat</button>

                          <? } ?>

                        </td>
                        <td><button class="btn btn-info"><a href="<?= base_url() ?>dokumen/lihat_hasil/pelaksana/<?= $form['uid']?>">Lihat</a></button></td>
                        <td>
                          <?php if($form['kode_layanan'] != 'kemas'){ ?>
                            <button class="btn btn-info"><a href="<?= base_url() ?><?= $form['laporan_hasil_uji']?>">Lihat</a></button>
                          <?php }else{ ?>
                            <button class="btn btn-default">Lihat</button>

                          <? } ?>


                        </td>
                        <td>
                          <button type="button" name="button" class="btn btn-info" data-toggle='modal' data-target='#modalUnggah' onclick="setData('<?= $form['uid'] ?>')">Setuju</button>

                          <!-- <form method="post" style="display:inline" action="<?= base_url() ?>dashboard/terima_hasil_uji/2">
                          <input type="hidden" name="uid" value="<?= $form['uid'] ?>"/>
                          <input type="hidden" name="id_user" value="<?= $form['id_user'] ?>"/>
                          <button class="btn btn-info">Setuju</button></form> -->
                          &nbsp;<button class="btn btn-warning" data-toggle='modal' data-target='#modalTolak' onclick="setDataTolak('<?= $form['uid'] ?>')">Tolak</button></td>
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
        <form class="" action="<?= base_url() ?>dashboard/terima_hasil_uji/2" method="post"  enctype="multipart/form-data">
        <div class="modal-header">
          <!-- Modal Header -->
          <h4 class="modal-title">Berita Acara Sidang Komtek </h4>
          <input type="hidden" name="uid" id="uid">
          <input type="hidden" name="id_user" value="<?= $id_profile_saya ?>">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <textarea name="berita_acara" id="ckeditor" style="height:500px"></textarea>
            </div>

          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="hapus" value="1">Simpan</button>
        </div>
      </form>

      </div>
    </div>
  </div>

  <div class="modal" id="modalTolak">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/tolak_dokumen" method="post"  enctype="multipart/form-data">
        <div class="modal-header">
          <!-- Modal Header -->
          <h4 class="modal-title">Alasan penolakan </h4>
          <input type="hidden" name="uid" id="tolak_uid">
          <input type="hidden" name="id_user" value="<?= $id_profile_saya ?>">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <textarea name="alasan_penolakan" id="alasan" style="height:500px"></textarea>
            </div>

          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="hapus" value="1">Simpan</button>
        </div>
      </form>

      </div>
    </div>
  </div>


  <script type="text/javascript">
  let editor
  ClassicEditor
      .create( document.querySelector( '#ckeditor' ) )
      .then(newEditor =>{
        editor = newEditor;
      })
      .catch( error => {
          console.error( error );
      } );

      ClassicEditor
          .create( document.querySelector( '#alasan' ) )
          .then(newEditor =>{
            editor = newEditor;
          })
          .catch( error => {
              console.error( error );
          } );
      function setData(id, id_user){
        $("#uid").val(id);
      }
      function setDataTolak(id, id_user){
        $("#tolak_uid").val(id);
      }
    // function setDataSampling(id,deskripsi,status,id_layanan){
    //   $("#ckeditor").val(deskripsi);
    //   $("#status").val(status);
    //   $("#id_sampling").val(id);
    //   $("#id_layanan").val(id_layanan);
    //
    //   // if(status == ''){
    //   //   editor.isReadOnly = false;
    //   //   $('#status_teks').html('')
    //   // }else if(status == '0'){
    //   //   editor.isReadOnly = true;
    //   //   $('#status_teks').html('<span class="alert alert-info">Menunggu</span>')
    //   // }else if(status == '1'){
    //   //   editor.isReadOnly = false;
    //   //   $('#status_teks').html('<span class="alert alert-warning">Ditolak</span>')
    //   // }else if(status == '2'){
    //   //   editor.isReadOnly = true;
    //   //   $('#status_teks').html('<span class="alert alert-success">Diterima</span>')
    //   // }
    //   editor.setData(deskripsi);
    //
    // }
  </script>
