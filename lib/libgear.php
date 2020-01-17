<?php

require('lib.php');

function gearHeaders(){
  global $pdf;
  global $char;
  $fontSize=8;
  $o = - pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $line1=16.6;

  $col1=19.5;
  $col2=71;

  $pdf->SetXY($col1,$line1); $pdf->Cell(0,$o,$char->{'aliases'},0,0);
  $pdf->SetXY($col2,$line1); $pdf->Cell(0,$o,$char->{'name'},0,0);

}

function gearPack(){
  global $pdf;
  global $char;
  $fontSize=6;
  $o = - 0.8*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $line_gp1=398/10;
  $line_gp2=1058/10;
  $line_other=1720/10;
  $line_height=4;

  $cols=array();
  $cols[]=130/10;//Restricted
  $cols[]=167/10;//Cost
  $cols[]=230/10;//Name
  $cols[]=497/10;//Summary
  $offset_other=7.4;

  $gp1=0;
  $gp2=0;
  $other=0;
  foreach($char->{'items'} as $item){

    $restricted = ($item->{'restricted'} ? 'X' : '');
    $summary = $item->{'summary'};
    if($item->{'quantity'} > 1){
      $summary .= '('.$item->{'quantity'}.')';
    }

    if($item->{'blueprint'} == 3 && $gp1<13 ) { //gearpack 1

      $pdf->SetXY($cols[0],$line_gp1+$line_height*$gp1+$o); $pdf->Cell(0,0,$restricted,0,0,'L');
  //    $pdf->SetXY($col[1],$line_gp1+$line_height*$gp1+$o); $pdf->Cell($cols[2]-$cols[1],0,$item->{'cost'},0,0,'C');
      $pdf->SetXY($cols[2],$line_gp1+$line_height*$gp1+$o); $pdf->Cell(0,0,$item->{'name'},0,0,'L');
      $pdf->SetXY($cols[3],$line_gp1+$line_height*$gp1+$o); $pdf->Cell(0,0,$summary,0,0,'L');
      $gp1++;
    }
    if($item->{'blueprint'} == 2 && $gp2<13 ) { //gearpack 2

      $pdf->SetXY($cols[0],$line_gp2+$line_height*$gp2+$o); $pdf->Cell(0,0,$restricted,0,0,'L');
  //    $pdf->SetXY($col[1],$line_gp2+$line_height*$gp2+$o); $pdf->Cell($cols[2]-$cols[1],0,$item->{'cost'},0,0,'C');
      $pdf->SetXY($cols[2],$line_gp2+$line_height*$gp2+$o); $pdf->Cell(0,0,$item->{'name'},0,0,'L');
      $pdf->SetXY($cols[3],$line_gp2+$line_height*$gp2+$o); $pdf->Cell(0,0,$summary,0,0,'L');
      $gp2++;
    }
    if($item->{'blueprint'} == 0 && $other<13 ) { //others

      $pdf->SetXY($cols[0]+$offset_other,$line_other+$line_height*$other+$o); $pdf->Cell(0,0,$restricted,0,0,'L');
  //    $pdf->SetXY($col[1]+$offset_other,$line_other+$line_height*$other+$o); $pdf->Cell($cols[2]-$cols[1],0,$item->{'cost'},0,0,'C');
      $pdf->SetXY($cols[2]+$offset_other,$line_other+$line_height*$other+$o); $pdf->Cell(0,0,$item->{'name'},0,0,'L');
      $pdf->SetXY($cols[3]+$offset_other,$line_other+$line_height*$other+$o); $pdf->Cell(0,0,$summary,0,0,'L');
      $other++;
    }

  }
}

