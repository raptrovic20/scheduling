<?php

// 1. Create a database connection
$conn= mysql_connect("localhost","root","");
if (!$conn) {
	die("Database connection failed: " . mysql_error());
}

// 2. Select a database to use 
$db_select = mysql_select_db("onlineschedsys",$conn);
if (!$db_select) {
	die("Database selection failed: " . mysql_error());
}
?>
