<section class="content">
  <div class="container-fluid">
    <div class="block-header">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item 	bcrumb-1">
                <a href="<?= base_url() ?>dashboard">
                <i class="material-icons">home</i>
                Beranda</a>
              </li>
              <li class="breadcrumb-item active">Proses </li>
              <li class="breadcrumb-item active">Uji Mutu</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body"> 
              <form class="" action="<?= base_url("dashboard/proses_valid_ujilab") ?>" class="text-white" method="post">
                <div class="row clearfix">

                    <div class="col-sm-12">
                        <div class="input-field">
                            <input type="hidden" name="kode_layanan" value="ujimutu" readonly>
                            <input type="hidden" name="kode_pendaftaran" value="<?= $kode_pendaftaran ?>" readonly>
                            <input type="hidden" name="id_layanan" value="<?= $id_layanan ?>" readonly>
                            <input type="hidden" name="idjenis" value="<?= $idjenis ?>" readonly>
                            <input type="hidden" name="idjenisdetail" value="<?= $idjenisdetail ?>" readonly>
                            <input id="kode_pendaftaran" type="text" name="kode_pendaftaran" class="text-white" data-length="10" value="<?= $kode_pendaftaran ?>" readonly>
                            <label for="nama_perusahaan">Kode Pendaftaran</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field"> 
                            <input id="namajenis" type="text" name="namajenis" class="text-white" data-length="10" value="<?= $namajenis ?>" readonly>
                            <label for="nama_perusahaan">Jenis Sample</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field"> 
                            <input id="berat" type="text" name="berat" class="text-white" data-length="10" value="<?= $berat ?>" readonly>
                            <label for="nama_perusahaan">Berat Sampel</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-field"> 
                            <input id="kondisi" type="text" name="kondisi" class="text-white" data-length="10" value="<?= $kondisi ?>" readonly>
                            <label for="nama_perusahaan">Kondisi Sampel</label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-hover display" width="100%" >
                        <thead>
                            <tr>
                            <th>JENIS UJI</th>
                            <th>SATUAN</th>
                            <th>HASIL UJI</th>
                            <th>SYARAT MUTU</th>
                            <th>METODE UJI</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Butir rusak</td>
                                <td>%</td>
                                <td><input id="hasiluji1" type="text" name="hasiluji1" class="text-white" value=""></td>
                                <td><input id="kelasmutu1" type="text" name="kelasmutu1" class="text-white" value="">
                                <input type="hidden" name="jenisuji1" value="1. Butir rusak">
                                <input type="hidden" name="satuan1" value="%">
                                <input type="hidden" name="metodeuji1" value="SNI 01-3921-1995">
                                </td>
                                <td>SNI 01-3921-1995</td>
                            </tr>
                            <tr>
                                <td>2. Butir belah</td>
                                <td>%</td>
                                <td><input id="hasiluji2" type="text" name="hasiluji2" class="text-white" value=""></td>
                                <td><input id="kelasmutu2" type="text" name="kelasmutu2" class="text-white" value="">
                                <input type="hidden" name="jenisuji2" value="2. Butir belah">
                                <input type="hidden" name="satuan2" value="%">
                                <input type="hidden" name="metodeuji2" value="SNI 01-3921-1995">
                                </td>
                                <td>SNI 01-3921-1995</td>
                            </tr>
                            <tr>
                                <td>3. Butir warna lain</td>
                                <td>%</td>
                                <td><input id="hasiluji3" type="text" name="hasiluji3" class="text-white" value=""></td>
                                <td><input id="kelasmutu3" type="text" name="kelasmutu3" class="text-white" value="">
                                <input type="hidden" name="jenisuji3" value="3. Butir warna lain">
                                <input type="hidden" name="satuan3" value="%">
                                <input type="hidden" name="metodeuji3" value="SNI 01-3921-1995">
                                </td>
                                <td>SNI 01-3921-1995</td>
                            </tr>
                            <tr>
                                <td>4. Butir keriput</td>
                                <td>%</td>
                                <td><input id="hasiluji4" type="text" name="hasiluji4" class="text-white" value=""></td>
                                <td><input id="kelasmutu4" type="text" name="kelasmutu4" class="text-white" value="">
                                <input type="hidden" name="jenisuji4" value="4. Butir keriput">
                                <input type="hidden" name="satuan4" value="%">
                                <input type="hidden" name="metodeuji4" value="SNI 01-3921-1995">
                                </td>
                                <td>SNI 01-3921-1995</td>
                            </tr>
                             
                            <tr>
                                <td>5. Kotoran</td>
                                <td>%</td>
                                <td><input id="hasiluji5" type="text" name="hasiluji5" class="text-white" value=""></td>
                                <td><input id="kelasmutu5" type="text" name="kelasmutu5" class="text-white" value="">
                                <input type="hidden" name="jenisuji5" value="5. Kotoran">
                                <input type="hidden" name="satuan5" value="%">
                                <input type="hidden" name="metodeuji5" value="SNI 01-3921-1995">
                                </td>
                                <td>SNI 01-3921-1995</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit " class="btn btn-info waves-effect" name="button">Simpan</button>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Input -->


    </div>

  </div>
</div>

</section>
