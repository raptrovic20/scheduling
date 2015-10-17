<?php include('header.php'); include('session.php'); include('dbcon.php') ?>
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
  <li class="active"><a href="schedule.php"><i class="icon-group icon-large"></i>Class Schedule</a></li>
   <li class="divider-vertical"></li>
    <li><a href="exam_schedule.php"><i class="icon-group icon-large"></i>Exam Schedule</a></li>
   <li class="divider-vertical"></li>
  <li><a href="record.php"><i class="icon-list icon-large"></i>Entry</a></li>
   <li class="divider-vertical"></li>
  <li><a href="history_log.php"><i class="icon-table icon-large"></i>History Log</a></li>
     <li class="divider-vertical"></li>
  <li><a href="user_account.php"><i class="icon-user icon-large"></i>User Account</a></li>
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


	<a class="btn btn-primary"  href="add_schedule.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Class Schedule</a>
		<div class="pull-right222">
	
		<div class="pagination">
<font color="white">Seacrh Schedule</font>
<br>
  <ul>
    <li><a data-toggle="modal" href="#teacher"><font color="white"><i class="icon-search icon-large"></i>Teacher</font></a></li>
    <li>
      <a data-toggle="modal" href="#CYS"><font color="white"><i class="icon-search icon-large"></i>Course Year Section</font></a>
    </li>
	 <li>
      <a data-toggle="modal" href="#room"><font color="white"><i class="icon-search icon-large"></i>Room</font></a>
    </li>
  </ul>
</div>
</div>
	



<ul class="nav nav-tabs"> 
  <li class="active"><a href="" data-toggle="tab"><font color="white"><i class="icon-search icon-large"></i></font><font color="orange">Search Room Result</font></a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">
  <div class="hero-unit-y">
  
 
<?php 

