<?php

require('lib.php');

function egoHeaders(){
  global $pdf;
  global $char;
  $fontSize=8;
  $o = - 1.4*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $line1=16.6;
  $line2=22.2;
  $line3=27.6;
  $line4=32.8;

  $col1=195/10+1;
  $col2=706/10+1;
  $col3=1222/10+1;
  $col4=1733/10+1;

  $pdf->SetXY($col1,$line1); $pdf->Cell(0,$o,$char->{'aliases'},0,0);
  $pdf->SetXY($col1,$line2); $pdf->Cell(0,$o,$char->{'background_name'},0,0);
  $pdf->SetXY($col1,$line3); $pdf->Cell(0,$o,$char->{'languages'},0,0);
  $pdf->SetXY($col1,$line4); $pdf->Cell(0,$o,$char->{'motivations'},0,0);

  $pdf->SetXY($col2,$line1); $pdf->Cell(0,$o,$char->{'name'},0,0);
  $pdf->SetXY($col2,$line2); $pdf->Cell(0,$o,$char->{'career_name'},0,0);

  $pdf->SetXY($col3,$line1); $pdf->Cell(0,$o,'',0,0);
  $pdf->SetXY($col3,$line2); $pdf->Cell(0,$o,$char->{'interest_name'},0,0);
  $pdf->SetXY($col3,$line3); $pdf->Cell(0,$o,$char->{'active_forks'},0,0);

  $pdf->SetXY($col4,$line2); $pdf->Cell(0,$o,$char->{'faction_name'},0,0);

}

function egoAptitudes($hints=false){
  global $pdf;
  global $char;
  $fontSize= ($hints ? 4 : 10);
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $line1=75.2;
  $line2=82.4;
  $line3=89.4;
  $line4=96.5;
  $line5=103.5;
  $line6=110.3;


  $col1=41.2;
  $col2=54.3;
  $col3=66.7;

  $centering = ($hints ? 'L' : 'C'); 

  $pdf->SetXY($col1,$line1); $pdf->Cell($col2-$col1,$o,$char->{'cog_base'},0,0,$centering);
  $pdf->SetXY($col1,$line2); $pdf->Cell($col2-$col1,$o,$char->{'int_base'},0,0,$centering);
  $pdf->SetXY($col1,$line3); $pdf->Cell($col2-$col1,$o,$char->{'ref_base'},0,0,$centering);
  $pdf->SetXY($col1,$line4); $pdf->Cell($col2-$col1,$o,$char->{'sav_base'},0,0,$centering);
  $pdf->SetXY($col1,$line5); $pdf->Cell($col2-$col1,$o,$char->{'som_base'},0,0,$centering);
  $pdf->SetXY($col1,$line6); $pdf->Cell($col2-$col1,$o,$char->{'wil_base'},0,0,$centering);

  $pdf->SetXY($col2,$line1); $pdf->Cell($col3-$col2,$o,$char->{'cog_base'}*3+$char->cog_check_postmod,0,0,$centering);
  $pdf->SetXY($col2,$line2); $pdf->Cell($col3-$col2,$o,$char->{'int_base'}*3+$char->int_check_postmod,0,0,$centering);
  $pdf->SetXY($col2,$line3); $pdf->Cell($col3-$col2,$o,$char->{'ref_base'}*3+$char->ref_check_postmod,0,0,$centering);
  $pdf->SetXY($col2,$line4); $pdf->Cell($col3-$col2,$o,$char->{'sav_base'}*3+$char->sav_check_postmod,0,0,$centering);
  $pdf->SetXY($col2,$line5); $pdf->Cell($col3-$col2,$o,$char->{'som_base'}*3+$char->som_check_postmod,0,0,$centering);
  $pdf->SetXY($col2,$line6); $pdf->Cell($col3-$col2,$o,$char->{'wil_base'}*3+$char->wil_check_postmod,0,0,$centering);

}

