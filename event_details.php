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
	
	
		
	
	</div>
		
	<div id="content_area"> 
		<div id="products_box_view">
		
		<?php
		// to display individual product details in details.php
		if(isset($_GET['event_id']))
		{
			$event_id = $_GET['event_id'];
			
			
			$get_pro = "select * from event where eid='$event_id '";
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
			<h3> $event_name </h3>
			<img src='admin_area/event_images/$event_image' width='400' height='300'/>
			<p><b>Price $$event_price</b></p>
			<p>$event_desc</p>
			<a href='event.php' style='float:left;'>Go Back</a>
			<a href='event_cart.php?add_event=$event_id'><button style='float:right;'>Register</button></a>
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