function morphWare(){
  global $pdf;
  global $char;
  $fontSize=6;
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=753/10;
  $lines[]=802/10;
  $lines[]=851/10;
  $lines[]=900/10;
  $lines[]=950/10;
  $lines[]=1000/10;
  $lines[]=1050/10;
  $lines[]=1099/10;
  $lines[]=1148/10;
  $lines[]=1195/10;
  $lines[]=1244/10;
  $lines[]=1294/10;
  $lines[]=1342/10;
  $lines[]=1394/10;
  $lines[]=1443/10;
  $lines[]=1492/10;
  $lines[]=1541/10;
  $lines[]=1589/10;
  $lines[]=1639/10;
  $lines[]=1688/10;
  $lines[]=1733/10;


  $cols=array();
  $cols[]=796/10;
  $cols[]=848/10;
  $cols[]=1076/10;

  $count=0;
  foreach($char->{'ware'} as $ware){
//var_dump($trait->{'type'});
    if($count<21){
      if(isset($ware->{'default'}) && $ware->{'default'}){
        $pdf->SetFont('Arial','B',$fontSize);
      }
      else{
        $pdf->SetFont('Arial','',$fontSize);
      }
//      $pdf->SetXY($col[0],$line[$count]); $pdf->Cell($cols[1]-$cols[0],$o,$ware->{'cost'},0,0,'C');
      $pdf->SetXY($cols[1],$lines[$count]); $pdf->Cell(0,$o,$ware->{'name'},0,0,'L');
      $pdf->SetXY($cols[2],$lines[$count]); $pdf->Cell(0,$o,$ware->{'summary'},0,0,'L');
      $count++;
    }


  }
}

function morphBasics(){
  global $pdf;
  global $char;
  $fontSize=10;
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=275/10;
  $lines[]=356/10;
  $lines[]=907/10;


  $cols=array();
  $cols[]=138/10; //image
  $cols[]=214/10;
  $cols[]=614/10;
  $cols[]=675/10;//to center cost


  $pdf->SetXY($cols[1],$lines[0]); $pdf->Cell(0,$o,$char->{'morph_name'},0,0,'L');
  $pdf->SetXY($cols[1],$lines[1]); $pdf->Cell(0,$o,$char->{'morph_size'},0,0,'L');
  $pdf->SetXY($cols[2],$lines[1]); $pdf->Cell($cols[3]-$cols[2],$o,$char->{'morph_mp_cost'},0,0,'C');
 // IMAGE
// $pdf->SetXY($cols[2],$lines[$count]); $pdf->Cell(0,$o,$TOREPLACE->{'summary'},0,0,'L');
}

function morphMovements(){
  global $pdf;
  global $char;
  $fontSize=8;
  $o = - 1.8*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=1584/10;
  $lines[]=1634/10;
  $lines[]=1682/10;
  $lines[]=1734/10;


  $cols=array();
  $cols[]=130/10;
  $cols[]=400/10;
  $cols[]=502/10;
  $cols[]=594/10;
  $cols[]=686/10;

  $count=0;
  foreach($char->{'movement_rate'} as $movement_rate){

    if($count<4){
      if(isset($movement_rate->{'default'}) && $movement_rate->{'default'}){
        $pdf->SetFont('Arial','B',$fontSize);
      }
      else{
        $pdf->SetFont('Arial','',$fontSize);
      }

      $pdf->SetXY($cols[0],$lines[$count]); $pdf->Cell(0,$o,$movement_rate->{'movement_type'},0,0,'L');
      $pdf->SetXY($cols[1],$lines[$count]); $pdf->Cell($cols[2]-$cols[1],$o,$movement_rate->{'base'},0,0,'C');
      $pdf->SetXY($cols[2],$lines[$count]); $pdf->Cell($cols[3]-$cols[2],$o,$movement_rate->{'full'},0,0,'C');
      // RUSH ? $pdf->SetXY($cols[2],$lines[$count]); $pdf->Cell(0,$o,$movement_rate->{'summary'},0,0,'L');
      $count++;
    }
  }

}


