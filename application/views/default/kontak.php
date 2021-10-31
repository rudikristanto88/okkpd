<?php
foreach ($footer as $data);
?>
<section class="fullwidth_section no_padding_top_container news_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="sc_section">
                    <div class="sc_section_overlay">
                        <div class="sc_section_content">
                            <div class="sc_content container">
                                <div class="">
                                    <div class="sc_contact_form_left">
                                        <div class="sc_contact_info">
                                            <div class="sc_contact_form_address_wrap">
                                                <div class="sc_contact_form_address_field">
                                                    <span class="sc_contact_form_address_data">
                                                      <h4>Alamat Kantor</h4>
                                                      <?php if($footer != null){ echo $data['alamat']; }else{ echo '-'; } ?>
                                                    </span>
                                                </div>
                                                  <div class="sc_contact_form_address_field">
                                                      <span class="sc_contact_form_address_label">Telpon:</span>
                                                      <span class="sc_contact_form_address_data"><?php if($footer != null){ echo $data['nomor_telepon']; }else{ echo '-'; } ?></span>
                                                  </div>
                                                  <div class="sc_contact_form_address_field">
                                                      <span class="sc_contact_form_address_label">e-mail: </span>
                                                      <span class="sc_contact_form_address_data"><?php if($footer != null){ echo $data['email']; }else{ echo '-'; } ?></span>
                                                  </div>
                                                  <div class="sc_contact_form_address_field">
                                                      <span class="sc_contact_form_address_label">
                                                        <img height="34" width="34" src="<?= base_url() ?>assets/default/WhatsApp_Logo_1.png" alt="Img WA">
                                                      </span>
                                                      <span class="sc_contact_form_address_data"><?php if($footer != null){ echo $data['whatsapp']; }else{ echo '-'; } ?></span>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sc_contact_form_right">
                                      <?php
                                        if($this->session->flashdata("status") != null){
                                          echo $this->session->flashdata("status");
                                        }
                                      ?>
                                      <p class="sc_contact_form_description" style="color:black">Alamat email tidak akan ditampilkan. <br/>Bagian yang ditandai * harus diisi</p>
                                      <form class="" data-formtype="contact" action="<?= base_url() ?>home/kontak_kami" method="post">
                                        <div class="form-container">
                                          <input type="text" required name="nama" value="" class="form-input form-block" placeholder="Nama*">
                                        </div>
                                        <div class="form-container">
                                          <input type="email" required name="email" value="" class="form-input form-block" placeholder="Email*">
                                        </div>
                                        <div class="form-container">
                                          <input type="text" required name="judul" value="" class="form-input form-block" placeholder="Judul*">
                                        </div>
                                        <div class="form-container">
                                          <textarea name="pesan" required rows="8" class="form-input form-block" placeholder="Pesan*"></textarea>
                                        </div>
                                        <div class="form-container">
                                          <div class="g-recaptcha" data-sitekey="6LfOq40UAAAAABPD4hCbtx1hCBxDM1xyG3BQvCLt"></div>
                                        </div>


                                        <div class="form-container">
                                          <button type="submit" class="btn btn-primary btn-block" >Kirim</button>
                                        </div>
                                      </form>



                                        <!-- <p class="sc_contact_form_description" style="color:black">Alamat email tidak akan ditampilkan. Bagian yang ditandai * harus diisi</p>
                                        <form class="" action="<?= base_url() ?>home/kontak" method="post">

                                            <div class="sc_contact_form_info">
                                                <div class="sc_contact_form_item sc_contact_form_field label_over">
                                                    <label class="required" for="sc_contact_form_username">Nama *</label>
                                                    <input id="sc_contact_form_username" type="text" name="nama" placeholder="Nama *">
                                                </div>
                                                <div class="sc_contact_form_item sc_contact_form_field label_over">
                                                    <label class="required" for="sc_contact_form_email">E-mail *</label>
                                                    <input id="sc_contact_form_email" type="text" name="email" placeholder="Email *">
                                                </div>
                                                <div class="sc_contact_form_item sc_contact_form_field label_over">
                                                    <label class="required" for="sc_contact_form_subj">Judul *</label>
                                                    <input id="sc_contact_form_subj" type="text" name="judul" placeholder="Judul *">
                                                </div>
                                            </div>
                                            <div class="sc_contact_form_item sc_contact_form_message label_over">
                                                <label class="required" for="sc_contact_form_message">Pesan *</label>
                                                <textarea id="sc_contact_form_message" name="pesan" placeholder="Pesan *"></textarea>
                                            </div>
                                            <div class="sc_contact_form_item sc_contact_form_button">
                                                <button type="submit" name="button">
                                                    Kirim Pesan
                                                    <span class="icon-mail-alt"></span>
                                                </button>
                                            </div>
                                            <div class="result sc_infobox"></div>
                                        </form> -->
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
