<?php ; include('sunheader.php');?>
<?php ; include('dbcon.php');?>
<body>
<?php include('index-nav.php'); 
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<div class="coat">
<div class="wrapper">

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<div id="element" class="hero-body-index">
	<p><font color="white"><h2>Login</h2></font></p>
	<form method="POST" >
	<table>
    <tr><td><font color="white">UserName:</font>&nbsp;&nbsp;</td><td><input type="text"  name="UserName" class="UserName_hover" id="span9001"></td></tr>
	<tr><td>&nbsp;<td></tr>
    <tr><td><font color="white">Password:</font>&nbsp;&nbsp;</td><td><input type="Password" name="Password" class="Password_hover" id="span9001"></td></tr>
	<tr><td>&nbsp;<td></tr>
	<tr><td></td><td>	<button class="btn btn-primary" name="Login"><i class="icon-ok-sign icon-large"></i>&nbsp;Login</button>

	</td></tr>
	<tr><td>
	</td><tr>
	</form>
	</table>
	
	</br>
	<div class="error">
<?php

if (isset($_POST['Login'])){

   function clean($str) {
                                        $str = @trim($str);
                                        if (get_magic_quotes_gpc()) {
                                            $str = stripslashes($str);
                                        }
                                        return mysql_real_escape_string($str);
                                    }

$UserName=clean($_POST['UserName']);
$Password=clean($_POST['Password']);

$login_query=mysql_query("select * from users where UserName='$UserName' and Password='$Password' and User_Type='Admin'");
$login_query1=mysql_query("select * from users where UserName='$UserName' and Password='$Password' and User_Type='User' and College='CIT'");
$login_query2=mysql_query("select * from users where UserName='$UserName' and Password='$Password' and User_Type='User' and College='COE'");
$login_query3=mysql_query("select * from users where UserName='$UserName' and Password='$Password' and User_Type='User' and College='SAS'");

$count1=mysql_num_rows($login_query1);
$count2=mysql_num_rows($login_query2);
$count3=mysql_num_rows($login_query3);
$count=mysql_num_rows($login_query);

$row=mysql_fetch_array($login_query);
$row1=mysql_fetch_array($login_query1);
$row2=mysql_fetch_array($login_query2);
$row3=mysql_fetch_array($login_query3);
$f=$row['FirstName'];
$l=$row['LastName'];
$type=$row['User_Type'];
if ($count == 1){



$logout_query=mysql_query("select * from users where User_id='".$row['User_id']."'");
$row=mysql_fetch_array($logout_query);
$f=$row['FirstName'];
$l=$row['LastName'];
$type=$row['User_Type'];

mysql_query("INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')")or die(mysql_error());


                                      
$_SESSION['id']=$row['User_id'];
header('location:home.php');
session_write_close();
                                        exit();
}

if ($count3== 1){
session_start();
$_SESSION['id']=$row3['User_id'];


$logout_query=mysql_query("select * from users where User_id='".$row['User_id']."'");
$row=mysql_fetch_array($logout_query);
$f=$row['FirstName'];
$l=$row['LastName'];
$type=$row['User_Type'];

mysql_query("INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')")or die(mysql_error());

 session_start();
                                        session_regenerate_id();
$_SESSION['id']=$row['User_id'];
header('location:user_SAS.php');
session_write_close();
                                        exit();
}


if ($count2 == 1){
session_start();
$_SESSION['id']=$row2['User_id'];

$logout_query=mysql_query("select * from users where User_id='".$row['User_id']."'");
$row=mysql_fetch_array($logout_query);
$f=$row['FirstName'];
$l=$row['LastName'];
$type=$row['User_Type'];

mysql_query("INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')")or die(mysql_error());

 session_start();
                                        session_regenerate_id();
$_SESSION['id']=$row['User_id'];
header('location:user_COE.php');
session_write_close();
                                        exit();
}


if ($count1 == 1){
session_start();
$_SESSION['id']=$row1['User_id'];

$logout_query=mysql_query("select * from users where User_id='".$row['User_id']."'");
$row=mysql_fetch_array($logout_query);
$f=$row['FirstName'];
$l=$row['LastName'];
$type=$row['User_Type'];

mysql_query("INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')")or die(mysql_error());

 session_start();
                                        session_regenerate_id();
$_SESSION['id']=$row['User_id'];
header('location:user_home.php');
session_write_close();
                                        exit();
}


else{
?>
    <div class="alert alert-error">
    <button class="close" data-dismiss="alert">×</button>
   Please check your UserName and Password
    </div>
<?php } 

}

?>	
</div>
</div>
</br>
</br>
</br>
</br>
</br>
</br>
<?php include('footer.php');?>


</div>
</div>
</body>
</html>