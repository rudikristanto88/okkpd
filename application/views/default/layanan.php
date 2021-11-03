<ol class="breadcrumb">
    <li><a href="<?= base_url(); ?>home">Beranda</a></li>
    <li>Info Layanan</li>
</ol>

<div>
    <section class="container">
        <div class="row">
            <?php foreach ($layanan as $info) : ?>
                <div class="col-sm-6 col-md-4 col-lg-4" style="min-height:400px">
                    <div class="post_item post_item_news sc_blogger_item">
                        <div class="post_featured">
                            <div class="post_thumb">
                                <img alt="Supply Chain Security" src="<?= base_url() ?>assets/image/layanan/<?= $info['kode_layanan'] ?>.png">
                                <div class="hover_wrap">
                                    <div class="link_wrap">
                                        <a class="hover_link icon-link" href="<?= base_url(); ?>home/info_layanan/<?= $info['kode_layanan'] ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="font-size:20px;font-weight:bold"><?= $info["nama_layanan"] ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
