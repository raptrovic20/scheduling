<?php
if(isset($_GET["attempt"]))
{
$attempt=$_GET["attempt"];
}
?>
<?php
session_start();
?>
<html>
<head><title>Mobile and Web Scheduling System</title>
<link href="dean/img/Lnu.jpg" rel="icon" type="image"> 
<script src="dean/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<link href="dean/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link href="dean/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
<link href="dean/css/style.css" rel="stylesheet" type="text/css" media="screen">


<script type="text/javascript" src="dean/js/bootstrap.js"></script>
<script type="text/javascript" src="dean/js/bootstrap-transition.js"></script>
<script type="text/javascript" src="dean/js/bootstrap-typeahead.js"></script>


<!--- qtip --->
<script type="text/javascript" src="dean/js/qtip/jquery.qtip.min.js"></script>
<link href="dean/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css" media="screen, projection">






		<script type="text/javascript">
						jQuery(document).ready(function() {
				$('.typeahead').typeahead()
				
				  $('.carousel').carousel({
    interval: 4000
    })	
    })	
		</script>

</head>

