<?php
include("../includes/db.php");
session_start();
?>
<!DOCTYPE>
<html>
<head>
<title>Admin Login Form</title>
<link rel="stylesheet" href="admin_login.css" media="all"/>
</head>
<body>

<div class="login">
<h2 style="color:red; text-align:center;"><?php echo @$_GET['not_admin'];?></h2>
	<h1>Admin Login</h1>
    <form method="post">
    	<input type="text" name="uname" placeholder="Username" required="required" />
        <input type="password" name="pwd" placeholder="Password" required="required" />
        <button type="submit" name="admin_login" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>

</body>
</html>
<?php

if(isset($_POST['admin_login']))
{
	
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$salt="-45dfeHKyu349@-/klF21-14JkUP/4";
	$hashedpwd=md5($salt.$pwd);
	$select_admin = "select * from user where uusername='$uname' and upassword='$hashedpwd'
	and utype!='regular'";
	
	$run_admin = mysqli_query($con,$select_admin);
	$check_admin = mysqli_num_rows($run_admin);
	if($check_admin==0)
	{
	echo "<script>alert('Username or Password is incorrect')</script>";

	}
	else
	{
	$select_type = "select utype from user where uusername='$uname' and upassword='$hashedpwd'
	";
	$run_admin =mysqli_query($con,$select_type);
	$row_admin=mysqli_fetch_array($run_admin);

	$_SESSION['admin_type']=$row_admin['utype'];
	$_SESSION['admin_name']=$uname;
	echo "<script>alert('You logged in successfully')</script>";
	echo "<script>window.open('admin_index.php?logged_in=You have successfully logged in','_self')</script>";
				
	}
	
	
}

?>