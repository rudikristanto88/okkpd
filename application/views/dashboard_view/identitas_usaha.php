

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item 	bcrumb-1">
                                <a href="<?= base_url() ?>dashboard">
                                    <i class="material-icons">home</i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item active">Identitas Usaha</li>

                        </ul>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Identitas Usaha</strong></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">Action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Another action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                          <?php
                          if($this->session->flashdata("status")){
                            echo $this->session->flashdata("status");
                          }
                          ?>


                          <?php if($datalogin['punya_usaha'] == 0 && $datalogin['kode_role'] == "pelaku"):
                            echo '<span>Daftarkan usaha anda</span><br/>';
                            echo '<a href="'.base_url().'dashboard/daftar_usaha" id="btn-daftar" class="btn btn-primary">Daftar</a>';
                          else: ?>

                          <table class="table">
                            <tr>
                              <th width="200px;">Jenis Usaha :</th>
                              <th><input class="text-white" type="text" value="<?=$usaha['jenis_usaha'] ?>" /> </th>
                            </tr>
                              <tr>
                                <th>Nama Usaha :</th>
                                <th><input class="text-white" type="text" value="<?=$usaha['nama_usaha'] ?>" /> </th>
                              </tr>
                              <tr>
                                <th>Alamat Usaha :</th>
                                <th><input class="text-white" type="text" readonly value="<?=$usaha['alamat_usaha']." RT ".$usaha['rt']." RW ".$usaha['rw']." Kec. ".$usaha['kecamatan']." Kel. ".$usaha['kelurahan'].", ".$usaha['kota']." Jawa Tengah" ?>" /></th>
                              </tr>
                              <tr>
                                <th>Nomor Telepon Usaha</th>
                                <th><input class="text-white" type="text" value="<?=$usaha['no_telp'] ?>" /> </th>
                              </tr>
                              <tr>
                                <th style="vertical-align:top">Foto KTP</th>
                                <th><input class="text-white" type="text" value="<?=$usaha['no_telp'] ?>" /> </th>
                                <th>: <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $usaha['foto_ktp'] ).'" style="width:200px;"/>'; ?></th>
                              </tr>
                              <tr>
                                <th>Foto NPWP</th>
                                <th>: <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $usaha['foto_npwp'] ).'" style="width:200px;"/>'; ?></th>
                              </tr>
                              <tr>
                                <th>Kop Surat</th>
                                <th>: <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $usaha['kop_surat'] ).'" style="width:200px;"/>'; ?></th>
                              </tr>

                          </table>

                          <!-- <a href="" class="btn btn-info">Simpan data</a><br/><br/> -->

                          <?php endif; ?>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>





<script type="text/javascript">
function jenisUsaha(value){
  if(value == "perorangan"){
    document.getElementById("kop").style.display = "none";
    document.getElementById("kop_surat").value = "";
  }else{
    document.getElementById("kop").style.display = "block";

  }
}
</script>
