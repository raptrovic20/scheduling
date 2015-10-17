
<?php include('header.php'); ?>
</head> 
<body>
<div class="wrapper">
<div class="navbar navbar-fixed-top">
 <div class="navbar">
  <div class="navbar-inner">
    <div class="container">
<ul class="nav">
<a class="brand" href="#">
 <font color="white">Online Scheduling System</font>
</a>
  <li>
    <a href="index.php"><i class="icon-home icon-large"></i>Home</a>
  </li>
   <li class="divider-vertical"></li>
  <li class="dropdown">
    <a href="#"
          class="dropdown-toggle"
          data-toggle="dropdown">
          <i class="icon-search icon-large"></i>Schedule
          <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li><a href="Schedule.php">Teacher</a></li>
      <li><a href="students.php">Students</a></li>
      <li><a href="room.php">Room</a></li>
    
    </ul>
  </li>
    <li class="divider-vertical"></li>
  <li><a href="#"><i class="icon-info-sign icon-large"></i>About</a></li>
    <li class="divider-vertical"></li>
  <li><a href="#"><i class="icon-user icon-large"></i>Admin Login</a></li>
    <li class="divider-vertical"></li>
    <li class="divider-vertical"></li>
    <li class="divider-vertical"></li>

	
  <form class="navbar-search3">
  <input type="text" name="search" class="search-query" placeholder="Search">
</form>
	</ul>
    </div>
  </div>
</div>
</div>

<div class="hero-unit">
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><img src="img/header.jpg" width="1090" height="250"></div>
    <div class="item">…</div>
    <div class="item">…</div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>

<div class="hero-unit-bud">
<div class="jkl">
<img src="img/facebook.png"/>&nbsp;&nbsp;<img src="img/email_32.png"/>&nbsp;&nbsp;<img src="img/rss_32.png"/>&nbsp;&nbsp;<img src="img/twitter_32.png"/>
&nbsp;&nbsp;<img src="img/blogger.png"/>
</div>
<ul class="nav nav-tabs"> 
  <li><a href="#home" data-toggle="tab"><font color="white"><i class="icon-user-md icon-large"></i>Teacher</a></font></li>
  <li><a href="students.php"><font color="white"><i class="icon-user icon-large"></i>Students</a></font></li>
  <li class="active"><a href="room.php" data-toggle="tab"><i class="icon-columns icon-large"></i>Room</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">
  <div class="hero-unit-y">
<h2>Search Room Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter60">
    
	<div class="control-group">
    <label class="control-label" for="input01">Room:</label>
    <div class="controls">
   <select name="Sex" class="Sex">
	<option>--Select--</option>
	<option>College of Inductrial Technology</option>
	<option>College of Education</option>
	<option>School of Art and Sciences</option>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="Sex" class="Sex">
	<option>--Select--</option>
	<option>College of Inductrial Technology</option>
	<option>College of Education</option>
	<option>School of Art and Sciences</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="Sex" class="Sex">
	<option>--Select--</option>
	<option>College of Inductrial Technology</option>
	<option>College of Education</option>
	<option>School of Art and Sciences</option>
	</select>
    </div>
    </div>
	
	
	
	
	
	
	
	<div class="control-group">

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-ok icon-large"></i>Submit</button>
    </div>
    </div>
	
    </fieldset>
    </form>
	 
	 </div>
	</br>
  </div>
  
  <div class="tab-pane" id="profile">
  </div>
  <div class="tab-pane" id="messages">...</div>
  <div class="tab-pane" id="settings">...</div>
  <div class="tab-pane" id="settings">...</div>
</div>
</div>
<div class="hero-unit-bud">
 <div class="hero-unit-yy">
<p><font color="white"><b>Related Sites</b></font></p>
<a href="chmsc.edu.ph"><font color="white">chmsc.edu.ph</font></a> &nbsp;&nbsp;&nbsp;<a href="chmsc.edu.ph"><font color="white">psitschmscft.blogspot.com</font></a>&nbsp;&nbsp;&nbsp;
<a href="chmsc.edu.ph"><font color="white">chmscians.com</font></a> &nbsp;&nbsp;&nbsp;<a href="chmsc.edu.ph"><font color="white">chmscians.webs.com</font></a>&nbsp;&nbsp;&nbsp;
<a href="chmsc.edu.ph"><font color="white">thetechnopacer.journ.ph</font></a> &nbsp;&nbsp;&nbsp;<a href="chmsc.edu.ph"><font color="white">chmscconnectivity.blogspot.com</font></a>&nbsp;&nbsp;&nbsp;

</div>
</div>
<?php include('footer.php'); ?>
</div>


</body>
</html>

