<?php
include('conn.php');

if(isset($_POST['REGISTER']) && $_POST['REGISTER']=='Register')
{
	//echo "hiii";
$name=trim($_POST['name']);
$email=trim($_POST['email']);
$city=$_POST['city'];
$gender=$_POST['gender'];
$hobby=implode(',',$_POST['hobby']);
$address=trim($_POST['adrs']);
$file=$_FILES['file']['name'];
$error=array("name"=>"","email"=>"","city"=>"","gender"=>"","hobby"=>"","address"=>"","file"=>"");
	
	//********************name*********************
	if($name=="")
	{
		$error['name']="Name Is Required.";
	}
	else
	{ 
		if(!preg_match('/^[a-zA-Z\s]+$/',$name))
		{
		$error['name']="Name Can't Contain Numeric Value.";
		}
		else
		{
			if(strlen($name)>6)
			{
				$valid_name=$name;
			}
			else
			{
			$error['name']="Name Should Be Greater Than 6 Characters.";
			}
	
		}
	}
	
	//********************email*********************
	if($email=="")
	{
		$error['email']="Email Is Required.";	
	}
	else
	{
		if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email))																												        {
			$valid_email=$email;
		}
		else 
		{
			$error['email']="Invalid Email Address.";
		}
	}
	
	//********************gender*********************
	if($gender=="")
	{
		$error['gender']="Select Gender.";	
	}
	else
	{
		$valid_gender=$gender;
	}	
	
	//********************address*********************
	if(empty($address))
	{
		$error['address']="Address Is Required.";	
	}
	else
	{
		$valid_address=$address;
	}
	
	//********************file*********************
	if($file=="")
	{
		$error['file']="Image Is Required.";	
	}
	else
	{
		if($_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/jpg')
		{
			$valid_file=$file;
		}
		else
		{
			$error['file']="Image Must Be .jpg or .jpeg";	
		}
	}
	
	//********************City*********************
	if($city=="")
	{
		$error['city']="Select A city.";	
	}
	else
	{
		$valid_city=$city;
	}
		
	/*echo "valid name = ",strlen($valid_name),"<br>";
	echo "valid email = ",strlen($valid_email),"<br>";
	echo "valid gender = ",strlen($valid_gender),"<br>";
	echo "valid city = ",strlen($valid_city),"<br>";
	echo "valid file = ",strlen($valid_file),"<br>";
	echo "valid address = ",strlen($valid_address),"<br>";*/
	
	if( (strlen($valid_name)>0) && (strlen($valid_email)>0) && (strlen($valid_address)>0) && (strlen($valid_city)>0) && (strlen($valid_file)>0) && (strlen($valid_gender)>0))
	{
		echo "Hello";
		
		$sel=mysql_query("select * from emp1 where email='$email'");
		$n=mysql_num_rows($sel);
		if($n==0)	
		{
			$path="f/";
			if(file_exists($path.$valid_file))
			{
				$file=uniqid().$file;
			}
			copy($_FILES['file']['tmp_name'],$path.$file);
			
			echo $ins="INSERT into emp1(id,name,email,city,gender,hobby,file,address) values(NULL,'$name','$email','$city','$gender','$hobby','$file','$address')";
			
			mysql_query($ins) or die(mysql_error());
			echo "<script>alert('Successfully Registered');
			window.location='index.php';
			</script>";
		}
		else
		{
			$error['email']="Same Email Already Exist.";
		}
	}	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" language="javascript" >
function checkEmail(str)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("checkEmail").innerHTML=xmlhttp.responseText;
		}
  	}
xmlhttp.open("POST",str,true);
xmlhttp.send();
}
</script>
<style type="text/css">
h1 {
	margin:0px;
	padding:0px;
}
.err {
	color:red;
}
.fieldsize {
	width:200px;
}
table 
	{
		line-height:40px;
		width:80%;
		line-height:50px;
		height:auto;
		border:#000 1px solid;
		border-collapse:collapse 
	}
td
{
	padding-left:20px;
	font-weight:bold;
}
</style>
</head>
<body>
<form name="f1" method="post"  enctype="multipart/form-data">
  <table border="1" align="center" rules="groups" height="80%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Registration Form</h1></th>
    </tr>
    <tr>
      <td width="21%">Name</td>
      <td width="79%"><input type="text" name="name" id="n" class="fieldsize" value="<?php echo $valid_name;?>" />
        <span class="err"><?php echo $error["name"];?></span></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" onblur="checkEmail('checkEmail.php?email='+this.value)" class="fieldsize" value="<?php echo $valid_email;?>"/>
        <span class="err" id="checkEmail"><?php echo $error["email"];?></span></td>
    </tr>
    <tr>
      <td>City</td>
      <td><select name="city" class="fieldsize">
          <option value="">select city</option>
          <optgroup label="gujarat">
          <option value="surat" <?php if($valid_city=='surat') echo "selected='selected'";?>>surat</option>
          <option value="snagar" <?php if($valid_city=='snagar') echo "selected='selected'";?>>surendranagar</option>
          <option value="jamnagar" <?php if($valid_city=='jamnagar') echo "selected='selected'";?>>jamnagar</option>
          </optgroup>
          <optgroup label="maharastra">
          <option value="mumbai" <?php if($valid_city=='mumbai') echo "selected='selected'";?>>mumbai</option>
          </optgroup>
        </select>
        <span class="err"><?php echo $error["city"];?></span></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" value="male" <?php if($valid_gender=='male') echo "checked='checked'";?> />
        Male
        <input type="radio" name="gender" value="female" <?php if($valid_gender=='female') echo "checked='checked'";?>/>
        Female <span class="err"><?php echo $error["gender"];?></span></td>
    </tr>
    <tr>
      <td>Hobby</td>
      <td><input type="checkbox" name="hobby[]" value="read" />
        Read
        <input type="checkbox" name="hobby[]" value="write" />
        Write</td>
    </tr>
    <tr>
      <td>Image</td>
      <td><input type="file" name="file" value="upload" />
        <span class="err"><?php echo $error["file"];?></span></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="adrs" class="fieldsize"><?php echo $valid_address;?></textarea>
        <span class="err"><?php echo $error["address"];?></span></td>
    </tr>
    <tr>
      <td colspan="2" align="right" ><input type="submit" name="REGISTER" value="Register" style="margin-right:50px; height:40px;  font-size:24px;font-family:Verdana, Geneva, sans-serif;" class="fieldsize"/></td>
    </tr>
    <tr>
    	<td colspan="2"><a href="view.php">View Records</a></td>
    </tr>
  </table>
  
  
</form>
</body>
</html>