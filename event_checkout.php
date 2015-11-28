<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
?>
<html>
	<head>
		<title> VHS Online Store</title>
	
	<link rel="stylesheet" href="styles/style.css" media="all"/>
	<LINK REL="SHORTCUT ICON" HREF="images/vhs_icon.png"/>
	</head>
	
<body>
	<!-- Main container starts here -->
	<div class="main_wrapper">
	
	<!-- Header starts here -->
	<?php include("includes/header.html"); ?>
	<!-- Header ends here -->	
	
	

	<!-- Content wrapper starts here -->
	<div class="content_wrapper">
	
	<div id="sidebar"> 
	
	</ul>
	
	
	</div>
	
	<div id="content_area"> 
	<div id="shopping_cart"> 
	
	<span style="float:right; font-size:18px;padding:5px;line-height:25px">
	<!-- Welcome Guest! &nbsp&nbsp
	<b style="color:yellow">Shopping Cart -</b> 
	Total Items: <?php total_items();?>&nbsp&nbsp
	Total Price: $<?php total_price();?> &nbsp&nbsp 
	<a href="cart.php" style="color:yellow">Go to Cart</a>-->
	</span>
	
	</div>
	<!-- 	<?php cart(); ?> -->
	<form action="" method="post" enctype="multipart/form-data">
     <table align="center" width="750">
	 <tr align="center">
	  <td colspan="4"><h2>Please provide your details</h2></td>
	  </tr>
	  
	  <tr>
	  <td align="right"><b>User Name:</b> </td>
	  <td><input type="text" name="uname" required/></td>
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
	  <td colspan="4"><input type="submit" name="event_register" value="Submit"/></td>
	  </tr>
	  
	  
	 </table>
	</form>	

	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>

<?php

 if(isset($_POST['event_register']))
 {
	 
	$uname=$_POST['uname']; 
	$fname=$_POST['fname']; 
	$lname=$_POST['lname']; 
	$email=$_POST['email']; 
	$address=$_POST['address']; 
	
	    
	$insert_user="insert into user(uid,uusername,uemail,ufname,ulname,uaddress,utype) 
	values('','$uname','$email','$fname','$lname','$address','guest')";
     $run_pro = mysqli_query($con,$insert_user);
	
	//include('payment_event.php');
	echo "<script>window.open('payment_event.php','_self')</script>";
	
	
 }
 ?>