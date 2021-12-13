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
              <li class="breadcrumb-item active">Proses </li>
              <li class="breadcrumb-item active">Uji Mutu</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body"> 
              <form class="" action="<?= base_url("dashboard/proses_valid_ujilab") ?>" class="text-white" method="post">
                <div class="row clearfix">

                    <div class="col-sm-12">
                        <div class="input-field">
                            <input type="hidden" name="kode_layanan" value="ujimutu" readonly>
                            <input type="hidden" name="kode_pendaftaran" value="<?= $kode_pendaftaran ?>" readonly>
                            <input type="hidden" name="id_layanan" value="<?= $id_layanan ?>" readonly>
                            <input type="hidden" name="idjenis" value="<?= $idjenis ?>" readonly>
                            <input type="hidden" name="idjenisdetail" value="<?= $idjenisdetail ?>" readonly>
                            <input id="kode_pendaftaran" type="text" name="kode_pendaftaran" class="text-white" data-length="10" value="<?= $kode_pendaftaran ?>" readonly>
                            <label for="nama_perusahaan">Kode Pendaftaran</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field"> 
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?= $namajenis ?>" readonly>
                            <label for="nama_perusahaan">Jenis Sample</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field"> 
                            <input id="berat" type="text" name="berat" class="text-white" data-length="10" value="<?= $berat ?>" readonly>
                            <label for="nama_perusahaan">Berat Sampel</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field"> 
                            <input id="kondisi" type="text" name="kondisi" class="text-white" data-length="10" value="<?= $kondisi ?>" readonly>
                            <label for="nama_perusahaan">Kondisi Sampel</label>
                        </div>
                    </div>
                    
                    <?php if($headerdata[0]['alasantolakmtek']!=""){?>
                        
                        <div class="col-sm-12">
                            <div class="input-field"> 
                                <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?=$headerdata[0]['alasantolakmtek'] ?>" readonly>
                                <label for="nama_perusahaan">Alasan ditolak Manager Teknis</label>
                            </div>
                        </div>
                        <?php }?>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-hover display" width="100%" >
                        <thead>
                            <tr>
                            <th>JENIS UJI</th>
                            <th>SATUAN</th>
                            <th>HASIL UJI</th>
                            <th>KELAS MUTU</th>
                            <th>METODE UJI</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.	Derajat Sosoh (Min)</td>
                                <td>%</td>
                                <td><input id="hasiluji1" type="text" name="hasiluji1" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "1.	Derajat Sosoh (Min)"){
                                      $hasil = $row['hasiluji'];
                                    }
                                  }
                                }echo $hasil;?>"></td>
                                <td><input id="kelasmutu1" type="text" name="kelasmutu1" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "1.	Derajat Sosoh (Min)"){
                                      $hasil = $row['kelasmutu'];
                                    }
                                  }
                                }echo $hasil;?>">
                                <input type="hidden" name="jenisuji1" value="1.	Derajat Sosoh (Min)">
                                <input type="hidden" name="satuan1" value="%">
                                <input type="hidden" name="metodeuji1" value="SNI 6128:2015">
                                </td>
                                <td>SNI 6128:2015</td>
                            </tr>
                            <tr>
                                <td>2. Kadar Air (Maks)</td>
                                <td>%</td>
                                <td><input id="hasiluji2" type="text" name="hasiluji2" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "2. Kadar Air (Maks)"){
                                      $hasil = $row['hasiluji'];
                                    }
                                  }
                                }echo $hasil;?>"></td>
                                <td><input id="kelasmutu2" type="text" name="kelasmutu2" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "2. Kadar Air (Maks)"){
                                      $hasil = $row['kelasmutu'];
                                    }
                                  }
                                }echo $hasil;?>">
                                <input type="hidden" name="jenisuji2" value="2. Kadar Air (Maks)">
                                <input type="hidden" name="satuan2" value="%">
                                <input type="hidden" name="metodeuji2" value="SNI 6128:2015">
                                </td>
                                <td>SNI 6128:2015</td>
                            </tr>
                            <tr>
                                <td>3.	Beras Kepala (Min)</td>
                                <td>%</td>
                                <td><input id="hasiluji3" type="text" name="hasiluji3" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "3.	Beras Kepala (Min)"){
                                      $hasil = $row['hasiluji'];
                                    }
                                  }
                                }echo $hasil;?>"></td>
                                <td><input id="kelasmutu3" type="text" name="kelasmutu3" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "3.	Beras Kepala (Min)"){
                                      $hasil = $row['kelasmutu'];
                                    }
                                  }
                                }echo $hasil;?>">
                                <input type="hidden" name="jenisuji3" value="3.	Beras Kepala (Min)">
                                <input type="hidden" name="satuan3" value="%">
                                <input type="hidden" name="metodeuji3" value="SNI 6128:2015">
                                </td>
                                <td>SNI 6128:2015</td>
                            </tr>
                            <tr>
                                <td>4.	Butir Patah (Maks)</td>
                                <td>%</td>
                                <td><input id="hasiluji4" type="text" name="hasiluji4" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "4.	Butir Patah (Maks)"){
                                      $hasil = $row['hasiluji'];
                                    }
                                  }
                                }echo $hasil;?>"></td>
                                <td><input id="kelasmutu4" type="text" name="kelasmutu4" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "4.	Butir Patah (Maks)"){
                                      $hasil = $row['kelasmutu'];
                                    }
                                  }
                                }echo $hasil;?>">
                                <input type="hidden" name="jenisuji4" value="4.	Butir Patah (Maks)">
                                <input type="hidden" name="satuan4" value="%">
                                <input type="hidden" name="metodeuji4" value="SNI 6128:2015">
                                </td>
                                <td>SNI 6128:2015</td>
                            </tr>
                            <tr>
                                <td>5.	Butir Lainnya (Maks) Terdiri dari Butir Menir, Butir Merah, Butir Kuning/Rusak, Butir kapur</td>
                                <td>%</td>
                                <td><input id="hasiluji5" type="text" name="hasiluji5" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "5.	Butir Lainnya (Maks) Terdiri dari Butir Menir, Butir Merah, Butir Kuning/Rusak, Butir kapur"){
                                      $hasil = $row['hasiluji'];
                                    }
                                  }
                                }echo $hasil;?>"></td>
                                <td><input id="kelasmutu5" type="text" name="kelasmutu5" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "5.	Butir Lainnya (Maks) Terdiri dari Butir Menir, Butir Merah, Butir Kuning/Rusak, Butir kapur"){
                                      $hasil = $row['kelasmutu'];
                                    }
                                  }
                                }echo $hasil;?>">
                                <input type="hidden" name="jenisuji5" value="5.	Butir Lainnya (Maks) Terdiri dari Butir Menir, Butir Merah, Butir Kuning/Rusak, Butir kapur">
                                <input type="hidden" name="satuan5" value="%">
                                <input type="hidden" name="metodeuji5" value="SNI 6128:2015">
                                </td>
                                <td>SNI 6128:2015</td>
                            </tr>
                            <tr>
                                <td>6.	Butir Gabah (Maks)</td>
                                <td>(Butir/100 gr)</td>
                                <td><input id="hasiluji6" type="text" name="hasiluji6" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "6.	Butir Gabah (Maks)"){
                                      $hasil = $row['hasiluji'];
                                    }
                                  }
                                }echo $hasil;?>"></td>
                                <td><input id="kelasmutu6" type="text" name="kelasmutu6" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "6.	Butir Gabah (Maks)"){
                                      $hasil = $row['kelasmutu'];
                                    }
                                  }
                                }echo $hasil;?>">
                                <input type="hidden" name="jenisuji6" value="6.	Butir Gabah (Maks)">
                                <input type="hidden" name="satuan6" value="(Butir/100 gr)">
                                <input type="hidden" name="metodeuji6" value="SNI 6128:2015">
                                </td>
                                <td>SNI 6128:2015</td>
                            </tr>
                            <tr>
                                <td>7.	Benda Asing (Maks)</td>
                                <td>%</td>
                                <td><input id="hasiluji7" type="text" name="hasiluji7" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "7.	Benda Asing (Maks)"){
                                      $hasil = $row['hasiluji'];
                                    }
                                  }
                                }echo $hasil;?>"></td>
                                <td><input id="kelasmutu7" type="text" name="kelasmutu7" class="text-white" value="<?php 
                                $hasil = "";
                                if(count($detaildata)>0){
                                  foreach($detaildata as $row){
                                    if($row['jenisuji'] == "7.	Benda Asing (Maks)"){
                                      $hasil = $row['kelasmutu'];
                                    }
                                  }
                                }echo $hasil;?>">
                                <input type="hidden" name="jenisuji7" value="7.	Benda Asing (Maks)">
                                <input type="hidden" name="satuan7" value="%">
                                <input type="hidden" name="metodeuji7" value="SNI 6128:2015">
                                </td>
                                <td>SNI 6128:2015</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row clearfix">

                      <div class="col-sm-12">
                          <div class="input-field"> 
                              <input id="kesimpulan" type="text" name="kesimpulan" class="text-white" data-length="100" value="<?= $kesimpulan ?>">
                              <label for="nama_perusahaan">Kesimpulan</label>
                          </div>
                      </div>
                    </div>
                </div>
                <button type="submit " class="btn btn-info waves-effect" name="button">Simpan</button>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Input -->


    </div>

  </div>
</div>

</section>
