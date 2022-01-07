
<script src="<?= base_url() ?>assets/dashboard/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/jquery.qrcode.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/qrcode.js"></script>
    <section class="content">
        <div class="container-fluid">
<?php
include 'header_lhu.php'; 
?>
<h2 align="center">TANDA TERIMA BERKAS PENDAFTARAN</h2> 
<table border="0" width="100%">
    <tr>
        <td width="30%" align="left">No Tiket Pendaftaran</td>
        <td width="1">:</td>
        <td><?= $kode ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">Nama Pemohon</td>
        <td width="1">:</td>
        <td><?= $detail->nama_pemohon ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">Jenis / Nama Usaha</td>
        <td width="1">:</td>
        <td><?= $detail->jenis_usaha . " / " . $detail->nama_usaha ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">Alamat</td>
        <td width="1">:</td>
        <td><?= $detail->alamat_usaha . " RT " . $detail->rt . " RW " . $detail->rw . " Kel " . $detail->kelurahan. " Kec " . $detail->kecamatan ." ". $detail->kota ?></td>
    </tr>
    <tr>
        <td width="30%" align="left">No Telp / HP</td>
        <td width="1">:</td>
        <td><?= $detail->no_telp . " / " .  $detail->no_hp_pemohon?></td>
    </tr>
    <tr>
        <td width="30%" align="left">Jenis Layanan</td>
        <td width="1">:</td>
        <td>Uji Mutu</td>
    </tr>
    <tr>
        <td width="30%" align="left">Jabatan Pemohon</td>
        <td width="1">:</td>
        <td><?= $detail->jabatan_pemohon ?></td>
    </tr> 
    <tr>
        <td width="30%" align="left">Status</td>
        <td width="1">:</td>
        <td>Online</td>
    </tr>
    <tr>
        <td width="30%" align="left">Tanggal Pendaftaran</td>
        <td width="1">:</td>
        <td><?php echo date('Y-m-d') ?></td>
    </tr>
    <tr>
        <td colspan="3"><img style="width: 100px;" src="<?php echo base_url().''.$qrcode;?>"></td>
    </tr>
    <tr>
        <td colspan="3">Dicetak oleh  <?= $detail->nama_pemohon . " " . date('Y-m-d H:i:s') ?></td>
    </tr>
    
</table> 
      
            </div>
          </div>
        </div>
      </div> 