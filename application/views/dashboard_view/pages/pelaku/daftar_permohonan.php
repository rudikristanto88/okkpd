<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
            </li>
            <li class="breadcrumb-item active">Daftar Permohonan <?= $jenis ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php if ($this->session->flashdata('status') != "") {
          echo $this->session->flashdata('status');
        } ?>
      </div>
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-header">
          Daftar Permohonan <?= $jenis ?>
          </div>
          <div class="card-body">

            <br />
            <div class="table-responsive-md">
              <table class="table table-hover" id="table-datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Jenis Layanan</th>
                    <th>Status</th>
                    <th><?php if ($jenis == "Ditolak") {
                          echo "Alasan Penolakan";
                        } else {
                          echo "Aksi";
                        } ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  if ($permohonan != null) {

                    foreach ($permohonan as $permohonan) { ?>
                      <tr>
                        <td><?= $i ?>.</td>
                        <td><?php
                            $tanggal = strtotime($permohonan['tanggal_buat']);
                            $bulan = date("m", $tanggal) - 1;
                            echo date("d", $tanggal) . " " . $this->bulan[$bulan] . " " . date("Y", $tanggal) ?></td>
                        <td><?= $permohonan['nama_layanan'] ?></td>
                        <td><?= $jenis ?></td>
                        <td>
                          <?php if ($jenis == "Ditolak") :
                            echo $permohonan['alasan_penolakan'];
                          else :
                            if ($permohonan['id_survey'] == null) : ?>
                              <a class="btn btn-warning" href="<?= base_url() ?>dashboard/survey?uid=<?= $permohonan['uid'] ?>&layanan=<?= $permohonan['kode_layanan'] ?>">Isi Survey</a>
                            <?php else : ?>

                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                      </tr>
                  <?php $i++;
                    }
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>