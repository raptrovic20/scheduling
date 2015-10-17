<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){

$subject_code=$_POST['subject_code'];
$description=$_POST['description'];
$unit=$_POST['unit'];
$semester=$_POST['semester'];
$year=$_POST['year'];


$query=mysql_query("select * from tbl_subject where subject_code='$subject_code'
 and description='$description' 
 and unit='$unit' 
 and semester='$semester' 
 and year='$year'") or die(mysql_error());
$count=mysql_num_rows($query);

if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_department.php";
</script>
<?php 
}else{
mysql_query("insert into tbl_subject (subject_code,description,unit,semester,year)
VALUES('$subject_code','$description','$unit','$semester','$year')")or die(mysql_error());



header('location:subject.php');
}}
?>