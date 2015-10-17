<?php 
include('dbcon.php');
include('session.php'); 

$get_id=$_POST['get_id'];
$CYS=$_POST['CYS'];
$Major=$_POST['Major'];
$Department=$_POST['Department'];


mysql_query("update course set course_year_section='$CYS',major='$Major',Department='$Department' where course_id='$get_id'")or die(mysql_error());



$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Update Entry Course','$CYS','$type')") or die(mysql_error());


header('location:course.php');
?>