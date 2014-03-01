<html>
<body>
<?php
	include 'conn.php';
		include 'func.php';
	$v=$_GET['v'];
	//echo "$v";
	$id=retrieve($v);
	$query = "SELECT ACTUAL_URL AS a FROM url WHERE ID = '$id'";
	$result = mysql_query($query,$db) or die (mysql_error());
	$nad = mysql_fetch_array($result);
	$urll = $nad['a'];
	echo "$urll";
	header('Location:'.$urll);
?>
</body>
</html>
