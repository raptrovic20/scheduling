<?php include('header.php'); include('session.php'); include('dbcon.php') ?>
<body>
<?php include('nav-top1.php'); ?>
<?php
	$sql = 'SELECT * FROM tbl_blocks WHERE id = '.$_GET['block_id'];
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
						<li class="active"><a href="blocks.php"><i class="icon-group icon-large"></i>Blocks</a></li>
						<li class="divider-vertical"></li>
						<li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
						<li class="divider-vertical"></li>
						<li><a href="faculty.php"><i class="icon-user icon-large"></i>Faculty</a></li>
						<li class="divider-vertical"></li>
						<li><a href="subjectsched.php"><i class="icon-table icon-large"></i>Subject Schedule</a></li>
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
		<div id="element" class="hero-body">
			<h2><font color="white">Assign subject to <?php echo $row['name'];?></font></h2>
			<form  method = "POST" class="form-inline">
				<div class="controls">
					<label class="control-label" for="input01"><font color="yellow">School Year:</font></label>
					<input type="hidden" id="school_year_filter" name="school_year_filter" value="<?php echo $row['school_year'] ?>">
					<select name="semester_filter" id="semester_filter">
						<option value="1">1st Semester</option>
						<option value="2">2nd Semester</option>
						<option value="3">Summer</option>
					</select>
					<input type="hidden" id="year_level_filter" name="year_level_filter" value="<?php echo $row['year_level'] ?>">
					<input type="hidden" id="block_id_hidden" name="block_id_hidden" value="<?php echo $row['id'] ?>">
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
			var block_id = $("#block_id_hidden").val();
			var semester = $("#semester_filter").val();
			
			refresh_courses(school_year, year_level, block_id, semester);
		});
		
		$('#save').click( function(){
			var subjects = $("#list_of_subjects").val();
			if ( subjects !== null){
				var school_year = $("#school_year_filter").val();
				var year_level = $("#year_level_filter").val();
				var block_id = $("#block_id_hidden").val();
				var semester = $("#semester_filter").val();
				
				$.ajax({
					url: "ajax_function.php",
					data: {function_name : 'save_subject_to_block', school_year : school_year, year_level : year_level, block_id: block_id, subjects: subjects, semester : semester},
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
	
	function refresh_courses(school_year, year_level, block_id, semester){
		$.ajax({
			url: "ajax_function.php",
			data: {function_name : 'get_block_subject_list_for_assigning', school_year : school_year, year_level : year_level, block_id: block_id, semester : semester},
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