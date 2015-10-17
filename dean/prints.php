<?php  include('dbcon.php'); ?>
<body>

<h2><font color="white">CheckList</font></h2>


<style>
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
}
.editbox
{
display:none
}
td
{
padding:7px;
border-left:1px solid #fff;
border-bottom:1px solid #fff;
}
table{
border-right:1px solid #fff;
}
.edit_tr:hover
{
}
.edit_tr
{
background: none repeat scroll 0 0 #D5EAF0;
}
th
{
font-weight:bold;
text-align:left;
padding:7px;
border:1px solid #fff;
border-right-width: 0px;
}
.head
{
background: none repeat scroll 0 0 #91C5D4;
color:#00000;

}

</style>
	<table class="users-table">


						
<div class="demo_jui">

		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
        
			<thead>
				<tr>
				<th>Subject Code</th>
				<th>Description</th>
                <th>College Offerring</th>
				<th>Lec/Lab Units</th>
				<th>Faculty Load</th>
                <th>Section</th>
				<th>Schedule</th>
				<th>Room</th>
                 <th>No. of Student</th>
				
				</tr>
			</thead>
			<tbody>
<?php 
								 if (isset($_POST['sort_instructor'])){
								 $instructor = $_POST['instructor'];
								 $term = $_POST['term'];
								 
								 ?>
                                  <?php $user_query=mysql_query("select * from tbl_checklist where term = '$term' and instructor = '$instructor'  ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									
									
									?>
									

									 <tr class="del<?php echo $id ?>">
                                   
	<td><?php echo $row['subj_des']; ?></td>
    <td><?php echo $row['coll_offering']; ?></td>
	<td><?php echo $row['lec/lab_unit']; ?></td>
	<td><?php echo $row['fac_load']; ?></td>
	<td><?php echo $row['section']; ?></td>
	<td><?php echo $row['schedule']; ?></td>
	<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['no_of_stud']; ?></td>
	
                                    
                                    
									
									     <!-- Modal edit user -->
								
                                    </tr>
<?php } ?>

<?php } ?>
	
	

			</tbody>
		</table>

</div>
<input name="" type="button" value="Print" onclick="javascript:window.print()" style="cursor:pointer; float:left;" />



			