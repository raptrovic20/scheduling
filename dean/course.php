<?php include('header.php'); include('session.php'); include('dbcon.php'); ?>
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
						<li><a href="blocks.php"><i class="icon-group icon-large"></i>Blocks</a></li>
						<li class="divider-vertical"></li>
						<li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
						<li class="divider-vertical"></li>
						<li><a href="faculty.php"><i class="icon-user icon-large"></i>Faculty</a></li>
						<li class="divider-vertical"></li>
						<li class="active"><a href="subjectsched.php"><i class="icon-table icon-large"></i>Subject Schedule</a></li>
						<li class="divider-vertical"></li>
						<li><a href="checklist.php"><i class="icon-table icon-large"></i>Check List</a></li>
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



	

<div id="element" class="hero-body-course">
<h2><font color="white">Course List</font></h2>
	<a class="btn btn-primary" href="add_course.php" >  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Course</a>
	<hr>
	<table class="users-table">


<div class="demo_jui">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
			<thead>
				<tr>
				
				<th>Course Name</th>
				<th>Department Name</th>
                <th>No. Of Years</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>

<?php 
$result=mysql_query('SELECT 
  tbl_course.course_id,
  tbl_course.`course_name`,
  tbl_course.`department_id`,
  tbl_course.`course_lenght`,
  tbl_department.`department_name`
FROM
  tbl_course 
  LEFT JOIN tbl_department 
    ON tbl_course.`department_id` = tbl_department.`department_id`')or die(mysql_error());
while($row=mysql_fetch_array($result)){ $id=$row['course_id']
 ?>
<tr class="del<?php echo $id ?>">
	
				<td><?php echo $row['course_name'] ?></td>
				<td><?php echo $row['department_name'] ?></td>
                <td><?php echo $row['course_lenght'] ?></td>
	
	<td align="center">
	
	<a class="btn btn-info" href="assign_subjects_to_course.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Assign Subjects</a>&nbsp;
	
	
		
	<div class="modal hide fade" id="<?php echo $id; ?>">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
		      <div class="alert alert-info">
   <p><font color="gray">Are you Sure you Want to Delete this Course Entry?</font></p>
    </div>
	  </div>
	  <div class="modal-body">

   
<a class="btn btn-info" href="delete_course.php<?php echo '?id='.$id; ?>"><i class="icon-check icon-large"></i>&nbsp;Yes</a>&nbsp;
	
	   <a href="#" class="btn" data-dismiss="modal">No</a>
	  
  
	  </div>
	  <div class="modal-footer">
	 
		</div>
		</div>
	
</td>



<?php }?>
	
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
		
	<script type="text/javascript">
	$(document).ready( function() {
	

	
	$('.btn-danger1').click( function() {
		
		var id = $(this).attr("id");
		
		if(confirm("Are you sure you want to delete this Course Year and Section?")){
			
		
			$.ajax({
			type: "POST",
			url: "delete_course.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut('slow'); 
			} 
			}); 
			}else{
			return false;}
		});				
	});

</script>
