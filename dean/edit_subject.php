<?php include('header.php'); include('dbcon.php'); include('session.php');
$subject_id=$_GET['id'];
 ?>
<body>
<?php include('nav-top1.php'); ?>
    <br>
       <div class="navbar navbar-fixed-top1">
    <div class="navbar-inner">
    <div class="container">
	<div class="marg">
    <ul class="nav">
  <li>
    <a href="home.php"><i class="icon-home icon-large"></i>Home</a>
  </li>
  
   <li class="divider-vertical"></li>
						<li><a href="academic.php"><i class="icon-group icon-large"></i>Academic Setting</a></li>
						<li class="divider-vertical"></li>
						<li  class="active"><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
						<li class="divider-vertical"></li>
						<li><a href="faculty.php"><i class="icon-user icon-large"></i>Faculty</a></li>
						<li class="divider-vertical"></li>
						<li><a href="subjectsched.php"><i class="icon-table icon-large"></i>Scheduling</a></li>
						<li class="divider-vertical"></li>
						<li><a href="checklist.php"><i class="icon-table icon-large"></i>Check List</a></li>
						<li class="divider-vertical"></li>
                        <li><a href="room.php"><i class="icon-table icon-large"></i>Room Reports</a></li>
						<li class="divider-vertical"></li>
						<li><a href="account.php"><i class="icon-table icon-large"></i>Account</a></li>
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
<h2><font color="white">Edit Subject</font></h2>
	<a class="btn btn-primary"  href="subject.php"><i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	 <form id="save_voter" class="form-horizontal" method="POST" action="update_subject.php">	
    <fieldset>
	</br>
	<?php $result=mysql_query("select * from tbl_subject where subject_id='$subject_id'")or die(mysql_error());
$row=mysql_fetch_array($result);
	?>
	
	<input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    <div class="control-group">
    <label class="control-label" for="input01">Subject Code:</label>
    <div class="controls">
    <input type="text" id="span9009" name="subject_code"  value="<?php echo $row['subject_code']; ?>" required>  
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Description</label>
    <div class="controls">
    <input type="text" id="span9009" name="description"  value="<?php echo $row['description']; ?>" required>
    </div>
    </div>
	
    
    <div class="control-group">
    <label class="control-label" for="input01">Type:</label>
    <div class="controls">
    <select name="type" id="span9009">
    <option><?php echo $row['type']; ?></option>
	<option value="Lecture">Lecture</option>
	<option value="Laboratory">Laboratory</option>
	</select>
    </div>
    </div>
     <div class="control-group">
    <label class="control-label" for="input01"> Unit:</label>
    <div class="controls">
    <input type="text" id="span9009" name="labunit"  value="<?php echo $row['unit']; ?>" required>
    </div>
    </div>
	
	
	
	
	
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Course:</label>
    <div class="controls">
   <select name="course" id="span9009">
	<option><?php echo $row['course']; ?></option>
	<?php $query=mysql_query("select * from tbl_course")or die(mysql_error);
while($dep=mysql_fetch_array($query)){
 ?>
 <option><?php echo $dep['course_name'];?></option>
 <?php }?>
	
	</select>
    </div>
    </div>
	

	<div class="control-group">
    <label class="control-label" for="input01">Year:</label>
    <div class="controls">
   <select name="year_level" id="span9009"
	<option><?php echo $row['year_level']; ?></option>
	<option value="1stYear">1st Year</option>
	<option value="2nd Year">2nd Year</option>
    <option value="3rd Year">3rd Year</option>
    <option value="4th Year">4th Year</option>
    <option value="5th Year">5th Year</option>
	</select>
    </div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Year:</label>
		<div class="controls">
			<select name="semester" id="span9009">
				<option value="1" <?php echo ($row['semester'] == 1)? 'selected="selected"' : '' ?>>1st Semester</option>
				<option value="2" <?php echo ($row['semester'] == 2)? 'selected="selected"' : '' ?>>2nd Semester</option>
				<option value="3" <?php echo ($row['semester'] == 3)? 'selected="selected"' : '' ?>>3rd Semester</option>
			</select>
		</div>
    </div>
	<!--<input type="hidden" value="<?php echo $row['semester'] ?>">-->
	


	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    <button id="clear" input type='reset' name="clear" input type="reset" class="btn btn-primary" name="clear">Clear</button>
    <a class="btn btn-primary"  href="subject.php">&times;Cancel</a>
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
		


	   
	  	