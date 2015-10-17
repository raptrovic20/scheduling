<?php 
include('dbcon.php');
include('session.php'); 

$course_id=$_POST['course_id'];
$course_name=$_POST['course_name'];
$department_name=$_POST['department_name'];
$course_lenght=$_POST['course_lenght'];


mysql_query("update tbl_course set course_name='$course_name',department_id='$department_name',course_lenght='$course_lenght' where course_id='$course_id'")or die(mysql_error());




header('location:course.php');
?>