<?php 
include('dbcon.php');
include('session.php'); 

$id_get=$_POST['id_get'];
$UserName=$_POST['UserName'];
$Password=$_POST['Password'];
$User_Type=$_POST['User_Type'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$department=$_POST['department'];


mysql_query("update users set UserName='$UserName',Password='$Password',User_Type='$User_Type',FirstName='$FirstName',LastName='$LastName',College='$department' where User_id='$id_get'")or die(mysql_error());


$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Update User','$FirstName&nbsp;$LastName','$type')") or die(mysql_error());

header('location:user_account.php');
?>