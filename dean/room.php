<?php include('header.php'); include('session.php'); include('dbcon.php'); ?>
<body>
<?php include('nav-top1.php'); ?>
<script type="text/javascript">
var popupWindow=null;
function child_open(){ 
popupWindow =window.open('prints.php',"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
}
</script>
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
						<li><a href="faculty.php"><i class="icon-user icon-large"></i>Faculty</a></li>
						<li class="divider-vertical"></li>
						<li><a href="subjectsched.php"><i class="icon-table icon-large"></i>Scheduling</a></li>
						<li class="divider-vertical"></li>
						<li><a href="checklist.php"><i class="icon-table icon-large"></i>Check List</a></li>
						<li class="divider-vertical"></li>
                        <li   class="active"><a href="room.php"><i class="icon-table icon-large"></i>Room Reports</a></li>
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
		<h2><font color="white">Room</font></h2>
		<div class="alert alert-info">
			<h2><center>Room Reports</center></h2>
		</div>
		<form  method = "POST" class="form-inline" action="sort_checklist.php">
			
			<div class="controls">
				<label class="control-label" for="input01"><font color="yellow">Instructor:</font></label>
				<select name="instructor" id="instructor" required>
					<option value=""></option>
					<?php 
						$room_query = mysql_query("select * from tbl_room") or die(mysql_error());
						while($room = mysql_fetch_array($room_query)){
							 echo '<option value="'.$room['room_no'].'">'.$room['room_name'].' </option>';
						} 
					?>
				</select>		
				<button id="search_button" type="button" name="sort_checklist" class="btn"><i class="icon-check icon-large"></i>SEARCH</button>
			</div>
		</form>								
		<hr>
	<table class="users-table">
		<div class="demo_jui">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
				<div class="pull-right">
					<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
				</div>
				<thead>
					<tr>
						<th>Instructor</th>
						<th>Subject Code</th>
						<th>Description</th>
                        <th>Type</th>
						<th>College Offerring</th>
						<th>Units</th>
						<th>Section</th>	
						<th>Schedule</th>
						<th>Room</th>
					</tr>
				</thead>
				<tbody id="datatable_tbody">
					<?php
						$query = '
								SELECT 
									tbl_schedule.id,
								  CONCAT(
									tbl_faculty.`fname`,
									" ",
									tbl_faculty.`mname`,
									" ",
									tbl_faculty.`lname`
								  ) AS instructor,
								  tbl_subject.`subject_code`,
								  tbl_subject.`description`,
								  tbl_department.`department_name` AS `college_offering`,
								  tbl_department.`department_code` AS `college_offering_code`,
								  tbl_subject.`type`,
								  tbl_subject.`unit`,
								  tbl_blocks.`name`,
								  tbl_schedule.`from`,
								  tbl_schedule.`to`,
								  tbl_schedule.`monday`,
								  tbl_schedule.`tuesday`,
								  tbl_schedule.`wednesday`,
								  tbl_schedule.`thursday`,
								  tbl_schedule.`friday`,
								  tbl_schedule.`saturday`,
								  tbl_room.`room_name`,
								  tbl_room.`room_no`
								FROM
								  tbl_schedule 
								  INNER JOIN `tbl_faculty` 
									ON `tbl_schedule`.`prof_id` = tbl_faculty.`emp_no` 
								  INNER JOIN `tbl_subject` 
									ON tbl_schedule.`subject_id` = tbl_subject.`subject_id` 
								  INNER JOIN `tbl_blocks` 
									ON tbl_schedule.`block_id` = tbl_blocks.`id` 
								  INNER JOIN `tbl_course` 
									ON `tbl_blocks`.`course_id` = tbl_course.`course_id` 
								  LEFT JOIN tbl_department 
									ON tbl_course.`department_id` = tbl_department.`department_id` 
								   INNER JOIN `tbl_room` ON tbl_schedule.`room_id` = tbl_room.`room_id`
								   ';
						$result=mysql_query($query)or die(mysql_error());
						while($row=mysql_fetch_assoc($result)){
							echo '<tr class="del'.$row['id'].'">';
							echo '	<td>'.$row['instructor'].'</td>';
							echo '	<td>'.$row['subject_code'].'</td>';
							echo '	<td>'.$row['description'].'</td>';
							echo '	<td>'.$row['type'].'</td>';
							echo '	<td>'.$row['college_offering_code'].'</td>';
							echo '<td>'.$row['unit'].'</td>';
							echo '	<td>'.$row['name'].'</td>';
							echo '	<td>sched</td>';
							echo '	<td>'.$row['room_name'].' ('.$row['room_no'].')</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>


<?php include('footer.php');?>
</div>
</body>
	<div class="modal hide fade" id="myModal">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
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
		}
		else{
			return false;
		}
	});

	$('#search_button').click( function(){
		if($("#instructor").val() != ""){
			$.ajax({
				url: "ajax_function.php",
				data: {function_name : 'refresh_checklist', prof_id : $("#instructor").val()},
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
	});
});

</script>

