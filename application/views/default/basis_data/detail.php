<nav class="navbar  navbar-default ">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url()?>index.php/home/basis_data/okkpd"><i class="fas fa-arrow-left"></i></a>
            <span class="navbar-brand" href="#"><?= $layanan['nama_layanan'] ?></span>
        </div>
    </div>
</nav>
<div class="container">
    <table id="table-datatable" class="table table-responsive stripped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jenis Sertifikat</th>
                <th>No Sertifikat</th>
                <th>Unit Pelaku</th>
                <th>Status Sertifikat</th>
                <th>Tanggal Berlaku Sertifikat</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1;foreach ($data as $element) : ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $layanan['nama_layanan'] ?></td>
                    <td><?= $element["nomor_sertifikat"] ?></td>
                    <td><?= $element["nama_usaha"] ?></td>
                    <td>4</td>
                    <td><?= $element["tanggal_unggah"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>