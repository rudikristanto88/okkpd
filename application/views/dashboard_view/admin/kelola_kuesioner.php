<section class="content">
    <div class="container-fluid">
        <div class="block-header" id="konten">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <ul class="breadcrumb breadcrumb-style">
                        <li class="breadcrumb-item 	bcrumb-1">
                            <a href="<?= base_url() ?>dashboard">
                                <i class="material-icons">home</i>
                                Home</a>
                        </li>
                        <li class="breadcrumb-item active">Kelola Kuesioner</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <?php
                                    if ($this->session->flashdata("status")) {
                                        echo $this->session->flashdata("status");
                                    }
                                    ?>
                                    <div class="header">
                                        <h2>
                                            <strong>Kelola</strong> Kuesioner
                                        </h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a style="cursor:pointer;" data-toggle="modal" onclick="tambahData()" data-target="#update">Tambah</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="table-datatable" class="display">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pertanyaan</th>
                                                    <th>Jenis</th>
                                                    <th>Tipe</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_table">
                                                <?php $i = 0;
                                                foreach ($kuesioner as $element) : ?>
                                                    <tr>
                                                        <td><?= $i + 1 ?></td>
                                                        <td><?= $element['pertanyaan'] ?></td>
                                                        <td><?= $element['jenis'] ?></td>
                                                        <td><?= $element['tipe'] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info" data-toggle="modal" onclick="updateData('<?= $element['id'] ?>', '<?= $element['pertanyaan'] ?>', '<?= $element['jenis'] ?>', '<?= $element['tipe'] ?>')" data-target="#update">Update</button>
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" onclick="deleteData('<?= $element['id'] ?>')" data-target="#delete">Hapus</button>
                                                        </td>
                                                    </tr>

                                                <?php $i++;
                                                endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Basic Table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
    </div>

</section>

<div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                &nbsp;&nbsp;
                <form action="<?= base_url() ?>index.php/dashboard/kelola_kuesioner/hapus" method="post">
                    <input type="hidden" name="id" id="id_hapus">
                    <button type="submit" class="btn btn-danger">Hapus</button>

                </form>
            </div>
        </div>

    </div>
</div>

<div id="update" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form action="<?= base_url() ?>index.php/dashboard/kelola_kuesioner/proses" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-field">
                                <input name="action" type="hidden" id="action">
                                <input name="id" type="hidden" id="id">
                                <input id="pertanyaan" name="pertanyaan" type="text" required>
                                <label for="pertanyaan">Pertanyaan</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-small">Jenis</label>
                                <select class="form-control text-black" id="jenis" name="jenis">
                                    <?php foreach ($jenis as $element) : ?>
                                        <option value="<?= $element["key"] ?>"><?= $element["value"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-small">Tipe Kuesioner</label>
                                <select class="form-control text-black" id="tipe" name="tipe">
                                    <?php foreach ($tipe as $element) : ?>
                                        <option value="<?= $element ?>"><?= $element ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                    &nbsp;&nbsp;
                </div>
            </div>
        </form>

    </div>
</div>


<script type="text/javascript">
    var action = "Tambah";
    var defaultKuesioner = {
        id: 0,
        pertanyaan: '',
        jenis: 'okkpd',
        tipe: 'Skor',
    }

    function deleteData(data) {
        $("#id_hapus").val(data);
    }

    function setModalUpdate(data) {
        $("#id").val(data.id);
        $("#pertanyaan").val(data.pertanyaan);
        $("#jenis").val(data.jenis);
        $("#tipe").val(data.tipe);
        console.log(data);
        $("#action").val(action);
    }

    function updateData(id, pertanyaan, jenis, tipe, aspek) {
        action = "Ubah";
        setModalUpdate({
            id: id,
            pertanyaan: pertanyaan,
            jenis: jenis,
            tipe: tipe,
        })
    }

    function tambahData() {
        action = "Tambah";
        setModalUpdate(defaultKuesioner);
    }
</script>