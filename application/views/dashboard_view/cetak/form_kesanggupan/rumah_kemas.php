<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Form Kesanggupan Rumah Kemas');
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
            $tanggal=date('d M Y');
            

            $html='
              <br><br>
              <h2 align="center">KOP SURAT</h2>
              <p align="center"><center><b>PERNYATAAN KESANGGUPAN (COMPLIANCE AGREEMENT)</b></center><br></p>
                <p>Yang bertanda tangan di bawah ini:<br>
              </p>
              <table>
                <tr>
                  <td>Nama</td>
                    <td width="30">: </td>
                    <td>'.$rumah_kemas['nama_pemohon'].'</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td width="30">:</td>
                  <td>'.$rumah_kemas['alamat_usaha'].'</td>
                </tr>
                <tr>
                  <td>Selaku</td>
                  <td width="30">:</td>
                  <td>'.$rumah_kemas['jabatan_pemohon'].'</td>
                </tr>
                <tr>
                  <td>di bawah ini</td>
                  <td width="30"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nama Unit Usaha</td>
                  <td width="30">:</td>
                  <td>'.$rumah_kemas['nama_usaha'].'</td>
                </tr>
                <tr>
                  <td>Ruang Lingkup</td>
                  <td width="30">:</td>
                  <td>sertifikasi/registrasi* Rumah Kemas </td>
                </tr>
                <tr>
                  <td>Komoditas</td>
                  <td width="30">:</td>
                  <td>..........................</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td width="30">:</td>
                  <td>'.$rumah_kemas['alamat_usaha'].'</td>
                </tr>
              </table>

              <p>
                Dengan ini menyatakan <b>bersedia untuk</b> : <br>

                <table>
                  <tr>
                    <td valign="top" width="30">1.</td>
                    <td width="500">Memenuhi semua persyaratan sertifikasi/registrasi  dan memberikan informasi yang diperlukan
                        untuk evaluasi produk yang akan disertifikasi sebagaimana terlampir dalam proposal permohonan ini.<br></td>
                  </tr>
                  <tr>
                    <td valign="top" width="30">2.</td>
                    <td>Sanggup mematuhi semua ketentuan yang ditetapkan oleh OKKP-D Provinsi Jawa Tengah<br></td>
                  </tr>
                  <tr>
                    <td valign="top" width="30">3.</td>
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
                  <td align="center">'.$rumah_kemas['kota'].', '.$tanggal.'</td>
                </tr>
                <tr>
                  <td align="center">'.$rumah_kemas['jabatan_pemohon'].'</td>
                </tr>
                <tr>
                  <td align="center"><br><br><br><br><br><br></td>
                </tr>
                <tr>
                  <td align="center">'.$rumah_kemas['nama_pemohon'].'</td>
                </tr>
              </table>
              <p>* coret yang tidak perlu</p>
                      ';


            // $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Form_Kesanggupan_Rumah_Kemas.pdf', 'I');
?>
