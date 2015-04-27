<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Front Page</title>
</head>

<body>
	<?php
		require_once 'login.php';
		$db_server = mysql_connect($db_hostname,$db_username,$db_password);
		if(!$db_server) die("unable to connect to MySQL: " . mysql_error());
		mysql_select_db($db_database) 
			or die("unabe to select database: " . mysql_error());
		$query = "SELECT * FROM users" ;
		$result = mysql_query($query);
		if(!$result) die("database access failed: ". mysql_error());
		echo 'name=' . mysql_result($result,0,'name') . "</br>";
		echo 'num=' . mysql_result($result,0,'num') . "</br>";
		echo 'passwd=' . mysql_result($result,0,'passwd') . "</br>";
		if(isset($_POST['passwd'])&&isset($_POST['name'])) 
		{
			$name=$_POST['name'];
			$passwd=$_POST['passwd'];
			if($passwd=="")
				$passwd="NULL";
			if($name=="")
				$name="NULL";
		}
		else 
		{
			$name="not setted";
			$passwd="not setted";
		}
		
		echo "name=" . $name . "</br>";
		echo "password=" . $passwd;
	?>
	<form method="post" action="index.php">
		<input type="text" name="name" />
    	<input type="password" name="passwd" />
		<input type="submit" />
	</form>
</body>
</html>