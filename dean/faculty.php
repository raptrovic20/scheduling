<?php include('header.php'); include('dbcon.php'); include('session.php');?>
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
						<li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
						<li class="divider-vertical"></li>
						<li  class="active"><a href="faculty.php"><i class="icon-user icon-large"></i>Faculty</a></li>
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

<h2><font color="white">Faculty List</font></h2>
	<a class="btn btn-primary"  href="add_teacher.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Faculty</a>
	<hr>
	<table class="users-table">


<div class="demo_jui">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
			<thead>
				<tr>
				
				<th>FirstName</th>
				<th>LastName</th>
				<th>MiddleName</th>
                <th>Status</th>
				<th>Department</th>
                <th>Specialization</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>

<?php $result=mysql_query("select * from tbl_faculty") or die(mysql_error());
while($row=mysql_fetch_array($result)){ $id=$row['emp_no'];
 ?>
<tr class="del<?php echo $id ?>">
	
	<td><?php echo $row['fname']; ?></td>
	<td><?php echo $row['lname']; ?></td>
	<td><?php echo $row['mname']; ?></td>
    <td><?php echo $row['status']; ?></td>
	<td><?php echo $row['department_name']; ?></td>
	<td><?php echo $row['specialization']; ?></td>
	
	<td align="center" width="160">
	
	<a class="btn btn-info" href="edit_teacher.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;
	
	
		
	<div class="modal hide fade" id="<?php echo $id; ?>">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
		      <div class="alert alert-info">
   <p><font color="gray">Are you Sure you Want to Delete this Faculty Entry?</font></p>
    </div>
	  </div>
	  <div class="modal-body">

   
<a class="btn btn-info" href="delete_teacher.php<?php echo '?id='.$id; ?>"><i class="icon-check icon-large"></i>&nbsp;Yes</a>&nbsp;
	
	   <a href="#" class="btn" data-dismiss="modal">No</a>
	  
  
	  </div>
	  <div class="modal-footer">
	 
		</div>
		</div>
	
	
	<a class="btn btn-danger1"  data-toggle="modal" href="#<?php echo $id; ?>">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>
</td>




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
		
	