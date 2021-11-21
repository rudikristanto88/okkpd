<style>
    .basisdata-bg {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("<?= base_url() ?>/assets/image/bg.jpg") center center/cover no-repeat;
        background-color: rgba(255, 0, 0, 0);
    }

    .basisdata-title {
        font-size: 36px;
        color: white;
        line-height: 1.25;
        text-align: center;
        font-weight: bold;
    }
</style>
<div class="basisdata-bg height-100vh vertical-align-center">
    <div class="container" style="max-width:800px">
        <div class="row no-gutters">
            <div class="col-md-12" style="margin-bottom:24px">
                <div class="basisdata-title text-shadow">Selamat Datang Pada Aplikasi Basis Data<br />
                    OKKPD Jawa Tengah</div>
            </div>
            <?php
            $index = 1;
            foreach ($menu as $mn) : ?>
                <div class="col-md-4 <?php if ($index == 1) {
                                            echo "col-md-offset-2";
                                        } ?>">
                    <a href="<?= base_url() ?>index.php/home/basis_data/<?= $mn["url"] ?>">
                        <div class="panel panel-default radius-lg hover">
                            <div class="panel-body text-center font-weight-bold"><?= $mn["title"] ?></div>
                        </div>
                    </a>

                </div>
            <?php $index += 1;
            endforeach; ?>
            <div class="col-md-4 col-md-offset-4">
                <a href="<?= base_url() ?>home">
                    <div class="panel panel-default radius-lg hover">
                        <div class="panel-body text-center font-weight-bold"><i class="fas fa-home"></i> Halaman Utama </div>
                    </div>
                </a>

            </div>
        </div>
    </div>

</div>