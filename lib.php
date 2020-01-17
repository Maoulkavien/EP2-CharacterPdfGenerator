<?php

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
