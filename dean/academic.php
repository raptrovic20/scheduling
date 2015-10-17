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
						<li class="active"><a href="academic.php"><i class="icon-group icon-large"></i>Academic Setting</a></li>
						<li class="divider-vertical"></li>
						<li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
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




	

<div id="element" class="hero-body">
<?php
	if(isset($_POST['school_year'])){
		$_SESSION['school_year'] = $_POST['school_year'];
		$_SESSION['semester'] = $_POST['semester'];
	}
	// die(_a($_SESSION));
?>
<h2><font color="white">Academic Year</font></h2>
	<form action = "" method="post">
	<hr>
	<table>
		<tr>
			<td><font color="white">School Year</font></td>
			<td>
				<select name="school_year" id="school_year">
					<?php 
						$sy_query = mysql_query("SELECT * FROM tbl_school_year") or die(mysql_error());
						while($sy = mysql_fetch_array($sy_query)){
							$selected = ($sy['id'] == 6) ? 'selected = "selected"' : "";
							echo '<option '.$selected.' value="'.$sy['id'].'">'.$sy['from'].' - '.$sy['to'].'</option>';
						} 
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><font color="White">Semester</font></td>
			<td>
				<select id="semester" name="semester">
					<option value="1" <?php echo ($_SESSION['semester'] == 1) ? 'selected="selected"' : '' ?>>1st Semester</option>
					<option value="2" <?php echo ($_SESSION['semester'] == 2) ? 'selected="selected"' : '' ?>>2nd Semester</option>
					<option value="3" <?php echo ($_SESSION['semester'] == 3) ? 'selected="selected"' : '' ?>>Summer</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="Change Academic Setting"></td>
		</tr>
	</table>
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
			<script type="text/javascript">
	$(document).ready( function() {
	

	
	$('.btn-danger1').click( function() {
		
		var id = $(this).attr("id");
		
		if(confirm("Are you sure you want to delete this Subject?")){
			
		
			$.ajax({
			type: "POST",
			url: "delete_subject.php",
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

<?php
	function _a($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
?>