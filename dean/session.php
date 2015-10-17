<?php
session_start();
print_r($_SESSION);
// die();
if(isset($_SESSION['id']))
	{
		$username=$_SESSION['username'];
		
	}
else
	{
		header("location:index.php");
	}
	
?>