<?php
require('lib/libego.php');
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$pdf = newPDF('Maoulkavien-EP2_Ego.pdf');

$char = loadCharacter($_POST['data']);
$references = loadReferences();

$traits = $references->traits;

egoHeaders();
egoAptitudes(true);
egoTraits();
egoSkills(true);
egoMuseSkills(true);

$pdf->Output($char->name.'-Ego.pdf', 'I');
?>
