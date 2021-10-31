<?php
  if($dokumen != ''){

    if($tipe == 'image/png' || $tipe == 'image/jpeg' || $tipe == 'image/jpg'){
      $nama = $nama.'.png';
      echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $dokumen ).'" alt="Card image">';
    }else{
      header('Content-type: '.$tipe.'');

      if($tipe == 'application/msword'){
        $nama = $nama.'.doc';
      }else if ($tipe == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
        $nama = $nama.'.docx';
      }else if($tipe == 'application/vnd.ms-excel'){
        $nama = $nama.'.xls';
      }else if($tipe == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
        $nama = $nama.'.xlsx';
      }else if($tipe == 'application/pdf'){
        $nama = $nama.'.pdf';
      }
      // header("Content-Type:" . $a['mime']);
      header('Content-Disposition: attachment; filename="'.$nama.'"');
      header('Cache-Control: max-age=0');
      header('Cache-Control: max-age=1');

      header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
      header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
      header ('Cache-Control: cache, must-revalidate');
      header('Content-Transfer-Encoding: binary');

	    header('Connection: close');

      // print $dokumen;

      echo $dokumen;
      exit();

    }

}else{
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename="data.xls"');
  print $dokumen;
}
?>
