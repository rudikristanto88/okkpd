

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item 	bcrumb-1">
                                <a href="<?= base_url() ?>dashboard">
                                    <i class="material-icons">home</i>
                                    Home</a>
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
              <!--  <div class="col-lg-3 col-sm-6">
                  <a href="<?= base_url() ?>dashboard/valid_sample">
                    <div class="support-box text-center blue">
                    <div class="icon m-b-10">
                            <div class="chart chart-bar"></div>
                        </div>
                        <div class="text m-b-10">Menunggu Sample </div>
                        <h3 class="m-b-0"><?= $hasil_sample ?>

                        </h3>
                        <small class="displayblock">Menunggu Sample <i class="fas fa-chevron-right"></i></small>
                    </div>
                  </a>
                </div>-->
                <div class="col-lg-3 col-sm-6">
                  <a href="<?= base_url() ?>dashboard/valid_hasilpengujian">
                    <div class="support-box text-center green">
                        <div class="icon m-b-10">
                            <div class="chart chart-bar"></div>
                        </div>
                        <div class="text m-b-10">Menunggu Proses Pengujian</div>
                        <h3 class="m-b-0"><?= $hasil_uji_lab ?>

                        </h3>
                        <small class="displayblock">Menunggu Proses Pengujian <i class="fas fa-chevron-right"></i></small>
                    </div>
                  </a>
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
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
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
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
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
