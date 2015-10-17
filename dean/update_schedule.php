<?php 
include('dbcon.php');
include('session.php'); 

$Monday=$_POST['Monday'];
$Tuesday=$_POST['Tuesday'];
$Wednesday=$_POST['Wednesday'];
$Thursday=$_POST['Thursday'];
$Friday=$_POST['Friday'];
$Saturday=$_POST['Saturday'];
$Sunday=$_POST['Sunday'];

if (isset($_POST['save'])){


$id_get=$_POST['id_get'];
$day=$Monday." ".$Tuesday." ".$Wednesday." ".$Thursday." ".$Friday." ".$Saturday." ".$Sunday;
$time_start=$_POST['time_start'];
$time_end=$_POST['time_end'];
$semester=$_POST['semester'];
$sy=$_POST['sy'];
$CYS=$_POST['CYS'];
$subject=$_POST['subject'];
$teacher=$_POST['teacher'];
$room=$_POST['room'];



mysql_query("update schedule set semester='$semester',sy='$sy',CYS='$CYS',subject='$subject',teacher='$teacher',room='$room',day='$day',time='$time_start',time_end='$time_end' where schedule_id='$id_get'")or die(mysql_error());


$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Update Schedule','$time_start&nbsp;$time_end','$type')") or die(mysql_error());
header('location:schedule.php');
}


?>