<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){

$subject_id=$_POST['subject_id'];
$subject_code=$_POST['subject_code'];
$description=$_POST['description'];
$type=$_POST['type'];
$unit=$_POST['unit'];
$course=$_POST['course'];
$year_level=$_POST['year_level'];
$semester=$_POST['semester'];


mysql_query("update tbl_subject set subject_code='$subject_code',description='$description',type='$type',unit='$unit',course='$course',year_level='$year_level',semester='$semester'

 where subject_id='$subject_id'")or die(mysql_error());


header('location:subject.php');

}
?>