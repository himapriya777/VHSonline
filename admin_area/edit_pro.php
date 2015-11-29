<!DOCTYPE>

<html>
	<head>
		<title> Admin Panel</title>
	
	<link rel="stylesheet" href="admin_style.css" media="all"/>
	
	</head>
	
<body>

<table align="center" width="795" bgcolor=FFFFCC>

<tr align="center">
<td colspan="8"><h2> View All Products Here</h2></td>
</tr>

<tr bgcolor=skyblue>
<th>S.No</th>
<th>Name</th>
<th>Description</th>
<!--<th>Stock</th>-->
<th>Saleprice</th>
<th>Price</th>
<th>Image</th>
<!--<th>Keywords</th>-->
</tr>

<?php
include("../includes/db.php");
$get_pro ="select * from product";
$run_pro =mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro))

{
	$pro_id =$row_pro['pid'];
	$pro_name= $row_pro['pname'];
	$pro_stock= $row_pro['pstock'];
	$pro_desc= $row_pro['pdescription'];
	$pro_sprice = $row_pro['psaleprice'];
	$pro_price = $row_pro['pprice'];
	$pro_image = $row_pro['pimage'];
	$pro_keyword=  $row_pro['pkeyword'];
	$i++;


?>
<tr align="center">

<td><?php echo $i;?></td>
<td><?php echo $pro_name;?></td>
<td><?php echo $pro_desc;?></td>
<!--<td><?php echo $pro_stock;?></td>-->
<td><?php echo '$'.$pro_sprice;?></td>
<td><?php echo '$'.$pro_price;?></td>
<td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
<!--<td><?php echo $pro_keyword;?></td>-->

<td><a href="admin_index.php?edit_pro=<?php echo $pro_id;?>">Edit</a></td>
</tr>
<?php
}	// end of while
?>
</table>
</body>
</html>