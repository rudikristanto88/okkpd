<nav class="navbar  navbar-default ">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>index.php/home/basis_data/okkpd"><i class="fas fa-arrow-left"></i></a>
            <span class="navbar-brand" href="#"><?= $submenu['title'] ?></span>
        </div>
    </div>
</nav>
<div class="container">
    <table id="table-datatable" class="table table-responsive stripped">
        <thead>
            <tr>
                <th>No.</th>
                <th>No Sertifikat</th>
                <th>Nama Usaha</th>
                <th>Alamat Usaha</th>
                <th>Kab/Kota Alamat Usaha</th>
                <th>Alamat Rumah Pengemasan</th>
                <th>Kota/Kab Pengemasan</th>
                <th>Nama Pengelola</th>
                <th>Nama Personel Kontak</th>
                <th>Nomor Telepon/HP Kontak</th>
                <th>Email Kontak</th>
                <th>Ruang Lingkup/Komoditas</th>
                <th>Ruang Lingkup/Komoditas (Latin)</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Berakhir/Kadaluarsa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1;
            foreach ($data as $element) : ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $element["nomor_sertifikat"] ?></td>
                    <td><?= $element['nama_usaha'] ?></td>
                    <td><?= $element["alamat_usaha"] ?></td>
                    <td><?= $element["kota"] ?></td>
                    <td><?= $element["alamat_pengemasan"] ?></td>
                    <td><?= $element["kota_pengemasan"] ?></td>
                    <td><?= $element["nama_pemohon"] ?></td>
                    <td><?= $element["nama_personel"] ?></td>
                    <td><?= $element["no_hp_pemohon"] ?></td>
                    <td><?= $element["email"] ?></td>
                    <td><?= $element["komoditas"] ?></td>
                    <td><?= $element["komoditas_latin"] ?></td>
                    <td><?php $tanggal_cetak = strtotime($element['tanggal_cetak']); echo date('d/m/Y',$tanggal_cetak) ?></td>
                    <td><?php $tanggal_akhir = strtotime($element['tanggal_akhir']); echo date('d/m/Y',$tanggal_akhir) ?></td>
                    <td><?= $element["status_aktif"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br />

</div>