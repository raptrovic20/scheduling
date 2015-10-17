<?php
  require_once('OLEwriter.php');
  require_once('BIFFwriter.php');
  require_once('Worksheet.php');
  require_once('Workbook.php');
  require_once('connect.php');
  
  $id_get=$_POST['id_get'];
  $semester=$_POST['semester'];
  $sy=$_POST['sy'];

    function HeaderingExcel($filename) {
      header("Content-type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=$filename" );
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
      header("Pragma: public");
      }
	  
	  // HTTP headers
HeaderingExcel('teacher.xls');// Creating a workbook
$workbook = new excel("-");
// Creating the first worksheet
$worksheet1 =& $workbook->add_worksheet('teacher');
$worksheet1->freeze_panes(1, 0);
  $worksheet1->set_column(0, 0, 25);
  $worksheet1->set_column(1, 1, 20);
  $worksheet1->set_column(1, 2, 20);
  $worksheet1->set_column(1, 3, 20);
  $worksheet1->set_column(1, 4, 20);
  $worksheet1->set_column(1, 5, 20);
  $worksheet1->set_column(1, 6, 20);
  
 //row 
  $worksheet1->set_row(8, 50);







$query=mysql_query("select * from schedule where  teacher='$id_get' and semester='$semester' and sy='$sy'")or die(mysql_error());
$row=mysql_fetch_array($query);
$name=$row['teacher'];
$sy=$row['sy'];
$semester=$row['semester'];

   $worksheet1->write_string(0,0,"Class Schedule");
   $worksheet1->write_string(2,0,"$name");
   $worksheet1->write_string(3,0,"School Year: $sy");
   $worksheet1->write_string(3,1,"Semester: $semester");

   $worksheet1->write_string(7,0,"Time");
   $worksheet1->write_string(7,1,"Monday");
   $worksheet1->write_string(7,2,"Wednesday");
   $worksheet1->write_string(7,3,"Friday");
   $worksheet1->write_string(7,4,"Time");
   $worksheet1->write_string(7,5,"Tuesday");
   $worksheet1->write_string(7,6,"Thursday");
//
   $worksheet1->write_string(8,0,"7:30    
   8:30");
 




/////////////////
	

	$qryreport = mysql_query("SELECT * FROM schedule where teacher='$id_get' and type='' and day1='MWF' and semester='$semester' and sy='$sy'") or die(mysql_error());
	
	$sqlrows=mysql_num_rows($qryreport);
	$j=7;
	
	WHILE ($reportdisp=mysql_fetch_array($qryreport)) {
	$j=$j+1;
			$day = $reportdisp['day'];
			$project = $reportdisp['time'];
			$time_end = $reportdisp['time_end'];
			$CYS = $reportdisp['CYS'];
			$subject = $reportdisp['subject'];
			$room = $reportdisp['room'];
			
			
			
			 $leaderid = $reportdisp['teacher']; 
			 
			 $qryleader = mysql_query("SELECT * FROM schedule WHERE teacher='".$leaderid."' and type='' and day1='MWF' and semester='$semester' and sy='$sy'") or die(mysql_error());
				$leader = mysql_fetch_assoc($qryleader);
				
				$assignedto = $leader['time'];
			 $worksheet1->write_string($j,0,"$day");
			 $worksheet1->write_string($j,1,"$project-$time_end");
		 $worksheet1->write_string($j,2,"$CYS");
		 $worksheet1->write_string($j,3,"$subject");
		 $worksheet1->write_string($j,4,"$room");
			 
	}
	
	
	
/////////////////
  
  
	$qryreport1 = mysql_query("SELECT * FROM schedule where teacher='$id_get' and type='' and day1='TTH' and semester='$semester' and sy='$sy'") or die(mysql_error());
	
	$sqlrows=mysql_num_rows($qryreport1);
	$j=20;
	
	WHILE ($reportdisp=mysql_fetch_array($qryreport1)) {
	$j=$j+1;
			$day = $reportdisp['day'];
			$project = $reportdisp['time'];
			$time_end = $reportdisp['time_end'];
			$CYS = $reportdisp['CYS'];
			$subject = $reportdisp['subject'];
			$room = $reportdisp['room'];
			
			
			
			 $leaderid = $reportdisp['teacher']; 
			 
			 $qryleader = mysql_query("SELECT * FROM schedule WHERE teacher='".$leaderid."' and type='' and day1='TTH' and semester='$semester' and sy='$sy'") or die(mysql_error());
				$leader = mysql_fetch_assoc($qryleader);
				
				$assignedto = $leader['time'];
			
		 $worksheet1->write_string($j,0,"$day");
		 $worksheet1->write_string($j,1,"$project-$time_end");
		 $worksheet1->write_string($j,2,"$CYS");
		 $worksheet1->write_string($j,3,"$subject");
		 $worksheet1->write_string($j,4,"$room");
			 
	}
  
  
$workbook->close();
?>