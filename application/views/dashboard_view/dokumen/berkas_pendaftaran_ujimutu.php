<?php
            $pdf = new Pdf('L', 'mm', 'A5', true, 'UTF-8', false);
            $pdf->SetTitle('Berkas Pendaftaran');
            // $pdf->SetHeaderMargin(10);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            // $pdf->SetAuthor('Author');
            $pdf->SetFont('times', 12);
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage('L','A5');
            $tanggal=date('d M Y');

            // set style for barcode
            $style = array(
                'border' => 2,
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255)
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            );

foreach ($berkas as $berkas);
$style = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);



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
            <p align="center">TANDA TERIMA BERKAS PENDAFTARAN</p>

            <table>
            <tr>
              <td width="150">Nomor Tiket Permohonan</td>
              <td width="10">:</td>
              <td>'.$berkas['kode_pendaftaran'].'</td>
            </tr>
            <tr>
              <td width="150">Nama Pemohon</td>
              <td width="10">:</td>
              <td>'.$berkas['nama_pemohon'].'</td>
            </tr>
            <tr>
              <td width="150">Jenis / Nama Usaha </td>
              <td width="10">:</td>
              <td>'.$berkas['jenis_usaha'].' / '.$berkas['nama_usaha'].'</td>
            </tr>
            <tr>
              <td width="150">Alamat</td>
              <td width="10">:</td>
              <td>'.$berkas['alamat_usaha'].'</td>
            </tr>
            <tr>
              <td width="150">No. Telp / HP</td>
              <td width="10">:</td>
              <td>'.$berkas['no_telp'].' / '.$berkas['no_hp_pemohon'].'</td>
            </tr>
            <tr>
              <td width="150">Jenis Layanan</td>
              <td width="10">:</td>
              <td>'.$berkas['nama_layanan'].'</td>
            </tr>
            <tr>
              <td width="150">Jabatan Pemohon</td>
              <td width="10">:</td>
              <td>'.$berkas['jabatan_pemohon'].'</td>
            </tr>
            <tr>
              <td width="150">Status</td>
              <td width="10">:</td>
              <td>Online</td>
            </tr>
            <tr>
              <td width="150">Tanggal Pendaftaran</td>
              <td width="10">:</td>
              <td>'.$berkas['tanggal_buat'].' </td>
            </tr>

            </table>
            <br><br><br>
            <span align="right" style="font-size:10px">Dicetak Oleh : '.$berkas['nama_pemohon'].'   pada: '.date("d-m-Y h:m:s" ).'</span>';


                        // $html.='</table>';
                        $pdf->writeHTML($html, true, false, true, false, '');
                       // $pdf->write2DBarcode($berkas['kode_pendaftaran'], 'QRCODE,H', 150, 80, 40, 40, $style, 'N');

                        $pdf->Output('Berkas Pendaftaran.pdf', 'I');

?>
