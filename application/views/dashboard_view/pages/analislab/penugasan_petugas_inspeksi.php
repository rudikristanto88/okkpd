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
              <li class="breadcrumb-item active">Penugasan Petugas Inspeksi</li>
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
              <hr>

              <?php if($this->session->flashdata('status')!= ""){ echo $this->session->flashdata('status');} ?>

                <div class="">
                  <div class="table-responsive-md">
                    <table class="table table-hover display" width="100%" id="table-datatable">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Perusahaan / Kelompok</th>
                          <th>Layanan yang Diajukan</th>
                          <th>Kab/Kota</th>
                          <th>Pilih Inspektor</th>
                          <th>Pilih PPC</th>
                          <th>Pilih Pelaksana</th>
                          <th>Unduh Surat Tugas</th>
                          <th>Surat Tugas</th>
                          <th >Aksi</th>
                          <th>Info Produk</th>
                          <th></th>
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
                            <td><?= $inspeksi['inspektor'] ?></td>
                            <td><?= $inspeksi['ppc'] ?></td>
                            <td><?= $inspeksi['pelaksana'] ?></td>
                            <td>
                              <?php //if($inspeksi['inspektor']!=null && $inspeksi['ppc']!=null && $inspeksi['pelaksana']!=null && $inspeksi['surat_tugas'] ==null): ?>
                                <a href="http://yogaadi.xyz/okkpd/assets/dokumen/Surat%20Tugas_Inspektor,%20PPc%20dan%20Pelaksana.docx" class="btn btn-success"><button  class="text-white">UNDUH <span class="fas fa-download"></span></button></a> </td>
