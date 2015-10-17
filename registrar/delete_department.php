<?php 
include('dbcon.php');
include('session.php');

$department_id=$_GET['id'];


$result=mysql_query("select * from tbl_department where department_id='$department_id'")or die(mysql_error);
$row=mysql_fetch_array($result);
$f=$row['department_name'];

mysql_query("delete from tbl_department where department_id='$department_id'")or die(mysql_error());


header('location:department.php');

?>