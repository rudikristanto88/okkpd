


            <div class="page_content">

                <section class="fullwidth_section news_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                              <div class="card">
                                <div class="card-body">
                                  <?php
                                    if($this->session->flashdata("status_registrasi") != null){
                                      echo $this->session->flashdata("status_registrasi");
                                    }
                                  ?>
                                  <h4>Lupa sandi</h4>
                                  <span>Silahkan masukkan username (email) anda untuk mereset sandi akun anda</span>
                                  <form class="" action="<?= base_url() ?>home/notifikasi_reset_password" method="post">
                                    <div class="form-container">
                                      <label for="">Email anda</label>
                                      <input type="text" name="username" value="" required class="form-input form-block">
                                    </div>
                                    <div class="form-container">
                                      <div class="g-recaptcha" data-sitekey="6LfOq40UAAAAABPD4hCbtx1hCBxDM1xyG3BQvCLt"></div>
                                    </div>
                                    <div class="form-container">
                                      <button type="submit" class="btn btn-primary btn-block" >Kirim</button>
                                    </div>
                                  </form>


                                </div>
                              </div>

                            </div>
                        </div>
                    </div>
                </section>
</div>
