

<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                          <?php
                          if($foto_profil_saya == '' || $foto_profil_saya == null){
                            echo '<img src="'.base_url().'assets/dashboard/images/profile.png" class="img-circle user-img-circle" alt="User Image" />';
                          }else{
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $foto_profil_saya ).'"  class="img-circle user-img-circle" alt="User Image">';
                          }
                          ?>

                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="sidebar-userpic-name"> <?= $datalogin['nama_lengkap'] ?> </div>
                        <div class="profile-usertitle-job "><?= $datalogin['nama_role'] ?> </div>
                    </div>
                    <!-- <div class="sidebar-userpic-btn">
                        <a class="tooltips" href="pages/examples/profile.html" data-toggle="tooltip" title="Profile">
                            <i class="far fa-user sidebarQuickIcon"></i>
                        </a>
                        <a class="tooltips" href="pages/email/inbox.html" data-toggle="tooltip" title="Mail">
                            <i class="far fa-envelope sidebarQuickIcon"></i>
                        </a>
                        <a class="tooltips" href="pages/apps/chat.html" data-toggle="tooltip" title="Chat">
                            <i class="far fa-comment-alt sidebarQuickIcon"></i>
                        </a>
                        <a class="tooltips" href="<?= base_url("index.php/logout") ?>" data-toggle="tooltip" title="Logout">
                            <i class="fas fa-sign-out-alt sidebarQuickIcon"></i>
                        </a>
                    </div> -->
                </li>
                <li class="header"></li>
                  <hr/>
                <li>
                    <a href="<?= base_url() ?>dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <?php
                  foreach ($this->menu as $menu) { ?>
                    <li>
                        <?php if($menu['has_child']=="yes"){
                          echo '<a href="javascript:void(1);" class="menu-toggle"><i class="far fa-circle"></i><span>'.$menu["nama_menu"].'</span></a>'; ?>
                          <ul class="ml-menu">
                            <?php foreach ($this->menu as $child) {
                              if($child['parent'] == $menu['id_menu']){
                                echo '<li>

                                    <a href="'.base_url().'dashboard/'.$child['slug'].'"><i class="fas fa-caret-right"></i><span>'.$child["nama_menu"].'</span></a>
                                </li>';
                              }
                            } ?>
                          </ul>
                  <?php }else if($menu['parent']==0){
                          echo '<a href="'.base_url().'dashboard/'.$menu['slug'].'"><i class="far fa-circle"></i><span>'.$menu["nama_menu"].'</span></a>';
                        } ?>

                    </li>


                  <?php }
                  ?>

                  <!-- <li>
                      <a href="<?= base_url() ?>dashboard/pendaftaran">
                          <i class="far fa-calendar"></i>
                          <span>Pendaftaran Layanan</span>
                      </a>
                  </li> -->
                <!-- <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fas fa-mail-bulk"></i>
                        <span>Email</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/email/inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="pages/email/compose.html">Compose</a>
                        </li>
                        <li>
                            <a href="pages/email/view-mail.html">Read Email</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fab fa-google-play"></i>
                        <span>Apps</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/apps/chat.html">Chat</a>
                        </li>
                        <li>
                            <a href="pages/apps/contact_list.html">Contact List</a>
                        </li>
                        <li>
                            <a href="pages/apps/contact_grid.html">Contact Grid</a>
                        </li>
                        <li>
                            <a href="pages/apps/support.html">Support</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="pages/widgets/widget.html">
                        <i class="fas fa-braille"></i>
                        <span>Widgets</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fas fa-drafting-compass"></i>
                        <span>User Interface (UI)</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/ui/alerts.html">Alerts</a>
                        </li>
                        <li>
                            <a href="pages/ui/animations.html">Animations</a>
                        </li>
                        <li>
                            <a href="pages/ui/badges.html">Badges</a>
                        </li>


                        <li>
                            <a href="pages/ui/buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="pages/ui/collapse.html">Collapse</a>
                        </li>
                        <li>
                            <a href="pages/ui/dialogs.html">Dialogs</a>
                        </li>
                        <li>
                            <a href="pages/ui/cards.html">Cards</a>
                        </li>
                        <li>
                            <a href="pages/ui/icons.html">Icons</a>
                        </li>
                        <li>
                            <a href="pages/ui/labels.html">Labels</a>
                        </li>
                        <li>
                            <a href="pages/ui/list-group.html">List Group</a>
                        </li>
                        <li>
                            <a href="pages/ui/media-object.html">Media Object</a>
                        </li>
                        <li>
                            <a href="pages/ui/notifications.html">Notifications</a>
                        </li>
                        <li>
                            <a href="pages/ui/preloaders.html">Preloaders</a>
                        </li>
                        <li>
                            <a href="pages/ui/progressbars.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="pages/ui/range-sliders.html">Range Sliders</a>
                        </li>
                        <li>
                            <a href="pages/ui/sortable-nestable.html">Sortable &amp; Nestable</a>
                        </li>
                        <li>
                            <a href="pages/ui/tabs.html">Tabs</a>
                        </li>
                        <li>
                            <a href="pages/ui/thumbnails.html">Thumbnails</a>
                        </li>
                        <li>
                            <a href="pages/ui/waves.html">Waves</a>
                        </li>
                        <li>
                            <a href="pages/ui/typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="pages/ui/helper-classes.html">Helper Classes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fab fa-wpforms"></i>
                        <span>Forms</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/forms/basic-form-elements.html">Basic Form Elements</a>
                        </li>
                        <li>
                            <a href="pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                        </li>
                        <li>
                            <a href="pages/forms/form-examples.html">Form Examples</a>
                        </li>
                        <li>
                            <a href="pages/forms/form-validation.html">Form Validation</a>
                        </li>
                        <li>
                            <a href="pages/forms/form-wizard.html">Form Wizard</a>
                        </li>
                        <li>
                            <a href="pages/forms/editors.html">Editors</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fas fa-table"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/tables/normal-tables.html">Normal Tables</a>
                        </li>
                        <li>
                            <a href="pages/tables/jquery-datatable.html">Advance Datatables</a>
                        </li>
                        <li>
                            <a href="pages/tables/group-table.html">Grouping</a>
                        </li>
                        <li>
                            <a href="pages/tables/editable-table.html">Editable Tables</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="far fa-images"></i>
                        <span>Medias</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/medias/image-gallery.html">Image Gallery</a>
                        </li>
                        <li>
                            <a href="pages/medias/carousel.html">Carousel</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fas fa-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/charts/morris.html">Morris</a>
                        </li>
                        <li>
                            <a href="pages/charts/flot.html">Flot</a>
                        </li>
                        <li>
                            <a href="pages/charts/chartjs.html">ChartJS</a>
                        </li>
                        <li>
                            <a href="pages/charts/sparkline.html">Sparkline</a>
                        </li>
                        <li>
                            <a href="pages/charts/jquery-knob.html">Jquery Knob</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="far fa-file-alt"></i>
                        <span>Example Pages</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/examples/timeline.html">Timeline</a>
                        </li>
                        <li>
                            <a href="<?= base_url("dashboard/sign-in") ?>">Sign In</a>
                        </li>
                        <li>
                            <a href="pages/examples/sign-up.html">Sign Up</a>
                        </li>
                        <li>
                            <a href="pages/examples/forgot-password.html">Forgot Password</a>
                        </li>
                        <li>
                            <a href="pages/examples/profile.html">Profile</a>
                        </li>
                        <li>
                            <a href="pages/examples/pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="pages/examples/invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="pages/examples/faqs.html">Faqs</a>
                        </li>
                        <li>
                            <a href="pages/examples/blank.html">Blank Page</a>
                        </li>
                        <li>
                            <a href="pages/examples/locked.html">Locked</a>
                        </li>
                        <li>
                            <a href="pages/examples/404.html">404 - Not Found</a>
                        </li>
                        <li>
                            <a href="pages/examples/500.html">500 - Server Error</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fas fa-globe-americas"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="pages/maps/google.html">Google Map</a>
                        </li>
                        <li>
                            <a href="pages/maps/jqvmap.html">Vector Map</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="fas fa-angle-double-down"></i>
                        <span>Multi Level Menu</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Menu Item</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Menu Item - 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Level - 2</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Menu Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>Level - 3</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span>Level - 4</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation">
                <a href="#skins" data-toggle="tab" class="active">SKINS</a>
            </li>
            <li role="presentation">
                <a href="#settings" data-toggle="tab">SETTINGS</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">
                    <div class="rightSetting">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list list-unstyled m-t-20">
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Save
                                            History
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Auto
                                            Submit Issue
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status To All
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p>SIDEBAR MENU COLORS</p>
                        <button type="button" class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">Light</button>
                        <button type="button" class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                    </div>
                    <div class="rightSetting">
                        <p>SKINS</p>
                        <ul class="demo-choose-skin choose-theme list-unstyled">
                            <li data-theme="black" class="actived">
                                <div class="black-theme"></div>
                            </li>
                            <li data-theme="white">
                                <div class="white-theme white-theme-border"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple-theme"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue-theme"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan-theme"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green-theme"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange-theme"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p>Disk Space</p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar"
                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <small>26% remaining</small>
                            </span>
                        </div>
                    </div>
                    <div class="rightSetting">
                        <p>Server Load</p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-orange shadow-style width-per-63" role="progressbar"
                                    aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <small>Highly Loaded</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane stretchRight" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-green"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-blue"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-purple"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-cyan"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-red"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-lime"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</div>
