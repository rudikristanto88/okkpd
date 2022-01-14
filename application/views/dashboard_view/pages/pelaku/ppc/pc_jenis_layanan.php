
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
              
              <li class="breadcrumb-item active">Pengambilan Contoh (PC) Jenis Layanan</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div >
            <div class="body">
              <h4 class="card-inside-title">Daftar Permohonan Inspeksi</h4>
              
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Perusahaan / Kelompok</th>
                      <th>Layanan yang Diajukan</th>
                      <th>Kab/Kota</th>
                      <th>Inspektor</th>
                      <th>Pelaksana</th>
                      <th>Tanggal PC</th>
                      <th>Waktu PC</th>
                      <th>Lihat Produk</th>
                      <th>Sampling Plan</th>
                      <th>Berita Acara</th>
                      <th>Surat Tugas</th>
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
                        <td><?= $ppc['inspektor'] ?></td>
                        <td><?= $ppc['pelaksana'] ?></td>
                        <td>
                          <?php $tanggal = strtotime($ppc['tanggal_pc']);
                            echo date("d/m/Y",$tanggal);
                          ?>
                        </td>
                        <td>
                          <?= date("H:i",$tanggal); ?>
                        </td>
                        <td>
                          <?php if ($ppc['kode_layanan'] != 'kemas'): ?>
                            <button  class="btn btn-info inline" ><a href="<?= base_url() ?>dashboard/produk/<?= $ppc['kode_layanan']?>/<?= $ppc['uid']?>" class="text-white"><i class="fas fa-eye"></i></a></button>

                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if ($ppc['kode_layanan'] == 'kemas'): ?>

                          <?php else: ?>
                            <button type="button" class="btn btn-info" name="button"  data-toggle='modal' data-target='#modalUnggah' onclick="setDataSampling('<?= $ppc['id_sampling'] ?>','<?= $ppc['deskripsi'] ?>','<?= $ppc['status'] ?>','<?= $ppc['uid'] ?>')"><i class="fas fa-edit"></i></button>
                          <?php endif; ?>
                        </td>

                        <td>
                          <?php
                          if ($ppc['status'] == '2' || $ppc['kode_layanan']=='kemas'): ?>
                            <?php if ($ppc['hasil_ppc'] == 0) : ?>
                              <button type="button"  class="btn btn-info"><a href="<?=base_url()?>dashboard/form_ppc/<?= $ppc['uid'] ?>" class="text-white">Action</a></button>
                            <?php else : ?>
                              <button class="btn btn-success"><i class="fas fa-check"></i></button>
                            <?php endif; ?>


                          <?php endif; ?>

                          <td>
                            <button class="btn btn-info"><a href="<?= base_url()?>upload/Dokumen_Usaha/<?= $ppc['nama_usaha'] ?>/<?= $ppc['kode_pendaftaran'] ?>/<?= $ppc['surat_tugas'] ?>" target="_blank" class="text-white"><i class="fas fa-download"></i></a></button>

                            <!-- <button class="btn btn-info"><a href="<?= base_url()?>dashboard/lihat_surat_tugas/<?= $ppc['uid'] ?>" target="_blank" class="text-white"><i class="fas fa-download"></i></a></button> -->
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
        <form class="" action="<?= base_url() ?>dashboard/unggah_sampling_plan/" method="post"  enctype="multipart/form-data">
        <div class="modal-header">
          <!-- Modal Header -->
          <h4 class="modal-title">Unggah Sampling Plan </h4>&nbsp;&nbsp;&nbsp;<div id="status_teks">s</div>
          <input type="hidden" name="id_sampling" id="id_sampling">
          <input type="hidden" name="status" id="status">
          <input type="hidden" name="id_layanan" id="id_layanan">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <textarea name="sampling_plan" id="ckeditor" style="height:500px">asd</textarea>

            </div>

          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button> &nbsp;&nbsp;
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
       function setDataSampling(id,deskripsi,status,id_layanan){
         $("#ckeditor").val(deskripsi);
         $("#status").val(status);
         $("#id_sampling").val(id);
         $("#id_layanan").val(id_layanan);

         if(status == ''){
           editor.isReadOnly = false;
           $('#status_teks').html('')
         }else if(status == '0'){
           editor.isReadOnly = true;
           $('#status_teks').html('<span class="alert alert-info">Menunggu</span>')
         }else if(status == '1'){
           editor.isReadOnly = false;
           $('#status_teks').html('<span class="alert alert-warning">Ditolak</span>')
         }else if(status == '2'){
           editor.isReadOnly = true;
           $('#status_teks').html('<span class="alert alert-success">Diterima</span>')
         }
         editor.setData(deskripsi);

       }
     </script>
