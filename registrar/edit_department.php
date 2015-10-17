<?php include('header.php'); include('session.php');include('dbcon.php'); $department_id=$_GET['id'];
?>
<body>
<?php include('nav-top1.php'); ?>
   
    <div class="navbar navbar-fixed-top1">
    <div class="navbar-inner">
    <div class="container">
	<div class="marg">
    <ul class="nav">
 <li>
    <a href="home.php"><i class="icon-home icon-large"></i>Home</a>
  </li>
  <li class="divider-vertical"></li>
  <li><a href="room.php">Room Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="course.php"><i class="icon-group icon-large"></i>Course Management</a></li>
   <li class="divider-vertical"></li>
  <li class="active"><a href="department.php"><i class="icon-list icon-large"></i>Department Management</a></li>  
  <li class="divider-vertical"></li>
  <li><a href="dean.php"><i class="icon-list icon-large"></i>Dean</a></li>
   
  <li class="divider-vertical"></li>
  <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
   <li class="divider-vertical"></li>
</ul>
    </div>
    </div>
    </div>
    </div>
<div class="wrapper">



	

<div id="element" class="hero-body">
<h2><font color="white">Edit Department</font></h2>
	<a class="btn btn-primary"  href="department.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	<form id="save_voter" class="form-horizontal" method="POST" action="update_department.php">		
    <fieldset>
	</br>
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
    <?php $result=mysql_query("select * from tbl_department where department_id='$department_id'")or die(mysql_error());
$row=mysql_fetch_array($result);
	?>
    
    <input type="hidden" name="department_id"  value="<?php echo $department_id;?>">
	<div class="control-group">
    <label class="control-label" for="input01">Department Name:</label>
    <div class="controls">
    <input type="text" name="department_name"  value="<?php echo $row['department_name']; ?>" id="span9009"/>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Dean/ ProgramHead:</label>
    <div class="controls">
   <select name="dean" id="span9000">
<?php $query=mysql_query("select * from tbl_dean")or die(mysql_error);
while($dep=mysql_fetch_array($query)){
 ?>
 <option><?php echo $dep['name'];?></option>
 <?php }?>
	</select>
    </div>
    </div>
	
		

	


	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    <button id="clear" input type='reset' name="clear" input type='reset' class="btn btn-primary" name="clear">Clear</button>
     <a class="btn btn-primary"  href="department.php">&times;Cancel</a>
    </div>
    </div>
	
    </fieldset>
    </form>

</div>

<?php include('footer.php');?>
</div>
</body>
	<div class="modal hide fade" id="myModal">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	    <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">No</a>
	    <a href="logout.php" class="btn btn-primary">Yes</a>
		</div>
		</div>
		
			
	 
<script type="text/javascript">
$(document).ready( function () {

jQuery('#save_voter').submit(function(e){
    e.preventDefault();
var Title = jQuery('.Title').val();
var Person = jQuery('.Person').val();
var Department = jQuery('.Department').val();


	
    e.preventDefault();
if (Title && Person && Department){	
    var formData = jQuery(this).serialize();	
	
    jQuery.ajax({
        type: 'POST',
        url:  'update_department.php',
        data: formData,
             success: function(msg){
            showNotification({
message: "Department Entry Successfully Updated",
type: "success", 
autoClose: true, 
duration: 5 

});

		 var delay = 2000;
		setTimeout(function(){ window.location = 'department.php';}, delay);  
	
        }
    });
	
}else
{
alert('All fields are required!');
return false;
}	
});


});
</script>
