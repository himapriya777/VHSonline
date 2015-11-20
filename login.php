<?php
include("includes/db.php");
?>
<div>
	
		<form action="" method="post" accept-charset="UTF-8">
		
		<table width="500" align="center" >
		<tr align="center">
		<td colspan=4><h2> Login or Register to Purchase </h2></td>
		
		</tr>
		<tr>
		<td align="right"><b>User Name:</b></td>
		<td><input type="text" name="uname" placeholder="Enter Username" required>
		 </td>
		</tr>
		 
		 <tr>
		 <td align="right"><b>Password:</b></td>
		 <td><input type="password" name="pwd" placeholder="Enter Password" required></td>
		 </tr>
		 
		 <tr align="center">
		 <td colspan="4"><input type="submit" name="login" value="Login"/></td>
		 </tr>
		
</table>	

     <h2 style="float:center;padding:10px;"><a href="user_reg.php"> New User? Register Here</a>	</h2>
		</form>
<?php		
	if(isset($_POST['login']))
	{
		$username=$_POST['uname'];
		$pwd=$_POST['pwd'];
		$salt="-45dfeHKyu349@-/klF21-14JkUP/4";
	    $hashedpwd=md5($salt.$pwd);
		
		$select_user = "select * from user where uusername='$username' and upassword='$pwd'";
		
		$run_user=mysqli_query($con,$select_user);
		$check_user =mysqli_num_rows($run_user);
		if($check_user==0)
		{
			echo "<script>alert('Username or Password is incorrect')</script>";
		}
		else
		{
			$_SESSION['user_name']=$username;
			echo "<script>alert('You logged in successfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		}
	}
		?>
</div>

