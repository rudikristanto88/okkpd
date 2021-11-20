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
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?= $detail[0]['nama_usaha'] ?>" readonly>
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field">  
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?= $detail[0]['alamat_usaha'] ?>" readonly>
                            <label for="nama_perusahaan">Alamat Perusahaan</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field">  
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?= $detail[0]['nama_dagang'] ?>" readonly>
                            <label for="nama_perusahaan">Nama Barang</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field">  
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?= $detail[0]['nama_kemasan'] ?>" readonly>
                            <label for="nama_perusahaan">Kemasan Barang</label>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="input-field">  
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?php $tgl =  strtotime($detail[0]['tanggalsampleLab']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?>" readonly>
                            <label for="nama_perusahaan">Tanggal terima contoh</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field">  
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?php $tgl =  strtotime($detail[0]['tanggalValidLab']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?>" readonly>
                            <label for="nama_perusahaan">Tanggal pengujian</label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-hover display" width="100%" >
                        <thead>
                            <tr>
                            <th>JENIS UJI</th>
                            <th>SATUAN</th>
                            <th>HASIL UJI</th>
                            <th>KELAS MUTU I</th>
                            <th>METODE UJI</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($hasil as $r){?>
                              <tr>
                                <td><?=$r['jenisuji']?></td>
                                <td><?=$r['satuan']?></td>
                                <td><?=$r['hasiluji']?></td>
                                <td><?=$r['kelasmutu']?></td>
                                <td><?=$r['metodeuji']?></td>
                              </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>
                
                <div class="col-sm-2">

                  <form class="" action="<?= base_url("dashboard/mtek_validasi_ujimutu") ?>" class="text-white" method="post">
                  
                    <input type="hidden" name="id_layanan" value="<?= $id_layanan ?>" readonly>
                    <input type="hidden" name="id_jenis" value="<?= $idjenis ?>" readonly>
                    <button type="submit " class="btn btn-info waves-effect" name="button">Terima</button>
                  </form>
                </div>
                
                <div class="col-sm-2">

                  <form class="" action="<?= base_url("dashboard/mtek_tolak_ujimutu") ?>" class="text-white" method="post">
                  
                    <input type="hidden" name="id_layanan" value="<?= $id_layanan ?>" readonly>
                    <button type="submit " class="btn btn-danger waves-effect" name="button">Tolak</button>
                  </form>                  
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
