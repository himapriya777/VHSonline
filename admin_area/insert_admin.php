<!DOCTYPE>
<?php
include("../includes/db.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>

<body bgcolor="skyblue">

	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="795" bgcolor=FFFFCC>
		<tr align="center">
			<td colspan="7"><h2> Add New Admin User Here</h2></td>
		</tr>
		
			  <tr>
	  <td align="right"><b>User Name:</b> </td>
	  <td><input type="text" name="uname" required/></td>
	  </tr>
	  
	  <tr>
	  <td align="right"><b>Password:</b> </td>
	  <td><input type="password" name="pwd" required/></td>
	  </tr>
      
	  <tr>
	  <td align="right"><b>First Name:</b> </td>
	  <td><input type="text" name="fname" required/></td>
	  </tr>
	  
	  <tr>
	  <td align="right"><b>Last Name:</b> </td>
	  <td><input type="text" name="lname" required/></td>
	  </tr>
	  
	 <tr>
	  <td align="right"><b>Email:</b> </td>
	  <td><input type="text" name="email" required/></td>
	  </tr>
	  
	 <tr>
	  <td align="right"><b>Address:</b> </td>
	  <td><textarea cols="20" rows="10" name="address"></textarea></td>
	  </tr>
	  
	  <tr align="center">
	  <td colspan="4"><input type="submit" name="register_admin" value="Add Admin"/></td>
	  </tr>
	  
	  
	 </table>
	</form>	

</body>
</html>


<?php

 if(isset($_POST['register_admin']))
 {
	 
	$uname=$_POST['uname']; 
	$pwd=$_POST['pwd'];
	$fname=$_POST['fname']; 
	$lname=$_POST['lname']; 
	$email=$_POST['email']; 
	$address=$_POST['address']; 
	$utype ="regular";
	
	$salt="-45dfeHKyu349@-/klF21-14JkUP/4";
	$hashedpwd=md5($salt.$pwd);
	
	
	
	
	$select_user = "select uusername from user where uusername='$uname'";
	$select_query=mysqli_query($con,$select_user);
	$count =mysqli_num_rows($select_query);

	
	if($count>=1)
	{
		echo "<script>alert('User name already exist please try with new name')</script>";
		echo "<script>window.open('admin_index.php?add_admin','_self')</script>";
	}
	else
	{
	
		$insert_user="insert into user(uid,uusername,upassword,uemail,ufname,ulname,uaddress,utype) 
	values('','$uname','$hashedpwd','$email','$fname','$lname','$address','admin')";
	
	    $insert_query=mysqli_query($con,$insert_user);
		echo "<script>alert('Account has been created successfully')</script>";
		echo "<script>window.open('admin_index.php?view_admin','_self')</script>";
		
	
	} 
 }
 ?>