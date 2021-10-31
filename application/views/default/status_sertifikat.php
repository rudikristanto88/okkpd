

<?php
  $params['data'] = base64_encode($status['nomor_sertifikat']);
  $params['level'] = 'H';
  $params['size'] = 4;
  $params['savename'] = FCPATH.'tes.png';
  $this->ciqrcode->generate($params);

?>
<div class="row">
  <div class="container">
    <div class="col-sm-12">
      <center><h4>Sertifikat dengan nomor :</h4>
      <h3><?= $status['nomor_sertifikat']; ?></h3>
      <?php if($status['nomor_sertifikat'] != ""){ echo '<img src="'.base_url().'tes.png" />'; } ?><br/><br/>
      <table class="table-noboder">
        <tr>
          <td align="left"><strong>Pelaku Usaha</strong></td>
          <td> : <?= $status['nama_usaha'] ?></td>
        </tr>
        <tr>
          <td><strong>Nama Produk</strong></td>
          <td> : <?= $status['nama_produk'].' '.$status['keterangan'] ?></td>
        </tr>
        <tr>
          <td><strong>Nama Merk</strong></td>
          <td> : <?php if($status['merk'] != ''){echo $status['merk'];}else{ echo "-";} ?></td>
        </tr>
      </table>
      <h3 <?php if($status['status_aktif'] == 'AKTIF'){ echo 'style="color:#2ecc71"'; }else{echo 'style="color:#e74c3c"';} ?>><?= $status['status_aktif']; ?></h3>
      <span>Sampai dengan <b>

        <?php
        $time = strtotime($status['tanggal_akhir']);
        echo date('d/m/Y',$time); ?></b></span>
      </center>
    </div>

  </div>
</div>
