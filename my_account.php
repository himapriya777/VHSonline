<!DOCTYPE>
<?php
session_start();
include("includes/db.php");

include("functions/functions.php");
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
	
	<div id="sidebar_title">Categories</div>
	
	<ul id="cats">
	<?php getCats(); ?>
	
	</ul>
	
	
	</div>
	
	<div id="content_area"> 
	<div id="shopping_cart"> 
	
	<span style="float:right; font-size:18px;padding:5px;line-height:25px">
	
	<!-- <b style="color:yellow">Shopping Cart -</b> 
	Total Items: <?php total_items();?>&nbsp&nbsp
	Total Price: $<?php total_price();?> &nbsp&nbsp 
	<a href="cart.php" style="color:yellow">Go to Cart</a>-->
	<?php
	if(!isset($_SESSION['user_name']))
	{
	echo "Welcome Guest! &nbsp&nbsp";
	echo "<a href='checkout.php' style='color:yellow'><b>Login</b></a>";	
	}
	else
	{   $uname=$_SESSION['user_name'];
		echo "Welcome $uname &nbsp&nbsp";
		echo "<a href='logout.php' style='color:yellow'><b>Logout</b></a>";	
	}
	?>
	</span>
	
	</div>
  
<table align="center" width="795" bgcolor=pink>

<tr align="center">
<td colspan="8"><h2> View Account Details</h2></td>
</tr>

<tr bgcolor=skyblue>
<th>User Name</th>
<!--<th>Stock</th>-->
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Address</th>
</tr>

<?php
$uname=$_SESSION['user_name'];
$get_pro ="select * from user where uusername='$uname'";
$run_pro =mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro))

{
	$pro_id =$row_pro['uid'];
	$pro_name= $row_pro['uusername'];
	$pro_fname= $row_pro['ufname'];
	$pro_lname= $row_pro['ulname'];
	$pro_email = $row_pro['uemail'];
	$pro_address= $row_pro['uaddress'];

	$i++;


?>
<tr align="center">

<td><?php echo $pro_name;?></td>
<td><?php echo $pro_fname;?></td>
<td><?php echo $pro_lname;?></td>
<td><?php echo $pro_email;?></td>
<td><?php echo $pro_address;?></td>

</tr>
<?php
}	// end of while
?>
</table>

	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>