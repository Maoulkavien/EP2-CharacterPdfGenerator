<?php

use LZCompressor\LZString as LZ;

function loadParameters($post){

$params=new stdClass();

$params->egoRepHints = (isset($post['egoRepHints']) && $post['egoRepHints'] == 1 );
$params->egoDisplayFake = (isset($post['egoDisplayFake']) && $post['egoDisplayFake'] == 1 );
$params->egoAptitudesHints = (isset($post['egoAptitudesHints']) && $post['egoAptitudesHints'] == 1 );
$params->egoStatsHints = (isset($post['egoStatsHints']) && $post['egoStatsHints'] == 1 );
$params->egoSkillsHints = (isset($post['egoSkillsHints']) && $post['egoSkillsHints'] == 1 );
$params->egoMuseAptitudesHints = (isset($post['egoMuseAptitudesHints']) && $post['egoMuseAptitudesHints'] == 1 );
$params->egoMuseStatsHints = (isset($post['egoMuseStatsHints']) && $post['egoMuseStatsHints'] == 1 );
$params->egoMuseSkillsHints = (isset($post['egoMuseSkillsHints']) && $post['egoMuseSkillsHints'] == 1 );
$params->morphCheckDefaults = (isset($post['morphCheckDefaults']) && $post['morphCheckDefaults'] == 1 );
$params->morphCheckAll = (isset($post['morphCheckAll']) && $post['morphCheckAll'] == 1 );
$params->morphStatsHints = (isset($post['morphStatsHints']) && $post['morphStatsHints'] == 1 );

$params->preprinted = (isset($post['preprinted']) && $post['preprinted'] == 1 );


return $params;

}

function loadJson($filename= null){
  return json_decode(file_get_contents("EP2-Data/".$filename));
}

function loadCharacter($LZstring = null){
  $LZstring = preg_replace("/^\/\/.*[\r|\n]+/m","",$LZstring);
  $jsonString = LZ::decompressFromBase64($LZstring);
  return json_decode($jsonString);
}

function loadReferences(){
  $ref = new stdClass();
  $ref->traits=loadJson("traits.json");
  $ref->wares=loadJson("gear_ware.json");
  $ref->morphs=loadJson("morphs.json");

  return $ref;
}

function newPDF($name = null){

  $pdf = new \Mpdf\Mpdf();

  //remove margins
  $html = '
  <html>
  <head>
  <style>
      @page { margin : 0 0 0 0 ;}
  </style>
  </head>';
  $pdf->WriteHTML($html);
  $pdf->SetMargins(0,0,0,0);

  //import pdf underlay
  $pdf->SetSourceFile('files/'.$name);
  $pdf->UseTemplate($pdf->ImportPage(1));

  return $pdf;
}

function pt2mm($pt){ return $pt*25.4/72; }

function sanitize_b64($b64){

  return preg_replace('/^\/\/.*\n/', "", $b64);

}

function byName($array,$name){

  foreach($array as $item){
    if($item->{'name'} == $name) { return $item; }
  }
  return null;

}

function isDefaultWare($morphs,$morphName,$wareName){
  $morphRef=byName($morphs,$morphName);
  if($morphRef != null){
    if(in_array($wareName,$morphRef->{'ware'})){ return true;}
  }
  return false;
}

function isDefaultTrait($morphs,$morphName,$traitName){
  $morphRef=byName($morphs,$morphName);
  if($morphRef != null){
    if(byName($morphRef->{'morph_traits'},$traitName) != null){ return true;}
  }
  return false;
}

?>
