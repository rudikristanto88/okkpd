<?php if($send == true): ?>
<div class="container" style="margin-top:100px">
  <div class="row">
    <div class="col-md-6 col-md-offset-3" style="text-align:center">
      <div class="">
        <i class="far fa-check-circle" style="font-size: 7em; color: #2ecc71;"></i>
      </div><br/><br/>
      <div class="">
        <?= $kata; ?><br/><br/><br/><br/>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<div class="page_content">

    <section class="fullwidth_section news_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <div class="card">
                    <div class="card-body">
                      <?php
                        if($this->session->flashdata("status") != null){
                          echo $this->session->flashdata("status");
                        }
                      ?>
                      <h4>Reset Ulang Sandi</h4>
                      <span>Silahkan masukkan ulang kata sandi baru anda</span>
                      <form class="" action="<?= base_url() ?>home/reset_password/send" method="post">
                        <div class="form-container">
                          <label for="">Password Baru</label>
                          <input type="hidden" name="verify" value="<?= $verify ?>" required class="form-input form-block">
                          <input type="password" name="password_baru" value="" required class="form-input form-block">
                        </div>
                        <div class="form-container">
                          <label for="">Ulangi Password</label>
                          <input type="password" name="ulang_password" value="" required class="form-input form-block">
                        </div>

                        <div class="form-container">
                          <button type="submit" class="btn btn-primary btn-block" >Reset</button>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
            </div>
        </div>
    </section>
</div>
<?php endif; ?>