if (isset($_POST['save'])){
$room=$_POST['room'];
$semester=$_POST['semester'];
$sy=$_POST['sy'];

$search_query_all=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%'")or die(mysql_error());
$search_query=mysql_query("select * from schedule where room like '%$room%' and type='' and day1='MWF'  and semester like '%$semester%' and sy like '%$sy%'")or die(mysql_error());
$search_query2=mysql_query("select * from schedule where room like '%$room%'and type='' and day1='TTh'  and semester like '%$semester%' and sy like '%$sy%'")or die(mysql_error());
$search_query1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%'")or die(mysql_error());
$count=mysql_num_rows($search_query);
$count2=mysql_num_rows($search_query2);
$row=mysql_fetch_assoc($search_query1);
$row_all=mysql_fetch_assoc($search_query_all);

$id=$row_all['schedule_id'];



?> 
<div class="teph">
<img src="img/logo.png" width="80" height="80">
</div>
<h2>Class Schedule</h2>
	<a class="btn btn-primary"  href="schedule.php">  <i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
<hr>
<h3><font color="orange"><?php echo $row['room'];  ?></font></h3>
<h3>School year:&nbsp;<?php echo $row['sy']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
Semeter:&nbsp;<?php echo $row['semester']; ?>
</h3>
</br>
<hr>
<table class="table table-striped table-bordered table-condensed">
  <thead>
    <tr>
      <th>Time</th>
      <th>Monday</th>
      <th>Wednesday</th>
      <th>Friday</th>
      <th>Time</th>
      <th>Tuesday</th>
      <th>Thursday</th>
      <th>Saturday</th>
    </tr>
  </thead>

  <tbody>
  	  <?php
$search_rows=mysql_fetch_array($search_query);
?>
    <tr>

      <td width="120">7:30 am
	  <br>
	  <br>
	 8:30 am
	</td>
	
      <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='7:30 am' and time_end='8:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='7:30 am' and time_end='8:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='7:30 am' and time_end='8:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
	    <td width="120">
		
		7:30 am
		<br>
		<br>
		9:00 am
		</td>
	    <td width="120">
		 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='7:30 am' and time_end='9:00 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
		</td>
	    <td width="120">
			 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='7:30 am' and time_end='9:00 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
		</td>
	    <td width="120">
						 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='7:30 am' and time_end='10:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
  echo '<br>';
 echo '<br>';	
	echo $row['subject'];
	
	  ?>
		
		</td>
	  </tr>
	

	  
	  
	 
	  <tr>
      <td width="120">8:30 am 
	  <br>
	  <br>
	 9:30 am
	</td>
       <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='8:30 am' and time_end='9:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='8:30 am' and time_end='9:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='8:30 am' and time_end='9:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120">
	  9:00 am
		<br>
		<br>
		10:30 am
	  </td>
      <td width="120">
	  	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='9:00 am' and time_end='10:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	  	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='9:00 am' and time_end='10:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	  					 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='7:30 am' and time_end='10:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  
	  </td>
    
	  </tr>
	  
	  
	        <tr>
      <td width="120">9:30 am
	  <br>
	  <br>
	 10:30 am
	</td>
      <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='9:30 am' and time_end='10:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='9:30 am' and time_end='10:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='9:30 am' and time_end='10:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
      <td width="120">
	   10:30 am
		<br>
		<br>
		12:00 am
	  
	  </td>
      <td width="120">
	  	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='10:30 am' and time_end='12:00 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='10:30 am' and time_end='12:00 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	  					 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='10:30 am' and time_end='1:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
  echo '<br>';
 echo '<br>';	
	echo $row['subject'];
	  ?>
	  </td>
   
	  </tr>
	  
	  
	    
	        <tr>
      <td width="120">10:30 am
	  <br>
	  <br>
	 11:30  am
	</td>
      <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='10:30 am' and time_end='11:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='10:30 am' and time_end='11:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='10:30 am' and time_end='11:30 am' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120">
	     12:00 am
		<br>
		<br>
		1:30 pm
	  </td>
      <td width="120">
	  	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='12:00 am' and time_end='1:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='12:00 am' and time_end='1:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	  	  					 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='10:30 am' and time_end='1:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  
	  </td>

	  </tr>
	  
	
        <tr>
      <td width="120">11:30 am
	  <br>
	  <br>
	 12:30 pm
	</td>
     <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='11:30 am' and time_end='12:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='11:30 am' and time_end='12:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='11:30 am' and time_end='12:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120">
	    1:30 pm
		<br>
		<br>
		3:00 pm
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='1:30 pm' and time_end='3:00 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	     	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='1:30 pm' and time_end='3:00 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	  
	  	  					 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='1:30 am' and time_end='4:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
  echo '<br>';
 echo '<br>';	
	echo $row['subject'];
	  ?>
	  </td>

	  </tr>	
	  
	  
	          <tr>
      <td width="120">12:30 pm
 	  <br>
	  <br>
	 1:30 pm
	</td>
     <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='12:30 pm' and time_end='1:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='12:30 pm' and time_end='1:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='12:30 pm' and time_end='1:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120">
	    3:00 pm
		<br>
		<br>
		4:30 pm
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='3:00 pm' and time_end='4:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='3:00 pm' and time_end='4:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	  	  	  					 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='1:30 am' and time_end='4:30 am' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>

	  </tr>	
	  
	  
	  	          <tr>
      <td width="120">1:30 pm
	  <br>
	  <br>
	 2:30 pm
	</td>
 <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='1:30 pm' and time_end='2:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='1:30 pm' and time_end='2:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='1:30 pm' and time_end='2:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120">
	   4:30 pm
		<br>
		<br>
		6:00 pm
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='4:30 pm' and time_end='6:00 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	     	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='4:30 pm' and time_end='6:00 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120"></td>

	  </tr>	
	  
	  
	  	  
	  
	  	          <tr>
      <td width="120">2:30 pm
	  <br>
	  <br>
	 3:30 pm
	</td>
 <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='2:30 pm' and time_end='3:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='2:30 pm' and time_end='3:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='2:30 pm' and time_end='3:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120">
	   6:00 pm
		<br>
		<br>
		7:30 pm
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='6:00 pm' and time_end='7:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	      	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='6:00 pm' and time_end='7:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120"></td>

	  </tr>	
	  
	  	  
	  	          <tr>
      <td width="120">3:30 pm
	  <br>
	  <br>
	 4:30 pm
	</td>
 <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='3:30 pm' and time_end='4:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='3:30 pm' and time_end='4:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='3:30 pm' and time_end='4:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120">
	    7:30 pm
		<br>
		<br>
		8:30 pm
	  </td>
      <td width="120">
	    	 <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
      <td width="120"></td>

	  </tr>	
	  
	  
	  
	  	  
	  	          <tr>
      <td width="120">4:30 pm
	  <br>
	  <br>
	 5:30 pm
	</td>
     <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='4:30 pm' and time_end='5:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='4:30 pm' and time_end='5:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='4:30 pm' and time_end='5:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>
	  </tr>	
	  	  

	  	          <tr>
      <td width="120">5:30 pm
	  <br>
	  <br>
	 6:30 pm
	</td>
   <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='5:30 pm' and time_end='6:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='5:30 pm' and time_end='6:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='5:30 pm' and time_end='6:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>

	  </tr>	
	  	  		  
	  
	  	  	          <tr>
      <td width="120">6:30 pm
	  <br>
	  <br>
	 7:30 pm
	</td>
    <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='6:30 pm' and time_end='7:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='6:30 pm' and time_end='7:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='6:30 pm' and time_end='7:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>

	  </tr>	
	  	  		

	  	  	          <tr>
      <td width="120">7:30 pm
	  <br>
	  <br>
	 8:30 pm
	</td>
  <td width="120">
	  <?php 
	  $result=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysql_error());
	  $row=mysql_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </td>
	   <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	 </td>

	    <td width="120">
	  	  <?php 
	  $result1=mysql_query("select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysql_error());
	  $row1=mysql_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>

	  </tr>					
	  
	  
	  
  </tbody>
</table>
<p>Approved by:</p>
</br>
ANTONIO L. DERAJA PH. D
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
DR. SALVADOR B. ZARAGOSA JR.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

ORLANDO Z. NEÑALES Ed. D
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
DR. RENATO M. SOROLLA
<br>
<p>Dean College of Industrial Technology 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Executive Director

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Vice President Academic  Affair
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
SUC President II  
</p>

</br>
	<form method="post" action="preview2.php">
<input type="hidden" name="room" value="<?php echo $room; ?>">
<input type="hidden" name="sy" value="<?php echo $sy; ?>">
<input type="hidden" name="semester" value="<?php echo $semester; ?>">

	<button class="btn btn-info" name="print"><i class="icon-print icon-large"></i>&nbsp;Print Schedule</button>
</form>
	
<?php 

}

