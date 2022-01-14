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
              <li class="breadcrumb-item active">Buka/Tutup Layanan Uji</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div >
            <div class="body">
              <h4 class="card-inside-title">Daftar Komoditas</h4>
              
              <div class="table-responsive-md">
                <table class="table table-hover" id="table-datatable" class="display">
                  <thead>
                    <tr>
                      <th rowspan="2">No.</th>
                      <th rowspan="2">Jenis Komoditas</th> 
                      <th rowspan="2">Detil Komoditas</th>  
                      <th rowspan="2" width="150px">Aksi <br/>Valid</th>
                    </tr>


                  </thead>
                  <tbody>

                    <?php $i=1; foreach ($sample as $ppc): ?>
                      <tr>
                        <td>
                          <?= $i ?>.
                        </td>
                        <td><?= $ppc['namajenis'] ?></td> 
                        <td><?= $ppc['namadetail'] ?></td> 
                        </td>
                        
                        <td>
                          <?php if($ppc['isaktif'] == 1):?>
                            <button onclick="openModal(<?= $ppc['idjenisdetail'] ?>)" type="sumbit" name="button" class="btn btn-danger col-md-12">Non Aktif Uji Mutu</button>
                            <!--<a href="<?= base_url() ?>dashboard/survey?id=<?= $ppc['uid']?>" class="btn btn-primary">Isi Survey</a>-->
                            <?php else :?>
                              <form method="post" action="<?= base_url() ?>dashboard/aktif_statuskomoditas/">
                              <input type="hidden" name="kode" value="<?= $ppc['idjenisdetail'] ?>">
                            <button  type="sumbit" name="button" class="btn btn-info col-md-12">Aktif Uji Mutu</button>

                            </form>
                            <?php endif?>
                        
                    </td>
                        </tr>
                        <?php $i++; endforeach; ?>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- #END# Input -->


        </div>

      </div>
    </div>

  </section>


  <div class="modal" id="openModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="" action="<?= base_url() ?>dashboard/ubah_statuskomoditas/" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Non Aktif Komoditas</h4> 
            <input type="hidden" name="id_layanan" id="id_layanan" value="">


            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="input-field">
                <input  type="text" name="keterangan" class="">
                <label for="keterangan">Keterangan Non Aktif</label>
              </div>

            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info" name="hapus" value="1">Simpan</button>
        </div>
      </form>

      </div>
    </div>
  </div>

 




<script type="text/javascript">

  
function openModal(kode){
      $("#id_layanan").val(kode);
      $('#openModal').modal();
    }
  
</script>

 