<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){

$subject_id=$_POST['subject_id'];
$subject_code=$_POST['subject_code'];
$description=$_POST['description'];
$unit=$_POST['unit'];
$semester=$_POST['semester'];
$year=$_POST['year'];


mysql_query("update tbl_subject set subject_code='$subject_code',description='$description',unit='$unit',semester='$semester',year='$year'

 where subject_id='$subject_id'")or die(mysql_error());


header('location:subject.php');

}
?>