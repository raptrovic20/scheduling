<?php include('header.php'); include('session.php'); include('dbcon.php') ?>
<body>
<?php include('nav-top1.php'); ?>
<?php
	$sql = 'SELECT * FROM tbl_course WHERE course_id = '.$_GET['id'];
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_assoc($result);
	}
	else{
		die("asdf");
	}
?>
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
						<li  class="active"><a href="course.php"><i class="icon-group icon-large"></i>Course Management</a></li>
						<li class="divider-vertical"></li>
						<li><a href="department.php"><i class="icon-list icon-large"></i>Department Management</a></li>
						<li class="divider-vertical"></li>
						<li><a href="dean.php"><i class="icon-list icon-large"></i>Dean</a></li>
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
			<h2><font color="white">Assign subject to <?php echo $row['course_name'] ?></font></h2>
			<form  method = "POST" class="form-inline" action="sort_checklist.php">
				<div class="controls">
					<label class="control-label" for="input01"><font color="yellow">School Year:</font></label>
					<select name="school_year_filter" id="school_year_filter">
						<?php 
							$sy_query = mysql_query("SELECT * FROM tbl_school_year") or die(mysql_error());
							while($sy = mysql_fetch_array($sy_query)){
								$selected = ($sy['id'] == 6) ? 'selected = "selected"' : "";
								echo '<option '.$selected.' value="'.$sy['id'].'">'.$sy['from'].' - '.$sy['to'].'</option>';
							} 
						?>
					</select>
					<select name="semester_filter" id="semester_filter">
						<option value="1">1st Semester</option>
						<option value="2">2nd Semester</option>
						<option value="3">Summer</option>
					</select>
					<select name="year_level_filter" id="year_level_filter">
						<option value="1">1st year</option>
						<option value="2">2nd year</option>
						<option value="3">3rd year</option>
						<option value="4">4th year</option>
						<option value="5">5th year</option>
					</select>
					<input type="hidden" id="course_id_hidden" name="course_id_hidden" value="<?php echo $row['course_id'] ?>">
					<button id="search_button" type="button" class="btn">SEARCH</button>
					<button id="save" type="button" class="btn">Save</button>
				</div>
			</form>
			
			<div style="display:none;width:50%" id="list_of_subjects_div">
				<select style="width:100%" id="list_of_subjects" multiple="multiple">
					
				</select>
			</div>
		</div>	
		<?php include('footer.php');?>
	</div>
</body>
<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">X</button>
	</div>
	<div class="modal-body">
	    <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">No</a>
	    <a href="logout.php" class="btn btn-primary">Yes</a>
	</div>
</div>

<div class="modal hide fade" id="add_form_modal">
	
</div>

<script type="text/javascript">
	$(document).ready( function(){
		$('#search_button').click( function(){
			var school_year = $("#school_year_filter").val();
			var year_level = $("#year_level_filter").val();
			var course_id = $("#course_id_hidden").val();
			var semester = $("#semester_filter").val();
			
			refresh_courses(school_year, year_level, course_id, semester);
		});
		
		$('#save').click( function(){
			var subjects = $("#list_of_subjects").val();
			if ( subjects !== null){
				var school_year = $("#school_year_filter").val();
				var year_level = $("#year_level_filter").val();
				var course_id = $("#course_id_hidden").val();
				var semester = $("#semester_filter").val();
				
				$.ajax({
					url: "ajax_function.php",
					data: {function_name : 'save_subject_to_course', school_year : school_year, year_level : year_level, course_id: course_id, subjects: subjects, semester : semester},
					type: 'post',
					dataType: 'json',
					success: function(result){
						if(result.status == "success"){
							 location.reload();
						}
					}
				});
			}
			else{
				alert("please select subject");
			}
		});
	});
	
	function refresh_courses(school_year, year_level, course_id, semester){
		$.ajax({
			url: "ajax_function.php",
			data: {function_name : 'get_subject_list_for_assigning', school_year : school_year, year_level : year_level, course_id: course_id, semester : semester},
			type: 'post',
			dataType: 'html',
			success: function(result){
				$("#list_of_subjects").html(result);
				$("#list_of_subjects").select2({placeholder: "Select subject"});
				$("#list_of_subjects_div").show();
			}
		});
	}
</script>

<?php
function _a($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>