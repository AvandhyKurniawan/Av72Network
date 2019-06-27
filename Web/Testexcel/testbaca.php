<?php
error_reporting(0);
require '../vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;

$inputFileType = 'Xls';
$inputFileName = 'test.xls';
$sheetname = 'Worksheet';

//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($inputFileName);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
echo "<pre>";
foreach($sheetData as $data){
 print_r($data);
}
?>
