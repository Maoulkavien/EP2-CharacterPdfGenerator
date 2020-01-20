<?php
require('lib/libgear.php');
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$pdf = newPDF('Maoulkavien-EP2_Gear.pdf');

$char = loadCharacter($_POST['data']);
$references = loadReferences();
$params = loadParameters();

$traits = $references->traits;
$wares = $references->wares;
$morphs = $references->morphs;


gearHeaders();
gearPack();
//gearPack2();
//gearOthers();
//gearBot()();
//gearAli();

$pdf->Output($char->name.'-Gear.pdf', 'I');

?>
