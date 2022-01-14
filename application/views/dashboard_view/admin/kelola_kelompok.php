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
              <li class="breadcrumb-item active">Kelompok Komoditas</li>
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
                                <strong>Kelompok</strong> Komoditas</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url() ?>admin/tambah_kelompok/tambah/<?= $id_sektor ?>">Tambah</a>
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
                                <th style="vertical-align: middle;">Kode Kelompok</th>
                                <th style="vertical-align: middle;">Nama Kelompok</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>

                            </thead>
                            <tbody>
                              <?php $i=1; foreach ($kelompok as $kelompok) : ?>
                                <tr>
                                  <td><?= $kelompok['nama_sektor_komoditas'] ?></td>
                                  <td><?= $kelompok['id_kelompok'] ?></td>
                                  <td><?= $kelompok['nama_kelompok'] ?></td>
                                  <td>
                                  <button type="button" class="btn btn-warning" data-toggle="modal" onclick="setData('<?= $kelompok['id_kelompok'] ?>','<?= $kelompok['id_sektor'] ?>')" data-target="#alert">Hapus</button>
                                  <a class="btn btn-info" href="<?= base_url() ?>admin/kelola_komoditas/kelompok/<?= $id_sektor?>/komoditas/<?= $kelompok['id_kelompok']?>"><button class="text-white">Lihat Detail</button></a>
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
        <form action="<?= base_url() ?>admin/hapus_komoditas/kelompok" method="post">
          <input type="hidden" name="id_kelompok" id="id_kelompok">
          <input type="hidden" name="id_sektor" id="id_sektor">
          <button type="submit" class="btn btn-danger" >Hapus</button>

        </form>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
  function setData(id_kelompok,id_sektor){
    $("#id_kelompok").val(id_kelompok);
    $("#id_sektor").val(id_sektor);
  }
</script>
