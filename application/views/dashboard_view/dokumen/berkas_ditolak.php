<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Berkas Pendaftaran');
            // $pdf->SetHeaderMargin(10);
            $pdf->SetTopMargin(15);
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
            <style type="text/css">
            hr.style2{
              border: 2px double #000000;
            }
           </style>
            <table width="900">
            <tr>
            <td align="center" rowspan="2" width="80px"><img width="80px" src="assets/dashboard/images/jateng.png"></td>

                <td  align="center"><p style="font-size:15px">PEMERINTAH PROVINSI JAWA TENGAH<br>
                   DINAS KETAHANAN PANGAN PROVINSI JAWA TENGAH<br>OTORITAS KOMPETEN KEAMANAN PANGAN DAERAH
                 </p>
                 </td>
            </tr>
            <tr>
                <td align="center"><p>Jl. Gatot Subroto - Ungaran, Telp. (024) 6922411 - 6923158, Fax. (024) 6921997</p></td>
            </tr>
            </table>
            <hr class="style2" >
            <p>
            Nomor 	: (by Sistem)<br>
            Perihal 	: Pemberitahuan ke Pemohon<br><br>

            Kepada Yth.:   Nama Perusahaan/Kelompok (by Sistem)<br>
            di - ...................<br><br>

            Berdasarkan hasil verifikasi dokumen permohonan tanggal ........., maka :<br>
            Jenis Layanan	: (by Sistem)<br>
            Nomor Registrasi	: (No Ticket)<br>
            Nama Pemohon	: (by Sistem)<br>
            dengan ini diberitahukan bahwa, permohonn Saudara DITOLAK dengan alasan sebagai berikut:<br>
            ……………………………………………………………………………………………………<br>
            ……………………………………………………………………………………………………<br><br>
            Apabila Saudara masih berminat mengajukan permohonan tersebut, Saudara dapat mengajukan kembali dengan mengisi permohonan baru dengan memperhatikan alasan penolakan diatas.

            Demikian disampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.<br><br>

            Ungaran, ....................20...<br>

            Ketua  OKKP-D<br>
            Provinsi Jawa Tengah<br>

            ..............................................<br>
            NIP. ........................<br><br><br>
            Tembusan:
            Ketua Otoritas Kompeten Keamanan Pangan Pusat

            </p>

                      ';


            // $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Berkas Pendaftaran.pdf', 'I');
?>
