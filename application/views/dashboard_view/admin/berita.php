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
              <li class="breadcrumb-item active">Berita</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <?php
          if($this->session->flashdata("status")){
            echo $this->session->flashdata("status");
          }
          ?>
          <div class="card">
            <div class="body">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Berita</strong></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url('admin/kelola_berita/tambah') ?>">Tambah</a>
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
                                <th style="vertical-align: middle;">Judul Berita</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>

                            </thead>
                            <tbody>
                              <?php $i=1; foreach ($berita as $berita) : ?>
                                <tr>
                                  <td><?=$i ?>.</td>
                                  <td><?= $berita['judul_berita']?></td>
                                  <td>
                                    <form style="display:inline" action="<?= base_url() ?>admin/kelola_berita/ubah" method="post">
                                      <input type="hidden" name="id_berita" value="<?= $berita['id_berita'] ?>">
                                      <button type="submit" class="btn btn-info" name="button">Ubah</button>

                                    </form>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="setData(<?= $berita['id_berita'] ?>)" data-target="#alert">Hapus</button>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        &nbsp;&nbsp;
        <form action="<?= base_url() ?>admin/hapus_berita" method="post">
          <input type="hidden" name="id_berita" id="id_berita">
          <button type="submit" class="btn btn-danger" >Hapus</button>

        </form>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
  function setData(id_berita){
    $("#id_berita").val(id_berita);
  }
</script>
