<?php
  error_reporting(0);
  require '../vendor/autoload.php';
  use \PhpOffice\PhpSpreadsheet\IOFactory;

  $inputFileType = 'Xls';
  $inputFileName = 'CJL.xls';
  $sheetname = 'Worksheet';

  //$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
  $spreadsheet = IOFactory::load($inputFileName);
  $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
  for ($i=2; $i < count($sheetData); $i++) {
    $idPegawai = $sheetData[$i]["B"];
    $gajiPokok = str_replace(array(',',' '),'',$sheetData[$i]["H"]);
    $uangMakan = str_replace(array(',',' '),'',$sheetData[$i]["I"]);
    $tunjanganJabatan = str_replace(array(',',' '),'',$sheetData[$i]["J"]);
    $BPJSTK = str_replace(array(',',' '),'',$sheetData[$i]["K"]);
    $BPJSKES = str_replace(array(',',' '),'',$sheetData[$i]["L"]);
    if(!empty($gajiPokok)){
      $idKomponen = "1";
      echo "INSERT INTO gaji (id_pegawai, id_komponen_gaji, frekuensi_pembayaran, mata_uang, jumlah)
            VALUES ('$idPegawai','$idKomponen','Bulanan','Rp.','$gajiPokok');"."<br>";
    }
    if(!empty($uangMakan)){
      $idKomponen = "2";
      echo "INSERT INTO gaji (id_pegawai, id_komponen_gaji, frekuensi_pembayaran, mata_uang, jumlah)
            VALUES ('$idPegawai','$idKomponen','Bulanan','Rp.','$uangMakan');"."<br>";
    }
    if(!empty($tunjanganJabatan)){
      $idKomponen = "3";
      echo "INSERT INTO gaji (id_pegawai, id_komponen_gaji, frekuensi_pembayaran, mata_uang, jumlah)
            VALUES ('$idPegawai','$idKomponen','Bulanan','Rp.','$tunjanganJabatan');"."<br>";
    }
    if(!empty($BPJSTK)){
      $idKomponen = "4";
      echo "INSERT INTO gaji (id_pegawai, id_komponen_gaji, frekuensi_pembayaran, mata_uang, jumlah)
            VALUES ('$idPegawai','$idKomponen','Bulanan','Rp.','$BPJSTK');"."<br>";
    }if(!empty($BPJSKES)){
      $idKomponen = "5";
      echo "INSERT INTO gaji (id_pegawai, id_komponen_gaji, frekuensi_pembayaran, mata_uang, jumlah)
            VALUES ('$idPegawai','$idKomponen','Bulanan','Rp.','$BPJSKES');"."<br>";
    }
  }
?>
