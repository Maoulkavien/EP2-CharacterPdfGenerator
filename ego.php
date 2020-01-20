<?php
require('lib/libego.php');
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$pdf = newPDF('Maoulkavien-EP2_Ego.pdf');

$char = loadCharacter($_POST['data']);
$params = loadParameters($_POST);
$references = loadReferences();

$traits = $references->traits;

egoHeaders();
egoAptitudes($params->egoAptitudesHints);
egoReps($params->egoRepHints,$params->egoDisplayFake);
egoTraits();
egoSkills($params->egoSkillsHints,$params->preprinted);
egoMuseSkills($params->egoMuseSkillsHints,$params->preprinted);

$pdf->Output($char->name.'-Ego.pdf', 'I');
?>
