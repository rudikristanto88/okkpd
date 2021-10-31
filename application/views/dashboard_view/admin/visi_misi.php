<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
              <a href="<?=base_url()?>dashboard">
                <i class="material-icons">home</i>
                Home</a>
              </li>
              <li class="breadcrumb-item active">Visi Misi</li>
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
                                <strong>Visi</strong> Misi</h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= base_url('admin/tambah_visi_misi') ?>">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                          <?php foreach ($visi as $data) ; ?>

                          <div class="row">
                            <?php
                            $attribute = array('style'=>'color:black');
                            echo form_open_multipart('admin/insert_visi_misi',$attribute); ?>
                              <div class="col-md-12">
                                <textarea name="visi_misi" id="ckeditor" style="height:500px;color:black"><?php if($visi != null){echo $data['visi_misi'];}else{echo '';}?></textarea>
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
  // function setDataSampling(id,deskripsi,status,id_layanan){
  //   $("#ckeditor").val(deskripsi);
  //   $("#status").val(status);
  //   $("#id_sampling").val(id);
  //   $("#id_layanan").val(id_layanan);
  //
  //   if(status == ''){
  //     editor.isReadOnly = false;
  //     $('#status_teks').html('')
  //   }else if(status == '0'){
  //     editor.isReadOnly = true;
  //     $('#status_teks').html('<span class="alert alert-info">Menunggu</span>')
  //   }else if(status == '1'){
  //     editor.isReadOnly = false;
  //     $('#status_teks').html('<span class="alert alert-warning">Ditolak</span>')
  //   }else if(status == '2'){
  //     editor.isReadOnly = true;
  //     $('#status_teks').html('<span class="alert alert-success">Diterima</span>')
  //   }
  //   editor.setData(deskripsi);
  //
  // }
</script>
