<?php 
include('dbcon.php');
include('session.php'); 

$room_id=$_POST['room_id'];
$room_no=$_POST['room_no'];
$room_name=$_POST['room_name'];
$location=$_POST['location'];
$type=$_POST['type'];
$capacity=$_POST['capacity'];


mysql_query("update tbl_room set room_no='$room_no',room_name='$room_name',location='$location',type='$type',capacity='$capacity' where room_id='$room_id'")or die(mysql_error());



header('location:room.php');
?>