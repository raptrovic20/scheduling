<?php
session_start();
include('connection.php');

$username=$_POST['username'];
$password=$_POST['password'];

if(!empty($username) && !empty($password)){
	$query = "select user.*, tbl_dean.department_id as `dean_dept_id` from user 
				LEFT JOIN tbl_dean ON user.`dean_id` = tbl_dean.`emp_no` WHERE  username = '".$username."' and password='".$password."'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	if($count == 1){
		$row = mysql_fetch_assoc($result);
		$_SESSION["id"] 		= $row['id'];
		$_SESSION["dept_id"]	= $row['department_id'];
		$_SESSION["username"]	= $row['username'];
		$_SESSION["school_year"]	= 6;
		$_SESSION["semester"]	= 1;
		switch($row['utype_id']){
			case '1':
				if($row['dean_dept_id'] == ""){
					header("location:login.php?attempt=fail");
					break;
				}
				else{
					header("location:dean/home.php");
					break;
				}
			break;
			case '2':
				header("location: registrar/home.php");
			break;
			
			case '3':
				$_SESSION["faculty_id"] = $row['faculty_id'];
				header("location:faculty/home.php");
			break;
			default:
				header("location:login.php?attempt=unauthorized");
			break;
		}
	}
	else{
		header("location:login.php?attempt=fail");
	}
}
else{
	header("location:login.php?attempt=null");
}
?>