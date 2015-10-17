<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){

$course_name=$_POST['course_name'];
$department_name=$_POST['department_name'];
$course_lenght=$_POST['course_lenght'];

$query=mysql_query("select * from tbl_course where course_name='$course_name' and department_name='$department_name' and course_lenght='$course_lenght'") or die(mysql_error());
$count=mysql_num_rows($query);

if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_department.php";
</script>
<?php 
}else{
mysql_query("insert into tbl_course (course_name,department_name,course_lenght)
VALUES('$course_name','$department_name','$course_lenght')")or die(mysql_error());
 
 
 header('location:course.php');
 
}
}



?>