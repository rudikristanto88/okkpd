<?php
foreach ($tugas_fungsi as $data) {
}
?>
<div class="page_content">

    <section class="fullwidth_section news_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sc_section">
                        <div class="sc_content container">
                            <div class="sc_blogger layout_news template_news sc_blogger_horizontal">
                                <div class="columns_wrap">


                                    <div class="container">
                                        <div class="post_item post_item_news sc_blogger_item sc_blogger_item_last">
                                            <h4 class="post_title sc_title sc_blogger_title">Tugas & Fungsi</h4>
                                            <div class="post_content sc_blogger_content">
                                                <div class="post_descr">
                                                     <p><?php if($tugas_fungsi == null){echo 'Tidak ada data yang ditampilkan';}else{echo $data['tugas_fungsi'];}?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