<!-- echo base_url().'dokumen/surat_tugas/'.$inspeksi['uid'] -->
                                <?php //endif; ?>
                            </td>
                            <td>
                                <?php
                                if($inspeksi['surat_tugas']!=null){
                                  echo '<a href="'.base_url().'upload/Dokumen_Usaha/'.$inspeksi['nama_usaha'].'/'.$inspeksi['kode_pendaftaran'].'/'.$inspeksi['surat_tugas'].'" target="_t" class="btn btn-default">Lihat</a>';
                                }?>

                                <?php
                                if($inspeksi['inspektor']!=null && $inspeksi['pelaksana']!=null && $inspeksi['ppc']!=null){ ?>
                                  <!-- echo '<a href="'.base_url().'upload/Dokumen_Usaha/'.$inspeksi['nama_usaha'].'/'.$inspeksi['kode_pendaftaran'].'/'.$inspeksi['surat_tugas'].'" target="_t" class="btn btn-default">Lihat</a>'; -->
                                  <button  class="btn btn-info" data-toggle="modal" onClick="sendDataUpload(<?= $inspeksi['uid'] ?>)" data-target="#modelUploadSuratTugas" style="display:inline"><a >Unggah <span class="fas fa-upload"></span></a></button>

                                <?php }?>
                                <!-- // $inspeksi['inspektor']!=null && $inspeksi['ppc']!=null && $inspeksi['pelaksana']!=null){ -->

                            </td>
                            <td>
                              <?php if($inspeksi['surat_tugas']!=null){ ?>
                                <form class="inline" action="<?= base_url() ?>dashboard/update_mt_status" method="post">
                                <input type="hidden" name="id_layanan" value="<?= $inspeksi['uid'] ?>">
                                <button type="sumbit" name="button" class="btn btn-info">Lanjut</button>
                              </form>
                                <?php } ?>
                              <button  class="btn btn-warning inline"><a href="" >Tunda</a></td></button>
                            <td>
                              <?php if ($inspeksi['kode_layanan'] != 'kemas'): ?>
                                <button  class="btn btn-info inline" ><a href="<?= base_url() ?>dashboard/produk/<?= $inspeksi['kode_layanan']?>/<?= $inspeksi['uid']?>" class="text-white"><i class="fas fa-eye"></i></a></button>

                              <?php endif; ?>
                            </td>
                            <td>
                              <button  class="btn btn-success inline" data-toggle="modal" onClick="sendData(<?= $inspeksi['uid'] ?>)" data-target="#modelPelaksana" style="display:inline">Pilih Petugas</button>
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
          </div>
          <!-- #END# Input -->


        </div>

      </div>
    </div>

  </section>

  <div class="modal" id="modelPelaksana">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/update_mt" method="post">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Penilaian</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <input type="hidden" name="id_layanan" id="id_layanan" value="">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group form-responsive form-white">
                  <label for="">Inspektor</label>
                  <select name="inspektor" class="form-control text-dark">
                    <?php foreach ($user as $inspektor):
                      if($inspektor['kode_role'] == 'inspektor'){?>
                        <option value="<?= $inspektor['id_user'].";".$inspektor['nama_lengkap'] ?> "><?= $inspektor['nama_lengkap']." (".$inspektor['nama_role'].")" ?></option>
                      <?php } endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group  form-responsive form-white">
                    <label for="">Petugas Pengambil Contoh</label>
                    <select  name="ppc" class="form-control text-dark">
                      <?php foreach ($user as $ppc):
                        if($ppc['kode_role'] == 'ppc'){?>
                          <option value="<?= $ppc['id_user'].";".$ppc['nama_lengkap'] ?> "><?= $ppc['nama_lengkap']." (".$ppc['nama_role'].")" ?></option>
                        <?php } endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group form-responsive form-white">
                      <label for="">Pelaksana</label>
                      <select name="pelaksana" style="color:black" class="form-control text-dark">
                        <?php foreach ($user as $pelaksana):
                          if($pelaksana['kode_role'] == 'pelaksana'){?>
                            <option value="<?= $pelaksana['id_user'].";".$pelaksana['nama_lengkap'] ?> "><?= $pelaksana['nama_lengkap']." (".$pelaksana['nama_role'].")" ?></option>
                          <?php } endforeach; ?>
                        </select>
                      </div>
                    </div>


                  <div class="col-sm-6">
                    <div class="form-group form-responsive form-white">
                      <label for="">Tanggal Pelaksanan Inspeksi</label>
                      <input type="date" name="tanggal_inspeksi" value="" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group form-responsive form-white">
                      <label for="">Waktu Pelaksanan Inspeksi</label>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="number" name="waktu_inspeksi[]" min="0" max="23" placeholder="HH" required>
                        </div>
                        <div class="col-md-6">
                          <input type="number" name="waktu_inspeksi[]" min="0" max="59" placeholder="mm" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group form-responsive form-white">
                      <label for="">Tanggal Pengambilan Contoh</label>
                      <input type="date" name="tanggal_pc" value="" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group form-responsive form-white">
                      <label for="">Waktu Pengambulan Contoh</label>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="number" name="waktu_pc[]" min="0" max="23" placeholder="HH" required>
                        </div>
                        <div class="col-md-6">
                          <input type="number" name="waktu_pc[]" min="0" max="59" placeholder="mm" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                <button type="submit" class="btn btn-info" >Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>


      <div class="modal" id="modelUploadSuratTugas">
        <div class="modal-dialog">
          <div class="modal-content">
            <?php

            echo form_open_multipart('dashboard/unggah_surat_tugas');?>
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Unggah Surat Tugas</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <span>Ukuran maksimal : 1 MB</span>
              <input type="hidden" name="id_layanan_surat" id="id_layanan_surat" value="">
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-field">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload File</span>

                        <input type="file" name="surat_tugas">
                      </div>
                      <div class="file-path-wrapper">
                        <input  class="file-path validate" type="text" placeholder="Surat Tugas">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;
              <button type="submit" class="btn btn-info" >Unggah</button>
            </div>
          </form>
        </div>
      </div>
    </div>





    <script type="text/javascript">
    function sendData(id_layanan){
      $("#id_layanan").val(id_layanan);
    }
    function sendDataUpload(id_layanan){
      $("#id_layanan_surat").val(id_layanan);
    }



  </script>
