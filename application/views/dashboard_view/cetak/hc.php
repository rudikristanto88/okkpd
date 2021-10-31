<div class="">
<?php
include 'header_hc.php';

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
 <style type="text/css">
 hr.style2{
   border: 2px double #000000;
 }
</style>
 <hr class="style2" >
  <p align="center" ><b>Health Certificate for the Importation into the European Union of<br>Nutmeg from Indonesia</b><br></p>
    <table align="center">
      <tr>
        <td rowspan="2"><?php if($sertifikat['nomor_sertifikat'] != ""){ echo '<img src="'.base_url().'tes.png" />'; } ?></td>
        <td><b>Consignment Code</b></td>
          <td>: </td>
          <td><?= $sertifikat['consignment_code']?></td>
      </tr>
      <tr>
        <td><b>Certificate Number</b></td>
        <td>:</td>
        <td width="300"></td>
      </tr>
    </table>
    <p align="justify">According to the provisions of Commission Implementing Regulation (EU) 884/2014 imposing<br>
    special conditions governing the import of certain feed and food from certain third countries<br>
    due to contamination risk aflatoxins and repealing Regulation (EC) No 1151/2009, the Food <br>
    Security Agency as Central Competent Authority of Food Safety CERTIFIES that the pproduce<br>
    of this consignment composed of :</p>
  <table>
    <tr>
      <td>Consignment Code / Batch </td>
        <td>: </td>
        <td><?= $sertifikat['consignment_code']?></td>
    </tr>
    <tr>
      <td>Name of Product and Botanical Name of Plant</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td>HS number of Product</td>
      <td>:</td>
      <td><?= $sertifikat['nomor_hs']?></td>
    </tr>
    <tr>
      <td>Number of Package</td>
      <td>:</td>
      <td><?= $sertifikat['jumlah_kemasan']?></td>
    </tr>
    <tr>
      <td>Type of Package</td>
      <td>:</td>
      <td><?= $sertifikat['jenis_kemasan']?></td>
    </tr>
    <tr>
      <td>Weight : -Gross Weight</td>
      <td>:</td>
      <td><?= $sertifikat['berat_kotor']?></td>
    </tr>
    <tr>
      <td>&nbsp;-Net weight</td>
      <td>:</td>
      <td><?= $sertifikat['berat_bersih']?></td>
    </tr>
  </table>
  <span>embarked at :</span>
  <table>
    <tr>
        <td>Place / Port of Embarkation</td>
        <td>: </td>
        <td><?= $sertifikat['pelabuhan_berangkat']?></td>
    </tr>
    <tr>
        <td>Identification of Transporter</td>
        <td>: </td>
        <td><?= $sertifikat['identitas_transportasi']?></td>
    </tr>
  </table>
  <span>going to :</span>
  <table>
    <tr>
        <td>Destination :</td>
        <td>- Place / Port of Destination</td>
        <td>:</td>
        <td><?= $sertifikat['pelabuhan_tujuan']?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>- Country of Destination</td>
        <td>:</td>
        <td><?= $sertifikat['negara_tujuan']?></td>
    </tr>
  </table>
  <span>which comes from the establishment:</span>
  <table>
    <tr>
        <td>Country of Origin</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td>Indonesia</td>
    </tr>
    <tr>
        <td>Establishment :</td>
        <td>-Name of Establishment</td>
        <td>:</td>
        <td><?= $sertifikat['nama_eksportir']?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>-Full Address of Establishment</td>
        <td>:</td>
        <td><?= $sertifikat['alamat_kantor']?></td>
    </tr>
  </table>
  <p>
    From the consignment, samples were taken in accordance with the Union legislation<br>
    <span style="border:1px solid #111">&nbsp&nbsp&nbsp&nbsp</span> Commission Regulation (EC) No 152/2009<br>
    <span style="border:1px solid #111">&nbsp&nbsp&nbsp&nbsp</span> Commission Regulation (EC) EU No 519/2014 amending Regulation (EC) No.401/2006


  </p>
  <table>
    <tr>
      <td> </td>
    </tr>
    <tr>
      <td> </td>
    </tr>
    <tr>
      <td> </td>
    </tr>
    <tr>
      <td> </td>
    </tr>

  </table>
  <!-- <span><i>On ................., Subjected to ............................................................................................................................................. to determine the level of Alfatoxin B1 for feed and the level of Alfatoxin B1 and level of total alfatoxin contamination <br>
  for food. The details of sampling method of analysis used and all results are attached </i>
  </span> -->
  <br><br><br>
  <table>
    <tr>
      <td>This certificate is valid until</td>
        <td>: </td>
        <td> <?= $bulan_eng[date('n')-1] ?> <?= date('d') ?> <?= (date('Y')+3) ?></td>
    </tr>
    <td>Done at Ungaran on</td>
      <td>: </td>
      <td> <?= $bulan_eng[date('n')-1] ?> <?= date('d') ?> <?= date('Y') ?></td>
  </tr>
  </table>
  <table>
    <tr >
      <td rowspan="4" width="60%">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Head of Regional Competent Authority of Food<br>Safey as Authorized Representative of the <br>Ministry of Agriculture</td>
    </tr>
    <tr>
      <td align="center"><br><br><br></td>
    </tr>
    <tr>
      <td align="center"><?= $data['nama_kepala_dinas'] ?><br><?= $data['pangkat'] ?><br>NIP. <?= $data['nip'] ?> </td>
    </tr>
  </table>

</div>
