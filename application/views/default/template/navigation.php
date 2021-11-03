<div class="top_panel_fixed_wrap"></div>
<header class="top_panel_wrap">
    <div class="menu_main_wrap logo_left menu_show">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url(); ?>home">
                    <img src="<?= base_url() ?>assets/default/images/icon/logo.png" class="logo_main" alt="">
                    <span class="logo_info"></span>
                </a>
            </div>
            <div class="menu_main">
                <nav class="menu_main_nav_area">
                    <ul id="menu_main" class="menu_main_nav">
                        <li class="menu-item">
                            <a href="<?= base_url(); ?>home" class="sf-with-ul">Beranda</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#" class="sf-with-ul">Tentang Kami</a>
                            <ul class="sub-menu">
                                <li><a class="menu_item" href="<?= base_url(); ?>home/visi_misi">Visi Misi</a></li>
                                <li><a class="menu_item" href="<?= base_url(); ?>home/struktur_organisasi">Struktur Organisasi</a></li>
                                <li><a class="menu_item" href="<?= base_url(); ?>home/maklumat">Maklumat</a></li>
                                <li><a class="menu_item" href="<?= base_url(); ?>home/tugas_fungsi">Tugas dan Fungsi</a></li>
                                <li><a class="menu_item" href="<?= base_url(); ?>home/legalitas">Legalitas</a></li>

                            </ul>
                        </li>

                        <li class="menu-item">
                            <a href="<?= base_url(); ?>home/info_layanan">Info Layanan</a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url(); ?>home/basis_data">Basis Data</a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url(); ?>home/hubungi_kami">Kontak Kami</a>
                        </li>
                        <li class="menu-item">
                            <?php if ($islogin) {
                                echo "<a href='" . base_url() . "dashboard'>Dashboard</a>";
                            } else {
                                echo "<a href='" . base_url() . "home/pendaftaran_online'>Login Pelaku Usaha</a>";
                            } ?>
                        </li>

                    </ul>
                </nav>
                <a href="#" class="menu_main_responsive_button icon-menu"></a>
            </div>
        </div>
    </div>
</header>