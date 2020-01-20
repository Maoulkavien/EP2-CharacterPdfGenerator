<html>
<head>
</head>
<body>

<form id='form' action="ego.php" method="POST" target="_blank">
<textarea name="data" rows=30 cols=100></textarea>
<h2>Ego parameters</h2>
<br>
<input type="checkbox" name="egoRepHints" value="1" />Display hints for Reps <br>
<input type="checkbox" name="egoDisplayFake" value="1" />Display Fake ID (hints status is the same as for real ID) <br>
<input type="checkbox" name="egoAptitudesHints" value="1" />Display hints for aptitudes scores and checks <br>
<input type="checkbox" name="egoStatsHints" value="1" />Display hints for mind stats <br>
<input type="checkbox" name="egoSkillsHints" value="1" />Display hints for skills scores <br>
<input type="checkbox" name="egoMuseAptitudesHints" value="1" />Display hints for muse's aptitude scores and checks <br>
<input type="checkbox" name="egoMuseStatsHints" value="1" />Display hints for muse's mind stats <br>
<input type="checkbox" name="egoMuseSkillsHints" value="1" />Display hints for muse's skills scores <br>


<input type="submit" value="Morph" onclick="document.getElementById('form').setAttribute('action','morph.php')" />
<input type="submit" value="Ego" onclick="document.getElementById('form').setAttribute('action','ego.php')" />
<input type="submit" value="Gear" onclick="document.getElementById('form').setAttribute('action','gear.php')" />
</form>


</body>
</html>
