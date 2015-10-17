<?php include('header.php'); include('session.php'); include('dbcon.php') ?>
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
                        <li><a href="room.php"><i class="icon-table icon-large"></i>Room Reports</a></li>
						<li class="divider-vertical"></li>
						<li  class="active"><a href="account.php"><i class="icon-table icon-large"></i>Account</a></li>
						<li class="divider-vertical"></li>
						<li ><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
						<li class="divider-vertical"></li>
					</ul>
				</div>
			</div>
		</div>
    </div>
	<div class="wrapper">
		<div id="element" class="hero-body">
			<h2><font color="white">Account</font></h2>
			<div style="background-color:white">
            
				<form action="ajax_function.php" id="password_form" method="post">
					<input type="hidden" name="function_name" id="function_name" value="update_password">
					<div style="padding-bottom:1%;color:red">
						<div id="error_message"></div>
					</div>
					<div class="control-group">
    <label class="control-label" for="input01">Old Password:</label>
    <div class="controls">
							<input type="password"  id="span9009" name="old_pass" id="old_pass">
						</div>
					</div>
					<div class="control-group">
    <label class="control-label" for="input01">New Password:</label>
    <div class="controls">
						
							<input type="password" id="span9009" name="new_pass" id="new_pass">
						</div>
					</div>
					<div class="control-group">
    <label class="control-label" for="input01">Re-type Password:</label>
    <div class="controls">
							<input type="password" id="span9009" name="renew_pass" id="renew_pass">
						</div>
					</div>
					<div style="padding-bottom:5%">
						<div style="float:left;width:20%">
							<input type="submit"  id="save_voter" class="btn btn-primary" name="save" value="Update"><i class="icon-save icon-large"></i>
						</div>
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

<script type="text/javascript">
	$(document).ready( function(){
		$('#password_form').ajaxForm({
			dataType: 'json',
			beforeSubmit: function(){
				$("#error_message").html("");
				if($("#old_pass").val() == ""){
					$("#error_message").html('Old password is required');
					return false;
				}
				
				if($("#new_pass").val() == ""){
					$("#error_message").html('New password is required');
					return false;
				}
				
				if($("#new_pass").val() != $("#renew_pass").val()){
					$("#error_message").html('Password did not Match');
					return false;
				}
				
				if($("#new_pass").val() == $("#old_pass").val()){
					$("#error_message").html('New Password and Old password are identical');
					return false;
				}
			},
			success: function(response){
				if(response.status == "success"){
					$("#error_message").html('New Password successfully saved');
					return false;
				}
				else{
					$("#error_message").html(response.message);
				}
			}
		}); 
	});
</script>