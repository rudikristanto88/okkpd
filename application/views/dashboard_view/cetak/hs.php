<div class="">
<?php
include 'header_cetak.php';
foreach ($kadin as $data) {
}
 ?>
 <style type="text/css">
	hr.style2{
		border: 2px double #000000;
	}
</style>
 <hr class="style2" >
  <p align="center" ><b>SURAT KETERANGAN<br>LEVEL PENERAPAN SANITASI HIGIENIS PALA<br>
    No.:</b>
    <br>
    OTORITAS KOMPETEN KEAMANAN PANGAN DAERAH PROVINSI JAWA TENGAH <br>
    <b>Menerangkan Bahwa</b>
  </p>
  <table align="center">
    <tr>
      <td><b>Nama</td>
        <td>: </td>
        <td> PT Hidropopnik Argofarm Bandungan</td>
    </tr>
    <tr>
      <td><b>Alamat</td>
      <td>:</td>
      <td></td>
    </tr>

  </table>

  <p align="center">Memenuhi persyaratan Penerapan Sanitasi dan Higienis pada LEVEL I Dengan Pelaksanaan <br> Inspeksi Setelah 6 Kali Eksport,<br>
    Surat Keterangan ini sebagai Revisi Surat Keterangan Nomor: KEMTAN RI HS : 33/0002/03/2017<br>dan berlaku sejak tanggal ditetapkan
  </p>
  <table align="center">
    <tr>
      <td>Ditetapkan di</td>
        <td>: </td>
        <td> </td>
    </tr>
    <td>Pada Tanggal</td>
      <td>: </td>
      <td> </td>
  </tr>
  </table>
  <table>
    <tr >
      <td rowspan="4" width="60%">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Kepala Dinas Ketahanan Pangan<br>Provinsi Jawa Tengah<br>selaku<br>Ketua Otoritas Kompeten Keamanan Pangan Daerah<br>(OKKP-D) Jawa Tengah</td>
    </tr>
    <tr>
      <td align="center"><br><br><br></td>
    </tr>
    <tr>
      <td align="center"><?= $data['nama_kepala_dinas'] ?><br><?= $data['pangkat'] ?><br>NIP. <?= $data['nip'] ?> </td>
    </tr>
  </table>

</div>
