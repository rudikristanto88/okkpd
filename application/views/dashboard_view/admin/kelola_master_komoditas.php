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
              <li class="breadcrumb-item active">
                <a href="<?= base_url() ?>admin/kelola_komoditas">
                  Sektor Komoditas
                </a>
                </li>
              <li class="breadcrumb-item active">
                <a href="<?= base_url() ?>admin/kelola_komoditas/kelompok/<?= $id_sektor ?>">
                  Kelompok Komoditas
                </a>
              </li>
              <li class="breadcrumb-item active">Jenis Komoditas
              </li>
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
                            <h2>
                                <strong>Jenis Komoditas <strong></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url() ?>admin/tambah_master_komoditas/tambah/<?= $id_kelompok ?>/<?= $id_sektor ?>">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">

                          <table class="table table-hover" id="table-datatable">
                            <thead>
                              <tr>
                                <th style="vertical-align: middle;">Sektor</th>
                                <th style="vertical-align: middle;">Kelompok</th>
                                <th style="vertical-align: middle;">Kode Jenis Komoditas</th>
                                <th style="vertical-align: middle;">Nama Jenis Komoditas</th>
                                <th style="vertical-align: middle;">Nama Latin</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>

                            </thead>
                            <tbody>
                              <?php $i=1; foreach ($komoditas as $komoditas) : ?>
                                <tr>
                                  <td><?= $komoditas['nama_sektor_komoditas'] ?></td>
                                  <td><?= $komoditas['nama_kelompok'] ?></td>
                                  <td><?= $komoditas['id_sektor'] ?>.<?= $komoditas['id_kelompok'] ?>.<?= $komoditas['kode_komoditas'] ?></td>
                                  <td><?= $komoditas['deskripsi'] ?></td>
                                  <td><?= $komoditas['nama_latin'] ?></td>
                                  <td>
                                  <button type="button" class="btn btn-warning" data-toggle="modal" onclick="setData('<?= $komoditas['kode_komoditas'] ?>','<?= $komoditas['id_kelompok'] ?>','<?= $komoditas['id_sektor'] ?>')" data-target="#alert">Hapus</button>
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
        <form action="<?= base_url() ?>admin/hapus_komoditas/master" method="post">
          <input type="hidden" name="kode_komoditas" id="kode_komoditas">
          <input type="hidden" name="id_kelompok" id="id_kelompok">
          <input type="hidden" name="id_sektor" id="id_sektor">
          <button type="submit" class="btn btn-danger" >Hapus</button>

        </form>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
  function setData(kode_komoditas,id_kelompok,id_sektor){
    $("#kode_komoditas").val(kode_komoditas);
    $("#id_kelompok").val(id_kelompok);
    $("#id_sektor").val(id_sektor);
  }
</script>
