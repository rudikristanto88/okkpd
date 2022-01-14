<section class="content">
  <div class="container-fluid">
    <div class="block-header">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
                <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              <li class="breadcrumb-item active">Hasil Inspeksi</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div >
            <div class="body">
              


              <h4 class="card-inside-title">Hasil Lab</h4>
              <br/>
              <?php if($gambar == null){ ?>
                <button type="button" name="button" class="btn btn-warning">Tidak ada dokumen hasil form</button>
              <?php }else{ ?>
                <?php

                foreach ($gambar as $gambar);

                // var_dump($gambar);

                echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $gambar['surat_pengantar_lab'] ).'" alt="Card image">' ?>
              <?php } ?>
              <br/><hr/>



                </div>
              </div>
            </div>
          </div>
          <!-- #END# Input -->


        </div>

      </div>
    </div>

  </section>
