<!DOCTYPE>

<html>
	<head>
		<title> Admin Panel</title>
	
	<link rel="stylesheet" href="admin_style.css" media="all"/>
	
	</head>
	
<body>

<table align="center" width="795" bgcolor=FFFFCC>

<tr align="center">
<td colspan="8"><h2> View All Events Here</h2></td>
</tr>

<tr bgcolor=skyblue>
<th>S.No</th>
<th>Name</th>
<th>Description</th>
<!--<th>Stock</th>-->
<th>Price</th>
<th>Location</th>
<th>Capacity</th>
<th>Image</th>
<!--<th>Keywords</th>-->
</tr>

<?php
include("../includes/db.php");
$get_pro ="select * from event";
$run_pro =mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro))

{
	$pro_id =$row_pro['eid'];
	$pro_name= $row_pro['ename'];
	$pro_desc= $row_pro['edescription'];
	$pro_price = $row_pro['eprice'];
	$pro_location = $row_pro['elocation'];
	$pro_capacity = $row_pro['ecapacity'];
	$pro_image = $row_pro['eimage'];
	$i++;


?>
<tr align="center">

<td><?php echo $i;?></td>
<td><?php echo $pro_name;?></td>
<td><?php echo $pro_desc;?></td>
<td><?php echo '$'.$pro_price;?></td>
<td><?php echo $pro_location;?></td>
<td><?php echo $pro_capacity;?></td>
<td><img src="event_images/<?php echo $pro_image;?>" width="60" height="60"/></td>

</tr>
<?php
}	// end of while
?>
</table>
</body>
</html>