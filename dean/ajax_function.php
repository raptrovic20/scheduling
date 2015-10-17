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
	
	function get_courses(){
		$conn = conn();
		$sql="select * from tbl_course WHERE department_id='".$_SESSION['dept_id']."'";
		$result=mysql_query($sql);
		$res['status'] = 'failed';
		while($row=mysql_fetch_assoc($result)){
			$res['data'][] = $row;
			$res['status'] = 'success';
		}
		
		echo json_encode($res);
	}
	
	function get_blocks(){
		$conn = conn();
		$sql = "SELECT * FROM tbl_blocks WHERE course_id = ".$_POST['course_id']." and school_year = ".$_POST['school_year']." and year_level = ".$_POST['year_level'];
		$result = mysql_query($sql);
		$res['status'] = 'failed';
		while($row=mysql_fetch_assoc($result)){
			$res['data'][] = $row;
			$res['status'] = 'success';
		}
		
		echo json_encode($res);
	}
	
	function get_subjects(){
		$conn = conn();
		
		$sql = 'SELECT * FROM tbl_subject WHERE year_level = '.$_POST['year_level'].' AND course = '.$_POST['course_id'].' AND semester = '.$_POST['sem'];
		
		$result = mysql_query($sql);
		$res['status'] = 'failed';
		
		$prof_sql = '
						SELECT 
						  * 
						FROM
						  tbl_faculty 
						WHERE tbl_faculty.`emp_no`';
		$prof_result = mysql_query($prof_sql);
		$prof_count = mysql_num_rows($prof_result);
		while($prof = mysql_fetch_assoc($prof_result)){
			$profs[] = $prof;
		}
		
		$room_sql = '
						SELECT 
						  * 
						FROM
						  tbl_room 
						WHERE tbl_room.`room_id`';
		$room_result = mysql_query($room_sql);
		$room_count = mysql_num_rows($room_result);
		while($room = mysql_fetch_assoc($room_result)){
			$rooms[] = $room;
		}
		// die(_a($rooms));
		if(mysql_num_rows($result) > 0){
			echo '<form action="ajax_function.php" id="sched_form" method="post">';
			echo '<input type="hidden" name="function_name" id="function_name" value="save_sched">';
			echo '<table border="1">
						<tr>
							<td style="width:20%">Subject Code</td>
							<td style="width:20%">Subject Description</td>
							<td style="width:10%">Start/End Time</td>
							<td style="width:15%">Days</td>
							<td style="width:15%">Room</td>
							<td style="width:20%">Instructor</td>
						</tr>';
			while($row=mysql_fetch_assoc($result)){
				echo '<input type="hidden" name="subject_id[]" value="'.$row['subject_id'].'">';
				echo '<input type="hidden" name="'.$row['subject_id'].'[subj_desc]" id="subj_desc" value="'.$row['description'].'">';
				echo '<input type="hidden" name="'.$row['subject_id'].'[subj_code]" id="subj_code" value="'.$row['subject_code'].'">';
				echo 	'<tr>';
				echo 		'<td>'.$row['subject_code'].'</td>';
				echo 		'<td>'.$row['description'].'</td>';
				echo 		'<td>
								<div class="datepicker_div">
									<input name="'.$row['subject_id'].'[time_from]" value="" type="text" readonly="readonly" class="datepicker time start time_start">
									<input name="'.$row['subject_id'].'[time_to]" value="" type="text" readonly="readonly" class="datepicker time end time_end">
								<div>
							</td>';
				echo 		'<td>
								<input name="'.$row['subject_id'].'[days][]" class="sched_form_days" value="monday" type="checkbox"> Monday<br/> 
								<input name="'.$row['subject_id'].'[days][]" value="tuesday" type="checkbox"> Tuesday<br/> 
								<input name="'.$row['subject_id'].'[days][]" value="wednesday" type="checkbox"> Wednesday<br/> 
								<input name="'.$row['subject_id'].'[days][]" value="thursday" type="checkbox"> Thursday<br/> 
								<input name="'.$row['subject_id'].'[days][]" value="friday" type="checkbox"> Friday<br/> 
								<input name="'.$row['subject_id'].'[days][]" value="saturday" type="checkbox"> Saturday</td>';
				echo 		'<td>
								<select style="width:100%" id="room_select" name="'.$row['subject_id'].'[room_select]">';
					foreach($rooms as $room){
						echo 		'<option value="'.$room['room_id'].'">'.$room['room_name'].' ('.$room['room_no'].')</option>';
					}
				echo			'</select>
							</td>';
				echo 		'<td>
								<select style="width:100%" id="prof_select" name="'.$row['subject_id'].'[prof_select]">';
					foreach($profs as $prof){
						echo 		'<option value="'.$prof['emp_no'].'">'.$prof['fname'].' '.$prof['mname'].' '.$prof['lname'].'</option>';
					}
				echo			'</select>
							</td>';
				echo 	'<tr>';
			}
			echo '</table>';
			echo '</form>';
		}
		else{
			echo 'No subject assigned to this block';
		}
	}
	
	function get_subjects_10172015(){
		$conn = conn();
		
		$block_query = 'select * from tbl_blocks where id = '.$_POST['block_id'];
		$block = mysql_fetch_assoc(mysql_query($block_query));
		// die(_a($block));
		
		if($block['type'] == 1){
			$sql = 'SELECT 
					   tbl_subject.subject_id,
					   tbl_subject.subject_code,
					   tbl_subject.description
					FROM
					  tbl_year_course_subjects
					  INNER JOIN tbl_subject ON tbl_year_course_subjects.subject_id =  tbl_subject.subject_id
					WHERE tbl_year_course_subjects.course_id = '.$_POST['course_id']. ' and tbl_year_course_subjects.school_year = '.$_POST['school_year']. ' and tbl_year_course_subjects.semester = '.$_POST['sem'].' and tbl_year_course_subjects.year_level = '.$_POST['year_level'];
		}
		else{
			$sql = 'SELECT 
					   tbl_subject.subject_id,
					   tbl_subject.subject_code,
					   tbl_subject.description
					FROM
					  tbl_irregular_block_subjects
					  INNER JOIN tbl_subject ON tbl_irregular_block_subjects.subject_id =  tbl_subject.subject_id
					WHERE tbl_irregular_block_subjects.block_id = '.$_POST['block_id']. ' and tbl_irregular_block_subjects.school_year = '.$_POST['school_year']. ' and tbl_irregular_block_subjects.semester = '.$_POST['sem'];
		}
		// die($sql);
		$result = mysql_query($sql);
		$res['status'] = 'failed';
		while($row=mysql_fetch_assoc($result)){
			$res['data'][] = $row;
			$res['status'] = 'success';
		}
		
		echo json_encode($res);
	}
	
	function get_subject_info(){
		$conn = conn();
		$sql = '
				SELECT 
				  tbl_schedule.`id`,
				  prof_id,
				  CONCAT(tbl_faculty.`fname`," ",tbl_faculty.`mname`,"  ",tbl_faculty.`lname`) AS `prof_name`,
				  tbl_room.room_no,
				  tbl_room.`room_name`,
				  tbl_subject.`subject_id`,
				  tbl_subject.`subject_code`,
				  tbl_subject.`description`,
				  tbl_course.`course_name`,
				  tbl_blocks.`name` AS `block_name`,
				  monday,
				  tuesday,
				  wednesday,
				  thursday,
				  friday,
				  saturday,
				  `from`,
				  `to`,
				  tbl_schedule.semester,
				  tbl_schedule.school_year
				FROM
				  tbl_schedule
				  INNER JOIN tbl_faculty ON  tbl_schedule.`prof_id` = `tbl_faculty`.`emp_no`
				  INNER JOIN tbl_room ON tbl_schedule.`room_id` = tbl_room.`room_id`
				  INNER JOIN tbl_subject ON tbl_schedule.`subject_id` = tbl_subject.`subject_id`
				  INNER JOIN tbl_blocks ON tbl_schedule.`block_id` = tbl_blocks.`id`
				  INNER JOIN tbl_course ON tbl_blocks.`course_id` = tbl_course.`course_id`
				WHERE block_id = '.$_POST['block_id'].' 
				  AND tbl_schedule.subject_id = '.$_POST['subject_id']. ' and tbl_schedule.school_year = '.$_POST['school_year']. ' and tbl_schedule.semester = '.$_POST['sem'];
		$result = mysql_query($sql);
		$res['status'] = 'failed';
		while($row=mysql_fetch_assoc($result)){
			$res['data'][] = $row;
			$res['status'] = 'success';
		}
		
		echo json_encode($res);
	}
	
	function edit_sched_form(){
		$conn = conn();
		$subject_query = 'SELECT * FROM tbl_subject WHERE subject_id = '.$_POST['subject_id'];
		$subject_result = mysql_query($subject_query);
		$subject = mysql_fetch_assoc($subject_result);
		
		$sql = '
				SELECT 
				  tbl_schedule.`id`,
				  prof_id,
				  CONCAT(tbl_faculty.`fname`," ",tbl_faculty.`mname`,"  ",tbl_faculty.`lname`) AS `prof_name`,
				  tbl_room.room_no,
				  tbl_room.`room_name`,
				  tbl_schedule.room_id,
				  tbl_subject.`subject_id`,
				  tbl_subject.`subject_code`,
				  tbl_subject.`description`,
				  tbl_course.`course_name`,
				  tbl_blocks.`name` AS `block_name`,
				  monday,
				  tuesday,
				  wednesday,
				  thursday,
				  friday,
				  saturday,
				  `from`,
				  `to`,
				  tbl_schedule.semester,
				  tbl_schedule.school_year
				FROM
				  tbl_schedule
				  INNER JOIN tbl_faculty ON  tbl_schedule.`prof_id` = `tbl_faculty`.`emp_no`
				  INNER JOIN tbl_room ON tbl_schedule.`room_id` = tbl_room.`room_id`
				  INNER JOIN tbl_subject ON tbl_schedule.`subject_id` = tbl_subject.`subject_id`
				  INNER JOIN tbl_blocks ON tbl_schedule.`block_id` = tbl_blocks.`id`
				  INNER JOIN tbl_course ON tbl_blocks.`course_id` = tbl_course.`course_id`
				WHERE block_id = '.$_POST['block_id'].' 
				  AND tbl_schedule.subject_id = '.$_POST['subject_id']. ' and tbl_schedule.school_year = '.$_POST['school_year']. ' and tbl_schedule.semester = '.$_POST['sem'];
		$sched_result = mysql_query($sql);
		$sched_count = mysql_num_rows($sched_result);
		$result = mysql_fetch_assoc($sched_result);
		
		if($sched_count > 0){
			
			{ //get available prof start
				$day_where = "";
				$_days = array('monday','tuesday','wednesday','thursday','friday','saturday');
				foreach($_days as $day){
					if($result[$day] == 1){
						$day_where .= ($day_where == "") ? $day .' = 1 ' : ' or '.$day .' = 1 ';
					}
				}

				$prof_sql = '
						SELECT 
						  * 
						FROM
						  tbl_faculty 
						WHERE tbl_faculty.`emp_no` NOT IN 
						  (SELECT 
							tbl_schedule.`prof_id` 
						  FROM
							`tbl_schedule` 
						  WHERE (
							  '.$day_where.'
							) 
							AND (
								CAST(`from` AS TIME) >= STR_TO_DATE("'.$result['from'].'", "%h:%i%p") 
								AND CAST(`from` AS TIME) < STR_TO_DATE("'.$result['to'].'", "%h:%i%p") 
								OR CAST(`to` AS TIME) >= STR_TO_DATE("'.$result['from'].'", "%h:%i%p") 
								AND CAST(`to` AS TIME) < STR_TO_DATE("'.$result['to'].'", "%h:%i%p")
							) and school_year = '.$_POST['school_year'].' and semester = '.$_POST['sem'].'
						) or emp_no = '.$result['prof_id'].'
				';
				$prof_result = mysql_query($prof_sql);
				$prof_count = mysql_num_rows($prof_result);
			} //get available prof end
			
			{ //get available rooms start
				$room_sql = '
						SELECT 
						  * 
						FROM
						  tbl_room 
						WHERE tbl_room.`room_id` NOT IN 
						  (SELECT 
							tbl_schedule.`room_id` 
						  FROM
							`tbl_schedule` 
						  WHERE (
							  tuesday = 1 
							  OR wednesday = 1 
							  OR thursday = 1
							) 
							AND (
								CAST(`from` AS TIME) >= STR_TO_DATE("'.$result['from'].'", "%h:%i%p") 
								AND CAST(`from` AS TIME) < STR_TO_DATE("'.$result['to'].'", "%h:%i%p") 
								OR CAST(`to` AS TIME) >= STR_TO_DATE("'.$result['from'].'", "%h:%i%p") 
								AND CAST(`to` AS TIME) < STR_TO_DATE("'.$result['to'].'", "%h:%i%p")
							) and school_year = '.$_POST['school_year'].' and semester = '.$_POST['sem'].'
						) or room_id = '.$result['room_id'].'
				';
				// die($room_sql);
				$room_result = mysql_query($room_sql);
				$room_count = mysql_num_rows($room_result);
			} //get available rooms end
			
			echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">X</button>
					<h4 id="form_modal_header">Schedule for '.$subject['description'].'</h4>
				</div>
				<div class="modal-body">
					<form action="ajax_function.php" id="sched_form" method="post">
						<input type="hidden" name="block_id" id="block_id_hidden" value="'.$_POST['block_id'].'">
						<input type="hidden" name="subject_id" id="subject_id_hidden" value="'.$_POST['subject_id'].'">
						<input type="hidden" name="sem" id="hidden_sem" value="'.$_POST['sem'].'">
						<input type="hidden" name="school_year" id="hidden_school_year" value="'.$_POST['school_year'].'">
						<input type="hidden" name="function_name" id="function_name" value="save_sched">
						<input type="hidden" name="sched_id" id="sched_id" value="'.$result['id'].'">
						<div style="padding-bottom:1%;color:red">
							<div id="error_message"></div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Select Days:
							</div>
							<div style="float:left;width:80%">
								<input name="days[]" '.(($result['monday']) == 1 ? ' checked ': "") .' class="sched_form_days" value="monday" type="checkbox"> Monday, 
								<input name="days[]" '.(($result['tuesday']) == 1 ? ' checked ': "") .' class="sched_form_days" value="tuesday" type="checkbox"> Tuesday, 
								<input name="days[]" '.(($result['wednesday']) == 1 ? ' checked ': "") .' class="sched_form_days" value="wednesday" type="checkbox"> Wednesday, 
								<input name="days[]" '.(($result['thursday']) == 1 ? ' checked ': "") .' class="sched_form_days" value="thursday" type="checkbox"> Thursday, 
								<input name="days[]" '.(($result['friday']) == 1 ? ' checked ': "") .' class="sched_form_days" value="friday" type="checkbox"> Friday, 
								<input name="days[]" '.(($result['saturday']) == 1 ? ' checked ': "") .' class="sched_form_days" value="saturday" type="checkbox"> Saturday
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Select Duration:
							</div>
							<div id="datepicker_div" style="float:left;width:80%">
								From <input name="time_from" value="'.$result['from'].'" type="text" class="datepicker time start" id="time_from"> &nbsp;&nbsp;&nbsp;
								To <input name="time_to" value="'.$result['to'].'" type="text" class="datepicker time end" id="time_to">
							</div>
						</div>
						<div style="padding-bottom:5%;display:block" id="prof_select_div">
							<div style="float:left;width:20%">
								Available Professors:
							</div>
							<div style="float:left;width:80%">
								<select style="width:50%" id="prof_select" name="prof_select">';
					while($prof = mysql_fetch_assoc($prof_result)){
						$selected = ($prof['emp_no'] == $result['prof_id']) ? 'selected = "selected"' : "";
						echo 		'<option '.$selected.' value="'.$prof['emp_no'].'">'.$prof['fname'].' '.$prof['mname'].' '.$prof['lname'].'</option>';
					}
			echo				'</select>
							</div>
						</div>
						<div style="padding-bottom:5%;display:block" id="room_select_div">
							<div style="float:left;width:20%">
								Available Rooms:
							</div>
							<div style="float:left;width:80%">
								<select style="width:50%" id="room_select" name="room_select">';
					while($room = mysql_fetch_assoc($room_result)){
						$selected = ($room['room_id'] == $result['room_id']) ? 'selected = "selected"' : "";
						echo 		'<option '.$selected.' value="'.$room['room_id'].'">'.$room['room_name'].' ('.$room['room_no'].')</option>';
					}
			echo				'</select>
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								<input type="submit" value="save">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Close</a>
				</div>';
		}
	}
	
	function get_sched_form(){
		$conn = conn();
		$subject_query = 'SELECT * FROM tbl_subject WHERE subject_id = '.$_POST['subject_id'];
		$subject_result = mysql_query($subject_query);
		$subject_count = mysql_num_rows($subject_result);
		
		$subject = mysql_fetch_assoc($subject_result);
		
		if($subject_count > 0){
			echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">X</button>
					<h4 id="form_modal_header">Schedule for '.$subject['description'].'</h4>
				</div>
				<div class="modal-body">
					<form action="ajax_function.php" id="sched_form" method="post">
						<input type="hidden" name="block_id" id="block_id_hidden" value="'.$_POST['block_id'].'">
						<input type="hidden" name="subject_id" id="subject_id_hidden" value="'.$_POST['subject_id'].'">
						<input type="hidden" name="sem" id="hidden_sem" value="'.$_POST['sem'].'">
						<input type="hidden" name="school_year" id="hidden_school_year" value="'.$_POST['school_year'].'">
						<input type="hidden" name="function_name" id="function_name" value="save_sched">
						<div style="padding-bottom:1%;color:red">
							<div id="error_message"></div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Select Days:
							</div>
							<div style="float:left;width:80%">
								<input name="days[]" class="sched_form_days" value="monday" type="checkbox"> Monday, 
								<input name="days[]" class="sched_form_days" value="tuesday" type="checkbox"> Tuesday, 
								<input name="days[]" class="sched_form_days" value="wednesday" type="checkbox"> Wednesday, 
								<input name="days[]" class="sched_form_days" value="thursday" type="checkbox"> Thursday, 
								<input name="days[]" class="sched_form_days" value="friday" type="checkbox"> Friday, 
								<input name="days[]" class="sched_form_days" value="saturday" type="checkbox"> Saturday
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Select Duration:
							</div>
							<div id="datepicker_div" style="float:left;width:80%">
								From <input name="time_from" type="text" class="datepicker time start" id="time_from"> &nbsp;&nbsp;&nbsp;
								To <input name="time_to" type="text" class="datepicker time end" id="time_to">
							</div>
						</div>
						<div style="padding-bottom:5%;display:none" id="prof_select_div">
							<div style="float:left;width:20%">
								Available Professors:
							</div>
							<div style="float:left;width:80%">
								<select style="width:50%" id="prof_select" name="prof_select">
								</select>
							</div>
						</div>
						<div style="padding-bottom:5%;display:none" id="room_select_div">
							<div style="float:left;width:20%">
								Available Rooms:
							</div>
							<div style="float:left;width:80%">
								<select style="width:50%" id="room_select" name="room_select">
								</select>
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								<input type="submit" value="save">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Close</a>
				</div>';
		}
		else{
			echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">X</button>
					<h4 id="form_modal_header">&nbsp;</h4>
				</div>
				<div class="modal-body">
					subject did not exist
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Close</a>
				</div>';
		}
	}
	
	function get_available_rooms(){
		$post = $_POST;
		$conn = conn();
		
		$day_where = "";
		foreach($post['days'] as $day){
			$day_where .= ($day_where == "") ? $day .' = 1 ' : ' or '.$day .' = 1 ';
		}
		
		$sql = '
				SELECT 
				  * 
				FROM
				  tbl_room 
				WHERE tbl_room.`room_id` NOT IN 
				  (SELECT 
					tbl_schedule.`room_id` 
				  FROM
					`tbl_schedule` 
				  WHERE (
					  tuesday = 1 
					  OR wednesday = 1 
					  OR thursday = 1
					) 
					AND (
						CAST(`from` AS TIME) >= STR_TO_DATE("'.$post['time_from'].'", "%h:%i%p") 
						AND CAST(`from` AS TIME) < STR_TO_DATE("'.$post['time_to'].'", "%h:%i%p") 
						OR CAST(`to` AS TIME) >= STR_TO_DATE("'.$post['time_from'].'", "%h:%i%p") 
						AND CAST(`to` AS TIME) < STR_TO_DATE("'.$post['time_to'].'", "%h:%i%p")
					) and school_year = '.$post['school_year'].' and semester = '.$post['sem'].'
				)
		';
				  
		$result = mysql_query($sql);
		$res['status'] = 'failed';
		while($row=mysql_fetch_assoc($result)){
			$res['data'][] = $row;
			$res['status'] = 'success';
		}
		
		echo json_encode($res);
	}
	
	function get_available_profs(){
		$post = $_POST;
		$conn = conn();
		
		$day_where = "";
		foreach($post['days'] as $day){
			$day_where .= ($day_where == "") ? $day .' = 1 ' : ' or '.$day .' = 1 ';
		}
		
		$sql = '
				SELECT 
				  * 
				FROM
				  tbl_faculty 
				WHERE tbl_faculty.`emp_no` NOT IN 
				  (SELECT 
					tbl_schedule.`prof_id` 
				  FROM
					`tbl_schedule` 
				  WHERE (
					  '.$day_where.'
					) 
					AND (
						CAST(`from` AS TIME) >= STR_TO_DATE("'.$post['time_from'].'", "%h:%i%p") 
						AND CAST(`from` AS TIME) < STR_TO_DATE("'.$post['time_to'].'", "%h:%i%p") 
						OR CAST(`to` AS TIME) >= STR_TO_DATE("'.$post['time_from'].'", "%h:%i%p") 
						AND CAST(`to` AS TIME) < STR_TO_DATE("'.$post['time_to'].'", "%h:%i%p")
					) and school_year = '.$post['school_year'].' and semester = '.$post['sem'].'
				)
		';
		
		// _a($sql);
		// die();
				  
		$result = mysql_query($sql);
		$res['status'] = 'failed';
		while($row=mysql_fetch_assoc($result)){
			$res['data'][] = $row;
			$res['status'] = 'success';
		}
		
		echo json_encode($res);
	}
	
	function save_sched(){
		$post = $_POST;
		$conn = conn();
		
		$data = array();
		$conflicted = array();
		foreach($post['subject_id'] as $subject_id){
			$days = array(
						'monday' => 0, 
						'tuesday' => 0, 
						'wednesday' => 0, 
						'thursday' => 0, 
						'friday' => 0, 
						'saturday' => 0
					);
			
			$day_where = "";
			foreach($post[$subject_id]['days'] as $day){
				$days[$day] = 1;
			}
			
			foreach($post['subject_id'] as $_sub){
				if($subject_id == $_sub){
					continue;
				}
				
				if(($post[$subject_id]['time_from'] >= $post[$_sub]['time_from'] and $post[$subject_id]['time_from'] < $post[$_sub]['time_to']) 
					or ($post[$subject_id]['time_to'] >= $post[$_sub]['time_from'] and $post[$subject_id]['time_to'] < $post[$_sub]['time_to'])
				){
					foreach($post[$_sub]['days'] as $day){
						if($days[$day] == 1){
							$conflicted[$subject_id]['subject_id'] = $subject_id;
							$conflicted[$subject_id]['subject_code'] = $post[$subject_id]['subj_code'];
							$conflicted[$subject_id]['subject_desc'] = $post[$subject_id]['subj_desc'];
							$conflicted[$subject_id]['days'][$day] = $day;
						}
					}
				}
			}
		}
		
		if(count($conflicted) > 0){
			$response['conflicted'] = "true";
		}
		
		$response['conflicted_data'] = $conflicted;
		
		echo json_encode($response);
	}
	
	function save_sched_10172015(){
		$post = $_POST;

		$conn = conn();
		$days = array('monday' => 0, 'tuesday' => 0, 'wednesday' => 0 , 'thursday' => 0, 'friday' => 0, 'saturday' => 0);
		$response = array('status' => 'failed', 'message' => '');
		
		$day_where = "";
		foreach($post['days'] as $day){
			$days[$day] = 1;
			$day_where .= ($day_where == "") ? $day .' = 1 ' : ' or '.$day .' = 1 ';
		}
		
		$conflict_query = '
							SELECT 
							  * 
							FROM
							  `tbl_schedule` 
							WHERE (
								'.$day_where.'
							  ) 
							  AND (
								CAST(`from` AS TIME) >= STR_TO_DATE("'.$post['time_from'].'", "%h:%i%p") 
								AND CAST(`from` AS TIME) < STR_TO_DATE("'.$post['time_to'].'", "%h:%i%p") 
								OR CAST(`to` AS TIME) >= STR_TO_DATE("'.$post['time_from'].'", "%h:%i%p") 
								AND CAST(`to` AS TIME) < STR_TO_DATE("'.$post['time_to'].'", "%h:%i%p")
							  ) 
							  AND school_year = 6 
							  and school_year = '.$post['school_year'].' and semester = '.$post['sem'].' and block_id = '.$post['block_id'].'
							';
		if(isset($post['sched_id'])){
			$conflict_query .= ' and tbl_schedule.id != '.$post['sched_id'];
		}

		$res = mysql_query($conflict_query);
		
		if(mysql_num_rows($res) == 0){
			if(isset($post['sched_id'])){
				$update = 'update 
							tbl_schedule 
							set 
							block_id = '.$post['block_id'].',
							subject_id = '.$post['subject_id'].',
							prof_id = '.$post['prof_select'].',
							room_id = '.$post['room_select'].',
							monday = '.$days['monday'].',
							tuesday = '.$days['tuesday'].',
							wednesday = '.$days['wednesday'].',
							thursday = '.$days['thursday'].',
							friday = '.$days['friday'].',
							saturday = '.$days['saturday'].',
							`from` = "'.$post['time_from'].'",
							`to` = "'.$post['time_to'].'",
							semester = '.$post['sem'].',
							school_year = '.$post['school_year'].'
							where id = '.$post['sched_id'].'
						';
				$result = mysql_query($update);
				$response['status'] = 'success';
			}
			else{
				$insert = '
				INSERT INTO tbl_schedule (
										block_id,
										subject_id,
										prof_id,
										room_id,
										monday,
										tuesday,
										wednesday,
										thursday,
										friday,
										saturday,
										`from`,
										`to`,
										semester,
										school_year
									) 
									VALUES
									(
										'.$post['block_id'].',
										'.$post['subject_id'].',
										'.$post['prof_select'].',
										'.$post['room_select'].',
										'.$days['monday'].',
										'.$days['tuesday'].',
										'.$days['wednesday'].',
										'.$days['thursday'].',
										'.$days['friday'].',
										'.$days['saturday'].',
										"'.$post['time_from'].'",
										"'.$post['time_to'].'",
										'.$post['sem'].',
										'.$post['school_year'].'
									)
				';
				$result = mysql_query($insert);
				if(mysql_affected_rows($conn) > 0){
					$response['status'] = 'success';
				}
			}
		}
		else{
			$response['message'] = "There's a conflict on the schedule, please check the day and time";
		}
		
		echo json_encode($response);
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
				   where tbl_faculty.emp_no = '.$_POST['prof_id'] ;
				   // die($query);
		$result=mysql_query($query)or die(mysql_error());
		while($row=mysql_fetch_assoc($result)){
			echo '<tr class="del'.$row['id'].'">';
			echo '	<td>'.$row['instructor'].'</td>';
			echo '	<td>'.$row['subject_code'].'</td>';
			echo '	<td>'.$row['description'].'</td>';
			echo '	<td>'.$row['college_offering_code'].'</td>';
			echo '	<td>'.$row['unit'].'</td>';
			echo '	<td>'.$row['name'].'</td>';
			echo '	<td>sched</td>';
			echo '	<td>'.$row['room_name'].' ('.$row['room_no'].')</td>';
			echo '</tr>';
		}
	}
	
	function refresh_blocks_datatable(){
		$conn = conn();
		$post = $_POST;
		$query = 'SELECT * FROM `tbl_blocks` WHERE course_id = '.$post['course_id'].' AND school_year = '.$post['school_year'];
		$result=mysql_query($query)or die(mysql_error());
		while($row=mysql_fetch_assoc($result)){
			$add_subject = "";
			if($row['type'] == 2){
				$add_subject = '<a href="assign_subject_to_irregular_block.php?block_id='.$row['id'].'">Add Subject</a>';
			}
			echo '<tr class="del'.$row['id'].'">';
			echo '	<td style="text-align:center">'.$row['name'].'</td>';
			echo '	<td style="text-align:center">'.$row['year_level'].'</td>';
			echo '	<td style="text-align:center">'.(($row['type'] == 1) ? "Regular" : "Irregular").'</td>';
			echo '	<td style="text-align:center">
						'.$add_subject.'
						<a href="#" onclick="edit('.$row['id'].')">Edit</a>
						<a href="#" onclick="delete_row('.$row['id'].')">Delete</a>
					</td>';
			echo '</tr>';
		}
	}
	
	function add_block_form(){
		$conn = conn();
		echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">X</button>
					<h4 id="form_modal_header">Add Block</h4>
				</div>
				<div class="modal-body">
					<form action="ajax_function.php" id="block_form" method="post">
						<input type="hidden" name="function_name" id="function_name" value="save_block">
						<input type="hidden" name="sy" id="sy" value="'.$_SESSION['school_year'].'">
						<div style="padding-bottom:1%;color:red">
							<div id="error_message"></div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Select Course:
							</div>
							<div style="float:left;width:80%">
								<select name="course" id="course">';
							$course_query = mysql_query("SELECT * FROM tbl_course WHERE department_id = ".$_SESSION['dept_id']) or die(mysql_error());
							while($course = mysql_fetch_array($course_query)){
								echo '<option value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
							} 
		echo					'</select>
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Block Name:
							</div>
							<div style="float:left;width:80%">
								<input type="text" name="block_name" id="block_name">
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Year Level:
							</div>
							<div style="float:left;width:80%">
								<select name="year_level" id="year_level">
									<option value="1">1st</option>
									<option value="2">2nd</option>
									<option value="3">3rd</option>
									<option value="4">4th</option>
									<option value="5">5th</option>
								</select>
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Type:
							</div>
							<div style="float:left;width:80%">
								<select name="block_type" id="block_type">
									<option value="1">Regular</option>
									<option value="2">Irregular</option>
								</select>
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								<input type="submit" value="save">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Close</a>
				</div>';
	}
	
	function edit_block_form(){
		$conn = conn();
		$post = $_POST;
		$block_query = 'SELECT * FROM tbl_blocks WHERE id = '.$post['block_id'];
		$block_result = mysql_query($block_query);
		$block_count = mysql_num_rows($block_result);
		if($block_count == 0){
			echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">X</button>
					<h4 id="form_modal_header">&nbsp;</h4>
				</div>
				<div class="modal-body">
					Block did not exist
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Close</a>
				</div>';
		}
		else{
			$block = mysql_fetch_assoc($block_result);
			// die(_a($block));
			echo '<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">X</button>
						<h4 id="form_modal_header">Update Block</h4>
					</div>
					<div class="modal-body">
						<form action="ajax_function.php" id="block_form" method="post">
							<input type="hidden" name="function_name" id="function_name" value="save_block">
							<input type="hidden" name="id" id="id" value="'.$block['id'].'">
							<input type="hidden" name="sy" id="sy" value="'.$block['school_year'].'">
							<div style="padding-bottom:1%;color:red">
								<div id="error_message"></div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Select Course:
								</div>
								<div style="float:left;width:80%">
									<select name="course" id="course">';
								$course_query = mysql_query("SELECT * FROM tbl_course WHERE department_id = ".$_SESSION['dept_id']) or die(mysql_error());
								while($course = mysql_fetch_array($course_query)){
									$selected = ($course['course_id'] == $block['course_id']) ? 'selected = "selected"' : "";
									echo '<option '.$selected.' value="'.$course['course_id'].'">'.$course['course_name'].'</option>';
								} 
			echo					'</select>
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Block Name:
								</div>
								<div style="float:left;width:80%">
									<input type="text" name="block_name" id="block_name" value="'.$block['name'].'">
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Year Level:
								</div>
								<div style="float:left;width:80%">
									<select name="year_level" id="year_level">
										<option '.(($block['year_level'] == 1) ? 'selected = "selected"' : '').' value="1">1st</option>
										<option '.(($block['year_level'] == 2) ? 'selected = "selected"' : '').' value="2">2nd</option>
										<option '.(($block['year_level'] == 3) ? 'selected = "selected"' : '').' value="3">3rd</option>
										<option '.(($block['year_level'] == 4) ? 'selected = "selected"' : '').' value="4">4th</option>
										<option '.(($block['year_level'] == 5) ? 'selected = "selected"' : '').' value="5">5th</option>
									</select>
								</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Type:
								</div>
								<div style="float:left;width:80%">
									<select name="block_type" id="block_type">
										<option '.(($block['type'] == 1) ? 'selected = "selected"' : '').' value="1">Regular</option>
										<option '.(($block['type'] == 2) ? 'selected = "selected"' : '').' value="2">Irregular</option>
									</select>
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									<input type="submit" value="save">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Close</a>
					</div>';
		}
	}
	
	function save_block(){
		$conn = conn();
		$post = $_POST;
		$response = array('status' => 'failed', 'message' => '');
		if(isset($post['id'])){
			$block_query = 'SELECT * FROM tbl_blocks WHERE course_id = '.$post['course'].' and school_year = '.$post['sy'] . ' and name = "'.$post['block_name'].'" and id != '.$post['id'];
			
			$block_result = mysql_query($block_query);
			$block_count = mysql_num_rows($block_result);
			
			if($block_count > 0){
				$response['message'] = "Block already exist";
			}
			else{
				$update = '
							update tbl_blocks set
									course_id = '.$post['course'].',
									school_year = '.$post['sy'].',
									name = "'.$post['block_name'].'",
									year_level = '.$post['year_level'].',
									type = '.$post['block_type'].'
								where id = '.$post['id'];
				mysql_query($update);
				$response['status'] = 'success';
				$response['course_id'] = $post['course'];
				$response['school_year'] = $post['sy'];
			}
		}
		else{
			$block_query = 'SELECT * FROM tbl_blocks WHERE course_id = '.$post['course'].' and school_year = '.$post['sy'] . ' and name = "'.$post['block_name'].'"';
			// die($block_query);
			$block_result = mysql_query($block_query);
			$block_count = mysql_num_rows($block_result);
			
			if($block_count > 0){
				$response['message'] = "Block already exist";
			}
			else{
				$insert = '
					insert into tbl_blocks (
											course_id,
											`name`,
											school_year,
											year_level,
											type
										)
										values(
											'.$post['course'].',
											"'.$post['block_name'].'",
											'.$post['sy'].',
											'.$post['year_level'].',
											'.$post['block_type'].'
										)
						';
						// die($insert);
				$result = mysql_query($insert);
				if(mysql_affected_rows($conn) > 0){
					$response['status'] = 'success';
					$response['course_id'] = $post['course'];
					$response['school_year'] = $post['sy'];
				}
			}
		}
		echo json_encode($response);
	}
	
	function delete_block(){
		$conn = conn();
		$post = $_POST;
		$response = array('status' => 'failed', 'message' => '');
		
		$delete = 'delete from tbl_blocks where id = '.$post['block_id'];
		$result = mysql_query($delete);
		
		if(mysql_affected_rows($conn) > 0){
			$response['status'] = 'success';
		}
		
		echo json_encode($response);
	}
	
	function update_password(){
		$conn = conn();
		$post = $_POST;
		$response = array('status' => 'failed', 'message' => '');
		
		$sql = 'SELECT * FROM `user` WHERE id = '.$_SESSION['id'];
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);
		if($count > 0){
			$row =  mysql_fetch_assoc($result);
			if($post['old_pass'] != $row['password']){
				$response['message'] = "Old password is not correct";
			}
			else{
				$update = 'update user set
									password = "'.$post['new_pass'].'"
								where id = '.$_SESSION['id'];
				mysql_query($update);
				$response['status'] = 'success';
			}
		}
		
		echo json_encode($response);
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
					ON tbl_schedule.`block_id` = tbl_blocks.`id` where tbl_schedule.school_year = '.$post['school_year'].' and  tbl_schedule.semester = '.$post['sem'];
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
	
	function refresh_archive_datatable(){
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
					ON tbl_schedule.`block_id` = tbl_blocks.`id` 
					INNER JOIN `tbl_course` 
    ON tbl_blocks.`course_id` = tbl_course.`course_id`
	where tbl_schedule.school_year = '.$post['school_year'].' and  tbl_schedule.semester = '.$post['semester']. ' and tbl_course.course_id = '.$post['course_id'];
				// die($query);
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
	
	function get_block_subject_list_for_assigning(){
		$conn = conn();
		$post = $_POST;
		$query = 'SELECT 
				  tbl_subject.*,
				  tbl_irregular_block_subjects.`id` 
				FROM
				  tbl_subject 
				  LEFT JOIN tbl_irregular_block_subjects 
					ON tbl_irregular_block_subjects.`subject_id` = tbl_subject.`subject_id`
					AND tbl_irregular_block_subjects.`block_id` = '.$post['block_id'].' AND tbl_irregular_block_subjects.`year_level` = '.$post['year_level'].' and tbl_irregular_block_subjects.school_year = '.$post['school_year'].' and tbl_irregular_block_subjects.semester = '.$post['semester'];
					// die($query);
		$result = mysql_query($query);		
		while($sub = mysql_fetch_array($result)){
			$selected = ($sub['id'] != "") ? 'selected = "selected"' : "";
			echo '<option '.$selected.' value="'.$sub['subject_id'].'">'.$sub['description'].'</option>';
		} 
	}
	
	function save_subject_to_block(){
		$conn = conn();
		$post = $_POST;
		$delete = 'delete * from tbl_irregular_block_subjects where block_id = '.$post['block_id'].' and year_level = '.$post['year_level'].' and school_year = '.$post['school_year'].' and semester ='.$post['semester'];
		mysql_query($delete);
		
		foreach($post['subjects'] as $subject_id){
			$insert = '
					insert into tbl_irregular_block_subjects (
										year_level,
										block_id,
										subject_id,
										school_year,
										semester
										)
										values(
											'.$post['year_level'].',
											'.$post['block_id'].',
											'.$subject_id.',
											'.$post['school_year'].',
											'.$post['semester'].'
										)
					';
			$result = mysql_query($insert);
		}
		$response['status'] = 'success';
		echo json_encode($response);
	}
	
	function get_subject_list_for_assigning(){
		$conn = conn();
		$post = $_POST;
		$query = 'SELECT 
				  tbl_subject.*,
				  tbl_year_course_subjects.`id` 
				FROM
				  tbl_subject 
				  LEFT JOIN tbl_year_course_subjects 
					ON tbl_year_course_subjects.`subject_id` = tbl_subject.`subject_id`
					AND tbl_year_course_subjects.`course_id` = '.$post['course_id'].' AND tbl_year_course_subjects.`year_level` = '.$post['year_level'].' and tbl_year_course_subjects.school_year = '.$post['school_year'].' and tbl_year_course_subjects.semester = '.$post['semester'];
					// die($query);
		$result = mysql_query($query);		
		while($sub = mysql_fetch_array($result)){
			$selected = ($sub['id'] != "") ? 'selected = "selected"' : "";
			echo '<option '.$selected.' value="'.$sub['subject_id'].'">'.$sub['description'].'</option>';
		} 
	}
	
	function save_subject_to_course(){
		$conn = conn();
		$post = $_POST;
		$delete = 'delete * from tbl_year_course_subjects where course_id = '.$post['course_id'].' and year_level = '.$post['year_level'].' and school_year = '.$post['school_year'].' and semester ='.$post['semester'];
		mysql_query($delete);
		
		foreach($post['subjects'] as $subject_id){
			$insert = '
					insert into tbl_year_course_subjects (
										year_level,
										course_id,
										subject_id,
										school_year,
										semester
										)
										values(
											'.$post['year_level'].',
											'.$post['course_id'].',
											'.$subject_id.',
											'.$post['school_year'].',
											'.$post['semester'].'
										)
					';
			$result = mysql_query($insert);
		}
		$response['status'] = 'success';
		echo json_encode($response);
	}
?>