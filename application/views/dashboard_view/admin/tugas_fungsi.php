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
              <li class="breadcrumb-item active">Tugas & Fungsi</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Tugas</strong> dan Fungsi</h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url('admin/tambah_tugas') ?>">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                          <?php foreach ($tugas as $tugas) ; ?>

                          <div class="row">
                            <?php
                            $attribute = array('style'=>'color:black');
                            echo form_open_multipart('admin/insert_tugas_fungsi',$attribute); ?>
                              <div class="col-md-12">
                                <textarea name="tugas_fungsi" id="ckeditor" style="height:500px;color:black"><?php if($tugas != null){echo $tugas['tugas_fungsi'];}?></textarea>
                                <br/><button class='btn btn-info text-white'>Simpan</button></a>

                              </div>

                            </form>

                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->


          </div>
        </div>
      </div>
    </div>
    <!-- #END# Input -->


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
