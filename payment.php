<?php
session_start();
?>
<!DOCTYPE>
<?php
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
 <div id="products_box"> 
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="himapriya777-facilitator@gmail.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $_SESSION['pname'];?>">
<input type="hidden" name="amount" value="<?php echo $_SESSION['item_price'];?>">
<input type="hidden" name="quantity" value="<?php echo $_SESSION['qty'];?>">
<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="return" value="http://192.168.1.74/vhsv3/paypal_success.php">
<input type="hidden" name="cancel_return" value="http://www.vhsonline/paypal_cancel.php">

<!-- Display the payment button. -->
<input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
<br/>
<img src="images/paypal.jpg" alt="PayPal - The safer, easier way to pay online" width="110" height="50">
</div>
	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>
