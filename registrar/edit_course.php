<?php include('header.php');include('dbcon.php'); include('session.php');
$course_id=$_GET['id'];
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
  <li class="active"><a href="course.php"><i class="icon-group icon-large"></i>Course Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="department.php"><i class="icon-list icon-large"></i>Department Management</a></li>
  
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
<h2><font color="white">Edit Course</font></h2>
	<a class="btn btn-primary"  href="course.php">  <i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	<?php
	$result=mysql_query("select * from tbl_course where course_id='$course_id'")or die (mysql_query());
	$row=mysql_fetch_array($result);
	?>
	
	<form id="save_voter" class="form-horizontal" method="POST" action="update_course.php"> 	
    <fieldset>
	</br>
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
     <input type="hidden" name="course_id" value="<?php echo $course_id;?>">
     
      <div class="control-group">
    <label class="control-label" for="input01">Course Name:</label>
    <div class="controls">
    <input type="text" name="course_name" value="<?php echo $row['course_name'];?>" id="span9009">
    </div>
    </div>
	
		
	<div class="control-group">
		<label class="control-label" for="input01">Department Name:</label>
		<div class="controls">
			<select name="department_name" id="span9000">
				<?php
					$department_query = mysql_query("SELECT * FROM tbl_department ") or die(mysql_error());
					while($dept = mysql_fetch_array($department_query)){
						$selected = ($row['department_id'] == $dept['department_id']) ? 'selected = "selected"' : "";
						echo '<option '.$selected.' value="'.$dept['department_id'].'">'.$dept['department_name'].'</option>';
					} 
				?>
			</select>
		</div>
    </div>
    
	<div class="control-group">
    <label class="control-label" for="input01">No. Of Years:</label>
    <div class="controls">
    <input type="text" name="course_lenght"   value="<?php echo $row['course_lenght'];?>" id="span9009">
    </div>
    </div>

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    <button id="clear" input type='reset' name="clear" input type='reset' class="btn btn-primary" name="clear">Clear</button>
     <a class="btn btn-primary"  href="course.php">Cancel</a>
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
		
	
	 