<nav class="navbar  navbar-default ">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>index.php/home/basis_data"><i class="fas fa-arrow-left"></i></a>
            <span class="navbar-brand" href="#"><?= $layanan['nama_layanan'] ?></span>
        </div>
    </div>
</nav>
<div class="container">
    <h3>DAFTAR LAPORAN HASIL UJI </h3>
    <table id="table-datatable" class="table table-responsive stripped">
        <thead>
            <tr>
                <th width="70" >No.</th>
                <th width="300">Nomor LHU</th>
                <th>Nama Pemohon</th>
                <th>Kab/Kota</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1;
            foreach ($data as $element) : ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $element["kode_pendaftaran"] ?></td>
                    <td><?= $element['nama_usaha'] ?></td>
                    <td><?= $element["kota"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br />

</div>