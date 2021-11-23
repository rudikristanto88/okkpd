

<?php
$data;
$i = 0;
foreach ($slider as $slider) {
  $data[$i] = $slider['gambar_slider'];
  $i++;

}

// foreach ($panduan as $panduan);
 ?>

 <style media="screen">
   .table-noboder tr td{
     border-color:transparent;
     color:black;

   }
 </style>

            <section class="slider_wrap slider_fullwide slider_engine_revo slider_alias_main">

                <div id="rev_slider_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                    <!-- START REVOLUTION SLIDER 4.6.92 fullwidth mode -->
                    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner tp-simpleresponsive">
                        <ul class="tp-revslider-mainul">    <!-- SLIDE  -->
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="400" data-saveperformance="off" class="tp-revslider-slidesli">
                                <!-- MAIN IMAGE -->
                                <div class="slotholder" data-bgposition="center top" data-bgfit="cover">
                                  <?php echo '<img width="100%" class="tp-bgimg defaultimg" src="data:image/jpeg;base64,'.base64_encode( $data[0] ).'" alt="Card image">'; ?>

                                    <!-- <img class="tp-bgimg defaultimg" alt="" src="<?= base_url() ?>assets/default/images/slider_okkpd/slider1.jpg" data-src="images/slider/2200x1400.png"> -->
                                </div>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 BAYANGAN -->
                                <!-- <div class="tp-caption customin fadeout start" data-x="-2115" data-y="-2" data-customin="x:3000;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0.66;transformPerspective:600;transformOrigin:50% 50%;" data-speed="7700" data-start="0" data-easing="Power0.easeIn" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" data-endeasing="Quad.easeInOut">
                                    <img src="<?= base_url() ?>assets/default/images/slider/1889x527.png" alt="">
                                </div> -->

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption trx-big tp-fade fadeout tp-resizeme start" data-x="center" data-hoffset="0" data-y="200" data-speed="500" data-start="600" data-easing="Quad.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400">
                                    Layanan Online <br>
                                    e-OKKPD Provinsi Jawa Tengah
                                </div>

                                <!-- LAYER NR. 3 -->
                                <!-- <div class="tp-caption customin ltr start" data-x="center" data-hoffset="-16" data-y="235" data-customin="x:-590;y:-140;z:-70;rotationX:0;rotationY:0;rotationZ:10;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="600" data-start="1200" data-easing="Quad.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" data-endeasing="Quad.easeIn">
                                    <img src="<?= base_url() ?>assets/default/headerbuku.png" alt="" data-ww="1241.696113074205" data-hh="251">
                                </div> -->

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption trx-no-style sfb fadeout start" data-x="center" data-hoffset="0" data-y="500" data-speed="500" data-start="1600" data-easing="Quad.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400">
                                    <a href="<?= base_url() ?>Dokumen/unduh_panduan" class="sc_button sc_button_square sc_button_bg_light">
                                        <span>Unduh Panduan</span>
                                    </a>
                                </div>
                            </li>
                            <!-- SLIDE  -->
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="400" data-saveperformance="off" class="tp-revslider-slidesli">
                                <!-- MAIN IMAGE -->
                                <div class="slotholder" data-bgposition="center top" data-bgfit="cover">
                                  <?php echo '<img width="100% class="tp-bgimg defaultimg" src="data:image/jpeg;base64,'.base64_encode( $data[1] ).'" alt="Card image">'; ?>

                                    <!-- <img class="tp-bgimg defaultimg" alt="" src="<?= base_url() ?>assets/default/images/slider_okkpd/slider2.jpg" data-src="images/slider/2200x1400.png"> -->
                                    <div class="slot">
                                        <div class="slotslide">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <!-- <div class="tp-caption lfl stl start" data-x="center" data-hoffset="-408" data-y="bottom" data-voffset="1" data-speed="500" data-start="1900" data-easing="Quad.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Quad.easeIn">
                                    <img src="<?= base_url() ?>assets/default/images/slider/283x246.png" alt="">
                                </div> -->

                                <!-- LAYER NR. 2 -->
                                <!-- <div class="tp-caption sfr ltr start" data-x="center" data-hoffset="146" data-y="bottom" data-voffset="4" data-speed="500" data-start="1400" data-easing="Quad.easeOut" data-elementdelay="0.1" data-endelementdelay="0.5" data-endspeed="700" data-endeasing="Quad.easeIn">
                                    <img src="<?= base_url() ?>assets/default/images/slider/815x246.png" alt="">
                                </div> -->

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption trx-big-extra tp-fade fadeout tp-resizeme start" data-x="center" data-hoffset="65" data-y="200" data-speed="500" data-start="600" data-easing="Quad.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400">
                                  Slogan e-OKKPD<br>
                                    <p style="font-size:30px">PRIMA: Profesional, Responsif, Inovatif, Mandiri, Amanah</p>
                                </div>

                                <!-- LAYER NR. 4 -->
                                <!-- <div class="tp-caption randomrotate fadeout start" data-x="center" data-hoffset="435" data-y="307" data-speed="700" data-start="2500" data-easing="easeOutBounce" data-elementdelay="1" data-endelementdelay="0.1" data-endspeed="500">
                                    <img src="<?= base_url() ?>assets/default/images/slider/107x53.png" alt="">
                                </div> -->
                            </li>
                            <!-- SLIDE  -->
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="400" data-saveperformance="off" class="tp-revslider-slidesli">
                                <!-- MAIN IMAGE -->
                                <div class="slotholder" data-bgposition="center top" data-bgfit="cover">
                                  <?php //echo '<img width="100%  class="tp-bgimg defaultimg" src="data:image/jpeg;base64,'.base64_encode( $data[2] ).'" alt="Card image">'; ?>

                                    <!-- <img class="tp-bgimg defaultimg" alt="" src="<?= base_url() ?>assets/default/images/slider_okkpd/slider3.jpg" data-src="images/slider/2200x1400.png"> -->
                                </div>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption trx-big-left sfb fadeout tp-resizeme start" data-x="100" data-y="250" data-speed="500" data-start="1200" data-easing="Quad.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400">
                                    Maklumat e-OKKPD
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption trx-normal-white sfb fadeout tp-resizeme start" data-x="100" data-y="370" data-speed="500" data-start="1600" data-easing="Quad.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
                                    Dengan ini kami menyatakan sanggup menyelenggarakan pelayanan<br>
                                    yang terbaik, non diskriminatif, tepat waktu dan <br>
                                    tanggap terhadap keluhan pelanggan.
                                </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption trx-no-style sfb fadeout start" data-x="100" data-y="475" data-speed="500" data-start="2000" data-easing="Quad.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400">
                                    <a href="<?= base_url() ?>Dokumen/unduh_panduan" class="sc_button sc_button_square sc_button_bg_light">
                                        <span>Unduh Panduan</span>
                                    </a>
                                </div>

                                <!-- LAYER NR. 4 -->
                                <!-- <div class="tp-caption sfb stb start" data-x="right" data-hoffset="-120" data-y="botom" data-voffset="10" data-speed="600" data-start="800" data-easing="Quad.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Quad.easeIn">
                                    <img src="<?= base_url() ?>assets/default/images/slider/480x538.png" alt="" data-ww="408.9807692307693" data-hh="459">
                                </div> -->
                            </li>
                        </ul>
                    </div>

                </div><!-- END REVOLUTION SLIDER -->
            </section>

            <div class="page_content">

                <section class="fullwidth_section news_section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sc_section">
                                    <div class="sc_content container">
                                        <div class="sc_blogger layout_news template_news sc_blogger_horizontal">
                                            <div class="columns_wrap">
                                                <div class="col-sm-4 column_item_1">
                                                    <div class="post_item post_item_news sc_blogger_item">
                                                        <div class="post_featured">
                                                            <div class="post_thumb">
                                                                <img alt="Air Freight Forwarding" src="<?= base_url() ?>assets/image/keluhan.jpg">
                                                                <div class="hover_wrap">
                                                                    <div class="link_wrap">
                                                                        <a class="hover_link icon-link" href="<?= base_url(); ?>home/keluhan_saran"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="post_title sc_title sc_blogger_title">Keluhan dan Saran</h4>
                                                        <div class="post_content sc_blogger_content">
                                                            <div class="post_descr">
                                                                <p>Layanan Keluhan dan Saran</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 column_item_2">
                                                    <div class="post_item post_item_news sc_blogger_item">
                                                        <div class="post_featured">
                                                            <div class="post_thumb">
                                                                <img alt="Supply Chain Security" src="<?= base_url() ?>assets/image/info.jpg">
                                                                <div class="hover_wrap">
                                                                    <div class="link_wrap">
                                                                        <a class="hover_link icon-link" href="<?= base_url(); ?>home/info_layanan"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="post_title sc_title sc_blogger_title">Info Layanan</h4>
                                                        <div class="post_content sc_blogger_content">
                                                            <div class="post_descr">
                                                                <p>Info Layanan</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 column_item_4">
                                                    <div class="post_item post_item_news sc_blogger_item sc_blogger_item_last">
                                                        <div class="post_featured">
                                                            <div class="post_thumb">
                                                                <img alt="Import Fundamentals" src="<?= base_url() ?>assets/default/images/regulasi.jpg">
                                                                <div class="hover_wrap">
                                                                    <div class="link_wrap">
                                                                        <a class="hover_link icon-link" href="<?= base_url(); ?>home/regulasi"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="post_title sc_title sc_blogger_title">Regulasi dan Info Publik</h4>
                                                        <div class="post_content sc_blogger_content">
                                                            <div class="post_descr">
                                                                <p>Pengaturan Tatalaksana Perizinan</p>
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

                <!-- <section class="fullwidth_section no_padding_container dark_section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sc_section">
                                    <div class="sc_section_overlay">
                                        <div class="sc_section_content">
                                            <div class="sc_content container">
                                                <div class="sc_section sc_tabs_section style_3">
                                                    <div id="sc_tabs_1" class="sc_tabs sc_tabs_style_3" data-active="0">
                                                        <div class="sc_tabs_wrap_first">
                                                             <div class="sc_tabs_wrap">
                                                                 <div class="sc_tabs_top">
                                                                    <h4 class="subtitle">e-OKKPD <br>Provinsi Jawa Tengah</h4>
                                                                    <h2 class="title">our<br>services</h2>
                                                                    <div class="description">As a market leader in global air freight forwarding.</div>
                                                                </div>
                                                                 <ul class="sc_tabs_titles" role="tablist">
                                                                    <li class="sc_tabs_title" role="tab" tabindex="0" aria-controls="sc_tab_1" aria-labelledby="sc_tab_1_tab" aria-selected="true" aria-expanded="true">
                                                                        <a href="#sc_tab_1" class="theme_button ui-tabs-anchor" id="sc_tab_1_tab" tabindex="-1">
                                                                        Logistics
                                                                            <span class="icon-right11"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="sc_tabs_title" role="tab" tabindex="-1" aria-controls="sc_tab_2" aria-labelledby="sc_tab_2_tab" aria-selected="false" aria-expanded="false">
                                                                        <a href="#sc_tab_2" class="theme_button ui-tabs-anchor" id="sc_tab_2_tab" tabindex="-1">
                                                                        Packaging
                                                                            <span class="icon-right11"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="sc_tabs_title last ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="sc_tab_3" aria-labelledby="sc_tab_3_tab" aria-selected="false" aria-expanded="false">
                                                                        <a href="#sc_tab_3" class="theme_button ui-tabs-anchor" id="sc_tab_3_tab" tabindex="-1">
                                                                        Materials
                                                                            <span class="icon-right11"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                             </div>
                                                            <div id="sc_tab_1" class="sc_tabs_content" aria-labelledby="sc_tab_1_tab" role="tabpanel" aria-hidden="false">
                                                                <p>Whether you require distribution or fulfillment, defined freight forwarding, or a complete supply chain solution, GL can provide you with a customized solution tailored to your needs.</p>
                                                                <div class="sc_skills sc_skills_bar3 sc_skills_vertical" data-type="bar3" data-subtitle="Skills" data-dir="vertical">
                                                                    <div class="columns_wrap sc_skills_columns sc_skills_columns_5">
                                                                         <div class="sc_skills_column col-sm-2 col-xs-2">
                                                                            <div class="sc_skills_item sc_skills_style_1">
                                                                                <div class="sc_skills_icon">
                                                                                    <span class="icon-plane-2"></span>
                                                                                </div>
                                                                                <div class="sc_skills_total width_icon" data-start="0" data-stop="99" data-step="1" data-max="100" data-speed="31" data-duration="3069" data-ed="%"></div>
                                                                                <div class="sc_skills_count"></div>
                                                                                <div class="sc_skills_info">
                                                                                    <div class="sc_skills_label">Air Freight </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                         <div class="sc_skills_column col-sm-2 col-xs-2">
                                                                            <div class="sc_skills_item sc_skills_style_1">
                                                                                <div class="sc_skills_icon">
                                                                                    <span class="icon-ship-2"></span>
                                                                                </div>
                                                                                <div class="sc_skills_total width_icon" data-start="0" data-stop="90" data-step="1" data-max="100" data-speed="13" data-duration="1170" data-ed="%"></div>
                                                                                <div class="sc_skills_count"></div>
                                                                                <div class="sc_skills_info">
                                                                                    <div class="sc_skills_label">Ocean Freight</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc_skills_column col-sm-2 col-xs-2">
                                                                            <div class="sc_skills_item sc_skills_style_1">
                                                                                <div class="sc_skills_icon">
                                                                                    <span class="icon-truck-2"></span>
                                                                                </div>
                                                                                <div class="sc_skills_total width_icon" data-start="0" data-stop="98" data-step="1" data-max="100" data-speed="15" data-duration="1470" data-ed="%"></div>
                                                                                <div class="sc_skills_count"></div>
                                                                                <div class="sc_skills_info">
                                                                                    <div class="sc_skills_label">Road Freight</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc_skills_column col-sm-2 col-xs-2">
                                                                            <div class="sc_skills_item sc_skills_style_1">
                                                                                <div class="sc_skills_icon">
                                                                                    <span class="icon-cargo"></span>
                                                                                </div>
                                                                                <div class="sc_skills_total width_icon" data-start="0" data-stop="86" data-step="1" data-max="100" data-speed="11" data-duration="946" data-ed="%"></div>
                                                                                <div class="sc_skills_count"></div>
                                                                                <div class="sc_skills_info">
                                                                                    <div class="sc_skills_label">Warehousing</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc_skills_column col-sm-2 col-xs-2">
                                                                            <div class="sc_skills_item sc_skills_style_1">
                                                                                <div class="sc_skills_icon">
                                                                                    <span class="icon-support"></span>
                                                                                </div>
                                                                                <div class="sc_skills_total width_icon" data-start="0" data-stop="89" data-step="1" data-max="100" data-speed="16" data-duration="1424" data-ed="%"></div>
                                                                                <div class="sc_skills_count"></div>
                                                                                <div class="sc_skills_info">
                                                                                    <div class="sc_skills_label">Expedited Services</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="sc_tab_2" class="sc_tabs_content" aria-labelledby="sc_tab_2_tab" role="tabpanel" aria-hidden="true">
                                                                <h3 class="sc_title sc_title_regular">Secure Packaging</h3>
                                                                    <p>GL has a menu of supply chain solutions that can optimize the effectiveness of your product promotion, and reduce the cost of your packaging and distribution as well as your carbon footprint.</p>
                                                                    <p>“Sales Lift” is music to any marketing, brand or merchandising manager’s ears. GL understands the impact packaging has when your customers are competing for market dollars.</p>
                                                                    <p>Above all OIA’s retail business model combines material choices with an innovative design approach and color management process that supports “Sales Lift” to meet or exceed your ROI expectations.</p>
                                                                <div class="sc_section aligncenter">
                                                                    <figure class="sc_image  sc_image_shape_square">
                                                                        <img src="<?= base_url() ?>assets/default/images/330x267.png" alt="">
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                            <div id="sc_tab_3" class="sc_tabs_content" aria-labelledby="sc_tab_3_tab" role="tabpanel" aria-hidden="true">
                                                                <h3 class="sc_title sc_title_regular">Retail &amp; Transit Packaging</h3>
                                                                <p>GL has a menu of supply chain solutions that can optimize the effectiveness of your product promotion, and reduce the cost of your packaging and distribution as well as your carbon footprint.</p>
                                                                <p>“Sales Lift” is music to any marketing, brand or merchandising manager’s ears. GL understands the impact packaging has when your customers are competing for market dollars.</p>
                                                                <h3 class="sc_title sc_title_regular">Optimization</h3>
                                                                <p>GL is taking optimization to a whole new level. It has evolved into a comprehensive, fully integrated program designed to maximize productivity, minimize waste, and above all, reduce your per unit cost. Nothing exposes the weak links in your supply chain like optimization. And once those weaknesses are identified, we’ll work to eliminate them through our extensive program that includes the following key components:</p>
                                                                <div class="columns_wrap sc_columns sc_columns_count_2">
                                                                    <div class="col-sm-6 sc_column_item">
                                                                        <ul class="sc_list sc_list_style_iconed">
                                                                            <li class="sc_list_item">
                                                                                <span class="sc_list_icon icon-ok"></span>
                                                                                Solutions Engineering
                                                                            </li>
                                                                            <li class="sc_list_item">
                                                                                <span class="sc_list_icon icon-ok"></span>
                                                                                High-Performance Material
                                                                            </li>
                                                                            <li class="sc_list_item">
                                                                                <span class="sc_list_icon icon-ok"></span>
                                                                                Supply Chain Network
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-6 sc_column_item">
                                                                        <ul class="sc_list sc_list_style_iconed">
                                                                            <li class="sc_list_item">
                                                                                <span class="sc_list_icon icon-ok"></span>
                                                                                Deployed Resources
                                                                            </li>
                                                                            <li class="sc_list_item">
                                                                                <span class="sc_list_icon icon-ok"></span>
                                                                                Logistics
                                                                            </li>
                                                                            <li class="sc_list_item">
                                                                                <span class="sc_list_icon icon-ok"></span>
                                                                                Financial Reporting
                                                                            </li>
                                                                        </ul>
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
                        </div>
                    </div>
                </section> -->
				<!--
                <section class="fullwidth_section no_padding_top_container calculator_bg1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sc_section calculator">
                                    <div class="sc_section_overlay">
                                        <div class="sc_section_content">                                                <input type="number"></input>

                                            <div class="sc_content container">
                                                <h4 class="subtitle_container">e-OKKPD <br>Provinsi Jawa Tengah</h4>
                                                <div class="sc_columns">
                                                    <div class="col-md-8 col-sm-7 sc_column_item"></div>
                                                    <div class="col-md-4 col-sm-5 sc_column_item">
                                                        <h2 class="sc_title sc_title_regular sc_align_left">service<br>
                                                        calculator</h2>
                                                        <div class="sc_section">
                                                            <p>Starting form. Basic calculated fields sample.</p>
                                                        </div>
                                                        <div class="sc_section">
                                                            <form name="cp_calculatedfieldsf_pform_1" id="cp_calculatedfieldsf_pform_1" action="#" method="post" data-evalequations="1" autocomplete="on" novalidate="novalidate">
                                                                <input type="hidden" name="form_structure_1" id="form_structure_1" value="[[{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname11&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:0,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname12&quot;,&quot;fieldname13&quot;,&quot;fieldname23&quot;,&quot;fieldname20&quot;],&quot;columns&quot;:&quot;1&quot;,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname13&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:1,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname17&quot;,&quot;fieldname21&quot;,&quot;fieldname22&quot;],&quot;columns&quot;:&quot;3&quot;,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname12&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:2,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname2&quot;,&quot;fieldname26&quot;],&quot;columns&quot;:1,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname2&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:3,&quot;ftype&quot;:&quot;fnumber&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;Distance&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;large&quot;,&quot;thousandSeparator&quot;:&quot;&quot;,&quot;decimalSymbol&quot;:&quot;.&quot;,&quot;min&quot;:&quot;&quot;,&quot;max&quot;:&quot;&quot;,&quot;dformat&quot;:&quot;number&quot;,&quot;formats&quot;:[&quot;digits&quot;,&quot;number&quot;],&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname26&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:4,&quot;ftype&quot;:&quot;fnumber&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;Weight&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;large&quot;,&quot;thousandSeparator&quot;:&quot;&quot;,&quot;decimalSymbol&quot;:&quot;.&quot;,&quot;min&quot;:&quot;&quot;,&quot;max&quot;:&quot;&quot;,&quot;dformat&quot;:&quot;number&quot;,&quot;formats&quot;:[&quot;digits&quot;,&quot;number&quot;],&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname17&quot;,&quot;shortlabel&quot;:&quot;Length&quot;,&quot;index&quot;:5,&quot;ftype&quot;:&quot;fnumber&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;Length&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;large&quot;,&quot;thousandSeparator&quot;:&quot;&quot;,&quot;decimalSymbol&quot;:&quot;.&quot;,&quot;min&quot;:&quot;&quot;,&quot;max&quot;:&quot;&quot;,&quot;dformat&quot;:&quot;number&quot;,&quot;formats&quot;:[&quot;digits&quot;,&quot;number&quot;],&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname21&quot;,&quot;shortlabel&quot;:&quot;Height&quot;,&quot;index&quot;:6,&quot;ftype&quot;:&quot;fnumber&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;Height&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;large&quot;,&quot;thousandSeparator&quot;:&quot;&quot;,&quot;decimalSymbol&quot;:&quot;.&quot;,&quot;min&quot;:&quot;&quot;,&quot;max&quot;:&quot;&quot;,&quot;dformat&quot;:&quot;number&quot;,&quot;formats&quot;:[&quot;digits&quot;,&quot;number&quot;],&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname22&quot;,&quot;shortlabel&quot;:&quot;Width&quot;,&quot;index&quot;:7,&quot;ftype&quot;:&quot;fnumber&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;Width&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;large&quot;,&quot;thousandSeparator&quot;:&quot;&quot;,&quot;decimalSymbol&quot;:&quot;.&quot;,&quot;min&quot;:&quot;&quot;,&quot;max&quot;:&quot;&quot;,&quot;dformat&quot;:&quot;number&quot;,&quot;formats&quot;:[&quot;digits&quot;,&quot;number&quot;],&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname9&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:8,&quot;ftype&quot;:&quot;fCalculated&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;result&quot;,&quot;title&quot;:&quot;The field below will show the double of the number above ($)&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;required&quot;:false,&quot;size&quot;:&quot;large&quot;,&quot;toolbar&quot;:&quot;default|mathematical&quot;,&quot;eq&quot;:&quot;(fieldname2*fieldname26*fieldname17*fieldname21*fieldname22)/20+fieldname24+fieldname25&quot;,&quot;optimizeEq&quot;:true,&quot;eq_factored&quot;:&quot;((fieldname2*fieldname26*fieldname17*fieldname21*fieldname22)/20+fieldname24+fieldname25)&quot;,&quot;suffix&quot;:&quot;&quot;,&quot;prefix&quot;:&quot;&quot;,&quot;decimalsymbol&quot;:&quot;.&quot;,&quot;groupingsymbol&quot;:&quot;&quot;,&quot;dependencies&quot;:[{&quot;rule&quot;:&quot;&quot;,&quot;complex&quot;:false,&quot;fields&quot;:[&quot;&quot;]}],&quot;readonly&quot;:false,&quot;hidefield&quot;:false,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname20&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:9,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname9&quot;],&quot;columns&quot;:1,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname23&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:10,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname24&quot;,&quot;fieldname25&quot;],&quot;columns&quot;:1,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname24&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:11,&quot;ftype&quot;:&quot;fradio&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;radio_label_top&quot;,&quot;title&quot;:&quot;Fragile:&quot;,&quot;layout&quot;:&quot;three_column&quot;,&quot;required&quot;:false,&quot;choiceSelected&quot;:&quot;Yes - 100&quot;,&quot;showDep&quot;:false,&quot;choices&quot;:[&quot;Yes&quot;,&quot;No&quot;],&quot;choicesVal&quot;:[&quot;100&quot;,&quot;0&quot;],&quot;choicesDep&quot;:[[],[]],&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname25&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:12,&quot;ftype&quot;:&quot;fcheck&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;label_top&quot;,&quot;title&quot;:&quot;Extra services:&quot;,&quot;layout&quot;:&quot;one_column&quot;,&quot;required&quot;:false,&quot;showDep&quot;:false,&quot;choices&quot;:[&quot;Express Delivery&quot;,&quot;Insurance&quot;,&quot;Packaging&quot;],&quot;choicesVal&quot;:[&quot;100&quot;,&quot;100&quot;,&quot;100&quot;],&quot;choiceSelected&quot;:[true,false,false],&quot;choicesDep&quot;:[[],[],[]],&quot;fBuild&quot;:{}}],[{&quot;title&quot;:&quot;&quot;,&quot;description&quot;:&quot;&quot;,&quot;formlayout&quot;:&quot;top_aligned&quot;,&quot;formtemplate&quot;:&quot;&quot;,&quot;evalequations&quot;:1,&quot;autocomplete&quot;:1}]]">
                                                                <div id="fbuilder">
                                                                    <div id="fieldlist_1" class="top_aligned">
                                                                        <div class="pb0 pbreak">
                                                                            <div class="fields">
                                                                                <div class="fields">
                                                                                    <div class="fields">
                                                                                        <label>Distance</label>
                                                                                        <div class="dfield">
                                                                                            <input name="fieldname2_1" class="field number large" type="text" value="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fields">
                                                                                        <label>Weight</label>
                                                                                        <div class="dfield">
                                                                                            <input name="fieldname26_1" class="field number large" type="text" value="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="fields">
                                                                                    <div class="fields column3">
                                                                                        <label>Length</label>
                                                                                        <div class="dfield">
                                                                                            <input name="fieldname17_1" class="field number large" type="text" value="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fields column3">
                                                                                        <label>Height</label>
                                                                                        <div class="dfield">
                                                                                            <input name="fieldname21_1" class="field number large" type="text" value="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fields column3">
                                                                                        <label>Width</label>
                                                                                        <div class="dfield">
                                                                                            <input name="fieldname22_1" class="field number large" type="text" value="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="fields">
                                                                                    <div class="fields radio_label_top">
                                                                                        <label>Fragile:</label>
                                                                                        <div class="dfield">
                                                                                            <div class="three_column">
                                                                                                <div class="jq-radio field  group  checked">
                                                                                                    <input name="fieldname24_1" class="field  group " value="100" type="radio" checked="">
                                                                                                    <div class="jq-radio__div"></div>
                                                                                                </div>
                                                                                                Yes
                                                                                            </div>
                                                                                            <div class="three_column">
                                                                                                <div class="jq-radio field  group ">
                                                                                                    <input name="fieldname24_1" class="field  group " value="0" type="radio">
                                                                                                    <div class="jq-radio__div"></div>
                                                                                                </div>
                                                                                                No
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fields label_top">
                                                                                        <label>Extra services:</label>
                                                                                        <div class="dfield">
                                                                                            <div class="one_column">
                                                                                                <div class="jq-checkbox field  group  checked">
                                                                                                    <input name="fieldname25_1[]" class="field  group " value="100" type="checkbox" checked="">
                                                                                                    <div class="jq-checkbox__div"></div>
                                                                                                </div>
                                                                                                Express Delivery
                                                                                            </div>
                                                                                            <div class="one_column">
                                                                                                <div class="jq-checkbox field  group ">
                                                                                                    <input name="fieldname25_1[]" class="field  group " value="100"  type="checkbox">
                                                                                                    <div class="jq-checkbox__div"></div>
                                                                                                </div>
                                                                                                Insurance
                                                                                            </div>
                                                                                            <div class="one_column">
                                                                                                <div class="jq-checkbox field  group ">
                                                                                                    <input name="fieldname25_1[]" class="field  group " value="100"  type="checkbox" >
                                                                                                    <div class="jq-checkbox__div"></div>
                                                                                                </div>
                                                                                                Packaging
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="fields ">
                                                                                    <div class="fields result">
                                                                                        <label>The field below will show the double of the number above ($)</label>
                                                                                        <div class="dfield">
                                                                                            <input name="fieldname9_1" class="codepeoplecalculatedfield field large" type="text" value="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
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
				-->
                <section class="fullwidth_section grey_section no_padding_top_container timeline_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="sc_section">
                                    <div class="sc_section_overlay">
                                        <div class="sc_section_content">
                                            <div class="sc_content">
                                                <h4 class="subtitle_container">e-OKKPD <br>Provinsi Jawa Tengah </h4>
                                                <h2 class="sc_title sc_title_regular sc_align_left">Status Layanan</h2>

                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <div class="form-container">
                                                      <input type="text" name="nama_lengkap" value="" id="nomor_pendaftaran" class="form-input  form-block" placeholder="Nomor Pendaftaran Anda" required>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-container">
                                                      <button type="button" name="button" id="cari_status">Cari</button>
                                                    </div>
                                                  </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="sc_section">
                                    <div class="sc_section_overlay">
                                        <div class="sc_section_content">
                                            <div class="sc_content">
                                                <h4 class="subtitle_container">&nbsp;<br/>&nbsp;</h4>
                                                <h2 class="sc_title sc_title_regular sc_align_left">Status Sertifikat</h2>

                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <div class="form-container">
                                                      <input type="text" name="nama_lengkap" value="" id="nomor_sertifikat" class="form-input form-block" placeholder="Nomor Sertifikat Anda" required>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-2">
                                                    <div class="form-container">
                                                      <button type="button" name="button" id="cari_sertifikat">Cari</button>
                                                    </div>
                                                  </div>

                                                </div>
                                            </div>
                                            <!-- <div class="sc_section bg_tint_none"> -->
                                                <!-- BEGIN TIMELINE -->

                                                <!-- <div id="tl1" class="timeline flatLine">

                                                    <div class="item" data-id="05/04/2015" data-description="April, 5" data-count="1">
                                                        <a class="con_borderImage">
                                                            <img src="<?= base_url() ?>assets/default/images/timeline/240x130.png" alt="">
                                                        </a>
                                                        <h2>April, 5</h2>
                                                        <span>As a market leader in global air freight forwarding, OIA Global excels in providing tailored</span>
                                                    </div>
                                                    <div class="item_open" data-id="05/04/2015" data-count="1">
                                                        <div class="item_open_cwrapper">
                                                            <div class="t_close" data-count="1" data-id="05/04/2015">Close</div>
                                                            <div class="item_open_content">
                                                                <img class="ajaxloader" src="<?= base_url() ?>assets/default/images/timeline/loadingAnimation.gif" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- END TIMELINE -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div id="loading-bar" style="display:none">
                                <div class="loader-custom"></div>
                              </div>
                              <div class="sc_section bg_tint_none" id="hasil_status" style="margin-top:50px">

                              </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- <section class="fullwidth_section no_padding_container testimonals_section testimonals_bg1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sc_section">
                                    <div class="sc_section_overlay">
                                        <div class="sc_section_content">
                                            <div class="sc_content container" >
                                                <h4 class="subtitle_container">e-OKKPD <br>Provinsi Jawa Tengah</h4>
                                                <h2 class="sc_title sc_title_regular sc_align_left">what people say about us</h2>
                                                <div class="sc_testimonials sc_slider_swiper swiper-slider-container sc_slider_controls sc_slider_height_auto" data-interval="7000">
                                                    <div class="slides swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="sc_testimonial_item">
                                                                <div class="sc_testimonial_avatar">
                                                                    <img alt="testimonial2.jpg" src="<?= base_url() ?>assets/default/images/testimonial/135x135.png">
                                                                </div>
                                                                <div class="sc_testimonial_wrap">
                                                                    <div class="sc_testimonial_content">
                                                                        <p>Their performance on our project was extremely successful. As a result of this collaboration, the project<br>
                                                                    was built with exceptional quality and was delivered in time and within budget.</p>
                                                                    </div>
                                                                    <div class="sc_testimonial_author">
                                                                        <a href="#">Samuel Kleo</a>
                                                                    </div>
                                                                    <div class="sc_testimonial_field">CEO, Global Company Inc., France </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="sc_testimonial_item">
                                                                <div class="sc_testimonial_avatar">
                                                                    <img alt="testimonial3.jpg" src="<?= base_url() ?>assets/default/images/testimonial/135x135.png">
                                                                </div>
                                                                <div class="sc_testimonial_wrap">
                                                                    <div class="sc_testimonial_content">
                                                                        <p>The construction process with this crew was a pleasurable experience! They did<br>
                                                                    all in time and  with no safety incidents. Thank you so much guys!</p>
                                                                    </div>
                                                                    <div class="sc_testimonial_author">
                                                                        <a href="#">Amy Adams</a>
                                                                    </div>
                                                                    <div class="sc_testimonial_field">CEO, Global Company Inc., France </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="sc_testimonial_item">
                                                                <div class="sc_testimonial_avatar">
                                                                    <img alt="testimonial1.jpg" src="<?= base_url() ?>assets/default/images/testimonial/135x135.png">
                                                                </div>
                                                                <div class="sc_testimonial_wrap">
                                                                    <div class="sc_testimonial_content">
                                                                        <p>These guys are just the coolest builders ever! They were aware of our financial structure<br>
                                                                    and focus on cost efficiencies , and they did deliver an exceptional project!</p>
                                                                    </div>
                                                                    <div class="sc_testimonial_author">
                                                                        <a href="#">Michael Holberg</a>
                                                                    </div>
                                                                    <div class="sc_testimonial_field">CEO, Global Company Inc., France </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sc_slider_controls_wrap">
                                                        <a class="sc_slider_prev" href="#"></a>
                                                        <a class="sc_slider_next" href="#"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->

                <section class="fullwidth_section no_padding_container news_section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sc_section">
                                    <div class="sc_content container">
                                        <h4 class="subtitle_container">e-OKKPD <br>Provinsi Jawa Tengah</h4>
                                        <h2 class="sc_title sc_title_regular sc_align_left">berita terkini</h2>
                                        <section class="fullwidth_section news_section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sc_section">
                                    <div class="sc_content container">
                                        <div class="sc_blogger layout_news template_news sc_blogger_horizontal">
                                            <div class="columns_wrap">

                                              <!-- =============================== -->
                                              <?php foreach ($berita as $berita): ?>
                                                <div class="col-sm-4 column_item_1">
                                                    <div class="post_item post_item_news sc_blogger_item">
                                                        <div class="post_featured">
                                                            <div class="post_thumb">

                                                              <?php
                                                              if($berita['gambar'] == null || $berita['gambar'] == ""){
                                                                echo '<img alt="Air Freight Forwarding" src="'.base_url().'assets/default/images/news/400x250.png">';
                                                              }else{
                                                                echo '<img width="100% class="tp-bgimg defaultimg" src="data:image/jpeg;base64,'.base64_encode( $berita['gambar'] ).'" alt="Card image">';
                                                              }
                                                              ?>
                                                                <div class="hover_wrap">
                                                                    <div class="link_wrap">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="post_title sc_title sc_blogger_title"><?= $berita['judul_berita'] ?></h4>
                                                        <div class="post_content sc_blogger_content">
                                                            <div class="post_descr">
                                                                <p><?= substr($berita['isi_berita'],0,100) ?>. . . </p>
                                                                <a href="<?= base_url() ?>home/berita/<?= $berita['slug'] ?>" class="sc_button sc_button_square sc_button_bg_underline  sc_button_iconed ">
                                                                    Baca Selengkapnya
                                                                    <span class="sc_button_iconed icon-right"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                              <?php endforeach; ?>

                                                <!-- ================================= -->



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<!--
                <section class="fullwidth_section no_padding_top_container emailer_section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sc_section">
                                    <div class="sc_content container">
                                        <div class="sc_line sc_line_style_solid"></div>
                                        <div class="sc_emailer alignleft sc_emailer_opened">
                                            <form class="sc_emailer_form">
                                                <span class="title">Newsletter</span>
                                                <input type="text" class="sc_emailer_input" name="email" value="" placeholder="Enter your Email here">
                                                <a href="#" class="sc_emailer_button" title="Submit" data-group="E-mailer subscription">Subscribe</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#cari_status").click(function(){
      $("#loading-bar").toggle();
      var nomor_pendaftaran = $("#nomor_pendaftaran").val();
      $.ajax({
        url: "<?= base_url()?>home/getStatusLayanan",
        data:{nomor_pendaftaran: nomor_pendaftaran},
        type: "POST",
        success: function(result){
          $("#loading-bar").toggle();
          $("#hasil_status").html(result);
        }
      });
    });

    $("#cari_sertifikat").click(function(){
      $("#loading-bar").toggle();
      var nomor_sertifikat = $("#nomor_sertifikat").val();
      $.ajax({
        url: "<?= base_url()?>home/getStatusSertifikat",
        data:{nomor_sertifikat: nomor_sertifikat},
        type: "POST",
        success: function(result){
          $("#loading-bar").toggle();
          $("#hasil_status").html(result);
        }
      });
    });
  });
</script>