function egoTraits(){
  global $pdf;
  global $char;
  global $references;
  $traits = $references->traits;
  $fontSize=6;
  $o = - pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=2580/10;
  $lines[]=2630/10;
  $lines[]=2679/10;
  $lines[]=2729/10;
  $lines[]=2810/10;
//  $lines[]=2830/10;
//  $lines[]=2840/10;
//  $lines[]=2850/10;
  $lines[]=2859/10;
  $lines[]=2908/10;
  $lines[]=2955/10;

  $cols=array();
  $cols[]=101/10;
  $cols[]=170/10;
  $cols[]=233/10;
  $cols[]=403/10;

  $positive=0;
  $negative=0;

  foreach($char->{'ego_traits'} as $trait){

    $cost = '?';
    $traitRef = byName($traits,$trait->{'name'});
    //$cost = $traitRef;
    if($traitRef != null && $trait->{'level'} > 0){ $cost = $traitRef->{'cost'}[$trait->{'level'}-1]; }



    if($trait->{'type'} == "Positive" && $positive<4){
      $pdf->SetXY($cols[0],$lines[$positive]+$o); $pdf->Cell($cols[1]-$cols[0],0,$cost,0,0,'C');
      $pdf->SetXY($cols[1],$lines[$positive]+$o); $pdf->Cell($cols[2]-$cols[1],0,$trait->{'level'},0,0,'C');

      if(mb_strlen($trait->{'name'}) > 16){
        $pdf->SetXY($cols[2],$lines[$positive]-4.5); $pdf->MultiCell(16,2,$trait->{'name'},0,0,'L');
      }
      else{
        $pdf->SetXY($cols[2],$lines[$positive]+$o); $pdf->Cell(0,0,$trait->{'name'},0,0,'L');
      }

      if(mb_strlen($trait->{'summary'}) > 90){
        $pdf->SetXY($cols[3],$lines[$positive]-4.5); $pdf->MultiCell(90,2,$trait->{'summary'},0,0,'L');
      }
      else{
        $pdf->SetXY($cols[3],$lines[$positive]+$o); $pdf->Cell(0,0,$trait->{'summary'},0,0,'L');
      }
      $positive++;
    }
    if($trait->{'type'} == "Negative" && $negative<4){
      $nb = $negative+4;
      $pdf->SetXY($cols[0],$lines[$nb]+$o); $pdf->Cell($cols[1]-$cols[0],0,$cost,0,0,'C',true);
      $pdf->SetXY($cols[1],$lines[$nb]+$o); $pdf->Cell($cols[2]-$cols[1],0,$trait->{'level'},0,0,'C',true);
      if(mb_strlen($trait->{'name'}) > 15){
        $pdf->SetXY($cols[2],$lines[$nb]-4.5); $pdf->MultiCell(16,2,$trait->{'name'},0,0,'L');
      }
      else{
        $pdf->SetXY($cols[2],$lines[$nb]+$o); $pdf->Cell(0,0,$trait->{'name'},0,0,'L');
      }

      if(mb_strlen($trait->{'summary'}) > 90){
        $pdf->SetXY($cols[3],$lines[$nb]-4.5); $pdf->MultiCell(90,2,$trait->{'summary'},0,0,'L');
      }
      else{
        $pdf->SetXY($cols[3],$lines[$nb]+$o); $pdf->Cell(0,0,$trait->{'summary'},0,0,'L');
      }
      $negative++;
    }
  }
}

function egoSkills($hints=false,$preprinted=true){
  global $pdf;
  global $char;
  $fontSize= ($hints ? 4 : 6);
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines_start=1224/10;
  $lines_add = 3.97;

  $cols=array();
  $cols[]=50/10;
  $cols[]=902/10;
  $cols[]=1022/10;
  $cols[]=1141/10;
  $cols[]=1221/10;

  $count=0;
  $skills = $char->{'skills'};
  usort($skills, function($a, $b) { //Sort the array using a user defined function
    if(strpos($a->name,"Know") !== FALSE && strpos($b->name,"Know") === FALSE) { return 1 ; } 
    if(strpos($a->name,"Know") === FALSE && strpos($b->name,"Know") !== FALSE) { return -1 ; } 

    return  $a->name > $b->name ? 1 : -1; //Compare the scores
  });

  $centering = ($hints ? 'L' : 'C'); 

  foreach($skills as $skill){

    if($count<33){
//$preprinted=false;
      $pdf->SetFont('Arial','',10);
      $pdf->SetTextColor(193,80,82);
      if($preprinted) {
	$field = substr(strstr($skill->name,':'),1);;
	$pdf->SetXY($cols[0]+1,$lines_start+$count*$lines_add-3.9); $pdf->Cell($cols[1]-$cols[0]-2,3.5,$skill->name,0,0,'L',true);
	$pdf->SetXY($cols[2]+1,$lines_start+$count*$lines_add-3.9); $pdf->Cell($cols[3]-$cols[2]-1.2,3.5,$skill->{'aptitude'},0,0,'C',true);
//	$pdf->SetXY($cols[0]+17,$lines_start+$count*$lines_add); $pdf->Cell(0,-4,$field,0,0,'L');
      }else{
	$pdf->SetXY($cols[0],$lines_start+$count*$lines_add); $pdf->Cell(0,-4,$skill->{'name'},0,0,'L');
	$pdf->SetXY($cols[2],$lines_start+$count*$lines_add); $pdf->Cell($cols[3]-$cols[2],-4,$skill->{'aptitude'},0,0,'C');
      }
      $pdf->SetTextColor(0);
      $pdf->SetFont('Arial','',$fontSize);

      $apt = strtolower($skill->aptitude).'_base';
      $total = $skill->rank+$skill->mod+$char->{$apt};
      if(strpos($skill->name,"Fray") !== FALSE || strpos($skill->name,"Perceive") !== FALSE){
        $total += $char->{$apt};
      }

      $pdf->SetXY($cols[1],$lines_start+$count*$lines_add); $pdf->Cell($cols[2]-$cols[1],$o,$skill->{'rank'},0,0,$centering);
      $pdf->SetXY($cols[3],$lines_start+$count*$lines_add); $pdf->Cell($cols[4]-$cols[3],$o,$total,0,0,$centering);
      $count++;
    }

  }
}



