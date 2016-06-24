<!DOCTYPE html>
<html>
<head>
	<title>Time Test</title>
</head>
<body>

<form action="" method='post'>
	<input type="text" name="time" />
	<input type="submit" value="Check" />
</form>

<?php 
if(isset($_POST['time'])) {
	echo "<p>+100 " . date('H:i', strtotime($_POST['time']) + 100) . "</p>";
	echo "<p>-50 " . date('H:i', strtotime($_POST['time']) - 50) . "</p>";
}
?>

</body>
</html>