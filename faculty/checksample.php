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
  <li><a href="room.php">Room Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="course.php"><i class="icon-group icon-large"></i>Course Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="department.php"><i class="icon-list icon-large"></i>Department Management</a></li>
   <li class="divider-vertical"></li>
  <li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
     <li class="divider-vertical"></li>
  <li><a href="record.php"><i class="icon-user icon-large"></i>Faculty</a></li>
   <li class="divider-vertical"></li>
  <li class="active"><a href="checklist.php"><i class="icon-table icon-large"></i>Subject Schedule</a></li>
  <li class="divider-vertical"></li>
  <li><a href="checklist2.php"><i class="icon-table icon-large"></i>Check List</a></li>
  <li class="divider-vertical"></li>
  <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
   <li class="divider-vertical"></li>
</ul>
    </div>
    </div>
    </div>
    </div>
<div class="wrapper">



	

<div id="element" class="hero-body-schedule">


<h2><font color="white">Add Subject Schedule</font></h2>
	<a class="btn btn-primary"  href="checklist.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;back</a>
	<hr>
	<form id="save_voter" class="form-horizontal" method="POST" action="save_user.php">	
    <fieldset>
	</br>
	<div class="add_subject_user">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
<div class="control-group">
    <label class="control-label" for="input01">Department:</label>
    <div class="controls">
   <select name="Department" class="span3"  id="span9009">
	<option>Information Technology</option>
	<option>BSHRM</option>
	

	</select>
    </div>
    </div>
    <label class="control-label" for="input01">Block:</label>
    <div class="controls">
   <select name="Department" class="span3"  id="span9009">
	<option>Block 1</option>
	<option>Block 2</option>
	</select>
    <label>&nbsp;</label>
   
    <label><a href="add_checklist.php"><input type="button" name="search" value="Select"/></a></label>
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
	
