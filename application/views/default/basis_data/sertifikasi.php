<style>
    .basisdata-bg {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("<?= base_url() ?>/assets/image/bg.jpg") center center/cover no-repeat;
        background-color: rgba(255, 0, 0, 0);
    }
</style>
<nav class="navbar  navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>home/basis_data"><i class="fas fa-arrow-left"></i></a>

            <span class="navbar-brand" href="#">REGISTRASI/SERTIFIKASI</span>
        </div>
    </div>
</nav>
<div class="basisdata-bg height-100vh vertical-align-center">
    <div class="container" style="margin-top:100px;margin-bottom:50px">
        <div class="row no-gutters">
            <?php foreach ($submenu as $sub) : ?>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="post_item post_item_news sc_blogger_item">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <img alt="Supply Chain Security" src="<?= base_url() ?>assets/image/layanan/<?= $sub['url'] ?>.png">
                                        <div class="hover_wrap">
                                            <div class="link_wrap">
                                                <a class="hover_link icon-link" href="<?= base_url() ?>home/basis_data/<?= $menu ?>/<?= $sub['url'] ?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="font-size:20px;font-weight:bold;text-align:center;color:black"><?= $sub["title"] ?></div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </div>

</div>