<html>
<head>
</head>
<body>

<form id='form' action="ego.php" method="POST" target="_blank">
<textarea name="data" rows=30 cols=100></textarea>
<input type="submit" value="Morph" onclick="document.getElementById('form').setAttribute('action','morph.php')" />
<input type="submit" value="Ego" onclick="document.getElementById('form').setAttribute('action','ego.php')" />
<input type="submit" value="Gear" onclick="document.getElementById('form').setAttribute('action','gear.php')" />
</form>


</body>
</html>
