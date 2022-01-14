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
                      <th>PPC</th>
                      <th>Pelaksana</th>
                      <th>Tanggal Inspeksi</th>
                      <th>Waktu Inspeksi</th>
                      <th>Lihat Produk</th>
                      <th>Isi Form Inspeksi</th>
                      <th>Surat Tugas</th>
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
                        <td><?= $inspeksi['ppc'] ?></td>
                        <td><?= $inspeksi['pelaksana'] ?></td>
                        <td>
                          <?php $tanggal = strtotime($inspeksi['tanggal_inspeksi']);
                            echo date("d/m/Y",$tanggal);
                          ?>
                        </td>
                        <td>
                          <?= date("H:i",$tanggal); ?>
                        </td>
                        <td>
                          <?php if ($inspeksi['kode_layanan'] != 'kemas'): ?>
                            <button  class="btn btn-info inline" ><a href="<?= base_url() ?>dashboard/produk/<?= $inspeksi['kode_layanan']?>/<?= $inspeksi['uid']?>" class="text-white"><i class="fas fa-eye"></i></a></button>

                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if($inspeksi['hasil_inspeksi'] == 0){ ?>
                            <button class="btn btn-info">
                              <a href="<?= base_url()?>dashboard/form_inspeksi/<?= $inspeksi['uid'] ?>">Action</a>
                            </button>
                        <?php }else{ ?>
                          <button class="btn btn-success">
                            <i class="fas fa-check"></i></a>
                          </button>
                        <?php }?>
                        </td>
                        <td>
                          <button class="btn btn-info"><a href="<?= base_url()?>upload/Dokumen_Usaha/<?= $inspeksi['nama_usaha'] ?>/<?= $inspeksi['kode_pendaftaran'] ?>/<?= $inspeksi['surat_tugas'] ?>" target="_blank" class="text-white"><i class="fas fa-download"></i></a></button>
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
