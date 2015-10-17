<?php include('header.php'); include('dbcon.php'); include('session.php');  $room_id=$_GET['id']; ?>
<body>
<?php include('nav-top1.php'); ?>

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
   <li><a href="dean.php"><i class="icon-list icon-large"></i>Dean</a></li>
   
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
<h2><font color="white">Edit Room</font></h2>
	<a class="btn btn-primary"  href="room.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	<form id="save_voter" class="form-horizontal" method="POST" action="update_room.php">	
    <fieldset>
	</br>
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
	<?php $result=mysql_query("select * from tbl_room where room_id='$room_id'")or die(mysql_error());
$row=mysql_fetch_array($result);
	?>
    
 
    <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">
    <div class="control-group">
    <label class="control-label" for="input01">Room No:</label>
    <div class="controls">
    <input type="number" id="span9009" name="room_no" value="<?php echo $row['room_no']; ?>" style="margin: 0 auto;">
    </div>
    </div>
    
	<div class="control-group">
    <label class="control-label" for="input01">Room Name:</label>
    <div class="controls">
    <input type="text" id="span9009" name="room_name" value="<?php echo $row['room_name']; ?>" style="margin: 0 auto;">
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Location:</label>
    <div class="controls">
    <input type="text" id="span9009" name="location" value="<?php echo $row['location']; ?>" style="margin: 0 auto;">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="input01">Type:</label>
    <div class="controls">
   <select name="type" id="span9009">
	<option><?php echo $row['type']; ?></option>
	<option value="Lecture">Lecture </option>
	<option value="Laboratory">Laboratory</option>
	</select>
    </div>
    </div>
    
     <div class="control-group">
    <label class="control-label" for="input01">Capacity:</label>
    <div class="controls">
   <select name="capacity" id="span9009">
	<option><?php echo $row['capacity']; ?></option>
	<option value="60">60</option>
	<option value="50">50</option>
    <option value="40">40</option>
	<option value="30">30</option>
    <option value="20">20</option>
	<option value="10">10</option>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    <button id="clear" input type='reset' name="clear" input type='reset' class="btn btn-primary" name="clear">Clear</button>
     <a class="btn btn-primary"  href="room.php">&times;Cancel</a>
    </div>
    </div>
	
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
		
	