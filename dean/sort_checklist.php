<?php include('header.php'); include('session.php'); include('dbcon.php'); ?>
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
  <li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
     <li class="divider-vertical"></li>
  <li><a href="faculty.php"><i class="icon-user icon-large"></i>Faculty</a></li>
   <li class="divider-vertical"></li>
  <li><a href="subjectsched.php"><i class="icon-table icon-large"></i>Subject Schedule</a></li>
  <li class="divider-vertical"></li>
  <li class="active"><a href="checklist.php"><i class="icon-table icon-large"></i>Check List</a></li>
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
<h2><font color="white">CheckList</font></h2>
	<div class="alert alert-info">
   <h2><center>CHECK LIST</center></h2>
    </div>
    <form  method = "POST" class="form-inline" action="sort_checklist.php">
	 <label class="control-label" for="input01"><font color="Pink">Filter By:</font>
    <div class="controls">
    <label class="control-label" for="input01"><font color="yellow">Instructor:</font></label>
   <select name="instructor" required>
									<option></option>
										<?php 
									$course_query = mysql_query("select * from tbl_checklist") or die(mysql_error());
									while($course_row = mysql_fetch_array($course_query)){
									?>
									<option><?php echo $course_row['instructor']; ?></option>
									<?php  } ?>
									</select>
									<!-- <option>Third</option>
									<option>Fourth</option> -->
									
                                    <label class="control-label" for="input01"><font color="yellow">Term:</font></label>

   <select name="term" required>
									<option></option>
										<?php 
									$course_query = mysql_query("select * from tbl_checklist") or die(mysql_error());
									while($course_row = mysql_fetch_array($course_query)){
									?>
									<option><?php echo $course_row['term']; ?></option>
									<?php  } ?>
									</select>
	<button type="submit" name="sort_checklist" class="btn"><i class="icon-check icon-large"></i>SEARCH</button>
									</form>
					
    </div>
	<a type="submit" href="checklist.php" name="sort_checklist" class="btn btn-info"><i class="icon-search icon-large"></i>&nbsp;View All</a>			
	<hr>
	<table class="users-table">


						
<div class="demo_jui">

		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
       <div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
								</div>
			<thead>
				<tr>
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
								 if (isset($_POST['sort_checklist'])){
								 $instructor = $_POST['instructor'];
								 $term = $_POST['term'];
								 
								 ?>
                                  <?php $user_query=mysql_query("select * from tbl_checklist where term = '$term' and instructor = '$instructor'  ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									
									
									?>
									

									 <tr class="del<?php echo $id ?>">
                                   <td><?php echo $row['subj_code']; ?></td>
	<td><?php echo $row['subj_des']; ?></td>
    <td><?php echo $row['coll_offering']; ?></td>
	<td><?php echo $row['lec/lab_unit']; ?></td>
	<td><?php echo $row['fac_load']; ?></td>
	<td><?php echo $row['section']; ?></td>
	<td><?php echo $row['schedule']; ?></td>
	<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['no_of_stud']; ?></td>
	
                                    
                                    
                                        
									
									     <!-- Modal edit user -->
								
                                    </tr>
<?php } ?>

<?php } ?>
	
	

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
			