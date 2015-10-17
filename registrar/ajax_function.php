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
	
	function add_dean_form(){
		$conn = conn();
		echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">X</button>
					<h4 id="form_modal_header">Add Dean</h4>
				</div>
				<div class="modal-body">
					<form action="ajax_function.php" id="dean_form" method="post">
						<input type="hidden" name="function_name" id="function_name" value="save_dean">
						<div style="padding-bottom:1%;color:red">
							<div id="error_message"></div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Name:
							</div>
							<div style="float:left;width:80%">
								<input type="text" name="name" id="name">
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Department:
							</div>
							<div style="float:left;width:80%">
								<select id="department" name="department">';
						$department_query = mysql_query("SELECT 
													  tbl_department.* 
													FROM
													  tbl_department 
													  LEFT JOIN tbl_dean 
														ON tbl_department.`department_id` = tbl_dean.`department_id` 
													WHERE tbl_dean.`emp_no` IS NULL") or die(mysql_error());
						while($dept = mysql_fetch_array($department_query)){
							echo '<option value="'.$dept['department_id'].'">'.$dept['department_name'].'</option>';
						} 
		echo					'</select>
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Position:
							</div>
							<div style="float:left;width:80%">
								<input type="text" name="position" id="position">
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Address:
							</div>
							<div style="float:left;width:80%">
								<input type="text" name="address" id="address">
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Contact Number:
							</div>
							<div style="float:left;width:80%">
								<input type="text" name="contact_number" id="contact_number">
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Username:
							</div>
							<div style="float:left;width:80%">
								<input type="text" name="username" id="username">
							</div>
						</div>
						<div style="padding-bottom:5%">
							<div style="float:left;width:20%">
								Password:
							</div>
							<div style="float:left;width:80%">
								<input type="text" name="password" id="password">
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
	
	function save_dean(){
		$conn = conn();
		$post = $_POST;
		$response = array('status' => 'failed', 'message' => '');
		
		if(isset($post['dean_id'])){
			$update = '
					update tbl_dean set
							name = "'.$post['name'].'",
							department_id = '.$post['department'].'
						where emp_no = '.$post['dean_id'];
			mysql_query($update);
			
			$update = '
					update user set
							name = "'.$post['name'].'",
							department_id = '.$post['department'].',
							position =  "'.$post['position'].'",
							username = "'.$post['username'].'",
							password = "'.$post['password'].'",
							address = "'.$post['address'].'",
							contact = "'.$post['contact_number'].'"
						where dean_id = '.$post['dean_id'];
			mysql_query($update);
			die($update);
			$response['status'] = 'success';
		}
		else{
			/* insert in tbl_dean */
			$insert = '
				insert into tbl_dean (
										name,
										department_id
									)
									values(
										"'.$post['name'].'",
										'.$post['department'].'
									)
				';
		// die($insert);
			$result = mysql_query($insert);
			if(mysql_affected_rows($conn) > 0){
				$insert = '
					insert into user (
											utype_id,
											dean_id,
											name,
											department_id,
											position,
											username,
											password,
											address,
											contact
										)
										values(
											1,
											'.mysql_insert_id().',
											"'.$post['name'].'",
											'.$post['department'].',
											"'.$post['position'].'",
											"'.$post['username'].'",
											"'.$post['password'].'",
											"'.$post['address'].'",
											"'.$post['contact_number'].'"
										)
					';
					// die($insert);
				$result = mysql_query($insert);
				if(mysql_affected_rows($conn) > 0){
					$response['status'] = 'success';
				}
			}
		}
		
		echo json_encode($response);
	}
	
	function edit_dean_form(){
		$conn = conn();
		$post = $_POST;
		$query = '
				SELECT 
				  * 
				FROM
				  tbl_dean 
				  LEFT JOIN USER 
					ON tbl_dean.`emp_no` = user.`dean_id` where emp_no = '.$post['dean_id'];
					
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if($count > 0){
			$row = mysql_fetch_assoc($result);
			echo '<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">X</button>
						<h4 id="form_modal_header">Add Dean</h4>
					</div>
					<div class="modal-body">
						<form action="ajax_function.php" id="dean_form" method="post">
							<input type="hidden" name="function_name" id="function_name" value="save_dean">
							<input type="hidden" name="dean_id" id="dean_id" value="'.$row['dean_id'].'">
							<input type="hidden" name="user_id" id="user_id" value="'.$row['id'].'">
							<div style="padding-bottom:1%;color:red">
								<div id="error_message"></div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Name:
								</div>
								<div style="float:left;width:80%">
									<input type="text" name="name" id="name" value="'.$row['name'].'">
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Department:
								</div>
								<div style="float:left;width:80%">
									<select id="department" name="department">';
							$department_query = mysql_query("SELECT 
														  tbl_department.* 
														FROM
														  tbl_department 
														  LEFT JOIN tbl_dean 
															ON tbl_department.`department_id` = tbl_dean.`department_id` 
														WHERE (
															tbl_dean.`emp_no` IS NULL 
															OR tbl_dean.`emp_no` = ".$row['emp_no']."
														  )") or die(mysql_error());
							while($dept = mysql_fetch_array($department_query)){
								$selected = ($row['department_id'] == $dept['department_id']) ? 'selected = "selected"' : "";
								echo '<option '.$selected.' value="'.$dept['department_id'].'">'.$dept['department_name'].'</option>';
							} 
			echo					'</select>
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Position:
								</div>
								<div style="float:left;width:80%">
									<input type="text" name="position" id="position" value="'.$row['position'].'">
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Address:
								</div>
								<div style="float:left;width:80%">
									<input type="text" name="address" id="address" value="'.$row['address'].'">
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Contact Number:
								</div>
								<div style="float:left;width:80%">
									<input type="text" name="contact_number" id="contact_number" value="'.$row['contact'].'">
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Username:
								</div>
								<div style="float:left;width:80%">
									<input type="text" name="username" id="username" value="'.$row['username'].'">
								</div>
							</div>
							<div style="padding-bottom:5%">
								<div style="float:left;width:20%">
									Password:
								</div>
								<div style="float:left;width:80%">
									<input type="password" name="password" id="password" value="'.$row['password'].'">
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
			
		}
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