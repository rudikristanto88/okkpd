

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
                <div class="col-lg-3 col-sm-6">
                  <a href="<?= base_url() ?>dashboard/penugasan_petugas_inspeksi">

                    <div class="support-box text-center cyan">
                        <div class="icon m-b-10">
                            <div class="chart chart-bar"></div>
                        </div>
                        <div class="text m-b-10">Daftar Permohonan Baru</div>
                        <h3 class="m-b-0"><?= $permohonan_masuk ?>

                        </h3>
                        <small class="displayblock">Menunggu Proses <i class="fas fa-chevron-right"></i></small>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <a href="<?= base_url() ?>dashboard/penugasan_inspektor">
                    <div class="support-box text-center purple">
                        <div class="icon m-b-10">
                            <span class="chart chart-line"></span>
                        </div>
                        <div class="text m-b-10">Penugasan Inspektor</div>
                        <h3 class="m-b-0"><?= $penugasan_inspektor ?>

                        </h3>
                        <small class="displayblock">Menunggu Proses <i class="fas fa-chevron-right"></i></small>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <a href="<?= base_url() ?>dashboard/penugasan_ppc">
                    <div class="support-box text-center blue">
                        <div class="icon m-b-10">
                            <div class="chart chart-pie"></div>
                        </div>
                        <div class="text m-b-10">Penugasan PPC</div>
                        <h3 class="m-b-0"><?= $penugasan_ppc ?>

                        </h3>
                        <small class="displayblock">Menunggu Proses <i class="fas fa-chevron-right"></i></small>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <a href="<?= base_url() ?>dashboard/hasil_laboratorium">
                    <div class="support-box text-center green">
                        <div class="icon m-b-10">
                            <div class="chart chart-bar"></div>
                        </div>
                        <div class="text m-b-10">Hasil Laboratorium</div>
                        <h3 class="m-b-0"><?= $hasil_uji_lab ?>

                        </h3>
                        <small class="displayblock">Menunggu Proses <i class="fas fa-chevron-right"></i></small>
                    </div>
                  </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                        
                    <div class="col-lg-3 col-sm-6">
                    <a href="<?= base_url() ?>dashboard/mteklist_validujimutu">
                        <div class="support-box text-center blue">
                            <div class="icon m-b-10">
                                <div class="chart chart-pie"></div>
                            </div>
                            <div class="text m-b-10">Validasi Uji Mutu</div>
                            <h3 class="m-b-0"><?= $hasil_uji_mutu ?>

                            </h3>
                            <small class="displayblock">Menunggu Proses <i class="fas fa-chevron-right"></i></small>
                        </div>
                    </a>
                    </div>
                </div>
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
