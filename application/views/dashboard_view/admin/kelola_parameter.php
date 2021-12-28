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
                        <li class="breadcrumb-item active">Kelola Parameter</li>
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
                                            <strong>Kelola</strong> Parameter
                                        </h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <button href="javascript:void(0);" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span>Aksi</span> <i class="material-icons">more_vert</i>
                                                </button>
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
                                                    <th width="100">No</th>
                                                    <th>Nama Parameter</th>
                                                    <th>Unsur Hitungan</th>
                                                    <th width="200"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_table">
                                                <?php $i = 0;
                                                foreach ($kuesioner as $element) : ?>
                                                    <tr>
                                                        <td><?= $i + 1 ?></td>
                                                        <td><?= $element['nama_parameter'] ?></td>
                                                        <td><?= $element['isaktif'] ? 'Ya' : 'Tidak' ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info" data-toggle="modal" onclick="updateData('<?= $element['id'] ?>', '<?= $element['nama_parameter'] ?>', '<?= $element['isaktif'] ?>')" data-target="#update">Update</button>
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
            <h5 class="text-black">Hapus Parameter</h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                &nbsp;&nbsp;
                <form action="<?= base_url() ?>index.php/dashboard/kelola_parameter/hapus" method="post">
                    <input type="hidden" name="id" id="id_hapus">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="update" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm" style="max-width:600px">
        <!-- Modal content-->
        <form action="<?= base_url() ?>index.php/dashboard/kelola_parameter/proses" method="post">
            <div class="modal-content">
                <div class="modal-header">
                 <h5 id="title" class="text-black"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-sm-12 mb-4">
                            <div class="input-field">
                                <input name="action" type="hidden" id="action">
                                <input name="id" type="hidden" id="id">
                                <input id="nama_parameter" name="nama_parameter" type="text" required>
                                <label for="nama_parameter">Nama Parameter</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="text-small">Unsur Hitungan</label>
                                <select class="form-control text-black" id="isaktif" name="isaktif">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
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

    var defaultPeriode = {
        id: 0,
        nama_parameter: '',
        isaktif: 0,
    }

    function deleteData(data) {
        $("#id_hapus").val(data);
    }

    function setModalUpdate(data) {
        $("#id").val(data.id);
        $("#nama_parameter").val(data.nama_parameter);
        $("#isaktif").val(data.isaktif);
        $("#action").val(action);
    }

    function updateData(id, nama_parameter, isaktif, tipe, aspek) {
        action = "Ubah";
        $("#title").html(action + " Parameter");

        setModalUpdate({
            id: id,
            nama_parameter: nama_parameter,
            isaktif: isaktif
        })
    }

    function tambahData() {
        action = "Tambah";
        $("#title").html(action + " Parameter");
        setModalUpdate(defaultPeriode);
    }
</script>