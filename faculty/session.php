<?php
session_start();
if(isSet($_SESSION['id']))
	{
		$username=$_SESSION['username'];
		
	}
else
	{
		header("location:index.php");
	}
?>