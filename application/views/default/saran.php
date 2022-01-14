
<ol class="breadcrumb">
<li><a href="<?= base_url(); ?>home">Beranda</a></li>
<li><a href="#">Keluhan dan Saran</a></li>
</ol>




<div class="page_content">

    <section class="fullwidth_section news_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <div class="card">
                    <div class="card-body">
                      
                      <h4>Keluhan dan saran</h4>
                      <p class="sc_contact_form_description" style="color:black">Alamat email tidak akan ditampilkan. <br/>Bagian yang ditandai * harus diisi</p>
                      <form class="" action="<?= base_url() ?>home/keluhan_saran/kirim" method="post" enctype="multipart/form-data">
                        <div class="form-container">
                            <select class="form-input form-block" name="jenis" required>
                                <option value="saran">-- Pilih Salah Satu --</option>
                                <option value="saran">Saran</option>
                                <option value="keluhan">Keluhan</option>
                            </select>
                        </div>
                        <div class="form-container">
                          <input type="text" required name="nama" value="" class="form-input form-block" placeholder="Nama*">
                        </div>
                        <div class="form-container">
                          <input type="email" required name="email" value="" class="form-input form-block" placeholder="Email*">
                        </div>
                        <div class="form-container">
                          <input type="number" required name="no_telp" value="" class="form-input form-block" placeholder="Nomor Telepon*">
                        </div>
                        <div class="form-container">
                          <label for="">Dokumen yang diunggah (opsional)</label>
                          <input type="file" name="dokumen" value="" class="form-input form-block">
                        </div>
                        <div class="form-container">
                          <textarea name="pesan" required rows="8" class="form-input form-block" placeholder="Pesan*"></textarea>
                        </div>
                        <div class="form-container">
                          <div class="g-recaptcha" data-sitekey="6LfOq40UAAAAABPD4hCbtx1hCBxDM1xyG3BQvCLt"></div>
                        </div>


                        <div class="form-container">
                          <button type="submit" class="btn btn-primary btn-block" >Kirim</button>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
            </div>
        </div>
    </section>
</div>
