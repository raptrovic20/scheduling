<?php include('header.php'); include('session.php'); include('dbcon.php') ?>
<body>
<?php include('nav-top1.php'); ?>
<?php
	$sql = 'SELECT * FROM tbl_school_year';
	$school_year = mysql_query($sql);
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
		<div id="element" class="hero-body">
			<div style="width:100%;float:left;background-color:#fff;">
				<input type="hidden" name="SY" id="SY" value="<?php echo $_SESSION['school_year'] ?>">
				<!--<input type="hidden" name="sem" id="sem" value="<?php echo $_SESSION['semester'] ?>">-->
				<div style="float:left;width:21%;">
					Semester: 
					<select id="sem" name="sem">
						<option value="1">1st Semester</option>
						<option value="2">2nd Semester</option>
						<option value="3">Summer</option>
					</select>
				</div>
				<!--<div style="float:left;width:21%;margin-left:20px">
					School Year: 
					<select id="SY" name="SY">
						<?php 
							while($row=mysql_fetch_assoc($school_year)){
								$selected = "";
								if($row['id'] == 6) $selected = 'selected = "selected"';
								echo '<option '.$selected.' value="'.$row['id'].'">'.$row['from'].' - '.$row['to'].'<option>';
							}
						?>
					</select>
				</div>-->
				<div style="float:left;width:21%;">
					Year Level: 
					<select id="year_level" name="year_level">
						<option value="1">1st Year</option>
						<option value="2">2nd Year</option>
						<option value="3">3rd Year</option>
						<option value="4">4th Year</option>
						<option value="5">5th Year</option>
					</select>
				</div>
				<div style="float:left;width:35%;">
					Blocks: 
					<select id="block_select" name="block_select">
						<option>-Select One-</option>
					</select>
				</div>
				<div style="float:left;width:21%;">
					<input type="button" id="save_schedule_button" value="Save">
				</div>
			</div>
			<div style="margin-top:50px">
				<div id="courses" style="float:left;width:15%;background-color:#fff;margin-right:3.3%;text-align:center;display:none">
					<h3>Courses</h3><br/>
					<div class="list-group" id="list_of_courses">
					</div>
				</div>
				<div id="subjects" style="float:left;width:75%;background-color:#fff;text-align:center">
					
				</div>
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

<div class="modal hide fade" id="sched_form_modal">
	
</div>

<script type="text/javascript">
	$(document).ready(function() {
		get_courses();
		$( "#save_schedule_button" ).click(function() {
			$("#sched_form").submit();
		});
		
		$( "#block_select" ).change(function() {
			var year_level = $('option:selected', this).attr('year-level');
			var course_id = $('option:selected', this).attr('course-id');
			get_subjects($(this).val(), course_id, year_level);
		});
	});
	
	function get_courses(){
		$.ajax({
			url: "ajax_function.php",
			data: {function_name : 'get_courses'},
			type: 'post',
			dataType: 'json',
			success: function(result){
				if(result.status == "success"){
					html = "";
					$.each(result.data, function (key, data) {
						html += '<a href="#" class="list-group-item course_item" course-id="'+data.course_id+'">'+data.course_name+'</a>'
					});
					$("#courses").show();
					$("#list_of_courses").html(html);
					$( ".course_item" ).click(function() {
						$("#blocks, #subjects, #subject_info").hide();
						$('.course_item').removeClass('active');
						$(this).addClass('active');
						get_blocks($(this).attr("course-id"),$("#year_level").val());
						// get_years($(this).attr("course-id"));
					});
				}
				else{
					$("#list_of_courses").html('No course assigned to you');
				}
			}
		})
	}
	
	function get_blocks(course_id,year_level){
		$.ajax({
			url: "ajax_function.php",
			data: {
					function_name : 'get_blocks', 
					course_id : course_id, 
					school_year : $("#SY").val(), 
					sem : $("#sem").val(), 
					year_level : year_level
				},
			type: 'post',
			dataType: 'json',
			success: function(result){
				if(result.status == "success"){
					html = "<option>-Select One-</option>";
					$.each(result.data, function (key, data) {
						html += '<option course-id="'+course_id+'" year-level="'+year_level+'" value="'+data.id+'">'+data.name+'</option>';
					});
					
					$("#block_select").html(html);
				}
				else{
					$("#block_select").html('<option>No block/section for this course</option>');
				}
			}
		});
	}
	
	function get_subjects(block_id, course_id, year_level){
		$("#subjects").hide();
		$.ajax({
			url: "ajax_function.php",
			data: {function_name : 'get_subjects', block_id : block_id, school_year : $("#SY").val(), sem : $("#sem").val(), year_level : year_level, course_id : course_id},
			type: 'post',
			dataType: 'html',
			success: function(result){
				$("#subjects").html(result);
				$('.datepicker').timepicker({ 'step': 5,'timeFormat': 'h:i A','useSelect':true,'minTime': '4:00am','maxTime': '11:00pm', });
				$('.datepicker_div').datepair();
				$("#subjects").show('slide', { direction: 'left' });
				$('#sched_form').ajaxForm({
					dataType: 'json',
					beforeSubmit: function(){
						$("#error_message").html("");
					},
					success: function(response){
						if(response.status == "success"){
							$("#sched_form_modal").modal('hide');
							$("#subject_info").hide();
							get_subject_info(block_id,subject_id);
						}
						else{
							$("#error_message").html(response.message);
						}
					}
				}); 
			}
		});
	}
	
	function capitalizeFirstLetter(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	}
	
	String.prototype.capitalizeFirstLetter = function() {
		return this.charAt(0).toUpperCase() + this.slice(1);
	}
</script>