<nav class="navbar  navbar-default ">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url()?>index.php/home/basis_data"><i class="fas fa-arrow-left"></i></a>
            <span class="navbar-brand" href="#"><?= $layanan['nama_layanan'] ?></span>
        </div>
    </div>
</nav>
<div class="container">
    <table id="table-datatable" class="table table-responsive stripped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Perusahaan</th>
                <th>Alamat</th>
                <th>Jenis Komoditas</th>
                <th>Nomor LHU</th>
                <th>Tanggal Pendaftaran</th>
                <th>Tanggal Terbit</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1;foreach ($data as $element) : ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $element['nama_usaha'] ?></td>
                    <td><?= $element["alamat_usaha"] ?></td>
                    <td><?= $element["namajenis"].", ".$element["namadetail"] ?></td>
                    <td><?= $element["kode_pendaftaran"] ?></td>
                    <td><?= $element["tanggal_buat"] ?></td>
                    <td><?= $element["tanggalManTek"] ?></td>

                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>