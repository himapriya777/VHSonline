<?php

include("includes/db.php");

//getting the categories

function getCats()
{
	global $con;
	
	$get_cats="select * from category";	

	$run_cats=mysqli_query($con,$get_cats);	
	
	while($row_cats=mysqli_fetch_array($run_cats))
	{
		
		$cat_id=$row_cats['catid'];
		$cat_name=$row_cats['catname'];
		
		echo "<li><a href='index.php?cat_id=$cat_id'>$cat_name</a></li>";
	}
}


function getPro()
{  	global $con;
	if(!isset($_GET['cat_id']))
	{
	$get_pro = "select * from product order by RAND() LIMIT 0,6"; // to show random 6 on main page
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro))
	{
	$pro_id = $row_pro['pid'];
    //$pro_cat = $row_pro['pcat'];
	$pro_name= $row_pro['pname'];
	$pro_price = $row_pro['pprice'];
	$pro_image = $row_pro['pimage'];
	$pro_name = ucwords($pro_name);
	echo "
		<div id='single_product'>
		<h4> $pro_name </h4>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<p><b>Price $$pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>View Details</a>
		<a href='cart.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
		</div>

	";
	}
	}
	
	else
	{ // to display category specific products 
	if(isset($_GET['cat_id']))
	{
	$cat_id = $_GET['cat_id'];
	$get_cat_pro = "select * from product where pid in (select pid from product_has_category where catid='$cat_id');";
	$run_cat_pro = mysqli_query($con, $get_cat_pro);
	$count_cats =mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0)
	{
	
	echo "<h3 style='padding:20px;'> There are no products available for this category</h3>";	
		
	}
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
	{
	$pro_id = $row_cat_pro['pid'];
    //$pro_cat = $row_cat_pro['pcat'];
	$pro_name= $row_cat_pro['pname'];
	$pro_price = $row_cat_pro['pprice'];
	$pro_image = $row_cat_pro['pimage'];
	$pro_name = ucwords($pro_name);
	
	
	echo "
		<div id='single_product'>
		<h3> $pro_name </h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<p><b>Price $$pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>View Details</a>
		<a href='cart.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
		</div>
    
	";
	
	}
	}
	}
		
}

//get all products to display in all_products.php 

function get_Allproducts()
{
	global $con;
	$get_pro = "select * from product";
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro))
	{
	$pro_id = $row_pro['pid'];
    //$pro_cat = $row_pro['product_cat'];
	$pro_name= $row_pro['pname'];
	$pro_price = $row_pro['pprice'];
	$pro_image = $row_pro['pimage'];
	$pro_name = ucwords($pro_name);
	echo "
		<div id='single_product'>
		<h3> $pro_name </h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<p><b>Price $$pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>View Details</a>
		<a href='cart.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
		</div>

	";
	}
}


//get serach results and show in search_results

function get_searchProducts()
{
	global $con;
	
	if(isset($_GET['search']))
	{
	$search_query=$_GET['user_query'];
	$get_pro = "select * from product where pkeyword like '%$search_query%' ";
	$run_pro = mysqli_query($con, $get_pro);
	$count_cats =mysqli_num_rows($run_pro);
	
	if($count_cats==0)
	{
	
	echo "<h3 style='padding:20px;'> There are no products matching with the given search word.<br>
	Please try with different word.
	
	</h3>";	
		
	}
	while($row_pro=mysqli_fetch_array($run_pro))
	{
	
	$pro_id = $row_pro['pid'];
    //$pro_cat = $row_pro['product_cat'];
	$pro_name= $row_pro['pname'];
	$pro_price = $row_pro['pprice'];
	$pro_image = $row_pro['pimage'];
	$pro_name = ucwords($pro_name);
	echo "
		<div id='single_product'>
		<h3> $pro_name </h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<p><b>Price $$pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>View Details</a>
		<a href='cart.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
		</div>

	";
	}
	}
}


// get events

function getEvents()
{  	global $con;

   date_default_timezone_set("America/Denver");
   //echo date_default_timezone_get();
	$today = date("m/d/y");
	//echo $today;
	$get_pro = "select * from event WHERE eedate >='$today'"; // to show random 6 on main page
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro))
	{
	$event_id = $row_pro['eid'];
    //$pro_cat = $row_pro['pcat'];
	$event_name= $row_pro['ename'];
	$event_desc= $row_pro['edescription'];
	$event_image = $row_pro['eimage'];
	$event_price = $row_pro['eprice'];
	$event_loc = $row_pro['elocation'];
	$event_cap = $row_pro['ecapacity'];
	$event_sdate = $row_pro['esdate'];
	$event_edate = $row_pro['eedate'];
	
	echo "
		<div id='single_product'>
		<h4> $event_name </h4>
		<img src='admin_area/event_images/$event_image' width='180' height='180'/>
		<p><b>Price $$event_price</b></p>
		<p><b>Event Start Date $event_sdate</b></p>
		<p><b>Event End Date $event_edate</b></p>
		<a href='event_details.php?event_id=$event_id' style='float:left;'>View Details</a>
		<a href='event_cart.php?add_event=$event_id'><button style='float:right;'>Register</button></a>
		</div>

	";
	}

	
}

// To get user ip
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//insert add to cart list into cart table
function cart()
{
	global $con;
	$ip =getIp();
	
	if(isset($_GET['add_cart']))
	{
	
	$pro_id =$_GET['add_cart'];
	
	//check and allow one product type use can add once

	$check_pro = "select * from cart where ip_add='$ip' AND pro_id='$pro_id'";
		
	$run_check = mysqli_query($con,$check_pro);
	$count =mysqli_num_rows($run_check);
	if($count >0)
	{
		echo "";
	}
	else
	{   
		
		$insert_pro = "insert into cart(pro_id,ip_add,qty) values('$pro_id','$ip','1')";
		$run_pro = mysqli_query($con,$insert_pro);
		
		echo "<script>window.open('index.php','_self')</script>";
	}
}
}

//getting the total items from the cart
function total_items()
{	
	$count_items=0;
	
	if(isset($_GET['add_cart']))
	{
		global $con;
		$ip=getIp();
		$get_items ="select * from cart where ip_add='$ip'";
		
		$run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
		
	}
	
	else{ //if home page clicked after add to cart still need t be updated
		global $con;
		$ip=getIp();
		$get_items ="select * from cart where ip_add='$ip'";
		
		$run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	
	echo $count_items;
}


//getting the total price from the cart table
function total_price()
{	
	global $con;
	$ip=getIp();
	$total=0;
	$select_cart_query ="select * from cart where ip_add='$ip'";
	
	$run_cart_query=mysqli_query($con,$select_cart_query);
	
	while($row_cart=mysqli_fetch_array($run_cart_query))
	{
		$pro_id =$row_cart['pro_id'];
		
		$select_pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price = mysqli_query($con,$select_pro_price);
		while($row_pro_price=mysqli_fetch_array($run_pro_price))
		{
		$product_price =array($row_pro_price['product_price']);
		$values=array_sum($product_price);
		$total+=$values;		
		}
	}
	
	echo $total;
}





?>