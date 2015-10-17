<?php include('header.php'); include('dbcon.php'); include('session.php');
$emp_no=$_GET['id'];

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
  <li><a href="room.php">Room Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="course.php"><i class="icon-group icon-large"></i>Course Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="department.php"><i class="icon-list icon-large"></i>Department Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
     <li class="divider-vertical"></li>
  <li class="active"><a href="record.php"><i class="icon-user icon-large"></i>Faculty</a></li>
   <li class="divider-vertical"></li>
  <li><a href="checklist.php"><i class="icon-table icon-large"></i>Subject Schedule</a></li>
  <li class="divider-vertical"></li>
  <li><a href="checklist2.php"><i class="icon-table icon-large"></i>Check List</a></li>
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
<h2><font color="white">Edit Teacher</font></h2>
	<a class="btn btn-primary"  href="record.php">  <i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	<div class="teacher">
	   <form id="save_voter" class="form-horizontal" method="POST" action="update_teacher.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
<?php $result=mysql_query("select * from tbl_faculty where emp_no='$emp_no'")or die (mysql_error());
$row=mysql_fetch_array($result);
 ?>	
	<input type="hidden" name="emp_no" value="<?php echo $emp_no; ?>">
	<div class="control-group">
    <label class="control-label" for="input01">FirstName:</label>
    <div class="controls">
    <input type="text" name="fname" value="<?php echo $row['fname'];  ?>"  id="span9009">
    </div>
    </div>
	
		<div class="control-group">
    <label class="control-label" for="input01">LastName:</label>
    <div class="controls">
    <input type="text" name="lname" value="<?php echo $row['lname'];  ?>"  id="span9009">
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">MiddleName</label>
    <div class="controls">
    <input type="text" name="mname" value="<?php echo $row['mname'];  ?>"  id="span9009">
    </div>
    </div>
    
	 <div class="control-group">
    <label class="control-label" for="input01">Status:</label>
    <div class="controls">
   <select name="status" id="span9009">
	<optionvalue="<?php echo $row['status'];  ?>"></option>
	<option valu"Part Time">Part Time</option>
	<option value"Full Time">Full Time</option>
    
	</select>
    </div>
    </div>
		
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Department:</label>
    <div class="controls">
   <select name="department_name" id="span9009">
	<option><?php echo $row['department_name'];  ?></option>
    </select>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="input01">Specialization:</label>
    <div class="controls">
    <input type="text" name="specialization" value="<?php echo $row['specialization'];  ?>"  id="span9009">
    </div>
    </div>
	

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
	
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
	    <a href="index.php" class="btn btn-primary">Yes</a>
		</div>
		</div>
		
