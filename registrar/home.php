<?php include('header.php'); include('connection.php'); include('session.php'); ?>
<body>
<?php include('nav-top1.php'); ?>
<div class="navbar navbar-fixed-top1">
	<div class="navbar-inner">
		<div class="container">
			<div class="marg">
				<ul class="nav">
					<li class="active">
					<a href="home.php"><i class="icon-home icon-large"></i>Home</a>
					</li>
					<li class="divider-vertical"></li>
					<li><a href="room.php">Room Management</a></li>
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



	

<div id="element" class="hero-body-schedule">
<div class="hero-unit-home">
    <div class="alert alert-info">
   <center><h2>&nbsp;&nbsp;Welcome to  Mobile and Web Subject Scheduling and Loading System of LNU</h2></center>
    </div>


	</div>	
<div class="peace">
  <center>
    <br>
    <br>
    <br>
    <br>
      <p>&nbsp;&nbsp;<img src="../img/oss.jpg" width="1050" height="300"  alt=""/></p>
    <br>
    <br>
    </center>
</div>

	

<div class="sv">
	<div class="hero-unit-mission1">
	<p><h2>University Mission</h2></p>
	
	Lyceum-Northwestern University believes that the moral obligation of any institution of learning is to prepare the students into productive professional and entrepreneurs equipped with educational modernity, social and spiritual values to face the dynamism of a global community within the context of the regional, national and international setting. 
	</div>
	
		<div class="hero-unit-mission2">
	<p><h2>University Vision</h2></p>
Lyceum-Northwestern University aims to become a center of academic excellence and research that contributes towards global competitiveness. 
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
		
	
