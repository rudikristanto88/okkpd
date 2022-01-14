<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <ul class="breadcrumb breadcrumb-style">
      <li class="breadcrumb-item 	bcrumb-1">
        <a href="index.html">
          <i class="material-icons">home</i>
          Beranda</a>
        </li>
        
      </ul>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      
      <?php if($datalogin['punya_usaha'] == 0 && $datalogin['kode_role'] == 'pelaku'){ ?>
        <span>Pendaftaran Layanan BPMKP</span><br/>
        <a href="<?= base_url()?>dashboard/daftar_usaha" id="btn-daftar" class="btn btn-info">Isi Identitas Usaha Anda</a>
      <?php }else if($datalogin['punya_usaha'] == 1 && $datalogin['kode_role'] == 'pelaku'){ ?>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <a href="<?= base_url('dashboard/daftar/prima_3') ?>">
                <div class="image-200">
                  <img class="card-img-top " src="https://vignette.wikia.nocookie.net/geometry-wars/images/0/0e/Camera_icon.png/revision/latest?cb=20151005154117" alt="Card image">
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="card-title">Pendaftaran PRIMA 3</h4>
                  </div>
                </div>
              </a>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <a href="#">
                <div class="image-200">
                  <img class="card-img-top " src="https://vignette.wikia.nocookie.net/geometry-wars/images/0/0e/Camera_icon.png/revision/latest?cb=20151005154117" alt="Card image">
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="card-title">Pendaftaran PRIMA 2</h4>
                  </div>
                </div>
              </a>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <a href="#">
                <div class="image-200">
                  <img class="card-img-top " src="https://vignette.wikia.nocookie.net/geometry-wars/images/0/0e/Camera_icon.png/revision/latest?cb=20151005154117" alt="Card image">
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="card-title">Pendaftaran PSAT</h4>
                  </div>
                </div>
              </a>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <a href="#">
                <div class="image-200">
                  <img class="card-img-top " src="https://vignette.wikia.nocookie.net/geometry-wars/images/0/0e/Camera_icon.png/revision/latest?cb=20151005154117" alt="Card image">
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="card-title">Pendaftaran Rumah Kemas</h4>
                  </div>
                </div>
              </a>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <a href="#">
                <div class="image-200">
                  <img class="card-img-top " src="https://vignette.wikia.nocookie.net/geometry-wars/images/0/0e/Camera_icon.png/revision/latest?cb=20151005154117" alt="Card image">
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="card-title">Pendaftaran Health Care</h4>
                  </div>
                </div>
              </a>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <a href="#">
                <div class="image-200">
                  <img class="card-img-top " src="https://vignette.wikia.nocookie.net/geometry-wars/images/0/0e/Camera_icon.png/revision/latest?cb=20151005154117" alt="Card image">
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="card-title">Pendaftaran Hygiene Sanitation</h4>
                  </div>
                </div>
              </a>

            </div>
          </div>
        </div>



      <?php }else{
        echo "asdkajsdl";
      }?>
    </div>
  </div>
