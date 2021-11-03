<!-- <link rel="stylesheet" type="text/css" href="rating_style.css"> -->

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
                                        <form method="post" action="insert_rating.php">
                                            <?php $index = 1;
                                            foreach ($list_survey as $element) : ?>
                                                <div class="div">
                                                    <p><?= $element['pertanyaan'] ?></p>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <input type="hidden" id="<?= "question-" . $index . '-' . $i . '_hidden' ?>" value="<?= $i ?>">
                                                        <img src="<?= base_url() ?>assets/image/star1.png" onmouseover="change(this.id);" id="<?= "question-" . $index . '-' . $i ?>" class="php">
                                                    <?php endfor; ?>
                                                </div>
                                            <?php $index += 1;
                                            endforeach; ?>



                                            <input type="hidden" name="phprating" id="phprating" value="0">
                                            <input type="hidden" name="asprating" id="asprating" value="0">
                                            <input type="hidden" name="jsprating" id="jsprating" value="0">
                                            <input type="submit" value="Submit" name="submit_rating">

                                        </form>

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



<script type="text/javascript">
    function change(id) {
        var cname = document.getElementById(id).className;
        var ab = document.getElementById(id + "_hidden").value;
        document.getElementById(cname + "rating").innerHTML = ab;
        for (var i = ab; i >= 1; i--) {
            document.getElementById(id).src = "<?= base_url().'assets/image/'?>star2.png";
        }
        var id = parseInt(ab) + 1;
        for (var j = id; j <= 5; j++) {
            document.getElementById(id).src = "<?= base_url().'assets/image/'?>star1.png";
        }
    }
</script>