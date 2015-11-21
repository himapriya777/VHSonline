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
		<th colspan=4><h2>Checkout</h2>
		</th>
		</tr>
		
		<tr>
		<th> Products</th>
		<th>Quantity </th>
		<th>Price</th>
		
		</tr>
		
	<?php 
	global $con;
	$total=0;
	if(isset($_GET['add_cart']))
	{
	$pro_id =$_GET['add_cart'];
	$qty=1;
	if(!isset($_SESSION['cart'])){
    session_start();
    $_SESSION['cart'][]=$pro_id ;
    }
	
	//$cart=$_SESSION['cart'];
	print_r($_SESSION['cart']);
	//$_SESSION['cart'][] = $pro_id;
	//$qty_no=0;
	print_r($_SESSION['cart']);
	
	
		$select_pro_price="select * from product where pid='$pro_id'";
		$run_pro_price = mysqli_query($con,$select_pro_price);
		
		while($row_pro_price=mysqli_fetch_array($run_pro_price))
		{
		$product_price =array($row_pro_price['pprice']);
		$product_name=$row_pro_price['pname'];
		$product_image=$row_pro_price['pimage'];
		$item_price = $row_pro_price['pprice'];
		$values=array_sum($product_price);
		$total+=$values;		

	?>
	
	<tr align="center" class="row">

	
	<td><br/><?php echo $product_name;?><br>
	<img src="admin_area/product_images/<?php echo $product_image;?>" width="80" height="70"/>
	</td>
	<td><br/><br/>
	<input type="text" size="4" name="qty" value="<?php if (isset($_POST['qty'])) { echo $_POST['qty']; } else { echo $qty;}  ?>"/>
	</td>

	<!-- <input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td> -->
	<?php
	
	global $con;
	if(isset($_POST['update_cart']) ? $_POST['update_cart'] : "")
	{
		$qty= $_POST['qty'];
		//$update_qty ="update cart set cquantity='$qty'";
		//$run_qty_query=mysqli_query($con,$update_qty);
		$total = $total*$qty;
		
	}
	
	?>
	
	
	
	<td><br/><br/><?php echo "$".$item_price;?></td>
	
	</tr>
	
	
	<?php 	
	//end of while loops
	}
    //}
	}
    $_SESSION['item_price']=$item_price;
	$_SESSION['pname']=$product_name;
	$_SESSION['qty']=$qty;
	?>
	<tr align="right">
	<td colspan="4"><b>Total:</b></td>
	<td> <?php echo "$".$total; ?> </td>
	</tr>
	
	<tr align="center">
	<td><input type="submit" name="continue" value="Back To Shopping" </td>
	<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
	<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
	</tr>
	
		</table>
		</form>
		
	
	<?php
	
		
	if(isset($_POST['continue']))
	{
		
	echo "<script>window.open('index.php','_self')</script>";	
	}
	

	
	?>
		
	
</div>

	</div>
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>