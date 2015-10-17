<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){

$subject_code=$_POST['subject_code'];
$description=$_POST['description'];
$type=$_POST['type'];
$unit=$_POST['unit'];
$course=$_POST['course'];
$year_level=$_POST['year_level'];
$semester=$_POST['semester'];


$query=mysql_query("select * from tbl_subject where subject_code='$subject_code'
 and description='$description' 
 and type='$type' 
 and unit='$unit' 
 and course='$course' 
 and year_level='$year_level'") or die(mysql_error());
$count=mysql_num_rows($query);

if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_subject.php";
</script>
<?php 
}else{
mysql_query("insert into tbl_subject (subject_code,description,type,unit,course,year_level,semester)
VALUES('$subject_code','$description','$type','$unit','$course','$year_level','$semester')")or die(mysql_error());



header('location:subject.php');
}}
?>