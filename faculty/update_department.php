<?php 
include('dbcon.php');
include('session.php'); 

$department_id=$_POST['department_id'];
$department_name=$_POST['department_name'];
$dean=$_POST['dean'];


mysql_query("update tbl_department set department_name='$department_name',dean='$dean' where department_id='$department_id'")or die(mysql_error());


header('location:department.php');

?>