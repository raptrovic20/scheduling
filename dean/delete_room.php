<?php 
include('dbcon.php');
include('session.php');

$room_id=$_GET['id'];


$result=mysql_query("select * from tbl_room where room_id='$room_id'")or die(mysql_error);
$row=mysql_fetch_array($result);
$f=$row['room_name'];



mysql_query("delete from tbl_room where room_id='$room_id'")or die(mysql_error());


header('location:room.php');
?>