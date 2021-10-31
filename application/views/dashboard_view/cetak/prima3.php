<?php
foreach ($kadin as $data);
foreach ($sertifikat as $sertifikat);
$bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

// $params['data'] = base64_encode($sertifikat['id_layanan']);
$params['data'] = base64_encode($sertifikat['nomor_sertifikat']);
$params['level'] = 'F';
$params['size'] = 2;
$params['savename'] = FCPATH.'tes.png';
$this->ciqrcode->generate($params);

$tanggal=date('d M Y');
?>
<div class="">
  <br><br>
  <p align="center" ><b><u>SERTIFIKAT PRODUK PRIMA - 3</u></b><br>
    <i>Certificate of Excelience For Prima - 3 Product</i><br>
    Sertifikat No. :
    <br><br>
    <table>
      <tr>
        <td width="30"><?php if($sertifikat['nomor_sertifikat'] != ""){ echo '<img src="'.base_url().'tes.png" />'; } ?></td>
        <td>............................................................</td>
        <td width="30"></td>
      </tr>
    </table>

    <b><u>Diberikan Kepada :</b></u><br><i>Is herby granted to</i>
  </p>


  <table align="center">
    <tr>
        <td><b>Nama / Name</td>
        <td>: </td>
        <td><?= $sertifikat['nama_usaha'] ?></td>
    </tr>
    <tr>
      <td><b>Alamat / Address</td>
      <td>:</td>
      <td><?= $sertifikat['alamat_usaha'] ?></td>
    </tr>
    <tr>
      <td><b>Komoditas / Comodity</td>
      <td>:</td>
      <td><?= $sertifikat['nama_jenis_komoditas'] ?> (<i><?= $sertifikat['nama_latin'] ?></i>)</td>
    </tr>
  </table>

  <p align="center"><u> Produk dinyatakan aman dengan level residu di bawah ambang batas</u><br>
    <i>The product is declared as safed and below the Maximum Residu Level (MRL) for pesticide</i>
  </p>
  <table align="center">
    <tr>
      <td><u>Dikeluarkan Tanggal</u><br><i>Date of issue</i></td>
        <td>: </td>
        <td> <?php
        $tgl = strtotime($sertifikat['tanggal_unggah']);
        $tahun = date('Y',$tgl);
        $bln = $bulan[date('n',$tgl)-1];
        $hari = date('d',$tgl);
        echo $hari.' '.$bln.' '.$tahun;
         ?></td>
    </tr>
    <td><u>Masa Berlaku</u><br><i>Expired date</i></td>
      <td>: </td>
      <td><u>3 Tahun</u><br><i>Three Years</i> </td>
  </tr>
  </table>
  <p align="center"><u><b>KEPALA DINAS KETAHANAN PANGAN PROVINSI JAWA TENGAH</b></u><br>
    <i><b>Head Of Department Of Food Security Central Java Provincial</b></i><br>
      <u>Selaku</u><br>
      <i>As</i><br>
      <b><u>Ketua Otoritas Kompeten Keamanan Pangan Daerah</u></b><br>
      <i>Lead Of Local Foodsafety Competent Authority</i><br>
      <br><br><br><br>
      <u><b><?= $data['nama_kepala_dinas'] ?></b></u><br>
      <b><?= $data['pangkat'] ?></b><br>
      <b>NIP.<?= $data['nip'] ?></b><br>



  </p>




</div>
