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
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
			<thead>
				<tr>
                
                <th>Instructor</th>
				<th>Term</th>
				<th>Subject Code</th>
				<th>Description</th>
                <th>College Offerring</th>
				<th>Lec/Lab Units</th>
				<th>Faculty Load</th>
                <th>Section</th>
				<th>Schedule</th>
				<th>Room</th>
                 <th>No. of Student</th>
				
				</tr>
			</thead>
			<tbody>
<?php
$result=mysql_query("select * from tbl_checklist")or die(mysql_error());
while($row=mysql_fetch_array($result)){ $id=$row['check_id'];

 ?>

<tr class="del<?php echo $id ?>">
<td><?php echo $row['instructor']; ?></td>
	<td><?php echo $row['term']; ?></td>
	<td><?php echo $row['subj_code']; ?></td>
	<td><?php echo $row['subj_des']; ?></td>
    <td><?php echo $row['coll_offering']; ?></td>
	<td><?php echo $row['lec/lab_unit']; ?></td>
	<td><?php echo $row['fac_load']; ?></td>
	<td><?php echo $row['section']; ?></td>
	<td><?php echo $row['schedule']; ?></td>
	<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['no_of_stud']; ?></td>
	
	
		
	

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
		