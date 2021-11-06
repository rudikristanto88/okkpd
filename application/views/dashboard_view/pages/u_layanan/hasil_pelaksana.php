<section class="content">
  <div class="container-fluid">
    <div class="block-header">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
                <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Hasil Pelaksana</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <h2 class="card-inside-title">Hasil Pelaksana</h2>

                <div class="row clearfix">
                  <?php foreach ($gambar as $gambar) { ?>
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="body"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $gambar['gambar'] ).'" />'; ?>
                        </div>
                        <div class="footer"><button class="btn btn-default btn-block"><?= $gambar['keterangan'] ?></button></div>
                      </div>
                    </div>
                  <?php }?>


                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Input -->


    </div>

  </div>
</div>

</section>
