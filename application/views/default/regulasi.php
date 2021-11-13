<ol class="breadcrumb">
<li><a href="#">Beranda</a></li>
<li class="active"><a href="#">Regulasi atau Produk Hukum</a></li>
</ol>
<div class="page_content">
    <section class="fullwidth_section news_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sc_section">
                        <div class="sc_content container">
                            <div class="sc_blogger layout_news template_news sc_blogger_horizontal">
                                <div class="columns_wrap">
                                    <div class="container">
                                        <div class="post_item post_item_news sc_blogger_item sc_blogger_item_last">
                                            <h4 class="post_title sc_title sc_blogger_title">Regulasi</h4>
                                            <div class="row">
                                            
                                            <?php
                                            foreach ($produk_hukum as $produk):?>
                                                <div class="col-md-4">
                                                  <div class="card" style="border:1px solid #dddd;border-radius:5px;padding:10px">
                                                    <div class="card-body">
                                                      <h5 class="card-title">  <?php echo $produk['nama_produk_hukum'] ?></h5>
                                                    </div>
                                                    <hr>
                                                    <div class="card-footer">
                                                      <a href="<?= base_url() ?>dokumen/unduh_produk_hukum/<?= $produk['id'] ?> " class="btn btn-info btn-block">UNDUH <i class="fas fa-download"></i></a>
                                                    </div>
                                                  </div>

                                                </div>

                                            <?php endforeach;
                                             ?>
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
