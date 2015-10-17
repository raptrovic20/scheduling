<?php 
include('dbcon.php');
include('session.php');

$subject_id=$_GET['id'];


$result=mysql_query("select * from tbl_subject where subject_id='$subject_id'")or die(mysql_error);
$row=mysql_fetch_array($result);
$f=$row['subject_code'];

mysql_query("delete from tbl_subject where subject_id='$subject_id'")or die(mysql_error());

header('location:subject.php');

?>