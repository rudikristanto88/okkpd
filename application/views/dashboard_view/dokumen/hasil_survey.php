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
$pdf->AddPage('P', 'A4');
$tanggal = date('d M Y');

// set style for barcode
$style = array(
  'border' => 2,
  'vpadding' => 'auto',
  'hpadding' => 'auto',
  'fgcolor' => array(0, 0, 0),
  'bgcolor' => false, //array(255,255,255)
  'module_width' => 1, // width of a single module in points
  'module_height' => 1 // height of a single module in points
);

$style = array(
  'border' => 0,
  'vpadding' => 'auto',
  'hpadding' => 'auto',
  'fgcolor' => array(0, 0, 0),
  'bgcolor' => false, //array(255,255,255)
  'module_width' => 1, // width of a single module in points
  'module_height' => 1 // height of a single module in points
);

$i = 1;
$total_ikm = 0;
$total_konversi = 0;
$content = "";

foreach ($report_survey["data"] as $element) :
  $content .= '<tr style="vertical-align: center;">
  <td style="text-align: center;">' . $i . '</td>
  <td>' . strtoupper($element["nama_parameter"]) . '</td>
  <td style="text-align: center;">' . $element["avg_total"] . '</td>
  <td style="text-align: center;">' . $element["nilai_konversi"] . '</td>
  <td style="text-align: center;">' . $element["mutu_pelayanan"] . '</td>
  <td style="text-align: center;">' . strtoupper($element["ukuran_kinerja"]) . '</td>
</tr>';

  $i++;
endforeach;

$content .= '
<tr>
  <td ></td>
  <td >JUMLAH</td>
  <td style="text-align: center;">'.$report_survey['total_nilai'].'</td>
  <td style="text-align: center;">'.$report_survey['total_konversi'].'</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td ></td>
  <td >NILAI IKM</td>
  <td style="text-align: center;">'.$report_survey['avg_total_nilai'].'</td>
  <td style="text-align: center;">'.$report_survey['avg_total_konversi'].'</td>
  <td style="text-align: center;">'.$report_survey['mutu_pelayanan'].'</td>
  <td style="text-align: center;">'.strtoupper($report_survey['ukuran_kinerja']).'</td>
</tr>
<tr>
  <td ></td>
  <td >INDEKS KEPUASAN</td>
  <td style="text-align: center;">'.$report_survey['index_kepuasan'] .'%</td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td ></td>
  <td >INDEKS KEPENTINGAN</td>
  <td style="text-align: center;">'.$report_survey['index_kepentingan'] .'%</td>
  <td></td>
  <td></td>
  <td></td>
</tr>';

$html = '
            <style type="text/css">
            hr.style2{
              border: 2px double #000000;
            }
           </style>
           <div style="font-family: Arial, Helvetica, sans-serif">
            <table width="900">
            <tr>
            <td align="center" rowspan="2" width="80px"><img width="80px" src="assets/dashboard/images/jateng.png"></td>
                <td align="center">
                   <span style="font-size:14px">PEMERINTAH PROVINSI JAWA TENGAH</span><br>
                   <span style="font-weight:bold; font-size:20px">DINAS KETAHANAN PANGAN</span> <br/>
                   <span style="font-weight:bold;font-size:14px">BALAI PENINGKATAN MUTU DAN KEAMANAN PANGAN</span><br/>
                   <span style="font-size:9px">Jl.Gatot Subroto, Komplek Pertanian Tarubudaya – Ungaran</span><br/>
                   <span style="font-size:9px">Telp/Fax : (024) 6924604 Surat Elektronik : bpmkpjateng@gmail.com</span><br/>
                 </td>
            </tr>
            </table>
            <hr class="style2" />
            <p><h2 align="center" style="margin-bottom:24px;font-family: "Times New Roman", Times, serif">PENILAIAN SURVEI KEPUASAN MASYARAKAT '.$selected_periode['nama_periode'].'</h2></p>

            <table style="height: 36px; margin-left: auto; margin-right: auto;font-size:11px;" border="1" cellpadding="5px">
            <tbody>
              <tr style="vertical-align: center;">
                <td style="text-align: center; height: 36px; width: 29.675px;">NO</td>
                <td style="text-align: center; height: 36px; width: 147.425px;">UNSUR PELAYANAN</td>
                <td style="text-align: center; height: 36px; width: 68.85px;">NILAI IKM</td>
                <td style="text-align: center; height: 36px; width: 79.7875px;">NILAI KONVERSI</td>
                <td style="text-align: center; height: 36px; width: 99.325px;">MUTU PELAYANAN</td>
                <td style="text-align: center; height: 36px; width: 98.5375px;">UKURAN KINERJA</td>
              </tr>
              ' . $content . '
            </tbody>
            </table>
            <br><br><br>
            </div>';


// $html.='</table>';
$pdf->writeHTML($html, true, false, true, false, '');
// $pdf->write2DBarcode($berkas['kode_pendaftaran'], 'QRCODE,H', 150, 80, 40, 40, $style, 'N');

$pdf->Output('Penilaian Survei Kepuasan Masyarakat '.$selected_periode['nama_periode'].'.pdf', 'I');
