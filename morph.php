<?php
require('lib/libmorph.php');
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$pdf = newPDF('Maoulkavien-EP2_Morph.pdf');

$char = loadCharacter($_POST['data']);
$references = loadReferences();
$params = loadParameters();

$traits = $references->traits;
$wares = $references->wares;
$morphs = $references->morphs;


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