?>

  
  
  

	







	</div>	
	</div>	
	</div>	
	</div>	

<?php include('footer.php');?>
</div>

				<div class="modal hide fade" id="teacher">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">

   
  <h2>Search Teacher Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal" method="POST" action="search_teacher_result.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter601">
    
	<div class="control-group">
    <label class="control-label" for="input01">Teacher:</label>
    <div class="controls">
   <select name="teacher" class="span333">
	<option>--Select--</option>
		<?php $teacher_query=mysql_query("select * from teacher")or die(mysql_error());
while($teacher_row=mysql_fetch_array($teacher_query)){
	?>
	<font size="30"><option><?php echo $teacher_row['FirstName']." ".$teacher_row['LastName']; ?></option></font>
	<?php } ?>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span333">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span333">
	<option>--Select--</option>
<?php $sy_query=mysql_query("select * from sy")or die(mysql_error());
while($sy_row=mysql_fetch_array($sy_query)){
 ?>
<option><?php echo $sy_row['sy']; ?></option>
 <?php } ?>
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
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
		</div>
		
		
		
		
		
								<div class="modal hide fade" id="CYS">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">


  <h2>Search Course Year Section Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal" method="POST" action="CYS_result.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter601">
    
	<div class="control-group">
    <label class="control-label" for="input01">Course Year Section:</label>
    <div class="controls">
   <select name="CYS" class="span333">
	<option>--Select--</option>
	<?php $CYS_query=mysql_query("select * from course")or die(mysql_error());
while($CYS_row=mysql_fetch_array($CYS_query)){
	?>
	<option><?php echo $CYS_row['course_year_section']; ?></option>
	<?php } ?>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span333">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span333">
	<option>--Select--</option>
<?php $sy_query=mysql_query("select * from sy")or die(mysql_error());
while($sy_row=mysql_fetch_array($sy_query)){
 ?>
<option><?php echo $sy_row['sy']; ?></option>
 <?php } ?>
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
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
		</div>


<div class="modal hide fade" id="room">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">

  <h2>Search Rooms Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal" method="POST" action="search_room_result.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter601">
    
	<div class="control-group">
    <label class="control-label" for="input01">Rooms:</label>
    <div class="controls">
   <select name="room" class="span333">
	<option>--Select--</option>
	<?php $room_query=mysql_query("select * from room")or die(mysql_error());
while($room_row=mysql_fetch_array($room_query)){
	?>
	<option><?php echo $room_row['room_name']; ?></option>
	<?php } ?>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span333">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span333">
	<option>--Select--</option>
<?php $sy_query=mysql_query("select * from sy")or die(mysql_error());
while($sy_row=mysql_fetch_array($sy_query)){
 ?>
<option><?php echo $sy_row['sy']; ?></option>
 <?php } ?>
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
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
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
		
		<script type="text/javascript">
	$(document).ready( function() {
	

	
	$('.btn-danger1').click( function() {
		
		var id = $(this).attr("id");
		
		if(confirm("Are you sure you want to delete this Schedule?")){
			
		
			$.ajax({
			type: "POST",
			url: "delete_schedule.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut('slow'); 
			} 
			}); 
			}else{
			return false;}
		});				
	});

</script>
