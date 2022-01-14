    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item 	bcrumb-1">
                                <a href="<?= base_url() ?>dashboard">
                                    <i class="material-icons">home</i>
                                    Beranda</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="<?= base_url() ?>dashboard/akun_pelaku_usaha">Kelola Akun Pelaku Usaha </a></li>
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
                        </div>
                        <div class="body">
                          
                          <table class="table">
                            <tr>
                              <th width="200px;">Jenis Usaha :</th>
                              <th><input class="text-white" type="text" readonly value="<?= $akun[
                                  'jenis_usaha'
                              ] ?>" /> </th>
                            </tr>
                              <tr>
                                <th>Nama Usaha :</th>
                                <th><input class="text-white" type="text" readonly value="<?= $akun[
                                    'nama_usaha'
                                ] ?>" /> </th>
                              </tr>
                              <tr>
                                <th>Nama Akun :</th>
                                <th><input class="text-white" type="text" readonly value="<?= $akun[
                                    'nama_lengkap'
                                ] ?>" /> </th>
                              </tr>
                              <tr>
                                <th>Nama Pelaku Usaha :</th>
                                <th><input class="text-white" type="text" readonly value="<?= $akun[
                                    'nama_pemohon'
                                ] ?>" /> </th>
                              </tr>
                              <tr>
                                <th>Email :</th>
                                <th><input class="text-white" type="text" readonly value="<?= $akun[
                                    'username'
                                ] ?>" /> </th>
                              </tr>
                              <tr>
                                <th>Nama Akun :</th>
                                <th><input class="text-white" type="text" readonly value="<?= $akun[
                                    'nama_lengkap'
                                ] ?>" /> </th>
                              </tr>
                              <tr>
                                <th>Alamat Usaha :</th>
                                <th><input class="text-white" type="text" readonly value="<?= $akun[
                                    'alamat_usaha'
                                ] .
                                    ' RT ' .
                                    $akun['rt'] .
                                    ' RW ' .
                                    $akun['rw'] .
                                    ' Kec. ' .
                                    $akun['kecamatan'] .
                                    ' Kel. ' .
                                    $akun['kelurahan'] .
                                    ', ' .
                                    $akun['kota'] .
                                    ' Jawa Tengah' ?>" /></th>
                              </tr>
                              <tr>
                                <th>Nomor Telepon Usaha</th>
                                <th><input class="text-white" type="text" readonly value="<?= $akun['no_hp_pemohon'] == '' || $akun['no_hp_pemohon'] == null ? $akun['no_telp'] : $akun['no_hp_pemohon']; ?>" /> </th>
                              </tr>
                          </table>
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
