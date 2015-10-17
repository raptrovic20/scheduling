<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){

$department_name=$_POST['department_name'];
$dean=$_POST['dean'];

$query=mysql_query("select * from tbl_department where department_name='$department_name' and dean='$dean'") or die(mysql_error());
$count=mysql_num_rows($query);

if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_department.php";
</script>
<?php 
}else{
mysql_query("insert into tbl_department (department_name,dean)
VALUES('$department_name','$dean')")or die(mysql_error());

header('location:department.php');
}
}

?>