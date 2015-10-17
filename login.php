<?php include('header.php'); include('hover.php'); ?>

<script type="text/javascript">
	$(document).ready(function()
		{
		$('.more').hide();
		
		 $("#click").click(function () {
      $(".more").toggle("slow");
      $("#click").hide("slow");
    });
	
	

		
		});
</script>
<script type="text/javascript">
	$(document).ready(function()
		{
		$('.more1').hide();
		
		 $("#click1").click(function () {
      $(".more1").toggle("slow");
      $("#click1").hide("slow");
    });
	
	

		
		});
</script>

</head> 
<body>

<div class="coat">

<div class="wrapper_home">
<div class="navbar navbar-fixed-top">
 <div class="navbar">
  <div class="navbar-inner1">
  <div class="nav_jkl">
    <div class="container">
<ul class="nav">
<a class="brand" href="#">
<font color="white">LNU</font>
</a>
  
   <li> <a href="index.php"><i class="icon-home icon-large"></i>Home</a>
  </li>
 <li class="active">
    
  <a href="login.php" class="admin"><i class="icon-user icon-large"></i>Admin Login</a></li>
 
	</ul>
    </div>
    </div>
  </div>
</div>
</div>

<div class="hero-unit">
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><img src="img/lnubannerf.jpg" width="1090" height="250"></div>
    <div class="item"><img src="img/oss.jpg" width="1090" height="250"></div>
    <div class="item"><img src="img/Lnu.jpg" width="1090" height="250"></div>
    <div class="item"><img src="img/Untitled-1.jpg" width="1090" height="250"></div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>

<div class="hero-unit-bud">

<ul class="nav nav-tabs"> 
 
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">
  <div class="hero-unit-y">

  
<div class="coat">
<div class="wrapper">



<div id="element" class="hero-body-index">
	<p><font color="white"><center><h2>Login</h2></center></font></p>
    <form name="form1" method="post" action="loginfunction.php">			
			<table align="center">
			
			
		
			<tr>
				<td><font color="white">UserName:</font>&nbsp;&nbsp;</td>
				<td><input type="text" name="username" class="UserName_hover" id="span9001"></td>
			</tr>
            <tr><td>&nbsp;<td></tr>
			<tr>
				<td><font color="white">Password:</font>&nbsp;&nbsp;</td>
				<td><input type="password" name="password" class="Password_hover" id="span9001"></td>
			</tr>
			<tr><td colspan="2" align="right"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
               <tr>
				<td>&nbsp;</td>
                 
				<td class="add" >
					<button class="btn btn-primary" type"submit" name="submit" style="cursor:pointer"> <i class="icon-ok-sign icon-large"></i>&nbsp;Login</button>&nbsp;&nbsp;&nbsp;
					
                    <a class="btn btn-primary"  href="index.php">&times;&nbsp;Exit</a>
				</td>
                </tr>
			<tr><td>&nbsp;
                </td>
                </tr>
            	<tr>				
				<td  colspan="2">
					<?php
						if(isset($attempt))
						{
							if($attempt == "null")
							{
							?>
							<div class="error"><font color="red">Enter your username and password.</font></div>
							<?php
							}
							elseif($attempt == "fail")
							{
							?>
							<div  class="error"><font color="red">Incorrect username or password,<br />make sure caps lock key is off.</font></div>
							<?php
							}
						}
					?>
				</td>
                
			</tr>
          		
		</form>
	  </tr>	
	</table>
	
	</br>
	<div class="error">

</div>

</div></div>

</div></div>

</div></div>

</div>
<?php include('footer.php');?>


		
			
		
</html>



