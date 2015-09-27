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
	
	<div id="sidebar_title">Categories</div>
	
	<ul id="cats">
	<?php getCats(); ?>
	
	</ul>
	
	
	</div>
	
	<div id="content_area"> 
	<div id="shopping_cart"> 
	
	<span style="float:right; font-size:18px;padding:5px;line-height:25px">
	Welcome Guest! &nbsp&nbsp
	<b style="color:yellow">Shopping Cart -</b> 
	Total Items: <?php total_items();?>&nbsp&nbsp
	Total Price: $<?php total_price();?> &nbsp&nbsp
	</span>
	
	</div>
	<?php cart(); ?>
		<div id="products_box">
		
		<form action="" method="post" enctype="mulipart/form-data">
		
		<table align="center" width="700" bgcolor="lightyellow">
		<tr align="center">
		<th colspan=4><h2>Update or Checkout</h2>
		</th>
		</tr>
		
		<tr>
		<th>Remove</th>
		<th> Products</th>
		<th>Quantity </th>
		<th>Price</th>
		
		</tr>
		
	<?php 
	global $con;
	$ip=getIp();
	$total=0;
	//$qty_no=0;
	$select_cart_query ="select * from cart where ip_add='$ip'";
	
	$run_cart_query=mysqli_query($con,$select_cart_query);
	
	while($row_cart=mysqli_fetch_array($run_cart_query))
	{
		$pro_id =$row_cart['pro_id'];
		//$qty_no=$row_cart['qty'];
		$select_pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price = mysqli_query($con,$select_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price))
		{
		$product_price =array($row_pro_price['product_price']);
		$product_name=$row_pro_price['product_name'];
		$product_image=$row_pro_price['product_image'];
		$item_price = $row_pro_price['product_price'];
		$values=array_sum($product_price);
		$total+=$values;		
	
	?>
	
	<tr align="center" class="row">

	<td>	<br/><br/><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
	<td><br/><?php echo $product_name;?><br>
	<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
	</td>
	<td><br/><br/><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'];?>"/></td>
	<?php
	
	global $con;
	if(isset($_POST['update_cart']))
	{
		$qty= $_POST['qty'];
		$update_qty ="update cart set qty='$qty'";
		$run_qty_query=mysqli_query($con,$update_qty);
		$_SESSION['qty']=$qty;
	
		$total = $total*$qty;
	
	}
	
	?>
	
	
	
	<td><br/><br/><?php echo "$".$item_price;?></td>
	
	</tr>
	
	
	<?php 	
	//end of while loops
	}
	}
	?>
	<tr align="right">
	<td colspan="4"><b>Sub Total:</b></td>
	<td> <?php echo "$".$total; ?> </td>
	</tr>
	
	<tr align="center">
	<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
	<td><input type="submit" name="continue" value="Continue Shopping" </td>
	<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
	</tr>
	
		</table>
		</form>
		
	
	<?php
	
	function updatecartRemove()
	{
	global $con;
	$ip=getIp();
	

	if(isset($_POST['update_cart']))
	{
		
		foreach($_POST['remove'] as $remove_id)
		{
		
		$delete_cart_query ="delete from cart where pro_id='$remove_id' AND ip_add='$ip'";

		$run_cart_query=mysqli_query($con,$delete_cart_query);
		if($run_cart_query)
		{
		echo "<script>window.open('cart.php','_self')</script>";	
					
		}			
			
			
		}
		
	}
	}
	
	if(isset($_POST['continue']))
	{
		
	echo "<script>window.open('index.php','_self')</script>";	
	}
	
		echo @$up_cart=updatecartRemove(); //@ when it is not active it won't genrate error

	
	?>
		
	</div>

	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>