<?php
require('lib/libego.php');
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$pdf = newPDF('Maoulkavien-EP2_Ego-blank.pdf');

$char = loadCharacter($_POST['data']);
$params = loadParameters($_POST);
$references = loadReferences();

$traits = $references->traits;

egoHeaders();
egoAptitudes($params->egoAptitudesHints);
egoReps($params->egoRepHints,$params->egoDisplayFake);
egoTraits();
egoStats($params->egoStatsHints);
egoSkills($params->egoSkillsHints,$params->preprinted);

//Muse
egoMuseSkills($params->egoMuseSkillsHints,$params->preprinted);
egoMuseAptitudes($params->egoMuseAptitudesHints);
egoMuseStats($params->egoMuseStatsHints);
egoMuseName();

$pdf->Output($char->name.'-Ego.pdf', 'I');
?>
