<!DOCTYPE>
<?php
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
		<div id="products_box_view">
		
		<?php
		// to display individual product details in details.php
		if(isset($_GET['pro_id']))
		{
			$product_id = $_GET['pro_id'];
			
			
			$get_pro = "select * from products where product_id='$product_id '";
			$run_pro = mysqli_query($con, $get_pro);
	
			while($row_pro=mysqli_fetch_array($run_pro))
			{
			$pro_id = $row_pro['product_id'];
			$pro_name= $row_pro['product_name'];
			$pro_price = $row_pro['product_price'];
			$pro_image = $row_pro['product_image'];
			$pro_name = ucwords($pro_name);
			$pro_desc =$row_pro['product_desc'];
			echo "
			<div id='single_product'>
			<h3> $pro_name </h3>
			<img src='admin_area/product_images/$pro_image' width='400' height='300'/>
			<p><b>Price $$pro_price</b></p>
			<p>$pro_desc</p>
			<a href='index.php' style='float:left;'>Go Back</a>
			<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
			</div>";
		}
			
			
		}
			
		?>
	</div>

	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>