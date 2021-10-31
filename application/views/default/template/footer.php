<?php
foreach ($footer as $data) {
}
//
// foreach ($link as $tautan) {
// }
?>

<section class="fullwidth_section no_padding_top_container dark_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="sc_section">
                    <div class="sc_section_overlay">
                        <div class="sc_section_content">
                            <div class="sc_content container">
                                <div class="sc_contact_form sc_contact_form_standard">
                                    <div class="sc_contact_form_left">
                                        <div class="sc_contact_info">
                                            <h6 class="sc_contact_form_subtitle">e-OKKPD <br>Provinsi Jawa Tengah</h6>
                                            <h2 class="sc_contact_form_title">Kontak Kami</h2>
                                            <!-- <div class="sc_contact_form_address_wrap">
                                                <div class="sc_contact_form_address_field">
                                                    <span class="sc_contact_form_address_data">
                                                        <p><?php if(isset($data)){echo $data['alamat'];} ?></p>
                                                    </span>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="sc_contact_info_bottom">
                                            <div class="sc_contact_form_address_wrap">
                                              <div class="sc_contact_form_address_field">
                                                  <span class="sc_contact_form_address_label">Alamat:</span>
                                                  <span class="sc_contact_form_address_data"><?php if(isset($data)){echo $data['alamat'];} ?></span>
                                              </div>
                                                <div class="sc_contact_form_address_field">
                                                    <span class="sc_contact_form_address_label">Telpon:</span>
                                                    <span class="sc_contact_form_address_data"><?php if(isset($data)){echo $data['nomor_telepon'];} ?></span>
                                                </div>
                                                <div class="sc_contact_form_address_field">
                                                    <span class="sc_contact_form_address_label">e-mail: </span>
                                                    <span class="sc_contact_form_address_data"><?php if(isset($data)){echo $data['email'];} ?></span>
                                                </div>
                <div class="sc_contact_form_address_field">
                                                    <span class="sc_contact_form_address_label">
                  <img height="34" width="34" src="<?= base_url() ?>assets/default/WhatsApp_Logo_1.png" alt="Img WA">
                  </span>
                                                    <span class="sc_contact_form_address_data"><?php if(isset($data)){echo $data['whatsapp'];} ?></span>
                                                </div>

                                            </div>
                                            <div class="sc_socials sc_socials_size_small  color_icons">
                                                <div class="sc_socials_item">
                                                    <a href="https://twitter.com/<?php if(isset($data)){echo $data['twitter'];} ?>" target="_blank" class="social_icons social_twitter icons">
                                                      <i class="fab fa-twitter" style="color:white"></i>

                                                    </a>
                                                </div>
                                                <div class="sc_socials_item">
                                                    <a href="https://www.facebook.com/<?php if(isset($data)){echo $data['facebook'];} ?>" target="_blank" class="social_icons social_facebook icons">
                                                        <i class="fab fa-facebook" style="color:white"></i>
                                                    </a>
                                                </div>
                                                <div class="sc_socials_item">
                                                    <a href="https://www.instagram.com/<?php if(isset($data)){echo $data['instagram'];} ?>" target="_blank" class="social_icons social_gplus icons">
                                                      <i class="fab fa-instagram" style="color:white"></i>
                                                        <!-- <span class="sc_socials_hover icon-gplus"></span> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sc_contact_form_right">
                                        <h3 class="sc_contact_form_title">Tautan Terkait</h3>
                                        <?php $i=1; foreach ($link as $tautan) : ?>
                                          <a href="http://<?= $tautan['alamat_tautan']?>" target="_blank"><?= $tautan['nama_tautan']?></a><br>
                                        <?php $i++;endforeach; ?>
                                        <a href="<?= base_url() ?>dashboard/sign_in" target="_blank">Login Dinas</a><br>
                                        <?php if( $panduan != null){ ?>
                                        <a href="<?= base_url() ?>Dokumen/unduh_panduan" target="_blank">Download Panduan</a><br>
                                        <?php }?>
                                        

                                        <!-- <a href="http://dishanpan.jatengprov.go.id/" target="_blank">Dinas Ketahanan Pangan Provinsi Jateng</a><br>
                                        <a href="http://bkp.pertanian.go.id/" target="_blank">BKP Kementan RI</a><br>
                                        <a href="http://www.pertanian.go.id/" target="_blank">Kementan RI</a><br>
                                        <a href="https://laporgub.jatengprov.go.id/" target="_blank">Lapor Gubernur</a> -->
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

<section class="copyright_wrap fullwidth_section dark_section">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <p>Copyright 2018 Otoritas Kompeten Keamanan Pangan Daerah (OKKP-D) Jawa Tengah.</a>
                </p>
                <span>Developed by Suprihadi@uksw.edu</span>
            </div>
        </div>
    </div>
</div>
</section>

</div>

</div>

<div class="preloader">
    <div class="preloader_image"></div>
</div>

    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/vendor/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/vendor/jquery.timeline.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/vendor/revslider/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/vendor/revslider/js/jquery.themepunch.revolution.min.js"></script>

    <!--<script type="text/javascript" src="custom_tools/js/front.customizer.js"></script>
    <script type="text/javascript" src="custom_tools/js/skin.customizer.js"></script>-->

    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/_packed.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/shortcodes.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/_main.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/vendor/jquery.formstyler.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/vendor/jquery.validate.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/vendor/logical.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/default/js/custom.js"></script>


</body>
</html>
