<?php
require('fpdf.php');
require('lib_gear.php');
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$pdf = new \Mpdf\Mpdf();
$pdf->SetSourceFile('Maoulkavien-EP2_Gear.pdf');
$pdf->UseTemplate($pdf->ImportPage(1));
require('LZCompressor/LZString.php');
require('LZCompressor/LZContext.php');
require('LZCompressor/LZUtil.php');
require('LZCompressor/LZData.php');
require('LZCompressor/LZReverseDictionary.php');

use LZCompressor\LZString as LZ;

$json_string= LZ::decompressFromBase64($_POST['data']);
$char = json_decode($json_string);

$pdf->SetMargins(0,0,0,0);

gearHeaders();
gearPack();
//gearPack2();
//gearOthers();
//gearBot()();
//gearAli();

$pdf->Output($char->name.'-Gear.pdf', 'I');
?>
