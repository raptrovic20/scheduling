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
  <li class="active"><a href="subjectsched.php"><i class="icon-table icon-large"></i>Subject Schedule</a></li>
  <li class="divider-vertical"></li>
  <li><a href="checklist.php"><i class="icon-table icon-large"></i>Check List</a></li>
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
<h2><font color="white">List of Subject Schedule</font></h2>
	
	<table class="users-table">


<div class="demo_jui">
		<table class="users-table">
		<div class="demo_jui">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
				<div class="pull-right">
					<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
				</div>
				<thead>
					<tr>
						<th>Instructor</th>
						<th>Subject Code</th>
						<th>Description</th>
						<th>College Offerring</th>
						<th>Lec/Lab Units</th>
						<th>Section</th>	
						<th>Schedule</th>
						<th>Room</th>
					</tr>
				</thead>
				<tbody id="datatable_tbody">
					<?php
						$query = '
								SELECT 
									tbl_schedule.id,
								  CONCAT(
									tbl_faculty.`fname`,
									" ",
									tbl_faculty.`mname`,
									" ",
									tbl_faculty.`lname`
								  ) AS instructor,
								  tbl_subject.`subject_code`,
								  tbl_subject.`description`,
								  tbl_department.`department_name` AS `college_offering`,
								  tbl_department.`department_code` AS `college_offering_code`,
								  tbl_subject.`type`,
								  tbl_subject.`unit`,
								  tbl_blocks.`name`,
								  tbl_schedule.`from`,
								  tbl_schedule.`to`,
								  tbl_schedule.`monday`,
								  tbl_schedule.`tuesday`,
								  tbl_schedule.`wednesday`,
								  tbl_schedule.`thursday`,
								  tbl_schedule.`friday`,
								  tbl_schedule.`saturday`,
								  tbl_room.`room_name`,
								  tbl_room.`room_no`
								FROM
								  tbl_schedule 
								  INNER JOIN `tbl_faculty` 
									ON `tbl_schedule`.`prof_id` = tbl_faculty.`emp_no` 
								  INNER JOIN `tbl_subject` 
									ON tbl_schedule.`subject_id` = tbl_subject.`subject_id` 
								  INNER JOIN `tbl_blocks` 
									ON tbl_schedule.`block_id` = tbl_blocks.`id` 
								  INNER JOIN `tbl_course` 
									ON `tbl_blocks`.`course_id` = tbl_course.`course_id` 
								  LEFT JOIN tbl_department 
									ON tbl_course.`department_id` = tbl_department.`department_id` 
								   INNER JOIN `tbl_room` ON tbl_schedule.`room_id` = tbl_room.`room_id` where tbl_schedule.prof_id = '.$_SESSION['faculty_id'];
								   // die($query);
						$result=mysql_query($query)or die(mysql_error());
						while($row=mysql_fetch_assoc($result)){
							echo '<tr class="del'.$row['id'].'">';
							echo '	<td>'.$row['instructor'].'</td>';
							echo '	<td>'.$row['subject_code'].'</td>';
							echo '	<td>'.$row['description'].'</td>';
							echo '	<td>'.$row['college_offering_code'].'</td>';
							echo '<td>'.$row['unit'].'</td>';
							echo '	<td>'.$row['name'].'</td>';
							echo '	<td>sched</td>';
							echo '	<td>'.$row['room_name'].' ('.$row['room_no'].')</td>';
							echo '</tr>';
						}
					?>
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
		