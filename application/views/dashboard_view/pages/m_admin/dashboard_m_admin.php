

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item 	bcrumb-1">

                                    <i class="material-icons">home</i>
                                    Home
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?php if($this->session->flashdata('status')!= ""){
                  echo $this->session->flashdata('status');
                } ?>
              </div>
                <div class="col-lg-6 col-sm-6">
                  <a href="<?= base_url() ?>dashboard/daftar_sertifikat">
                    <div class="support-box text-center cyan">
                        <div class="icon m-b-10">
                            <div class="chart chart-bar"></div>
                        </div>
                        <div class="text m-b-10" style="font-size:18px">Jumlah sertifikat yang telah diterbitkan</div>
                        <div style="font-size:48px;">
                            <?= $total ?>
                        </div><br/>
                    </div>
                  </a>
                </div>

                <?php foreach ($sertifikat as $sertifikat): ?>
                  <div class="col-lg-3 col-sm-6">
                    <a href="<?= base_url() ?>dashboard/daftar_sertifikat/<?=$sertifikat['kode_layanan']?>">
                      <div class="support-box text-center white">
                          <div class="icon m-b-10">
                              <div class="chart chart-bar"></div>
                          </div>
                          <div class="text m-b-10" style="font-size:14px;color:black">Jumlah sertifikat <?= $sertifikat['nama_layanan'] ?></div>
                          <div style="font-size:48px;color:#00bcd4">
                              <?= $sertifikat['jumlah'] ?>
                          </div><br/>
                          <small class="displayblock" style="color:#bababa;font-size:12px">Lihat selengkapnya <i class="fas fa-chevron-right"></i></small>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>


            </div>
            <!-- <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Recent</strong> Report</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">Action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Another action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="recent-report__chart">
                                <canvas id="singel-bar-chart"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Recent</strong> Report</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">Action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Another action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="recent-report__chart">
                                <canvas id="polar-chart"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->


        </div>
    </section>
