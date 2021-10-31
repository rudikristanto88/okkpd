<?php
foreach ($kadin as $data) {
}
foreach ($sertifikat as $sertifikat) {
}
$params['data'] = base64_encode($sertifikat['nomor_sertifikat']);
$params['level'] = 'F';
$params['size'] = 2;
$params['savename'] = FCPATH.'tes.png';
$this->ciqrcode->generate($params);
?>
<style media="screen">
  body{
    line-height: 1.25;
  }
</style>
<div class="">
  <br><br>
  <br><br>
  <br><br>
  <br><br>
  <p align="center"><b><u>PERSETUJUAN PENDAFTARAN PANGAN SEGAR ASAL TUMBUHAN</u><br>
    <table>
      <tr>
        <td width="30"><?php if($sertifikat['nomor_sertifikat'] != ""){ echo '<img src="'.base_url().'tes.png" />'; } ?></td>
        <td>NO : .................................................</td>
        <td width="30"></td>
      </tr>
    </table>
  </b></p>
  <p>
    Sesuai dengan Peraturan Menteri Pertanian No. 51/PERMENTAN/05.140/10/2008 tentang<br>
    Syarat dan Tata Cara Pendaftaran Pangan Segar Asal Tumbuhan, dengan ini kami memberikan<br>
    persetujuan pendaftaran produk pangan asal tumbuhan (PSAT) di bawah ini :
  </p>
  <table style="line-height:1">
    <tr>
      <td>1.</td>
      <td>Nama Pangan</td>
        <td>: </td>
        <td> <?= $sertifikat['nama_produk_pangan'] ?></td>
    </tr>
    <tr>
      <td>2.</td>
      <td>Nama Dagang</td>
      <td>:</td>
      <td><?= $sertifikat['nama_dagang'] ?></td>
    </tr>
    <tr>
      <td>3.</td>
      <td>Jenis Kemasan/Volume</td>
      <td>:</td>
      <td><?= $sertifikat['nama_kemasan'] ?> / <?= $sertifikat['netto'] ?> <?= $sertifikat['satuan'] ?></td>
    </tr>
    <tr>
      <td>4.</td>
      <td>a.Nama Pabrik/Perusahaan </td>
      <td>:</td>
      <td><?= $sertifikat['nama_usaha'] ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>b.Alamat</td>
      <td>:</td>
      <td><?= $sertifikat['alamat_usaha'] ?> RT.<?= $sertifikat['rt'] ?>/RW.<?= $sertifikat['rw'] ?> Kelurahan <?= $sertifikat['kelurahan'] ?> Kecamatan <?= $sertifikat['kecamatan'] ?> <?= ucwords($sertifikat['kota']) ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Phone</td>
      <td>:</td>
      <td><?= $sertifikat['no_telp'] ?></td>
    </tr>
    <tr>
      <td>5.</td>
      <td>a.Nama Perusahaan Pengemas Kembali</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>b.Alamat</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>6.</td>
      <td>a.Nama Perusahaan Pemberi Lisensi / Perusahaan Asal</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>b.Alamat</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>7.</td>
      <td>a.Nama Pemegang Lisensi</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>b.Alamat</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>8.</td>
      <td>a.Nama Importir/Perwakilan Pabrik Luar Negeri</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>b.Alamat</td>
      <td>:</td>
      <td></td>
    </tr>
  </table><br>
  <span>Dengan nomor pendaftaran produk pangan segar asal tumbuhan :<br></span>
  <p align="center"><b>KEMTAN RI PD : ........................................................</b><br></p>
  <table align="center" style="line-height:1">
    <tr>
      <td>Dikeluarkan di</td>
        <td>: </td>
        <td>di Ungaran</td>
    </tr>
    <tr>
      <td>Tanggal</td>
        <td>: </td>
        <td><?= date('d') ?> <?= $bulan[date('n')-1] ?> <?= date('Y') ?></td>
    </tr>
    <tr>
      <td>Berlaku sampai dengan</td>
        <td>: </td>
        <td><?= date('d') ?> <?= $bulan[date('n')-1] ?> <?= date('Y') +3 ?> </td>
    </tr>
  </table><br/>
  <span style="line-height:1.25">Nomor Pendaftaran Produk Pangan Segar Asal Tumbuhan berlaku untuk nama dagang dan<br>
  alamat seperti diatas. Survailen / Pengawas dilakukan minimal 1 kali setahun atau sewaktu-waktu<br>
  bila diperlukan<br><br>
  Nomor Pendaftaran Produk Pangan Segar Asal Tumbuhan ini dapat dibatalkan/dibekukan/dicabut sesuai dengan ketentuan yang berlaku.</span>
<table style="line-height:1.25">
  <tr >
    <td rowspan="4" width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">Kepala Dinas Ketahanan Pangan<br>Provinsi Jawa Tengah<br>selaku<br>Ketua Otoritas Kompeten Keamanan Pangan Daerah<br>(OKKP-D) Jawa Tengah</td>
  </tr>
  <tr>
    <td align="center"><br><br><br><br></td>
  </tr>
  <tr>
    <td align="center"><?= $data['nama_kepala_dinas'] ?><br><?= $data['pangkat'] ?><br>NIP. <?= $data['nip'] ?> </td>
  </tr>

</table>
</div>
