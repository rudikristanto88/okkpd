<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
            <img class="loading-img-spin" src="<?= base_url() ?>assets/dashboard/images/loading.png" width="20" height="20" alt="admin">
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
                aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?= base_url() ?>dashboard">
                <img src="<?= base_url()?>assets/dashboard/images/jateng.png" alt="" style="width:40px;"/>
                <span class="logo-name">e-OKKPD</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="pull-left">
                <li>
                    <a href="javascript:void(0);" class="sidemenu-collapse">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li>
                    <!-- <div class="search-box">
                        <input type="search" id="search" placeholder="Search..." />
                        <button class="icon">
                            <i class="fa fa-search"></i>
                        </button>
                    </div> -->
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- #END# Full Screen Button -->
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="far fa-bell"></i>
                        <!-- <span class="label-count bg-orange">7</span> -->
                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body" style="width:100%">
                            <ul class="menu">
                              <?php foreach ($notification as $notif) { ?>
                              <li>
                                  <a href="javascript:void(0);">
                                      <span class="icon-circle bg-light-green">
                                          <i class="material-icons">comment</i>
                                      </span>
                                      <span class="menu-info">
                                          <span class="menu-title"><?= $notif['title'] ?></span>
                                          <span class="menu-desc">
                                              <i class="material-icons">access_time</i><?= date('d-m-Y H:i',strtotime($notif['tanggal'])) ?>
                                          </span>
                                      </span>
                                  </a>
                              </li>
                            <?php } ?>

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- #START# Message-->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="far fa-comments"></i>
                        <!-- <span class="label-count bg-green">4</span> -->
                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="header">MESSAGES</li>
                        <li class="body" style="width:100%">
                          <center>0 Pesan</center>
                            <ul class="menu">
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Messages</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Message-->
                <li class="dropdown user_profile">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                      <?php
                      if($foto_profil_saya == '' || $foto_profil_saya == null){
                        echo '<img src="'.base_url().'assets/dashboard/images/profile.png" width="32" height="32" alt="User">';
                      }else{
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $foto_profil_saya ).'"   width="32" height="32" alt="User">';
                      }
                      ?>

                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                                <li>
                                    <a href="<?= base_url() ?>dashboard/profile/<?= $id_profile_saya ?>">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">feedback</i>Feedback
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">help</i>Help
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url("index.php/logout") ?>">

                                        <i class="material-icons">power_settings_new</i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right">
                    <a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                        <i class="fas fa-cog"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
