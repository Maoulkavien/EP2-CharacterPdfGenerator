<?php
require('fpdf.php');
require('lib_ego.php');

require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$pdf = new \Mpdf\Mpdf();

$html = '
<html>
<head>
<style>
    @page { margin : 0 0 0 0 ;}
</style>
</head>';
$pdf->WriteHTML($html);
$pdf->SetSourceFile('Maoulkavien-EP2_Ego.pdf');
$pdf->UseTemplate($pdf->ImportPage(1));
require('LZCompressor/LZString.php');
require('LZCompressor/LZContext.php');
require('LZCompressor/LZUtil.php');
require('LZCompressor/LZData.php');
require('LZCompressor/LZReverseDictionary.php');

use LZCompressor\LZString as LZ;

$json_string= LZ::decompressFromBase64($_POST['data']);

$char = json_decode($json_string);
$traits = json_decode(file_get_contents("traits.json"));

$pdf->SetMargins(0,0,0,0);

egoHeaders();
egoAptitudes(true);
egoTraits();
egoSkills(true);
egoMuseSkills(true);

$pdf->Output($char->name.'-Ego.pdf', 'I');
?>
