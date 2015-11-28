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
	
	
	
	
	</div>
	
	<div id="content_area"> 
	<div id="shopping_cart"> 
	
	<span style="float:right; font-size:18px;padding:5px;line-height:25px">
	<!--Welcome Guest! &nbsp&nbsp
	 <b style="color:yellow">Shopping Cart -</b> 
	Total Items: <?php total_items();?>&nbsp&nbsp
	Total Price: $<?php total_price();?> &nbsp&nbsp 
	<a href="cart.php" style="color:yellow">Go to Cart</a>-->
	</span>
	
	</div>
	
		
    <?php

 $item_price=$_SESSION['item_price'];
 $product_name=$_SESSION['pname'];
 $qty=$_SESSION['qty'];
 
 $total_price = $qty*$item_price;
 //echo $total_price;


$user = $_SESSION['user_name'];

$get_user = "select * from user where uusername='$user'";
$run_user= mysqli_query($con,$get_user);
$row_user = mysqli_fetch_array($run_user);
$uid=$row_user['uid'];

// payment details from paypal
/*
 $price =$_GET['amt'];
 $currency =$_GET['cc'];
 $trx = $_GET['tx'];
 
 if($item_price==$price)
 {
	 echo "<h3> Your Payment was successful, please go to your account</h3>
<h3><a href='my_account.php'>Go to you account</a></h3>";
 }
 else
 {
	 echo "You are having problem with payment";
 }*/
 echo "<h3> Your Payment was successful, please go to your account</h3>
<h3><a href='my_account.php'>Go to you account</a></h3>";
?>
	</div>

	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>