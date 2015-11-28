<!DOCTYPE>
<?php
session_start();
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
	<!-- <?php cart(); ?> -->
		<div id="products_box">
		<?php getEvents(); ?>
	</div>

	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>