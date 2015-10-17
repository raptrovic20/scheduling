<?php 
include('dbcon.php');
include('session.php'); 


$emp_no=$_POST['emp_no'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$status=$_POST['status'];
$department_name=$_POST['department_name'];
$specialization=$_POST['specialization'];

mysql_query("update tbl_faculty set fname='$fname',lname='$lname',mname='$mname',status='$status',department_name='$department_name',specialization='$specialization' where emp_no='$emp_no'")or die (mysql_error());


header('location:record.php');
?>