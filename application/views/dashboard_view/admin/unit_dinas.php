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
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">Kelola Dinas</li>
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
                                <strong>Unit</strong> Dinas</h2>
                            <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                      aria-haspopup="true" aria-expanded="false">
                                      <i class="material-icons">more_vert</i>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li>
                                          <a href="<?= base_url('admin/tambah_dinas') ?>">Tambah</a>
                                      </li>
                                  </ul>
                              </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table class="table table-hover" id="table-datatable" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kota</th>
                                        <th>Nama Dinas</th>
                                        <th>Nama Kepala Dinas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1;foreach ($kota as $kota) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $kota['nama_kota'] ?></td>
                                        <td><?= $kota['nama_instansi'] ?></td>
                                        <td><?= $kota['nama_ketua'] ?></td>
                                        <td><button class="btn btn-info" type="button" data-toggle="modal" onclick="setInstansi('<?= $kota['kode_kota'] ?>','<?= $kota['nama_instansi'] ?>','<?= $kota['nama_ketua'] ?>')" data-target="#modalTambah">Ubah</button></td>
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

<div class="modal" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data Dinas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form  action="<?= base_url("admin/ubah_data_dinas")?>" method="post">


      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_instansi">Nama Instansi</label>
              <input class="text-black" type="hidden" id="kode_kota" name="kode_kota" placeholder="Consigment">
              <input class="text-black" type="text" id="nama_instansi" name="nama_instansi" placeholder="Consigment">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="nama_ketua">Nama Kepala Dinas</label>
              <input class="text-black" type="text" id="nama_ketua" name="nama_ketua" placeholder="Consigment">
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


<script type="text/javascript">
  function setInstansi(kode_kota,nama_instansi,nama_ketua){
    $("#kode_kota").val(kode_kota);
    $("#nama_instansi").val(nama_instansi);
    $("#nama_ketua").val(nama_ketua);
  }
</script>
