<?php
	session_start();
	$post = $_POST;
	$post['function_name']();
	
	function conn(){
		// 1. Create a database connection
		$conn= mysql_connect("localhost","root","");
		if (!$conn) {
			die("Database connection failed: " . mysql_error());
		}

		// 2. Select a database to use 
		$db_select = mysql_select_db("onlineschedsys",$conn);
		if (!$db_select) {
			die("Database selection failed: " . mysql_error());
		}
		return $conn;
	}
	
	function _a($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	
	function refresh_checklist(){
		$conn = conn();
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
				  tbl_subject.`labunit`,
				  tbl_subject.`lecunit`,
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
				   where tbl_faculty.emp_no = '.$_POST['prof_id'] ;
				   
		$result=mysql_query($query)or die(mysql_error());
		while($row=mysql_fetch_assoc($result)){
			echo '<tr class="del'.$row['id'].'">';
			echo '	<td>'.$row['instructor'].'</td>';
			echo '	<td>'.$row['subject_code'].'</td>';
			echo '	<td>'.$row['description'].'</td>';
			echo '	<td>'.$row['college_offering_code'].'</td>';
			echo '	<td>'.$row['lecunit'].'/'.$row['labunit'].'</td>';
			echo '	<td>'.$row['name'].'</td>';
			echo '	<td>sched</td>';
			echo '	<td>'.$row['room_name'].' ('.$row['room_no'].')</td>';
			echo '</tr>';
		}
	}
	
	function refresh_room_sched_datatable(){
		$conn = conn();
		$post = $_POST;
		$query = 'SELECT 
				  tbl_room.`room_no`,
				  tbl_room.`room_name`,
				  tbl_subject.`subject_code`,
				  tbl_subject.`description`,
				  tbl_blocks.`name` AS `block_name`,
				  CONCAT(
					tbl_faculty.`fname`,
					" ",
					tbl_faculty.`mname`,
					" ",
					tbl_faculty.`lname`
				  ) AS `prof_name`,
				  tbl_schedule.`monday`,
				  tbl_schedule.`tuesday`,
				  tbl_schedule.`wednesday`,
				  tbl_schedule.`thursday`,
				  tbl_schedule.`friday`,
				  tbl_schedule.`saturday`,
				  tbl_schedule.from,
				  tbl_schedule.`to`
				FROM
				  `tbl_schedule` 
				  INNER JOIN `tbl_room` 
					ON tbl_schedule.`room_id` = tbl_room.`room_id` 
				  INNER JOIN `tbl_faculty` 
					ON tbl_schedule.`prof_id` = tbl_faculty.`emp_no` 
				  INNER JOIN `tbl_subject` 
					ON tbl_schedule.`subject_id` = tbl_subject.`subject_id` 
				  INNER JOIN `tbl_blocks` 
					ON tbl_schedule.`block_id` = tbl_blocks.`id` where tbl_schedule.school_year = '.$post['school_year'].' and  tbl_schedule.semester = '.$post['sem'].' and tbl_schedule.prof_id = '.$_SESSION['faculty_id'];
		$result=mysql_query($query)or die(mysql_error());
		while($row=mysql_fetch_assoc($result)){
			$days = array('monday','tuesday','wednesday','thursday','friday','saturday');
			
			$sched = "";
			foreach($days as $day){
				if($row[$day] == 1){
					$sched .= $day.'<br/>';
				}
			}
			$sched .= $row['from'].' to '.$row['to'];
			
			echo '<tr>';
			echo '	<td style="text-align:center">'.$row['room_name'].' ('.$row['room_no'].')</td>';
			echo '	<td style="text-align:center">'.$row['description'].' ('.$row['subject_code'].')</td>';
			echo '	<td style="text-align:center">'.$row['prof_name'].'</td>';
			echo '	<td style="text-align:center">'.$row['block_name'].'</td>';
			echo '	<td style="text-align:center">'.$sched.'</td>';
			echo '</tr>';
		}
	}
?>