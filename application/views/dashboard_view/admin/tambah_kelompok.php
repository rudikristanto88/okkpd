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
              <li class="breadcrumb-item active">Kelola Komoditas</li>
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
                                <strong>tambah</strong> Kelompok</h2><br/>
                                <button type="button" onclick="tambah()" class="btn btn-info" name="button">Tambah</button>

                        </div>
                        <div class="body table-responsive">
                          <form action="<?= base_url() ?>admin/simpan_kelompok" method="post">


                          <table class="table table-hover" >
                            <thead>
                              <tr>
                                <th style="vertical-align: middle;" width="200px">Kode Kelompok</th>
                                <th style="vertical-align: middle;">Nama Kelompok</th>
                                <!-- <th style="vertical-align: middle;">Nama Latin</th> -->
                                <th style="vertical-align: middle;"></th>
                              </tr>

                            </thead>
                            <tbody id="tabelnya">
                              <input type='hidden' name='id_sektor' value="<?= $id_sektor ?>">
                              <?php if(isset($kelompok)): ?>
                                <tr>
                                  <td>

                                    <input type='text' name='id_kelompok' value="<?= $kelompok['id_kelompok'] ?>"></td>
                                  <td><input type='text' name='nama_kelompok' value="<?= $kelompok['nama_kelompok'] ?>"></td>
                                  <!-- <td><input type='text' name='nama_latin_kelompok' value="<?= $kelompok['nama_latin_kelompok'] ?>"></td> -->
                                  <td></td>
                                </tr>
                              <?php endif; ?>

                            </tbody>
                          </table>
                            <button id="tombol" type="submit" name="button" style="display:none" class="btn btn-success">Simpan</button>
                          </form>
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
var jml = 0;
var jml_hapus = 0;
  function tambah(){
    jml++;
    if(jml > jml_hapus){
      $('#tombol').css('display','block');
    }
    var html = '<tr id="'+jml+'"><td><input type="text" name="id_kelompok[]" class="text-white" placeholder="Kode Kelompok*" required></td>';
    html += "<td><input type='text' name='nama_kelompok[]' class='text-white' placeholder='Nama Kelompok*' required></td>";
    html+= "<td><input type='button' onclick='hapus("+jml+")' class='btn btn-warning text-white' value='Hapus'></td></tr>";
    $("#tabelnya").append(html);
  }
  function hapus(id){
    jml_hapus++;
    if(jml_hapus == jml){
      $('#tombol').css('display','none');
    }

    $("#"+id).remove();
  }
</script>
