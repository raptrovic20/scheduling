<?php 
include('dbcon.php');
include('session.php');

$course_id=$_GET['id'];


$result=mysql_query("select * from tbl_course where course_id='$course_id'")or die(mysql_error);
$row=mysql_fetch_array($result);
$f=$row['course_name'];

mysql_query("delete from tbl_course where course_id='$course_id'")or die(mysql_error());

header('location:course.php');
?>