function morphPools(){
  global $pdf;
  global $char;
  $fontSize=10;
  $o = - 1.8*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=1012/10;
  $lines[]=1088/10;
  $lines[]=1167/10;
  $lines[]=1245/10;


  $cols=array();
  $cols[]=227/10;
  $cols[]=295/10;
  $cols[]=363/10;
  $cols[]=370/10;
  $cols[]=471/10;


  $pdf->SetXY($cols[3],$lines[0]); $pdf->Cell($cols[4]-$cols[3],$o,$char->{'vigor'},0,0,'C');
  $pdf->SetXY($cols[3],$lines[1]); $pdf->Cell($cols[4]-$cols[3],$o,$char->{'insight'},0,0,'C');
  $pdf->SetXY($cols[3],$lines[2]); $pdf->Cell($cols[4]-$cols[3],$o,$char->{'moxie'},0,0,'C');
  $pdf->SetXY($cols[3],$lines[3]); $pdf->Cell($cols[4]-$cols[3],$o,$char->{'flex_morph'}+$char->{'flex_ego'},0,0,'C');

  $fontSize=8;
  $o = - 1.8*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $pdf->SetXY($cols[0],$lines[3]); $pdf->Cell($cols[1]-$cols[0],$o,$char->{'flex_morph'},0,0,'C');
  $pdf->SetXY($cols[1],$lines[3]); $pdf->Cell($cols[2]-$cols[1],$o,$char->{'flex_ego'},0,0,'C');

}



function morphStats(){
  global $pdf;
  global $char;
  $fontSize=6;
  $o = - 2.3*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=1379/10;
  $lines[]=1429/10;
  $lines[]=1479/10;


  $cols=array();
  $cols[]=434/10;


  $pdf->SetXY($cols[0],$lines[0]); $pdf->Cell(0,$o,'(base '.$char->{'durability_base'}.')',0,0,'L');
  $pdf->SetXY($cols[0],$lines[1]); $pdf->Cell(0,$o,'(base '.($char->{'durability_base'}/5).')',0,0,'L');
  $pdf->SetXY($cols[0],$lines[2]); $pdf->Cell(0,$o,'(base '.($char->{'durability_base'}*1.5).')',0,0,'L');

}

function morphNotes(){

//no offset here
  global $pdf;
  global $char;
  $fontSize=6;
  $o = 0;//- 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=1800/10;


  $cols=array();
  $cols[]=133/10;


  $pdf->SetXY($cols[0],$lines[0]); $pdf->Cell(0,$o,$char->{'morph_notes'},0,0,'L');

}

function combatStats(){
  global $pdf;
  global $char;
  $fontSize=8;
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=2350/10;


  $cols=array();
  $cols[]=253/10;
  $cols[]=353/10;
  $cols[]=476/10;
  $cols[]=572/10;

  $pdf->SetXY($cols[0],$lines[0]); $pdf->Cell($cols[1]-$cols[0],$o,($char->{'ref_base'}+$char->{'int_base'})/5,0,0,'C');

  
  $fray = $char->{'ref_base'}*2;
  foreach($char->{'skills'} as $skill){
    if($skill->{'name'} == "Fray"){
      $fray += $skill->{'mod'} + $skill->{'rank'};
    }
  }


  $pdf->SetXY($cols[2],$lines[0]); $pdf->Cell($cols[3]-$cols[2],$o,$fray,0,0,'C');


}

