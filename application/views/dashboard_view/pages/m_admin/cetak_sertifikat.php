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
              <li class="breadcrumb-item active">Cetak Sertifikat</li>
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
                      <th width="180px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($dokumen as $dokumen): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $dokumen['nama_usaha'] ?></td>
                        <td><?= $dokumen['nama_layanan'] ?></td>
                        <td>
                          <?php if($dokumen['sertifikat']==null){ ?>
                            <button class="btn btn-info" >Unduh</button>
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalUpload" onClick="sendData(<?= $dokumen['uid'] ?>)">Unggah</button>
                          <?php }else{ ?>
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalUpload" onClick="sendData(<?= $dokumen['uid'] ?>)">Unduh</button>
                          <?php } ?>
                        </td>
                        <!-- <td>
                          <?php if($dokumen['sertifikat']==0){ ?>
                            <form method="post" class="inline" action="<?= base_url() ?>dashboard/terima_hasil_uji"><input type="hidden" name="uid" value="<?= $dokumen['uid'] ?>"/><button class="btn btn-info">Setuju</button></form>&nbsp;<button class="btn btn-warning inline">Tolak</button>
                          <?php } ?>
                        </td> -->
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

  <div class="modal" id="modalUpload">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/unggah_sertifikat/" method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Unggah Surat Pengantar Laboratorium</h4>


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
                    <input type="file" name="sertifikat">
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp;&nbsp;
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
  </script>
