<nav class="navbar  navbar-default" style="margin-bottom:0">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>home/basis_data/sertifikasi"><i class="fas fa-arrow-left"></i></a>
            <span class="navbar-brand" href="#"><?= $submenu['title'] ?></span>
        </div>
    </div>
</nav>
<ol class="breadcrumb">
  <li><a href="<?= base_url() ?>">Beranda</a></li>
  <li><a href="<?= base_url() ?>home/basis_data">Basis Data</a></li>
  <li><a href="<?= base_url() ?>home/basis_data/sertifikasi">Sertifikasi</a></li>
  <li><?= $submenu['title'] ?></li>
</ol>
<div class="container">
    <table id="table-datatable" class="table table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Sertifikat</th>
                <th>Nama Unit Penangangan PSAT</th>
                <th>Alamat Unit Penanganan PSAT</th>
                <th>Kab/Kota</th>
                <th>Status Kepemilikan</th>
                <th>Level SPPB-PSAT</th>
                <th>Ruang Lingkup</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1;
            foreach ($data as $element) : ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $element["nomor_sertifikat"] ?></td>
                    <td><?= $element["nama_unit"] ?></td>
                    <td><?= $element["alamat_unit"] ?></td>
                    <td><?= $element["kota_unit"] ?></td>
                    <td><?= $element["status_kepemilikan"] ?></td>
                    <td><?= $element["level_sppb"] ?></td>
                    <td><?= $element["ruang_lingkup"] ?></td>
                    <td><?php $tanggal_cetak = strtotime($element['tanggal_cetak']);
                        echo date('d/m/Y', $tanggal_cetak) ?></td>
                    <td><?php $tanggal_akhir = strtotime($element['tanggal_kadaluarsa']);
                        echo date('d/m/Y', $tanggal_akhir) ?></td>
                    <td><?= $element["status_aktif"] ?></td>
                </tr>
            <?php $index++;endforeach; ?>
        </tbody>
    </table>
    <br />

</div>