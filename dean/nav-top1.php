
    <div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
    <br><br>
	<div class="container">
	     <br>
		<a class="branded">
		<img src="img/Lnu.jpg" width="150" height="90">
 	</a> 
	<a class="brand">
	 <h3>Mobile and Web Subject Scheduling and Loading System of</h3>
	 <div class="chmsc_nav"><font size="5" style="Bookman Old Style" color="white">Lyceum Northwestern University</font></div>
 	</a>
<div class="time_top">	
<font color="orange">
  <?php
 $Today=date('y:m:d');
$new=date('l, F d, Y',strtotime($Today));
echo $new; ?>
</font>

<p><font color="gray">Welcome:&nbsp;&nbsp;</font><font color="white"><b><?php echo $username;?></b>
</p></font>
</div>
	</div>
	</div>
	</div>