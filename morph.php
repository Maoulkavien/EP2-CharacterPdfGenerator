<?php
require('fpdf.php');
require('lib_morph.php');

require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$pdf = new \Mpdf\Mpdf();
$pdf->SetSourceFile('Maoulkavien-EP2_Morph.pdf');
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
$wares = json_decode(file_get_contents("gear_ware.json"));
$morphs = json_decode(file_get_contents("morphs.json"));

$pdf->SetMargins(0,0,0,0);

morphHeaders();
morphTraits();
morphWare();
morphBasics();
morphPools();
morphStats();
morphMovements();
morphNotes();
combatStats();
combatWeapons();
combatArmor();

$pdf->Output($char->name.'-Morph.pdf', 'I');
?>
