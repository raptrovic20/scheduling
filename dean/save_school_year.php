<?php 
include('dbcon.php');
include('session.php'); 


if (isset($_POST['save'])){

$sy=$_POST['sy'];



$query=mysql_query("select * from sy where sy='$sy'")or die(mysql_query());
$rows=mysql_fetch_array($query);
$count=mysql_num_rows($query);


if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_school_year.php";
</script>
<?php  
}else{


mysql_query("insert into sy (sy)
VALUES('$sy')")or die(mysql_error());

$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Add Entry School Year','$sy','$type')") or die(mysql_error());

header('location:shool_year.php');
}
}
?>