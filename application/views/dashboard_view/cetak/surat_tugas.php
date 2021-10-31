<?php
  header('Content-type: '.$tipe.'');
  if($dokumen != ''){
    if($tipe == 'application/vnd.ms-excel'){
      $nama = $nama.'.xls';
    }else if($tipe == 'application/msword'){
      $nama = $nama.'.doc';
    }
  header('Content-Disposition: attachment; filename="'.$nama.'"');
  print $dokumen;
}else{
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename="data.xls"');
  print $dokumen;
}
?>
