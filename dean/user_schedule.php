<?php include('header.php'); include('session.php'); include('dbcon.php') ?>
<body>
<?php include('nav-top1.php'); ?>
    <div class="navbar navbar-fixed-top1">
    <div class="navbar-inner">
    <div class="container">
	<div class="marg">
    <ul class="nav">
  <li>
    <a href="user_home.php"><i class="icon-home icon-large"></i>Home</a>
  </li>
   <li class="divider-vertical"></li>
  <li class="active"><a href="user_schedule.php"><i class="icon-group icon-large"></i>Class Schedule</a></li>
   <li class="divider-vertical"></li>
    <li><a href="CIT_exam_schedule.php"><i class="icon-group icon-large"></i>Exam Schedule</a></li>
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
	<a class="btn btn-primary"  href="CIT_add.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Schedule</a>
	<hr>
	<div class="pagination">
  <ul>
    <li class="active"><a href="user_schedule.php"><font color="white">All</font></a></li>
    <li>
      <a href="CIT_BSIS.php"><font color="white">BSIS</font></a>
    </li>
    <li><a href="CIT_BSCE.php"><font color="white">BSCE</font></a></li>
    <li><a href="CIT_BSHRM.php"><font color="white">BSHRM</font></a></li>
    <li><a href="CIT_BSIT.php"><font color="white">BSIT</a></font></li>

  </ul>
</div>
	<table class="users-table">


<div class="demo_jui">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
			<thead>
				<tr>
				<th>Day</th>
				<th>Time Start</th>
				<th>Time End</th>
				<th>Semester</th>
				<th>School Year</th>
				<th>Course Year Section</th>
				<th>Subject</th>
				<th>Teacher</th>
				<th>room</th>
				</tr>
			</thead>
			<tbody>
<?php $result=mysql_query("select * from schedule where type=''")or die(mysql_error());
while($row=mysql_fetch_array($result)){ $id=$row['schedule_id'];
?>

<tr class="del<?php echo $id ?>">
	<td><?php echo $row['day'];?></td>
	<td><?php echo $row['time'];?></td>
	<td><?php echo $row['time_end'];?></td>
	<td><?php echo $row['semester'];?></td>
	<td><?php echo $row['sy'];?></td>
	<td><?php echo $row['CYS'];?></td>
	<td><?php echo $row['subject'];?></td>
	<td><?php echo $row['teacher'];?></td>
	<td><?php echo $row['room'];?></td>


<?php } ?>

	
	</tr>

			</tbody>
		</table>







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
	
