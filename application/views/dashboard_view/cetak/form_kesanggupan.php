<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Form Kesanggupan Prima3');
            // $pdf->SetHeaderMargin(10);
            $pdf->SetTopMargin(5);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            // $pdf->SetAuthor('Author');
            $pdf->SetFont('times', 12);
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            $tanggal= date('d');
            $tanggal .= ' '.$bulan[date('n') -1];
            $tanggal .= ' '.date('Y');

$pdf->setJPEGQuality(75);

            $encode = base64_encode($form['kop_surat'] );
            $imgdata = base64_decode($encode );
            $pdf->Image('@'.$imgdata, 15, 14, 180, 30);

            $html = "";
            if($form['jenis_usaha'] != 'Perorangan'){
              $html .= '<br><br><br><br><br><br><br><br>
              <h2 align="center"></h2>
              <p align="center"><center><b>PERNYATAAN KESANGGUPAN (COMPLIANCE AGREEMENT)</b></center><br></p>
                <p>Yang bertanda tangan di bawah ini:<br>
              </p>';
            }else{
                $html .= '<br><br><br><br><br><br>';
            }


            $html .='

              <table >
                <tr>
                  <td>Nama</td>
                    <td width="10">: </td>
                    <td>'.$form['nama_pemohon'].'</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td width="10">:</td>
                  <td>'.$form['alamat_usaha'].'</td>
                </tr>
                <tr>
                  <td>Selaku</td>
                  <td width="10">:</td>
                  <td>'.$form['jabatan_pemohon'].'</td>
                </tr>
                <tr>
                  <td>di bawah ini</td>
                  <td width="10"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nama Unit Usaha</td>
                  <td width="10">:</td>
                  <td>'.$form['nama_usaha'].'</td>
                </tr>
                <tr>
                  <td>Ruang Lingkup</td>
                  <td width="10">:</td>
                  <td width="">sertifikasi/registrasi* '.$kode_layanan.'</td>
                </tr>
                <tr>
                  <td>Produk/Komoditas</td>
                  <td width="10">:</td>
                  <td>';
                  $i = 1;
                  $ukuran = sizeof($komoditas);

                    foreach ($komoditas as $komoditas) {
                      $html .= $i.'. '.$komoditas['nama_produk'].' '.$komoditas['nilai'].'';
                      if($i < $ukuran){
                        $html .= '<br/>';
                      }
                      $i++;
                    }
                  $html .='</td>
                </tr>

              </table>

              <p>
                Dengan ini menyatakan <b>bersedia untuk</b> : <br>

                <table>
                  <tr>
                    <td valign="top" width="10">1.</td>
                    <td width="500">Memenuhi semua persyaratan sertifikasi/registrasi  dan memberikan informasi yang diperlukan
                        untuk evaluasi produk yang akan disertifikasi sebagaimana terlampir dalam proposal permohonan ini.<br></td>
                  </tr>
                  <tr>
                    <td valign="top" width="10">2.</td>
                    <td>Sanggup mematuhi semua ketentuan yang ditetapkan oleh OKKP-D Provinsi Jawa Tengah<br></td>
                  </tr>
                  <tr>
                    <td valign="top" width="10">3.</td>
                    <td>Siap bertanggungjawab secara penuh apabila terjadi temuan-temuan di kemudian hari terkait produk yang telah disertifikasi</td>
                  </tr>

                </table>
                <p><br>
                Demikian pernyataan ini dibuat untuk dipergunakan sebagaimana mestinya.
              </p>
              <table>
                <tr >
                  <td rowspan="5" width="50%">&nbsp;</td>
                </tr>
                <tr>
                  <td align="center">'.str_replace('Kota','',ucwords(strtolower($form['kota']))).', '.$tanggal.'</td>
                </tr>
                <tr>
                  <td align="center">'.$form['jabatan_pemohon'].'</td>
                </tr>
                <tr>
                  <td align="center"><br><br><br><br><br><br></td>
                </tr>
                <tr>
                  <td align="center">'.$form['nama_pemohon'].'</td>
                </tr>
              </table>
              <p>* coret yang tidak perlu</p>
                      ';


            // $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Form_Kesanggupan_Prima3.pdf', 'I');
?>
