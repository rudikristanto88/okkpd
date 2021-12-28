<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              
              <li class="breadcrumb-item active">Tautan Terkait</li>
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
                  <?php
                  if($this->session->flashdata("status")){
                    echo $this->session->flashdata("status");
                  }
                  ?>
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Tautan</strong> Terkait</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url('admin/tambah_tautan') ?>">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th style="vertical-align: middle;">No</th>
                                <th style="vertical-align: middle;">Nama Tautan</th>
                                <th style="vertical-align: middle;">Alamat Tautan</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>

                            </thead>
                            <tbody>
                              <?php $i=1; foreach ($tautan as $tautan) : ?>
                                <tr>
                                  <td><?=$i ?>.</td>
                                  <td><?= $tautan['nama_tautan']?></td>
                                  <td><?= $tautan['alamat_tautan'] ?></td>
                                  <td><button type="button" class="btn btn-warning" data-toggle="modal" onclick="setData(<?= $tautan['id_tautan'] ?>)" data-target="#alert">Hapus</button></td>
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

<div id="alert" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin untuk menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        &nbsp;&nbsp;
        <form action="<?= base_url() ?>admin/hapus_tautan" method="post">
          <input type="hidden" name="id_tautan" id="id_tautan">
          <button type="submit" class="btn btn-danger" >Hapus</button>

        </form>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
  function setData(id_tautan){
    $("#id_tautan").val(id_tautan);
  }
</script>
