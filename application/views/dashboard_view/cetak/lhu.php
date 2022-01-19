
<script src="<?= base_url() ?>assets/dashboard/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/jquery.qrcode.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/qrcode.js"></script>
    <section class="content">
        <div class="container-fluid">
<?php
include 'header_cetak_lhu.php';
?>
<h2 align="center">LAPORAN HASIL UJI</h2>
<p align="center">No : <?= $detail[0]['kodelhu'] ?></p>
<table border="0" width="100%">
    <tr>
        <td width="30%" align="left">1. Nama Pelanggan</td>
        <td width="1">:</td>
        <td><?= $detail[0]['nama_pemohon'] ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">2. Alamat</td>
        <td width="1">:</td>
        <td><?php 
        $alamatcetak = "";
        if($detail[0]['rt'] != ""){
            if($detail[0]['rt'] != "0"){
                $alamatcetak .= " RT " . $detail[0]['rt'];
            }
        }
        if($detail[0]['rw'] != ""){
            if($detail[0]['rw'] != "0"){
                $alamatcetak .= " RW " . $detail[0]['rw'];
            }
        }
        if($detail[0]['kelurahan'] != ""){
            $alamatcetak .= " Kel " . $detail[0]['kelurahan'];
        }
        if($detail[0]['kecamatan'] != ""){
            $alamatcetak .= " Kec " . $detail[0]['kecamatan'];
        }
        if($detail[0]['kota'] != ""){
            $alamatcetak .= " " . $detail[0]['kota'];
        }
        echo $detail[0]['alamat_usaha'] . $alamatcetak ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">3. Deskripsi Contoh</td>
        <td width="1">:</td>
        <td></td>
    </tr>
    <tr>
        <td width="30%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;a. Nama Barang</td>
        <td width="1">:</td>
        <td><?= $detail[0]['nama_dagang'] ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;b. Berat</td>
        <td width="1">:</td>
        <td><?= $detail[0]['berat'] ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;c. Kemasan</td>
        <td width="1">:</td>
        <td><?= $detail[0]['nama_kemasan'] ?></td>
    </tr> 
    <tr>
        <td width="30%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;d. Kondisi</td>
        <td width="1">:</td>
        <td><?= $detail[0]['kondisi'] ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">4. Tanggal terima contoh</td>
        <td width="1">:</td>
        <td><?php $tgl =  strtotime($detail[0]['tanggalsampleLab']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">5. Tanggal pengujian</td>
        <td width="1">:</td>
        <td><?php $tgl =  strtotime($detail[0]['tanggalValidLab']); echo date("d",$tgl)."/".(date("m",$tgl))."/".date("Y",$tgl); ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">6. Kode Pendaftaran</td>
        <td width="1">:</td>
        <td><?= $detail[0]['kode_pendaftaran'] ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">7. Hasil Pengujian</td>
        <td width="1">:</td>
        <td></td>
    </tr>
</table> 
                    
                    <table border="1" width="100%" > 
                            <tr>
                            <th>JENIS UJI</th>
                            <th>SATUAN</th>
                            <th>HASIL UJI</th>
                            <th>KELAS MUTU</th>
                            <th>METODE UJI</th>  
                            </tr> 
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
                    <table border="0" width="100%"><?php if($detail[0]['kesimpulan'] != ""){ ?>
    <tr>
        <td width="30%" align="left">Kesimpulan</td>
        <td width="1">:</td>
        <td><?= $detail[0]['kesimpulan'] ?></td>
    </tr><?php }?>
                            </table>
                <table border="0" width="100%">
                    <tr>
                        <td width="30%"><br/><img style="width: 100px;" src="<?php echo base_url().''.$qrcode;?>"></td>
                        <td width="20%">&nbsp;</td>
                        <td width="50%">
                        <?php  
                            $hari = date("d",strtotime($tanggal));
                            $bulan = date("m",strtotime($tanggal));
                            $tahun = date("Y",strtotime($tanggal));
                            $month = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember');
                          echo "Ungaran, ". $hari . " " . $month[$bulan]. " " . $tahun?><br>Kepala BPMKP Selaku Manajer Puncak</td>
                    </tr> 
                    <tr><td colspan="3"><br/></td></tr>
                    <tr><td colspan="3"><br/></td></tr>
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td width="40%">&nbsp;</td>
                        <td width="30%"><?=$balai[0]['nama_kepala_dinas'] ?>
                                <br>
                                <?="NIP. ".$balai[0]['nip'] ?>
                    </td>
                    </tr>
                </table>
                Catatan :<br/><br/>
•	Laporan ini dilarang diperbanyak tanpa persetujuan tertulis dari <br/>
&nbsp;&nbsp;&nbsp;Laboratorium Pengujian BPMKP Prov Jateng.<br/>
•	Laporan ini hanya berlaku bagi contoh yang diuji.<br/>
•	Laporan ini merupakan hasil pengujian bukan penelitian.<br/>

            </div>
          </div>
        </div>
      </div>
<script>
	//jQuery('#qrcode').qrcode("this plugin is great");
	jQuery('#qrcodeTable').qrcode({
		render	: "table",
		text	: "<?= $detail[0]['kodelhu'] ?>"
	});	 
</script>