<?php 
include('dbcon.php');
include('session.php'); 

if (isset($_POST['save'])){

$day=$_POST['day'];
$time_start=$_POST['time_start'];
$time_end=$_POST['time_end'];
$semester=$_POST['semester'];
$sy=$_POST['sy'];
$CYS=$_POST['CYS'];
$subject=$_POST['subject'];
$teacher=$_POST['teacher'];
$room=$_POST['room'];




$result=mysql_query("select * from schedule where
day='$day' 
and time='$time_start'
and time_end='$time_end'
and room='$room'
and type='Exam'") or die(mysql_error());
$count=mysql_num_rows($result);
$teacher1=mysql_fetch_array($result);
$teacher_n=$teacher1['teacher'];




$students_query=mysql_query("select * from schedule where
day='$day' 
and time='$time_start'
and time_end='$time_end'
and CYS='$CYS'
and type='Exam'") or die(mysql_error());
$students_row=mysql_fetch_array($students_query);
$count2=mysql_num_rows($students_query);
$student_2=$students_row['CYS'];





if ($count == 1){ ?>
<script type="text/javascript">
alert('Schedule Already Taken<?php echo ' '.'by'." ". $teacher_n; ?>');
window.location="add_exam.php";
</script>
<?php
}
else if($count2 == 1){ ?>
<script type="text/javascript">
alert('<?php echo $student_2." ".'Already  have a Schedule on this Time'; ?>');
window.location="add_exam.php";
</script>
<?php
}
else{



if ($day=='Monday'){

mysql_query("insert into schedule (semester,sy,CYS,subject,teacher,room,day,time,time_end,day1,type)
VALUES('$semester','$sy','$CYS','$subject','$teacher','$room','$day','$time_start','$time_end','MWF','Exam')")or die(mysql_error());




$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Add Exam Schedule','$time_start&nbsp;$time_end','$type')") or die(mysql_error()); ?>
<script type="text/javascript">
alert('Schedule Successfully Added');
window.location="exam_schedule.php";
</script>
<?php 
}else if($day=='Tuesday'){
mysql_query("insert into schedule (semester,sy,CYS,subject,teacher,room,day,time,time_end,day1,type)
VALUES('$semester','$sy','$CYS','$subject','$teacher','$room','$day','$time_start','$time_end','TTH','Exam')")or die(mysql_error());




$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Add Exam Schedule','$time_start&nbsp;$time_end','$type')") or die(mysql_error()); ?> 
<script type="text/javascript">
alert('Schedule Successfully Added');
window.location="exam_schedule.php";
</script>
<?php 
}else if($day=='Wednesday'){

mysql_query("insert into schedule (semester,sy,CYS,subject,teacher,room,day,time,time_end,day1,type)
VALUES('$semester','$sy','$CYS','$subject','$teacher','$room','$day','$time_start','$time_end','MWF','Exam')")or die(mysql_error());




$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Add Exam Schedule','$time_start&nbsp;$time_end','$type')") or die(mysql_error()); ?>
<script type="text/javascript">
alert('Schedule Successfully Added');
window.location="exam_schedule.php";
</script>
<?php 
}else if ($day=='Thursday'){
mysql_query("insert into schedule (semester,sy,CYS,subject,teacher,room,day,time,time_end,day1,type)
VALUES('$semester','$sy','$CYS','$subject','$teacher','$room','$day','$time_start','$time_end','TTH','Exam')")or die(mysql_error());




$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Add Exam Schedule','$time_start&nbsp;$time_end','$type')") or die(mysql_error());
?>
<script type="text/javascript">
alert('Schedule Successfully Added');
window.location="exam_schedule.php";
</script>
<?php
}else if ($day=='Friday'){
mysql_query("insert into schedule (semester,sy,CYS,subject,teacher,room,day,time,time_end,day1,type)
VALUES('$semester','$sy','$CYS','$subject','$teacher','$room','$day','$time_start','$time_end','MWF','Exam')")or die(mysql_error());




$logout_query=mysql_query("select * from users where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$type=$row['User_Type'];


mysql_query("insert into history (date,action,data,user)
VALUES (NOW(),'Add Exam Schedule','$time_start&nbsp;$time_end','$type')") or die(mysql_error());
?>
<script type="text/javascript">
alert('Schedule Successfully Added');
window.location="exam_schedule.php";
</script>
<?php 

}
}
}
?>