function egoMuseSkills($hints=false,$preprinted=true){
  global $pdf;
  global $char;
  $fontSize= ($hints ? 4 : 6);
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines_start=1224/10;
  $lines_add = 3.97;

  $cols=array();
  $cols[]=1295/10;
  $cols[]=1679/10;
  $cols[]=1798/10;
  $cols[]=1918/10;
  $cols[]=2035/10;

  $count=0;
  $skills = $char->muse->{'skills'};
  usort($skills, function($a, $b) { //Sort the array using a user defined function
    if(strpos($a->name,"Know") !== FALSE && strpos($b->name,"Know") === FALSE) { return 1 ; } 
    if(strpos($a->name,"Know") === FALSE && strpos($b->name,"Know") !== FALSE) { return -1 ; } 

    return  $a->name > $b->name ? 1 : -1; //Compare the scores
  });

  $centering = ($hints ? 'L' : 'C'); 
  foreach($skills as $skill){

    if($count<33){
//$preprinted=false;
      $pdf->SetFont('Arial','',9);
      $pdf->SetTextColor(193,80,82);
      if($preprinted) {
	$field = substr(strstr($skill->name,':'),1);;
	$pdf->SetXY($cols[0]+1,$lines_start+$count*$lines_add-3.9); $pdf->Cell($cols[1]-$cols[0]-2,3.5,$skill->name,0,0,'L',true);
	$pdf->SetXY($cols[2]+1,$lines_start+$count*$lines_add-3.9); $pdf->Cell($cols[3]-$cols[2]-1.2,3.5,$skill->{'aptitude'},0,0,'C',true);
//	$pdf->SetXY($cols[0],$lines_start+$count*$lines_add-3.8); $pdf->Cell($cols[1]-$cols[0],3.5,$skill->name,0,0,'L',true);
//	$pdf->SetXY($cols[0]+17,$lines_start+$count*$lines_add); $pdf->Cell(0,-4,$field,0,0,'L');
      }else{
	$pdf->SetXY($cols[0],$lines_start+$count*$lines_add); $pdf->Cell(0,-4,$skill->{'name'},0,0,'L');
	$pdf->SetXY($cols[2],$lines_start+$count*$lines_add); $pdf->Cell($cols[3]-$cols[2],-4,$skill->{'aptitude'},0,0,'C');
      }
      $pdf->SetTextColor(0);
      $pdf->SetFont('Arial','',$fontSize);

      $apt = strtolower($skill->aptitude).'_base';
      $total = $skill->rank+$skill->mod+$char->muse->{$apt};
      if(strpos($skill->name,"Fray") !== FALSE || strpos($skill->name,"Perceive") !== FALSE){
        $total += $char->muse->{$apt};
      }
      if($skill->rank > 0){
        $pdf->SetXY($cols[1],$lines_start+$count*$lines_add); $pdf->Cell($cols[2]-$cols[1],$o,$skill->{'rank'},0,0,$centering);
        $pdf->SetXY($cols[3],$lines_start+$count*$lines_add); $pdf->Cell($cols[4]-$cols[3],$o,$total,0,0,$centering);
      }
      $count++;
    }

  }
}


function blank(){
  global $pdf;
  global $char;
  $fontSize=6;
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=0;

  $cols=array();
  $cols[]=0;

  $count=0;
  foreach($char->{'TOREPLACE'} as $TOREPLACE){

    if($count<21){
      if(isset($TOREPLACE->{'default'}) && $TOREPLACE->{'default'}){
        $pdf->SetFont('Arial','B',$fontSize);
      }
      else{
        $pdf->SetFont('Arial','',$fontSize);
      }

      $pdf->SetXY($cols[0],$lines[$count]); $pdf->Cell($cols[1]-$cols[0],$o,$TOREPLACE->{'cost'},0,0,'C');
      $pdf->SetXY($cols[1],$lines[$count]); $pdf->Cell(0,$o,$TOREPLACE->{'name'},0,0,'L');
      $pdf->SetXY($cols[2],$lines[$count]); $pdf->Cell(0,$o,$TOREPLACE->{'summary'},0,0,'L');
      $count++;
    }

  }
}

?>
