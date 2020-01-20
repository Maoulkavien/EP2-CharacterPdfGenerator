<html>
<head>
<script type="text/javascript">

function oneshot(checkbox) {
    if(checkbox.checked == true){
document.getElementById("egoRepHints").checked=false;
document.getElementById("egoAptitudesHints").checked=false;
document.getElementById("egoStatsHints").checked=false;
document.getElementById("egoSkillsHints").checked=false;
document.getElementById("egoMuseAptitudesHints").checked=false;
document.getElementById("egoMuseStatsHints").checked=false;
document.getElementById("egoMuseSkillsHints").checked=false;
document.getElementById("morphCheckDefaults").checked=true;
document.getElementById("morphCheckAll").checked=true;
document.getElementById("morphStatsHints").checked=false;


document.getElementById("egoparams").style="display:none";

    }else{
document.getElementById("egoparams").style="display:block";
   }
}


function campaign(checkbox) {
    if(checkbox.checked == true){
document.getElementById("egoRepHints").checked=true;
document.getElementById("egoAptitudesHints").checked=true;
document.getElementById("egoStatsHints").checked=true;
document.getElementById("egoSkillsHints").checked=true;
document.getElementById("egoMuseAptitudesHints").checked=true;
document.getElementById("egoMuseStatsHints").checked=true;
document.getElementById("egoMuseSkillsHints").checked=true;

document.getElementById("morphCheckDefaults").checked=false;
document.getElementById("morphCheckAll").checked=false;
document.getElementById("morphStatsHints").checked=true;

document.getElementById("egoparams").style="display:none";

    }else{
document.getElementById("egoparams").style="display:block";
   }
}

</script>
</head>
<body>


<form id='form' action="ego.php" method="POST" target="_blank">
Paste the exported result from Arokha helper here : <br>
<textarea name="data" rows=30 cols=100></textarea>
<br>
<input type="checkbox" name="one" value="1" onchange="javascript:oneshot(this);">This character is a Pre-made for One-shot and does not need editability<br/>
<input type="checkbox" name="camp" value="1" onchange="javascript:campaign(this);">This character is a campaign character, all should be hinted only as it may change during play<br/>


<h2>Ego parameters</h2>
<br>
<input type="checkbox" name="egoDisplayFake" value="1" />Display Fake ego ID (hints status is the same as for real ID) <br>
<div id="egoparams">
<input type="checkbox" id="egoRepHints" name="egoRepHints" value="1" />Display hints for Reps <br>
<input type="checkbox" id="egoAptitudesHints" name="egoAptitudesHints" value="1" />Display hints for aptitudes scores and checks <br>
<input type="checkbox" id="egoStatsHints" name="egoStatsHints" value="1" />Display hints for mind stats <br>
<input type="checkbox" id="egoSkillsHints" name="egoSkillsHints" value="1" />Display hints for skills scores <br>
<input type="checkbox" id="egoMuseAptitudesHints" name="egoMuseAptitudesHints" value="1" />Display hints for muse's aptitude scores and checks <br>
<input type="checkbox" id="egoMuseStatsHints" name="egoMuseStatsHints" value="1" />Display hints for muse's mind stats <br>
<input type="checkbox" id="egoMuseSkillsHints" name="egoMuseSkillsHints" value="1" />Display hints for muse's skills scores <br>
</div>

<h2> Morph parameters</h2>
<input type="checkbox" id="morphCheckDefaults" name="morphCheckDefaults" value="1" checked="checked"/>Automatically check default traits/ware <br>
<input type="checkbox" id="morphCheckAll" name="morphCheckAll" value="1" checked="checked"/>Automatically check all traits/ware <br>
<input type="checkbox" id="morphStatsHints" name="morphStatsHints" value="1" checked="checked"/>Display hints for body stats <br>


<input type="submit" value="Morph" onclick="document.getElementById('form').setAttribute('action','morph.php')" />
<input type="submit" value="Ego" onclick="document.getElementById('form').setAttribute('action','ego.php')" />
<input type="submit" value="Gear" onclick="document.getElementById('form').setAttribute('action','gear.php')" />
</form>


</body>
</html>