function combatWeapons(){

  global $pdf;
  global $char;
  $fontSize=6;
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=2452/10;
  $lines[]=2502/10;
  $lines[]=2554/10;
  $lines[]=2602/10;
  $lines[]=2650/10;


  $cols=array();
  $cols[]=120/10;
  $cols[]=523/10;//damage
  $cols[]=636/10;//damage end
  $cols[]=646/10;
  $cols[]=684/10;
  $cols[]=721/10;
  $cols[]=756/10;
  $cols[]=842/10;
  $cols[]=934/10;


  $count=0;
  foreach($char->{'weapons_ranged'} as $weapons_ranged){

    if($count<5){
      if(isset($weapons_ranged->{'default'}) && $weapons_ranged->{'default'}){
        $pdf->SetFont('Arial','B',$fontSize);
      }
      else{
        $pdf->SetFont('Arial','',$fontSize);
      }

      $pdf->SetXY($cols[0],$lines[$count]); $pdf->Cell(0,$o,$weapons_ranged->{'name'},0,0,'L');
      $pdf->SetXY($cols[1],$lines[$count]); $pdf->Cell($cols[2]-$cols[1],$o,$weapons_ranged->{'damage'},0,0,'C');
      if(strpos($weapons_ranged->{'firemodes'},"SA") !== FALSE){
        $pdf->SetXY($cols[3],$lines[$count]); $pdf->Cell(0,$o,'X',0,0,'L');
      }
      if(strpos($weapons_ranged->{'firemodes'},"BF") !== FALSE){
        $pdf->SetXY($cols[4],$lines[$count]); $pdf->Cell(0,$o,'X',0,0,'L');
      }
      if(strpos($weapons_ranged->{'firemodes'},"FA") !== FALSE){
        $pdf->SetXY($cols[5],$lines[$count]); $pdf->Cell(0,$o,'X',0,0,'L');
      }
      $pdf->SetXY($cols[6],$lines[$count]); $pdf->Cell($cols[7]-$cols[6],$o,$weapons_ranged->{'range'},0,0,'C');
      $pdf->SetXY($cols[7],$lines[$count]); $pdf->Cell($cols[8]-$cols[7],$o,$weapons_ranged->{'ammo'},0,0,'C');
      $pdf->SetXY($cols[8],$lines[$count]); $pdf->Cell(0,$o,$weapons_ranged->{'notes'},0,0,'L');
      $count++;
    }


  }


  foreach($char->{'weapons_melee'} as $weapons_melee){

    if($count<5){
      if(isset($weapons_melee->{'default'}) && $weapons_melee->{'default'}){
        $pdf->SetFont('Arial','B',$fontSize);
      }
      else{
        $pdf->SetFont('Arial','',$fontSize);
      }

      $pdf->SetXY($cols[0],$lines[$count]); $pdf->Cell(0,$o,$weapons_melee->{'name'},0,0,'L');
      $pdf->SetXY($cols[1],$lines[$count]); $pdf->Cell($cols[2]-$cols[1],$o,$weapons_melee->{'damage'},0,0,'C');
      $pdf->SetXY($cols[8],$lines[$count]); $pdf->Cell(0,$o,$weapons_melee->{'notes'},0,0,'L');
      $count++;
    }


  }


}

function combatArmor(){
  global $pdf;
  global $char;
  $fontSize=6;
  $o = - 2*pt2mm($fontSize);
  $pdf->SetFont('Arial','',$fontSize);

  $lines=array();
  $lines[]=2740/10;
  $lines[]=2789/0;
  $lines[]=2840/10;
  $lines[]=2883/0;


  $cols=array();
  $cols[]=121/10;
  $cols[]=533/10;
  $cols[]=623/10;
  $cols[]=713/10;
  $cols[]=1076/10;


  $count=0;
  foreach($char->{'armors'} as $armors){

    if($count<4){
      if(isset($armors->{'default'}) && $armors->{'default'}){
        $pdf->SetFont('Arial','B',$fontSize);
      }
      else{
        $pdf->SetFont('Arial','',$fontSize);
      }

      $pdf->SetXY($cols[0],$lines[$count]); $pdf->Cell(0,$o,$armors->{'name'},0,0,'L');
      $pdf->SetXY($cols[1],$lines[$count]); $pdf->Cell($cols[2]-$cols[1],$o,$armors->{'kinetic'},0,0,'C');
      $pdf->SetXY($cols[2],$lines[$count]); $pdf->Cell($cols[3]-$cols[2],$o,$armors->{'energy'},0,0,'C');
      $pdf->SetXY($cols[3],$lines[$count]); $pdf->Cell(0,$o,$armors->{'mods'},0,0,'L');
      $pdf->SetXY($cols[4],$lines[$count]); $pdf->Cell(0,$o,$armors->{'notes'},0,0,'L');
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
