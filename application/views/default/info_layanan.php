<?php
$deskripsi = "";
$dasar_hukum = "";
$persyaratan = "";
$prosedur = "";
$biaya = "";

foreach ($info_layanan as $info) {
  $deskripsi = $info['deskripsi'];
  $dasar_hukum = $info['dasar_hukum'];
  $persyaratan = $info['persyaratan'];
  $prosedur = $info['prosedur'];
  $biaya = $info['biaya'];
}

 ?>

<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="<?= base_url()?>home/info_layanan">Info Layanan</a></li>
<li><?= $layanan ?></li>
</ol>
<div class="page_content">
    <section class="fullwidth_section news_section">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sc_section">
                        <div class="sc_content container">
                            <div class="sc_blogger layout_news template_news sc_blogger_horizontal">
                                <div class="columns_wrap">
                                    <div class="container">
                                        <div class="post_item post_item_news sc_blogger_item sc_blogger_item_last">
                                            <h4 class="post_title sc_title sc_blogger_title">Sertifikasi Prima 3</h4>
                                            <div class="post_content sc_blogger_content">
                                                <div class="post_descr">
                                                  <div class="container">
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                          <div class="panel with-nav-tabs panel-default">
                                                              <div class="panel-heading">
                                                                      <ul class="nav nav-tabs">
                                                                          <li class="active"><a href="#tab1default" data-toggle="tab">Diskripsi</a></li>
                                                                          <li><a href="#tab2default" data-toggle="tab">Dasar Hukum</a></li>
                                                                          <li><a href="#tab3default" data-toggle="tab">Persyaratan</a></li>
                                                                          <li><a href="#tab5default" data-toggle="tab">Prosedur</a></li>
                                                                          <li><a href="#tab6default" data-toggle="tab">Biaya Tarif / Retribusi</a></li>
                                                                      </ul>
                                                              </div>
                                                              <div class="panel-body">
                                                                  <div class="tab-content">
                                                                      <div class="tab-pane fade in active" id="tab1default">
                                                                        <?= $deskripsi ?>
                                                                      </div>
                                                                      <div class="tab-pane fade" id="tab2default">
                                                                        <?= $dasar_hukum ?>
                                                                      </div>
                                                                      <div class="tab-pane fade" id="tab3default">
                                                                        <?= $persyaratan ?>
                                                                      </div>
                                                                      <div class="tab-pane fade" id="tab5default">
                                                                        <?= $prosedur ?>
                                                                      </div>
                                                                      <div class="tab-pane fade" id="tab6default">
                                                                        <?= $biaya ?>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                </div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
  </div>
