<?php
$judul_berita = '';
$isi_berita = '';
$gambar = '';
$id_berita = '';

if($jenis == 'ubah'){
  foreach ($berita as $berita) {
    $judul_berita = $berita['judul_berita'];
    $isi_berita = $berita['isi_berita'];
    $id_berita = $berita['id_berita'];
  }
}
 ?>

<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              <li class="breadcrumb-item active">
                <?php
                  if($jenis == 'tambah'){
                    echo 'Tambah Berita';
                  }else{
                    echo 'Ubah Berita';
                  }
                ?>
              </li>
            </ul>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            
            <?php if($datalogin['kode_role'] == 'admin'){ ?>

              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="body">
                      <h2 class="card-inside-title">Kelola Berita</h2>
                      <?php
                      $attribute = array("class"=>"text-black");
                      echo form_open_multipart('admin/insert_berita',$attribute);?>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <div class="input-field">
                              <input name="jenis" type="hidden"  value='<?= $jenis ?>'>
                              <input name="id_berita" type="hidden"  value='<?= $id_berita ?>'>
                              <input id="judul_berita" name="judul_berita" type="text" class="text-white" required data-length="10" value='<?= $judul_berita ?>'>
                              <label for="judul_berita">Judul Berita</label>
                            </div>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                          <label for="judul_berita">Isi Berita</label><br/>
                          <textarea id="ckeditor" name="isi_berita" required> <?= $isi_berita ?></textarea>
                          </div>
                        </div>

                          <div class="row clearfix">
                          <div class="col-sm-6">
                            <div class="input-field">
                              <div class="file-field input-field">
                                  <div class="btn">
                                      <span>Upload Gambar Berita</span>
                                      <input type="file" name="gambar_berita">
                                  </div>
                                  <div class="file-path-wrapper">
                                      <input  class="file-path validate text-white" type="text" placeholder="Gambar Berita">
                                  </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-12">
                            <div class="form-group">
                              <button type="submit " class="btn btn-info waves-effect" name="button">Simpan</button>
                            </div>
                          </div>
                          </div>


                      </form>

                    </div>
                  </div>
                </div>
              </div>



            <?php }else{echo "Anda tidak diijinkan untuk mengakses halaman ini";}?>
          </div>
        </div>





    </div>

    <!-- Widgets -->

    <!-- #END# Widgets -->

  </div>
</section>

<script type="text/javascript">
let editor
ClassicEditor
    .create( document.querySelector( '#ckeditor' ) )
    .then(newEditor =>{
      editor = newEditor;
    })
    .catch( error => {
        console.error( error );
    } );

</script>
