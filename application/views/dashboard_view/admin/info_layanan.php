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
            <li class="breadcrumb-item active">Info Layanan</li>
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
                      <strong>Info</strong> Layanan
                    </h2>
                  </div>
                  <div class="row">
                    <?php foreach ($layanan as $element) : ?>
                      <div class="col-md-4">
                        <div class="card">
                          <a href="<?= base_url('admin/info_layanan/' . $element["kode_layanan"]) ?>">
                            <div class="image-180">
                              <img class="card-img-top " src="<?= base_url() ?>assets/image/layanan/<?= $element['kode_layanan'] ?>.png" alt="Card image">
                            </div>
                            <div class="card-body">
                              <div class="text-center">
                                <h4 class="card-title"><?= $element['nama_layanan'] ?></h4>
                              </div>
                            </div>
                          </a>

                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <!-- #END# Basic Table -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>