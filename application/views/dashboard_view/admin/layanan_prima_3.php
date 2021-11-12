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
              <li class="breadcrumb-item active">Layanan Prima 3</li>
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
                                <strong>Kontak</strong> Kami</h2>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                                <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-heading">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab1default" data-toggle="tab">Diskripsi</a></li>
                                                <li><a href="#tab2default" data-toggle="tab">Dasar Hukum</a></li>
                                                <li><a href="#tab3default" data-toggle="tab">Persyaratan</a></li>
                                                <li><a href="#tab4default" data-toggle="tab">Formulir</a></li>
                                                <li><a href="#tab5default" data-toggle="tab">Prosedur</a></li>
                                                <li><a href="#tab6default" data-toggle="tab">Biaya Tarif / Retribusi</a></li>
                                            </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">
                                              <form action="admin/info_layanan/prima_3" method="post">

                                              </form>
                                              <textarea id="ckeditor1" name="diskripsi" style="height:500px;"></textarea>
                                            </div>
                                            <div class="tab-pane fade" id="tab2default">
                                              <textarea id="ckeditor2" name="dasar_hukum"></textarea>
                                            </div>
                                            <div class="tab-pane fade" id="tab3default">
                                              <textarea id="ckeditor3" name="persyaratan"></textarea>
                                            </div>
                                            <div class="tab-pane fade" id="tab4default">
                                              <textarea id="ckeditor4" name="formulir"></textarea>
                                            </div>
                                            <div class="tab-pane fade" id="tab5default">
                                              <textarea id="ckeditor5" name="prosedur"></textarea>
                                            </div>
                                            <div class="tab-pane fade" id="tab6default">
                                              <textarea id="ckeditor6" name="biaya"></textarea>
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


</script>
