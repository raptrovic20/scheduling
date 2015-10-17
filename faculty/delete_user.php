<?php 
include('dbcon.php');
include('session.php');

$id=$_GET['id'];



$logout_query=mysql_query("select * from users where User_id=$id_session")or die(mysql_error());
$user_row=mysql_fetch_array($logout_query);
$user_name=$user_row['User_Type'];


$result=mysql_query("select * from users where User_id='$id'")or die(mysql_error);
$row=mysql_fetch_array($result);
$f=$row['FirstName']." ".$row['LastName'];

mysql_query("delete from users where User_id='$id'")or die(mysql_error());

mysql_query("INSERT INTO history (data,action,date,user)VALUES('$f', 'Delete User', NOW(),'$user_name')")or die(mysql_error());

header('location:user_account.php');

?>