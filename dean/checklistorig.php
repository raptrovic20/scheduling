<?php include('header.php'); include('dbcon.php'); include('session.php'); ?>
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
  <li><a href="subject.php"><i class="icon-group icon-large"></i>Subject</a></li>
     <li class="divider-vertical"></li>
  <li><a href="record.php"><i class="icon-user icon-large"></i>Faculty</a></li>
   <li class="divider-vertical"></li>
  <li><a href="subjectsched.php"><i class="icon-table icon-large"></i>Subject Schedule</a></li>
  <li class="divider-vertical"></li>
  <li class="active"><a href="checklist.php"><i class="icon-table icon-large"></i>Check List</a></li>
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
<div class="hero-unit-home">
    <div class="alert alert-info">
   <h2><center>CHECK LIST</center></h2>
    </div>
	 <label class="control-label" for="input01">Department:</label>
    <div class="controls">
   <select name="Department" class="span3"  id="span9009">
	<option>Information Technology</option>
	<option>BSHRM</option>
	

	</select><label><a href="checklist1.php"><input type="button" name="search" value="Search"/></a></label>
    </div>
	</div>
    
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
		
	
