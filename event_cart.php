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
	<!--Welcome Guest! &nbsp&nbsp
	 <b style="color:yellow">Shopping Cart -</b> 
	Total Items: <?php total_items();?>&nbsp&nbsp
	Total Price: $<?php total_price();?> &nbsp&nbsp 
	<a href="cart.php" style="color:yellow">Go to Cart</a>-->
	</span>
	
	</div>
	<div id="products_box">
		
		
		<form action="" method="post" enctype="mulipart/form-data">
		
		<table align="center" width="700" bgcolor="lightyellow" height="300">
		<tr align="center">
		<th colspan=4><h2>Register For an Event</h2>
		</th>
		</tr>
		
		<tr>
		<th> Event Name</th>
		<th>Price</th>
		</tr>
		
	<?php 
	global $con;
	$total=0;
	if(isset($_GET['add_event']))
	{
	
	$event_id =$_GET['add_event'];
	
	//$qty_no=0;
	
		$select_pro_price="select * from event where eid='$event_id'";
		$run_pro_price = mysqli_query($con,$select_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price))
		{
		$event_price =array($row_pro_price['eprice']);
		$event_name=$row_pro_price['ename'];
		$event_image=$row_pro_price['eimage'];
		$item_price = $row_pro_price['eprice'];
		$values=array_sum($event_price);
		$total+=$values;		

	?>
	
	<tr align="center" class="row">
	<td><br/><?php echo $event_name;?><br>
	<img src="admin_area/event_images/<?php echo $event_image;?>" width="80" height="70"/>
	</td>
	<?php
	
	
	?>
	
	
	
	<td><br/><br/><?php echo "$<b>".$item_price;"/b"?></td>
	
	</tr>
	
	
	<?php 	
	//end of while loops
	}
	}
	
    $_SESSION['item_price']=$item_price;
	$_SESSION['ename']=$event_name;
	$_SESSION['qty']=1;
	?>
	
	
	<tr align="center">
	<td><input type="submit" name="continue" value="Back To View Events" </td>
	<td><button><a href="event_checkout.php" style="text-decoration:none; color:black;">Pay Now to Register</a></button></td>
	</tr>
	
		</table>
		</form>
		
	
	<?php
	
		
	if(isset($_POST['continue']))
	{
		
	echo "<script>window.open('event.php','_self')</script>";	
	}
	

	
	?>
		
	
</div>

	</div>
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>