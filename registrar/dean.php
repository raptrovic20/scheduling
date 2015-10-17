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
						<li><a href="room.php">Room Management</a></li>
						<li class="divider-vertical"></li>
						<li><a href="course.php"><i class="icon-group icon-large"></i>Course Management</a></li>
						<li class="divider-vertical"></li>
						<li><a href="department.php"><i class="icon-list icon-large"></i>Department Management</a></li>
						<li class="divider-vertical"></li>
						<li class="active"><a href="dean.php"><i class="icon-list icon-large"></i>Dean</a></li>
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
			
            <h2><font color="white">Dean List</font></h2>
	<a class="btn btn-primary" id="add_button" >  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Dean</a>
			<hr>
				<table class=""">
					<div class="">
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="log">
							<thead>
								<tr>
									<th>Dean</th>
									<th>Department</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="datatable_tbody">
								<?php
									$dean_query = 'SELECT 
													  tbl_dean.*,
													  tbl_department.`department_name` 
													FROM
													  tbl_dean 
													  INNER JOIN tbl_department 
														ON tbl_dean.`department_id` = `tbl_department`.`department_id`';
									$result=mysql_query($dean_query)or die(mysql_error());
									while($row = mysql_fetch_array($result)){
										echo '<tr>';
										echo '	<td style="text-align:center">'.$row['name'].'</td>';
										echo '	<td style="text-align:center">'.$row['department_name'].'</td>';
										echo '	<td style="text-align:left">
													<a href="#" onclick="edit('.$row['emp_no'].')" class="btn btn-info"><i class="icon-edit icon-large"></i>Edit</a>
												</td>';
										echo '</tr>';
									} 
								?>
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
		$('#add_button').click( function(){
			$.ajax({
				url: "ajax_function.php",
				data: {function_name : 'add_dean_form'},
				type: 'post',
				dataType: 'html',
				success: function(result){
					$("#add_form_modal").html(result);
					$("#add_form_modal").modal();
					$("#add_form_modal").css({width:'80%', left: '30%'});
					$('#dean_form').ajaxForm({
						dataType: 'json',
						beforeSubmit: function(){
							
						},
						success: function(response){
							location.reload();
						}
					}); 
				}
			});
		});
	});
	
	function edit(id){
		$.ajax({
			url: "ajax_function.php",
			data: {function_name : 'edit_dean_form', dean_id: id},
			type: 'post',
			dataType: 'html',
			success: function(result){
				$("#add_form_modal").html(result);
				$("#add_form_modal").modal();
				$("#add_form_modal").css({width:'80%', left: '30%'});
				$('#dean_form').ajaxForm({
					dataType: 'json',
					beforeSubmit: function(){
						
					},
					success: function(response){
						location.reload();
					}
				}); 
			}
		});
	}	
</script>