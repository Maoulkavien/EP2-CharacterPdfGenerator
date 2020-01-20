<html>
<head>
</head>
<body>

<form id='form' action="ego.php" method="POST" target="_blank">
Paste the exported result from Arokha helper here : <br>
<textarea name="data" rows=30 cols=100></textarea>
<h2>Ego parameters</h2>
<br>
<input type="checkbox" name="egoRepHints" value="1" />Display hints for Reps <br>
<input type="checkbox" name="egoDisplayFake" value="1" />Display Fake ego ID (hints status is the same as for real ID) <br>
<input type="checkbox" name="egoAptitudesHints" value="1" />Display hints for aptitudes scores and checks <br>
<!--- <input type="checkbox" name="egoStatsHints" value="1" />Display hints for mind stats <br>
--><input type="checkbox" name="egoSkillsHints" value="1" />Display hints for skills scores <br>
<input type="checkbox" name="egoMuseAptitudesHints" value="1" />Display hints for muse's aptitude scores and checks <br>
<input type="checkbox" name="egoMuseStatsHints" value="1" />Display hints for muse's mind stats <br>
<input type="checkbox" name="egoMuseSkillsHints" value="1" />Display hints for muse's skills scores <br>
<h2> Morph parameters</h2>
<input type="checkbox" name="morphCheckDefaults" value="1" />Automatically check default traits/ware <br>
<input type="checkbox" name="morphCheckAll" value="1" />Automatically check all traits/ware <br>
<input type="checkbox" name="morphStatsHints" value="1" />Display hints for body stats <br>


<input type="submit" value="Morph" onclick="document.getElementById('form').setAttribute('action','morph.php')" />
<input type="submit" value="Ego" onclick="document.getElementById('form').setAttribute('action','ego.php')" />
<input type="submit" value="Gear" onclick="document.getElementById('form').setAttribute('action','gear.php')" />
</form>


</body>
</html>
