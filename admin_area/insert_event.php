<!DOCTYPE>
<?php
include("../includes/db.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>

<body bgcolor="skyblue">

	<form action="insert_event.php" method="post" enctype="multipart/form-data">
		<table align="center" width="795" bgcolor=FFFFCC>
		<tr align="center">
			<td colspan="7"><h2> Add New Event Here</h2></td>
		</tr>
		
			
		<tr> 
		<td align="right"><b>Event Name:</b></td>
		<td><input type="text" name="event_name" size="40" required/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Description:</b></td>
		<td><textarea name="event_desc" cols="25" rows="10"></textarea></td>
		</tr>
		
	    <tr> 
		<td align="right"><b>Event Image:</b></td>
		<td><input type="file" name="event_img" required/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Price:</b></td>
		<td><input type="text" name="event_price" required/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Location</b></td>
		<td><input type="text" name="event_location" required/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Capacity</b></td>
		<td><input type="text" name="event_capacity" required/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event Start Date</b></td>
		<td><input type="text" name="event_sdate" required/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Event End Date</b></td>
		<td><input type="text" name="event_edate" required/></td>
		</tr>
		
		<tr align="center"> 
		<td colspan="7"><input type="submit" name="insert_event" value="Add Event"/></td>
		</tr>
		</table>

	</form>

</body>
</html>

<?php 


	if(isset($_POST['insert_event']))
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
		
		$insert_query_event="insert into event(ename,edescription,eimage,eprice,elocation,ecapacity,esdate,eedate) 
		values('$event_name','$event_desc','$event_img','$event_price','$event_loc','$event_cap','$event_sdate','$event_edate')";
	    
		
		$insert_event=mysqli_query($con,$insert_query_event);
		
		if($insert_event)
		{
			echo "<script>alert('New event added successfully')</script>";
			echo "<script>window.open('admin_index.php?view_event','_self')</script>";
			
		}
		
	}
?>