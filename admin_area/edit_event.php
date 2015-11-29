
<?php
include("../includes/db.php");

if(isset($_GET['edit_eve']))
{
	$get_id=$_GET['edit_eve'];
	
	$get_pro = "select * from event where eid='$get_id'";
	$run_pro =mysqli_query($con,$get_pro);
	$row_pro=mysqli_fetch_array($run_pro);

	$pro_id =$row_pro['eid'];
	$pro_name= $row_pro['ename'];
	$pro_desc= $row_pro['edescription'];

	$pro_price = $row_pro['eprice'];
	$product_image = $row_pro['eimage'];
	
	$pro_location = $row_pro['elocation'];
	$pro_capacity = $row_pro['ecapacity'];
    $pro_start = $row_pro['esdate'];
	$pro_end = $row_pro['eedate'];
}
?>
<!DOCTYPE>
<html>
	<head>
		<title>Update Product</title>
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>

<body bgcolor="skyblue">

	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="795" bgcolor=FFFFCC>
		<tr align="center">
			<td colspan="7"><h2> Edit & Update Product Here</h2></td>
		</tr>
		
		
		<tr> 
		<td align="right"><b>Event Name:</b></td>
		<td><input type="text" name="event_name" size="40" value='<?php echo $pro_name?>'/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Description:</b></td>
		<td><textarea name="event_desc" cols="25" rows="10"><?php echo $pro_desc?></textarea></td>
		</tr>
		
	    <tr> 
		<td align="right"><b>Event Image:</b></td>
		<td><input type="file" name="event_img" required/><img src="event_images/<?php echo $product_image?>" width="60" height="60"/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Price:</b></td>
		<td><input type="text" name="event_price" value='<?php echo $pro_price?>'/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Location</b></td>
		<td><input type="text" name="event_location" value='<?php echo $pro_location?>'/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Capacity</b></td>
		<td><input type="text" name="event_capacity" value='<?php echo $pro_capacity?>'/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Start Date</b></td>
		<td><input type="text" name="event_sdate" value='<?php echo $pro_start?>'/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event End Date</b></td>
		<td><input type="text" name="event_edate" value='<?php echo $pro_end?>'/></td>
		</tr>
		
		<tr align="center"> 
		<td colspan="7"><input type="submit" name="update_event" value="Update Event"/></td>
		</tr>
		</table>

	</form>


</body>
</html>

<?php 


	if(isset($_POST['update_event']))
	{
		//getting text data from fields
		
		
	  $event_name= $_POST['event_name'];
	  $event_desc= $_POST['event_desc'];
	  //$event_img = $_POST['event_image'];
	  $event_price = $_POST['event_price'];
	  $event_loc = $_POST['event_location'];
	  $event_cap = $_POST['event_capacity'];
	  $event_sdate = $_POST['event_sdate'];
	  $event_edate = $_POST['event_edate'];
		
		//getting the image from the fields
		$event_img=$_FILES['event_img']['name'];
		$event_img_tmp=$_FILES['event_img']['tmp_name'];
		move_uploaded_file($event_img_tmp,"event_images/$event_img");
		
		$update_product="update event set ename='$event_name',
		edescription='$event_desc',eimage='$event_img',eprice='$event_price',elocation='event_loc',
		ecapacity='$event_cap', esdate='$event_sdate', eedate='$event_edate'
		 where eid='$pro_id'";
	    
		$run_pro =mysqli_query($con,$update_product);
		
		if($run_pro)
		{
			echo "<script>alert('Event Updated Successfully')</script>";
			echo "<script>window.open('admin_index.php?view_event','_self')</script>";
			
		}
	}
?>