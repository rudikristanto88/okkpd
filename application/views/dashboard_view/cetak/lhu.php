
    <section class="content">
        <div class="container-fluid">
<?php
include 'header_cetak.php';
?>
<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body"> 
                <div class="row clearfix">

                    <div class="col-sm-12">
                        <div class="input-field"> 
                            <input id="kode_pendaftaran" type="text" name="kode_pendaftaran" class="text-white" data-length="10" value="<?= $detail[0]['kode_pendaftaran'] ?>" readonly>
                            <label for="nama_perusahaan">Kode Pendaftaran</label>
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
                <table border="0" width="100%">
                    <tr>
                        <td width="30%">Analis Laboratorium</td>
                        <td width="40%">&nbsp;</td>
                        <td width="30%">Manager Teknis</td>
                    </tr>
                    <tr><td><br/><br/><br/></td><td><br/><br/><br/></td><td><br/><br/><br/></td></tr>
                    <tr>
                        <td width="30%"><?=$detail[0]['namaanalis'] ?></td>
                        <td width="40%">&nbsp;</td>
                        <td width="30%"><?=$detail[0]['namamantek'] ?></td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>