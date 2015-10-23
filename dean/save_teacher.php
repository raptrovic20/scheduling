<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){
	
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$status=$_POST['status'];
$department_name=$_POST['department_name'];
$specialization=$_POST['specialization'];


$query=mysql_query("select * from tbl_faculty where fname='$fname'
 and lname='$lname' 
 and mname='$mname' 
 and status='$status' 
 and department_name='$department_name' 
 and specialization='$specialization'") or die(mysql_error());
$count=mysql_num_rows($query);

if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_teacher.php";
</script>
<?php 
}else{

mysql_query("insert into tbl_faculty (fname,lname,mname,status,department_name,specialization)
VALUES('$fname','$lname','$mname','$status','$department_name','$specialization')")or die(mysql_error());

$insert = '
	insert into user (
							utype_id,
							faculty_id,
							name,
							username,
							password
						)
						values(
							3,
							'.mysql_insert_id().',
							"'.$fname.' '.$mname.' '.$lname.'",
							"'.$_POST['username'].'",
							"'.$_POST['password'].'"
						)
	';
	// die($insert);
	mysql_query($insert);
	// die($insert);

header('location:faculty.php');

}}
?>