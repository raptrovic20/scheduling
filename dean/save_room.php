<?php 
include('dbcon.php');
include('session.php'); 


if (isset($_POST['save'])){

$room_no=$_POST['room_no'];
$room_name=$_POST['room_name'];
$location=$_POST['location'];
$type=$_POST['type'];
$capacity=$_POST['capacity'];


$query=mysql_query("select * from tbl_room where room_no='$room_no' and room_name='$room_name' and location='$location' and type='$type' and capacity='$capacity'") or die(mysql_error());
$count=mysql_num_rows($query);

if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_room.php";
</script>
<?php 
}else{

mysql_query("insert into tbl_room(room_no,room_name,location,type,capacity)
VALUES('$room_no','$room_name','$location','$type','$capacity')")or die(mysql_error());

header('location:room.php');
}
}
?>