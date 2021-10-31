


            <div class="page_content">

                <section class="fullwidth_section news_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="card">
                                <div class="card-body">
                                  <?php
                                  if($berita['gambar'] == null || $berita['gambar'] == ""){
                                    echo '<img alt="Air Freight Forwarding" src="'.base_url().'assets/default/images/news/400x250.png">';
                                  }else{
                                    echo '<center><img class="tp-bgimg defaultimg gambar-berita" src="data:image/jpeg;base64,'.base64_encode( $berita['gambar'] ).'" alt="Card image"></center>';
                                  }
                                  ?>
                                  <h3><?php echo $berita['judul_berita'] ?></h3>
                                  <span class="fas fa-download"></span> Administrator | diunggah pada <?php $a = date("d/m/Y",strtotime($berita['tanggal_buat']));echo $a;  ?>
                                  <hr>
                                  <p><?php echo $berita['isi_berita'] ?></p>

                                </div>
                              </div>

                            </div>
                        </div>
                    </div>
                </section>
</div>
