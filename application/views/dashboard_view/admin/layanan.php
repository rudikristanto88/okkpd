<?php
$deskripsi = "";
$dasar_hukum = "";
$persyaratan = "";
$prosedur = "";
$biaya = "";

foreach ($info_layanan as $info) {
  $deskripsi = $info['deskripsi'];
  $dasar_hukum = $info['dasar_hukum'];
  $persyaratan = $info['persyaratan'];
  $prosedur = $info['prosedur'];
  $biaya = $info['biaya'];
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
              <li class="breadcrumb-item active">Info Layanan</li>
              <li class="breadcrumb-item active"> <?= $layanan   ?></li>
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
                      <?php if($this->session->flashdata('status')!= ""){
                        echo $this->session->flashdata('status');
                      } ?>
                        <div class="header">
                            <h2>
                                <strong>Info</strong> Layanan</h2>

                        </div>
                        <div class="row">
                          <div class="col-md-12">
                                <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-heading">
                                            <ul class="nav nav-tabs">
                                                <li class="active text-white"><a href="#tab1default" data-toggle="tab">Deskripsi</a></li>
                                                <li><a href="#tab2default" data-toggle="tab">Dasar Hukum</a></li>
                                                <li><a href="#tab3default" data-toggle="tab">Persyaratan</a></li>
                                                <li><a href="#tab4default" data-toggle="tab">Prosedur</a></li>
                                                <li><a href="#tab5default" data-toggle="tab">Biaya Tarif / Retribusi</a></li>
                                            </ul>
                                    </div><br/>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">
                                              <form action="<?= base_url() ?>admin/info_layanan/<?= $jenis ?>/deskripsi" method="post">
                                                <textarea id="ckeditor1" name="deskripsi"><?= $deskripsi ?></textarea><br/>
                                                <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                              </form>
                                            </div>
                                            <div class="tab-pane fade" id="tab2default">
                                              <form action="<?= base_url() ?>admin/info_layanan/<?= $jenis ?>/dasar_hukum" method="post">
                                                <textarea id="ckeditor2" name="dasar_hukum"><?= $dasar_hukum ?></textarea><br/>
                                                <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                              </form>
                                            </div>
                                            <div class="tab-pane fade" id="tab3default">
                                              <form action="<?= base_url() ?>admin/info_layanan/<?= $jenis ?>/persyaratan" method="post">
                                                <textarea id="ckeditor3" name="persyaratan"><?= $persyaratan ?></textarea><br/>
                                                <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                              </form>
                                            </div>
                                            <div class="tab-pane fade" id="tab4default">
                                              <form action="<?= base_url() ?>admin/info_layanan/<?= $jenis ?>/prosedur" method="post">
                                                <textarea id="ckeditor4" name="prosedur"><?= $prosedur ?></textarea><br/>
                                                <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                              </form>
                                            </div>
                                            <div class="tab-pane fade" id="tab5default">
                                              <form action="<?= base_url() ?>admin/info_layanan/<?= $jenis ?>/biaya" method="post">
                                                <textarea id="ckeditor5" name="biaya"><?= $biaya ?></textarea><br/>
                                                <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                              </form>
                                            </div>

                                        </div>
                                    </div>
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
  </div>
</div>
</div>

</section>

<script type="text/javascript">
let editor1
ClassicEditor.create( document.querySelector( '#ckeditor1' )).then(newEditor =>{
  editor1 = newEditor;
}).catch( error => {
  console.error( error );
});

let editor2
ClassicEditor.create( document.querySelector( '#ckeditor2' )).then(newEditor =>{
  editor2 = newEditor;
}).catch( error => {
  console.error( error );
});

let editor3
ClassicEditor.create( document.querySelector( '#ckeditor3' )).then(newEditor =>{
  editor3 = newEditor;
}).catch( error => {
  console.error( error );
});

let editor4
ClassicEditor.create( document.querySelector( '#ckeditor4' )).then(newEditor =>{
  editor4 = newEditor;
}).catch( error => {
  console.error( error );
});

let editor5
ClassicEditor.create( document.querySelector( '#ckeditor5' )).then(newEditor =>{
  editor5 = newEditor;
}).catch( error => {
  console.error( error );
});


</script>
