<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Kelola Master Satuan</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <?php
                          if($this->session->flashdata("status")){
                            echo $this->session->flashdata("status");
                          }
                          ?>
                            <h2>
                                <strong>Kelola</strong> Master Satuan</h2>
                            <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                      aria-haspopup="true" aria-expanded="false">
                                      <i class="material-icons">more_vert</i>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li>
                                          <a href="<?= base_url('admin/tambah_satuan') ?>">Tambah</a>
                                      </li>
                                  </ul>
                              </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table class="table table-hover" id="table-datatable" class="display">
                                <thead>
                                    <tr>
                                        <th width="100px">No</th>
                                        <th>Nama Satuan</th>
                                        <th width="100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1;foreach ($satuan as $satuan) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $satuan['nama_satuan'] ?></td>
                                        <td>
                                          <button class="btn btn-info" type="button" data-toggle="modal" onclick="setData(<?= $satuan['id_satuan'] ?>,'<?= $satuan['nama_satuan'] ?>')" data-target="#modalUbah"><i class="fas fa-edit"></i></button>
                                          <button  class="btn btn-warning" type="button" data-toggle="modal" onclick="setDataHapus(<?= $satuan['id_satuan'] ?>,'<?= $satuan['nama_satuan'] ?>')" data-target="#modalHapus"><i class="fa fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                  <?php $i++;endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->


          </div>
        </div>
      </div>
    </div>
    <!-- #END# Input -->


  </div>

</div>

<!-- Widgets -->

<!-- #END# Widgets -->

</div>
</section>

<div class="modal" id="modalUbah">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data Satuan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form  action="<?= base_url("admin/data_satuan/ubah")?>" method="post">


      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_instansi">Nama Satuan</label>
              <input class="text-black" type="hidden" id="id_satuan" name="id_satuan" placeholder="Consigment">
              <input class="text-black" type="text" id="nama_satuan" name="nama_satuan" placeholder="Nama Kemasan">
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-info">Ubah</button>
      </div>
    </form>


    </div>
  </div>
</div>

<div class="modal" id="modalHapus">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data Satuan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form  action="<?= base_url("admin/data_satuan/hapus")?>" method="post">
      <!-- Modal body -->
      <div class="modal-body">
        <span>Apakah anda yakin ingin menghapus data <strong><span id="nama_satuan_hapus"></span></strong>?</span>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <input class="text-black" type="hidden" id="id_satuan_hapus" name="id_satuan" placeholder="">
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-warning">Hapus</button>
      </div>
    </form>


    </div>
  </div>
</div>

<script type="text/javascript">
  function setData(id,nama){
    $("#id_satuan").val(id);
    $("#nama_satuan").val(nama);
  }
  function setDataHapus(id,nama){
    $("#id_satuan_hapus").val(id);
    $("#nama_satuan_hapus").html(nama);
  }
</script>
