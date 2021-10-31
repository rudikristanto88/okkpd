<?php
foreach ($kadin as $data);
foreach ($sertifikat as $sertifikat);
$bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
$tgl = strtotime($sertifikat['tanggal_unggah']);
$tahun = date('Y',$tgl);
$bln = $bulan[date('n',$tgl)-1];
$hari = date('d',$tgl);

?>
<div class="">
  <br><br><br><br><br>
  <p align="center" ><b>PENDAFTARAN<br>RUMAH PENGEMASAN <i>(PACKING HOUSE)</i><br>OTORITAS KOMPETEN KEAMANAN PANGAN DAERAH<br> PROVINSI JAWA TENGAH
    <br><br>
    <b>Nomor Pendaftaran<br><br>
    . . . . . . . . . .  . . .<br><br>
    Diberikan Kepada<br>
    <?= $sertifikat['nama_usaha'] ?><br><br>
    Alamat<br>
    <?= $sertifikat['alamat_usaha'] ?><br><br>
    Ruang Lingkup<br><br>
    . . . . . . . . . .  . . .<br><br>

  Telah memenuhi persyaratan meliputi :<br>
Standar prosedur Operasional (SPO), Cara Penanganan Produk<br>
Segar yang Baik (CPPSB) sesuai Codex Alimentarius<br>
Comission/RCP1-1968 Rev IV-2003 dan Pendaftaran Kebun Buah<br><br>
Nomor Pendaftaran ini berlaku selama 3 (tiga) tahun dari tanggal<br> ditetapkan<br><br>
Tanggal ditetapkan : <?= $hari.' '.$bln.' '.$tahun; ?><br>
Tanggal berakhir : <?= $hari.' '.$bln.' '.($tahun+3); ?><br>
</b></p>
<br>
  <p align="center"><u><b>KEPALA DINAS KETAHANAN PANGAN PROVINSI JAWA TENGAH</b></u><br>
    <i><b>Head Of Department Of Food Security Central Java Provincial</b></i><br>
      <u>Selaku</u><br>
      <i>As</i><br>
      <b><u>Ketua Otoritas Kompeten Keamanan Pangan Daerah</u></b><br>
      <i>Lead Of Local Foodsafety Competent Authority</i><br>
      <br><br><br><br><br>
      <u><b><?= $data['nama_kepala_dinas'] ?></b></u><br>
      <b><?= $data['pangkat'] ?></b><br>
      <b>NIP.<?= $data['nip'] ?></b><br>
  </p>




</div>
