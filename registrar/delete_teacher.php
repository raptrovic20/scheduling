<?php 
include('dbcon.php');
include('session.php');

$emp_no=$_GET['id'];


$result=mysql_query("select * from tbl_faculty where emp_no='$emp_no'")or die(mysql_error);
$row=mysql_fetch_array($result);
$f=$row['fname'];
$l=$row['lname'];


mysql_query("delete from tbl_faculty where emp_no='$emp_no'")or die(mysql_error());



header('location:record.php');
?>