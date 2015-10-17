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
			<h2><font color="white">Blocks</font></h2>
			<form  method = "POST" class="form-inline" action="sort_checklist.php">
				<div class="controls">
					<!--<label class="control-label" for="input01"><font color="yellow">School Year:</font></label>
					<select name="school_year_filter" id="school_year_filter">
						<?php 
							$sy_query = mysql_query("SELECT * FROM tbl_school_year") or die(mysql_error());
							while($sy = mysql_fetch_array($sy_query)){
								$selected = ($sy['id'] == 6) ? 'selected = "selected"' : "";
								echo '<option '.$selected.' value="'.$sy['id'].'">'.$sy['from'].' - '.$sy['to'].'</option>';
							} 
						?>
					</select>-->
					<input type="hidden" name="school_year_filter" id="school_year_filter" value="<?php echo $_SESSION['school_year'] ?>">
					<select name="course_filter" id="course_filter">
						<?php 
							$course_query = mysql_query("SELECT * FROM tbl_course WHERE department_id = ".$_SESSION['dept_id']) or die(mysql_error());
							while($course = mysql_fetch_array($course_query)){
								echo '<option value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
							} 
						?>
					</select>
					<button id="search_button" type="button" name="sort_checklist" class="btn"><i class="icon-check icon-large"></i>SEARCH</button>
					<button id="add_button" type="button" class="btn">ADD BLOCK</button>
				</div>
			</form>
			<hr>
				<table class="users-table">
					<div class="demo_jui">
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
							<thead>
								<tr>
									<th>Block Name</th>
									<th>Year Level</th>
									<th>Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="datatable_tbody">
							</tbody>
						</table>
					</div>
				</table>
			<hr>
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
			refresh_datatable($("#course_filter").val(),$("#school_year_filter").val());
		});
		
		$('#add_button').click( function(){
			$.ajax({
				url: "ajax_function.php",
				data: {function_name : 'add_block_form', course_id : $("#course_filter").val(), school_year : $("#school_year_filter").val()},
				type: 'post',
				dataType: 'html',
				success: function(result){
					$("#add_form_modal").html(result);
					$("#add_form_modal").modal();
					$("#add_form_modal").css({width:'80%', left: '30%'});
					$('#block_form').ajaxForm({
						dataType: 'json',
						beforeSubmit: function(){
							$("#error_message").html("");
							if($("#block_name").val() == ""){
								$("#error_message").html('Block Name Required');
								return false;
							}
						},
						success: function(response){
							if(response.status == "success"){
								$("#add_form_modal").modal('hide');
								$("#course_filter").val(response.course_id);
								$("#school_year_filter").val(response.school_year);
								refresh_datatable(response.course_id, response.school_year);
							}
							else{
								$("#error_message").html(response.message);
							}
						}
					}); 
				}
			});
		});
	});
	
	function refresh_datatable(course_id,school_year){
		$.ajax({
			url: "ajax_function.php",
			data: {function_name : 'refresh_blocks_datatable', course_id : course_id, school_year : school_year},
			type: 'post',
			dataType: 'html',
			success: function(result){
				var oTable = $("#log").dataTable();
				oTable.fnClearTable();
				oTable.fnDestroy();
				$("#datatable_tbody").html(result);
				oTable = jQuery('#log').dataTable({
											"bJQueryUI": true,
											"sPaginationType": "full_numbers"
										});
			}
		});
	}
	
	function edit(id){
		$.ajax({
			url: "ajax_function.php",
			data: {function_name : 'edit_block_form',block_id : id},
			type: 'post',
			dataType: 'html',
			success: function(result){
				$("#add_form_modal").html(result);
				$("#add_form_modal").modal();
				$("#add_form_modal").css({width:'80%', left: '30%'});
				$('#block_form').ajaxForm({
					dataType: 'json',
					beforeSubmit: function(){
						
					},
					success: function(response){
						$("#add_form_modal").modal('hide');
						$("#course_filter").val(response.course_id);
						$("#school_year_filter").val(response.school_year);
						refresh_datatable(response.course_id, response.school_year);
					}
				}); 
			}
		});
	}
	
	function delete_row(id){
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				url: "ajax_function.php",
				data: {function_name : 'delete_block', block_id : id},
				type: 'post',
				dataType: 'json',
				success: function (response){
					if(response.status == "success"){
						refresh_datatable($("#course_filter").val(),$("#school_year_filter").val());
					}
				}
			});
		}
	}
</script>