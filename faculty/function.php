<?php
function persons()
 {
$emps = mysql_query("SELECT * FROM employees") or die(mysql_error()); 
WHILE($emp = mysql_fetch_array($emps)){
$id = $emp['emp_id'];
$firstname = $emp['first_name'];
$lastname = $emp['last_name'];
echo "<option value=\"$id\">$firstname $lastname</option>";
}
}
?>	