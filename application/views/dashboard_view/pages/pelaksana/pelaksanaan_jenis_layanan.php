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
              <hr/>
              <?php if($this->session->flashdata('status')!= ""){
                echo $this->session->flashdata('status');
              } ?>
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Perusahaan / Kelompok</th>
                      <th>Layanan yang Diajukan</th>
                      <th>Kab/Kota</th>
                      <th>Inspektor</th>
                      <th>PPC</th>
                      <th>Tanggal Pelaksanaan</th>
                      <th>Waktu Pelaksanaan</th>
                      <th>Daftar Produk</th>
                      <th>Isi Form Pelaksana</th>
                      <th>Surat Tugas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($pelaksana as $pelaksana): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $pelaksana['nama_usaha'] ?></td>
                        <td><?= $pelaksana['nama_layanan'] ?></td>
                        <td><?= $pelaksana['kota'] ?></td>
                        <td><?= $pelaksana['inspektor'] ?></td>
                        <td><?= $pelaksana['ppc'] ?></td>
                        <td><?php $tanggal = strtotime($pelaksana['tanggal_inspeksi']);
                          echo date("d/m/Y",$tanggal);
                         ?></td>
                         <td><?= date("H:i",$tanggal) ?></td>
                         <td>
                           <?php if ($pelaksana['kode_layanan'] != 'kemas'): ?>
                             <button  class="btn btn-info inline" ><a href="<?= base_url() ?>dashboard/produk/<?= $pelaksana['kode_layanan']?>/<?= $pelaksana['uid']?>" class="text-white"><i class="fas fa-eye"></i></a></button>

                           <?php endif; ?>
                         </td>
                        <td>
                          <?php if ($pelaksana['hasil_pelaksana'] == 0): ?>
                            <a href="<?= base_url() ?>dashboard/form_hasil_pelaksana/<?= $pelaksana['uid'] ?>" class="btn btn-info">Action</a>
                          <?php else: ?>
                            <button class="btn btn-success">
                              <i class="fas fa-check"></i></a>
                            </button>
                          <?php endif; ?>

                        </td>
                        <td>
                          <button class="btn btn-info"><a href="<?= base_url()?>upload/Dokumen_Usaha/<?= $pelaksana['nama_usaha'] ?>/<?= $pelaksana['kode_pendaftaran'] ?>/<?= $pelaksana['surat_tugas'] ?>" target="_blank" class="text-white"><i class="fas fa-download"></i></a></button>

                          <!-- <button class="btn btn-info"><a href="<?= base_url()?>dashboard/lihat_surat_tugas/<?= $pelaksana['uid'] ?>" target="_blank" class="text-white"><i class="fas fa-download"></i></a></button> -->
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
