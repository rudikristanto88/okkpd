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
            <p>Nomor 	: (No Ticket Pendaftaran)<br>
Perihal 	:   Diterimanya Pendaftaran <br><br>


Kepada <br>
Nama Perusahaan/Kelompok/Perorangan (by sistem)
……………………………………………….<br><br>


Berdasarkan hasil penilaian kelengkapan dokumen administrasi<br>
Jenis Layanan	: (by Sistem)<br>
Nomor Registrasi	:<br>
Nama Pemohon	:<br><br>

Dengan ini diberitahukan bahwa permohonan saudara tersebut DITERIMA dan akan diproses lebih lanjut. Demikian agar maklum.
</p>

                      ';


            // $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Berkas Pendaftaran.pdf', 'I');
?>
