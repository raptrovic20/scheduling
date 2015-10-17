<?php
include("connect.php"); 
$tbl_name="user_levels"; // Table name 

$username=$_POST['username']; // username sent from form 
$password=$_POST['password']; // password sent from form 


// To protect MySQL injection 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

//Query
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$rows = mysql_fetch_assoc($result);


//Direct pages with different user levels
if ($rows['userlevel'] == '1') {
	header('location: dean/index.php'); //User1 
	session_register("username");
	session_register("password");
	
}
else
if ($rows['userlevel'] == '2') {
	header('location: registrar/index.php'); //User2 
	session_register("username");
	session_register("password"); 
	
} 
else
if ($rows['userlevel'] == '3') {
	header('location: faculty/index.php'); //user 3 
	session_register("username");
	session_register("password"); 
} 
else
{ 
	// Error login
echo "<script>alert('Access Denied!');
						window.location='login.php';
						</script>";
}

?>