<?php 
include('dbcon.php');
include('session.php'); 


$UserName=$_POST['UserName'];
$Password=$_POST['Password'];
$User_Type=$_POST['User_Type'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$department=$_POST['department'];


mysql_query("insert into users (UserName,Password,User_Type,FirstName,LastName,College)
VALUES('$UserName','$Password','$User_Type','$FirstName','$LastName','$department')")or die(mysql_error());




$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Add User','$FirstName&nbsp;$LastName','$type')") or die(mysql_error());


header('location:user_account.php');
?>