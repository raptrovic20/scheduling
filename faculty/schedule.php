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
  <li><a href="checklist.php"><i class="icon-table icon-large"></i>Check List</a></li>
   <li class="divider-vertical"></li>
  <li class="active"><a href="schedule.php"><i class="icon-group icon-large"></i>Class Schedule</a></li>
   <li class="divider-vertical"></li>
  <li><a href="record.php"><i class="icon-list icon-large"></i>Entry</a></li>
   <li class="divider-vertical"></li>
  <li><a href="history_log.php"><i class="icon-group icon-large"></i>History Log</a></li>
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


<h2><font color="white">Class Schedule List</font></h2>
	<a class="btn btn-primary"  href="add_schedule.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Class Schedule</a>
					 
		<div class="pull-right222">
	
		<div class="pagination">
<font color="white">Seacrh Schedule</font>
<br>
  <ul>
    <li><a data-toggle="modal" href="#teacher"><font color="white"><i class="icon-search icon-large"></i>Teacher</font></a></li>
    <li>
      <a data-toggle="modal" href="#CYS"><font color="white"><i class="icon-search icon-large"></i>Course Year Section</font></a>
    </li>
	 <li>
      <a data-toggle="modal" href="#room"><font color="white"><i class="icon-search icon-large"></i>Room</font></a>
    </li>
  </ul>
</div>
</div>
	
	<hr>
	<div class="pagination">
  <ul>
    <li class="active"><a href="schedule.php"><font color="white">All</font></a></li>
    <li>
      <a href="BSIS.php"><font color="white">BSIS</font></a>
    </li>
    <li><a href="BSCE.php"><font color="white">BSCE</font></a></li>
    <li><a href="BSHRM.php"><font color="white">BSHRM</font></a></li>
    <li><a href="BSIT.php"><font color="white">BSIT</a></font></li>
    <li><a href="AB.php"><font color="white">AB</font></a></li>
    <li><a href="BEED.php"><font color="white">BEEd</font></a></li>
    <li><a href="BSED.php"><font color="white">BSEd</font></a></li>
    <li><a href="GS.php"><font color="white">Graduate School</font></a></li>
  </ul>
</div>
  

<div class="demo_jui">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
			<thead>
				<tr>
			
				<th>Day</th>
				<th>Time Start</th>
				<th>Time End</th>
				<th>Sem</th>
				<th>AY</th>
				<th>Course</th>
				<th>Subject</th>
                <th>Unit</th>
				<th>Teacher</th>
				<th>Room</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
<?php $result=mysql_query("select * from schedule where type='' order by schedule_id DESC")or die(mysql_error());
while($row=mysql_fetch_array($result)){ $id=$row['schedule_id'];
?>

<tr class="del<?php echo $id ?>">
	<td><?php echo $row['day'];?></td>
	<td ><?php echo $row['time'];?></td>
	<td><?php echo $row['time_end'];?></td>	
	<td><?php echo $row['semester'];?></td>
	<td><?php echo $row['sy'];?></td>
	<td><?php echo $row['CYS'];?></td>
	<td><?php echo $row['subject'];?></td>
    <td align="center">3</td>
	<td><?php echo $row['teacher'];?></td>
	<td><?php echo $row['room'];?></td>
	
	<td align="center" width="160">
	<a class="btn btn-info" href="edit_schedule.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;
	
	
	
	
	<div class="modal hide fade" id="<?php echo $id; ?>">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	      <div class="alert alert-info">
   <p><font color="gray">Are you Sure you Want to Delete this Schedule?</font></p>
    </div>
	  </div>
	  <div class="modal-body">

   
<a class="btn btn-info" href="delete_schedule.php<?php echo '?id='.$id; ?>"><i class="icon-check icon-large"></i>&nbsp;Yes</a>&nbsp;
	
	   <a href="#" class="btn" data-dismiss="modal">No</a>
	  
  
	  </div>
	  <div class="modal-footer">
	 
		</div>
		</div>
	
	
	
	
	<a data-toggle="modal" href="#<?php echo $id; ?>" class="btn btn-danger1">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>
</td>


<?php } ?>

	
	</tr>

			</tbody>
	
		</table>
		
		
		

</div>
</div>





<?php include('footer.php');?>
</div>

				<div class="modal hide fade" id="teacher">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">

   
  <h2>Search Teacher Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal" method="POST" action="preview.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter601">
    
	<div class="control-group">
    <label class="control-label" for="input01">Teacher:</label>
    <div class="controls">
   <select name="teacher" class="span333">
	<option>--Select--</option>
		<?php $teacher_query=mysql_query("select * from teacher")or die(mysql_error());
while($teacher_row=mysql_fetch_array($teacher_query)){
	?>
	<font size="30"><option><?php echo $teacher_row['FirstName']." ".$teacher_row['LastName']; ?></option></font>
	<?php } ?>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span333">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span333">
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

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-ok icon-large"></i>Submit</button>
    </div>
    </div>
	
    </fieldset>
    </form>
  
  
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
		</div>
		
		
		
		
		
								<div class="modal hide fade" id="CYS">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">


  <h2>Search Course Year Section Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal" method="POST" action="preview1.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter601">
    
	<div class="control-group">
    <label class="control-label" for="input01">Course Year Section:</label>
    <div class="controls">
   <select name="CYS" class="span333">
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
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span333">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span333">
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

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-ok icon-large"></i>Submit</button>
    </div>
    </div>
	
    </fieldset>
    </form>
 
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
		</div>


<div class="modal hide fade" id="room">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">

  <h2>Search Rooms Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal" method="POST" action="preview2.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter601">
    
	<div class="control-group">
    <label class="control-label" for="input01">Rooms:</label>
    <div class="controls">
   <select name="room" class="span333">
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
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span333">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span333">
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

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-ok icon-large"></i>Submit</button>
    </div>
    </div>
	
    </fieldset>
    </form>
 
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
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
		
	