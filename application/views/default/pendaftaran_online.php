<div class="page_content">

  <section class="fullwidth_section news_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="card">
            <div class="card-body">
              <h4>User Account</h4>

              <div class="row">
                <form class="" id="my-form" action="<?= base_url("verifikasi") ?>" method="post">
                  <div class="col-md-12 form-container">
                    <label for="">Username</label>
                    <input type="text" name="username" value="" required class="form-input form-block">
                  </div>
                  <div class="col-md-12 form-container" style="margin-bottom:12px">
                    <label for="">Password</label>
                    <input type="password" name="password" value="" required class="form-input form-block">
                  </div>
                  <div class="col-md-12">
                    <input type="submit" style="margin-top:12px;" class="btn btn-primary btn-block" name="" value="Login">
                  </div>
                </form>
              </div>
              <br />
              <span>Belum punya akun? <a href="<?= base_url('sign_up') ?>"><b>Buat akun</b></a></span><br />
              <span><a href="<?= base_url() ?>home/lupa_sandi">Lupa detail informasi masuk</a></span>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#my-form').captcha();
  });
</script>