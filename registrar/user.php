<?php include('header.php'); include('connection.php'); include('session.php');?>
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
  <li class="active"><a href="room.php">Room Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="course.php"><i class="icon-group icon-large"></i>Course Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="department.php"><i class="icon-list icon-large"></i>Department Management</a></li>
  
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

<h2><font color="white">Add Room</font></h2>
	<a class="btn btn-primary"  href="room.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
    <?php
if(isset($_GET["attempt"]))
{
$attempt=$_GET["attempt"];
}
?>
	
				<?php
						if(isset($attempt))
						{
							if($attempt == "success")
							{
							?>
							<div class="success">Record successfully updated.</div>
							<?php
							}
							elseif($attempt == "saved")
							{
							?>
							<div  class="success">Record successfully saved.</div>
							<?php
							}
							elseif($attempt == "exist")
							{
							?>
							<div  class="error"><b>Unable to add name already exist.</div>
							<?php
							}
							elseif($attempt == "empty")
							{
							?>
							<div  class="error">All fields must be filled out.</div>
							<?php
							}
						}
					?>
				<?php
					if (isset($_POST['submit']))
					{
						$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
						$department_name = mysql_real_escape_string(htmlspecialchars($_POST['department_name']));
						$position = mysql_real_escape_string(htmlspecialchars($_POST['position']));
						$address = mysql_real_escape_string(htmlspecialchars($_POST['address']));
						$contact = mysql_real_escape_string(htmlspecialchars($_POST['contact']));
						$utype_id = mysql_real_escape_string(htmlspecialchars($_POST['utype_id']));
						$username = mysql_real_escape_string(htmlspecialchars($_POST['username']));
						$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));

						if ($name == '' || $department_name == '' || $position == '' || $address == '' || $contact == '' || $utype_id == '' || $username == '' || $password == '')
						{
							header("Location: user.php?attempt=empty");
						}
						else{
						
							$sql = 'SELECT * FROM user WHERE username = "'.$username.'"'; 
							if ($result = mysql_query($sql)) 
							{
								if(mysql_num_rows($result)) 
								{
									header("Location: user.php?attempt=exist");	
								}
								else{
									mysql_query("INSERT INTO user (name,department_name,position,address,contact,utype_id,username,password,date) 
									values('$name','$department_name','$position','$address','$contact','$utype_id','$username','$password',curdate())",$conn)
									or die("Could not execute the insert query.");
									
									header("Location: user.php?attempt=saved");
								}
							}
						}
					}
				?>
			
	<form name="form1" method="post" action="">
    <fieldset>
	</br>
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
    
    	<form name="form1" method="post" action="">
						
                      
    
    <div class="control-group">
    <label class="control-label" for="input01">User type :</label>
    <div class="controls">
   <select name="utype_id" id="span9009">
	<option>--Select User-Type--</option>
	<option valu"Part Time">Dean</option>
	<option value"Full Time">Registrar</option>
    <option value"Full Time">Faculty</option>
    
	</select>
    </div>
    </div>
							
                                
                                
                                
     
							<div class="control-group">
    <label class="control-label" for="input01">Department :</label>
    <div class="controls">


   <select name="department_name" class="Department"  id="span9009">
	<option>--Select Department--</option>
<?php $query=mysql_query("select * from tbl_department")or die(mysql_error);
while($dep=mysql_fetch_array($query)){
 ?>
 <option><?php echo $dep['department_name'];?></option>
 <?php }?>
	</select>
    </div>
    </div>
								
								
                                    
                                    
                                    <div class="control-group">
    <label class="control-label" for="input01">Full Name:</label>
    <div class="controls">
								
								<input type="text" id="span9009" name="name" placeholder="Enter name...">
                                
                                </div>
                                </div>
                                
                                     <div class="control-group">
    <label class="control-label" for="input01">Position</label>
    <div class="controls">
								
								<input type="text" id="span9009" name="position" placeholder="Enter position...">
                                </div>
                                </div>
							         <div class="control-group">
    <label class="control-label" for="input01">Address :</label>
    <div class="controls">
								<input type="text" id="span9009" name="address" placeholder="Enter address...">
                                </div>
                                </div>
                                
                                       <div class="control-group">
    <label class="control-label" for="input01">Contact # :</label>
    <div class="controls">
								
								<input type="text" id="span9009" name="contact" placeholder="Enter contact number...">
                                </div>
                                </div>
							        <div class="control-group">
    <label class="control-label" for="input01">Username :</label>
    <div class="controls">
							
								<input type="text" size="25px" name="username" placeholder="Enter username...">
                                </div>
                                </div>
                                
                                 <div class="control-group">
    <label class="control-label" for="input01">Password :</label>
    <div class="controls">
                                
								
								<input type="password" size="25px" name="password" placeholder="Enter password...">
                                
                                </div>
                                </div>
							
								
								<input type="submit" name="submit" style="cursor:pointer;margin-left:4px;" value="Save">
								<input type="reset" name="Btncancel" style="cursor:pointer;" value="Clear"></td>
							</tr>		
						</table>		
					</form>
    
    
	
	
	
	
	
    </fieldset>
    </form>

</div>

<?php include('footer.php');?>
</div>
</body>
	<div class="modal hide fade" id="myModal">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
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
		

		
	