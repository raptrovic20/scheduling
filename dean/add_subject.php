<?php include('header.php'); include('dbcon.php'); include('session.php'); ?>
<body>
<?php include('nav-top1.php'); ?>
<br>
    <div class="navbar navbar-fixed-top1">
    <div class="navbar-inner">
    <div class="container">
	<div class="marg">
    <ul class="nav">
  <li>
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



	

<div id="element" class="hero-body-subject-add">
<h2><font color="white">Add Subject</font></h2>
	<a class="btn btn-primary"  href="subject.php"><i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	 <form id="save_voter" class="form-horizontal" method="POST" action="save_subject.php">	
    <fieldset>
	</br>
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    <div class="control-group">
    <label class="control-label" for="input01">Subject Code:</label>
    <div class="controls">
    <input type="text" name="subject_code" id="span9009" required/>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="input01">Descriptive Title:</label>
    <div class="controls">
    <input type="text" name="description"  id="span9009" required>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="input01">Type:</label>
    <div class="controls">
   <select name="type" id="span9009" >
	
	<option value="Lecture">Lecture</option>
	<option value="Laboratory">Laboratory</option>

	</select>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="input01">Unit:</label>
    <div class="controls">
    <input type="text" name="unit"  id="span9009" required>
    </div>
    </div>
	
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Year Level:</label>
    <div class="controls">
   <select name="year_level" id="span9009" required>
	<option>--Select Year Level--</option>
	<option value="1">1st Year</option>
	<option value="2">2nd Year</option>
    <option value="3">3rd Year</option>
    <option value="4">4th Year</option>
    <option value="5">5th Year</option>
	</select>
    </div>
    </div>
	<input type="hidden" name="semester" value="<?php echo $_SESSION['semester'] ?>">
	<input type="hidden" name="school_year" value="<?php echo $_SESSION['school_year'] ?>">
	<!--<div class="control-group">
		<label class="control-label" for="input01">Semester:</label>
		<div class="controls">
			<select name="semester" id="span9009" required>
				<option value="1">1st Semester</option>
				<option value="2">2nd Semester</option>
				<option value="3">3rd Semester</option>
			</select>
		</div>
    </div>-->
	
	
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Course:</label>
    <div class="controls">
   <select name="course"  id="span9009" required>
	<option>--Select Course--</option>
<?php $query=mysql_query("select * from tbl_course")or die(mysql_error);
while($dep=mysql_fetch_array($query)){
 ?>
 <option value="<?php echo $dep['course_id'];?>"><?php echo $dep['course_name'];?></option>
 <?php }?>
	</select>
    </div>
    </div>
	
	
		
	


	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    <button id="clear" input type='reset' name="clear" input type='reset' class="btn btn-primary" name="clear">Clear</button>
     <a class="btn btn-primary"  href="subject.php">&times;Cancel</a>
    </div>
    </div>

	
    </fieldset>
    </form>
	 

</div>





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
		


	   
	  	