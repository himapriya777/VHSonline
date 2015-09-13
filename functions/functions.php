<?php

$con=mysqli_connect("localhost","root","","vhsonline");

//getting the categories

function getCats()
{
	global $con;
	$get_cats="select * from categories";	

	$run_cats=mysqli_query($con,$get_cats);	
	
	while($row_cats=mysqli_fetch_array($run_cats))
	{
		$cat_id=$row_cats['cat_id'];
		$cat_name=$row_cats['cat_name'];
		
		echo "<li><a href='#'>$cat_name</a></li>";
	}
}

function getPro()
{   global $con;
	$get_pro = "select * from products order by RAND() LIMIT 0,6";
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro))
	{
	$pro_id = $row_pro['product_id'];
    $pro_cat = $row_pro['product_cat'];
	$pro_name= $row_pro['product_name'];
	$pro_price = $row_pro['product_price'];
	$pro_image = $row_pro['product_image'];
	$pro_name = ucwords($pro_name);
	echo "
		<div id='single_product'>
		<h3> $pro_name </h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<p><b>Price $$pro_price</b></p>
		<a href='details.php' style='float:left;'>View Details</a>
		<a href='cart.php'><button style='float:right;'>Add to Cart</button></a>
		</div>

	";
	}
	
}

?>