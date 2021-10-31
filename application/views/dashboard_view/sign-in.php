<script type="text/javascript" src="<?= base_url() ?>assets/jquery.captcha.basic.min.js"></script>

<body class="login-page">
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form method="post" id="my-form" action="<?= base_url() ?>dashboard/verifikasi_pengurus">
					<span class="login100-form-logo">
						<img alt="" src="<?= base_url()?>assets/dashboard/images/jateng.png">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<?php
						if($this->session->flashdata("status") != null){
							echo $this->session->flashdata("status");
						}
					?>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<i class="material-icons focus-input1001">person</i>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<i class="material-icons focus-input1001">lock</i>
					</div>
					<div class="wrap-input100 validate-input">

					</div>

						<div class="form-group">
							<label for="role">Masuk Sebagai</label>

								<select class='form-control' style="color:white" name="role" id="role" required >
									<?php foreach ($role as $role) : ?>
										<option value="<?= $role['kode_role'] ?>"  style="color:black"><?= $role['nama_role'] ?></option>
									<?php endforeach; ?>
								</select>


						</div>




					<!-- <div class="contact100-form-checkbox">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value=""> Remember me
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
					</div> -->
					<div class="container-login100-form-btn">
						<input type="submit" style="margn-top:12px;" class="btn btn-info btn-block" name="" value="Login">
					</div>
					<div class="text-center p-t-50">
						<span>Hubungi admin apabila lupa kata sandi anda</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
  $(document).ready(function(){
    $('#my-form').captcha();
  });
</script>
