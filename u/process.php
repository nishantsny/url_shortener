<html>
<body>
	<b>Url shortener</b> <br></br>
	<?php
		include 'conn.php';
		include 'func.php';
		$query = "SELECT max(ID) as maxx FROM `url`";
    	$result=mysql_query($query,$db) or die ("lknskl");
    	$nad = mysql_fetch_array($result);
    	$max = $nad['maxx'];
    	$id=$max+1;//echo "$id";

    	$long_url = "";
    	$long_url = $_POST["name"];
    	$short_url=$domain.'/u/r.php?v='.shorten($id);
    	//echo "$long_url";
		$query = "INSERT INTO `url`(`ID`,`ACTUAL_URL`,`SHORT_URL`,`TIME`) VALUES (NULL,'$long_url','$short_url',NULL)";
		mysql_query($query,$db) or die (mysql_error());
		echo "Shortened url is : "."$short_url";
	?>
	<br></br>
	<form action="process.php" method ="post">
	Enter another url: <input name="name" type="text">
	<input type="submit" >
</body>
</html>