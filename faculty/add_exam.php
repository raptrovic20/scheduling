<?php include('header.php'); include('session.php'); include('dbcon.php') ?>
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
  <li><a href="schedule.php"><i class="icon-group icon-large"></i>Class Schedule</a></li>
   <li class="divider-vertical"></li>
    <li  class="active"><a href="exam_schedule.php"><i class="icon-group icon-large"></i>Faculty Schedule</a></li>
   <li class="divider-vertical"></li>
  <li><a href="record.php"><i class="icon-list icon-large"></i>Entry</a></li>
   <li class="divider-vertical"></li>
  <li><a href="history_log.php"><i class="icon-table icon-large"></i>History Log</a></li>
     <li class="divider-vertical"></li>
  <li><a href="user_account.php"><i class="icon-user icon-large"></i>User Account</a></li>
  <li class="divider-vertical"></li>
  <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
   <li class="divider-vertical"></li>
</ul>
    </div>
    </div>
    </div>
    </div>
<div class="wrapper">



	

<div id="element" class="hero-body-schedule">
<h2><font color="white">Add Exam Schedule</font></h2>
	<a class="btn btn-primary"  href="exam_schedule.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
<form id="save_voter" class="form-horizontal" method="post" action="save_exam.php">	
    <fieldset>
	</br>
	<div class="hai_naku">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
		<div class="control-group">
    <label class="control-label" for="input01">Day:</label>
    <div class="controls">
   <select name="day" class="span33333" id="day">
		<option>--Select--</option>
	<option>Monday</option>
	<option>Tuesday</option>
	<option>Wednesday</option>
	<option>Friday</option>
	<option>Saturday</option>
	<option>Sunday</option>
	</select>
    </div>
    </div>
	
		<div class="control-group">
    <label class="control-label" for="input01">Time Start:</label>
    <div class="controls">
   <select name="time_start" class="span3333" id="time_start">
	<option>--Select--</option>
	<?php $time_query=mysql_query("select * from time_start")or die(mysql_error());
while($time_row=mysql_fetch_array($time_query)){
	?>
	<option><?php echo $time_row['time']; ?></option>
	<?php } ?>
	</select>
    </div>
    </div>
	
			<div class="control-group">
    <label class="control-label" for="input01">Time End:</label>
    <div class="controls">
   <select name="time_end" id="time_end" class="span3333">
	<option>--Select--</option>
	<?php $time_end_query=mysql_query("select * from time_end")or die(mysql_error());
while($time_end_row=mysql_fetch_array($time_end_query)){
	?>
	<option><?php echo $time_end_row['time_end']; ?></option>
	<?php } ?>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span3333" id="semester">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span3333" id="sy">
	<option>--Select--</option>
<?php $sy_query=mysql_query("select * from sy")or die(mysql_error());
while($sy_row=mysql_fetch_array($sy_query)){
 ?>
<option><?php echo $sy_row['sy']; ?></option>
 <?php } ?>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Course Year Section:</label>
    <div class="controls">
   <select name="CYS" class="span3333" id="CYS">
	<option>--Select--</option>
	<?php $CYS_query=mysql_query("select * from course")or die(mysql_error());
while($CYS_row=mysql_fetch_array($CYS_query)){
	?>
	<option><?php echo $CYS_row['course_year_section']; ?></option>
	<?php } ?>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Subject:</label>
    <div class="controls">
   <select name="subject" class="span333" id="subject">
	<option>--Select--</option>
<?php $subject_query=mysql_query("select * from subject")or die(mysql_error());
while($subject_row=mysql_fetch_array($subject_query)){
 ?>
 <option><?php echo $subject_row['subject_code']; ?></option>
 <?php } ?>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Proctor:</label>
    <div class="controls">
   <select name="teacher" class="span333" id="teacher">
	<option>--Select--</option>
	<?php $teacher_query=mysql_query("select * from teacher")or die(mysql_error());
while($teacher_row=mysql_fetch_array($teacher_query)){
	?>
	<option><?php echo $teacher_row['Name']." ".$teacher_row['Name']; ?></option>
	<?php } ?>
	</select>
    </div>
    </div>

	<div class="control-group">
    <label class="control-label" for="input01">Room:</label>
    <div class="controls">
   <select name="room" class="span3333" id="room">
	<option>--Select--</option>
	<?php $room_query=mysql_query("select * from room")or die(mysql_error());
while($room_row=mysql_fetch_array($room_query)){
	?>
	<option><?php echo $room_row['room_name']; ?></option>
	<?php } ?>
	</select>
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
		
	
		

		