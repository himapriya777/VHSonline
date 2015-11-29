<!DOCTYPE>
<?php
include("../includes/db.php");

if(isset($_GET['edit_pro']))
{
	$get_id=$_GET['edit_pro'];
	
	$get_pro = "select * from product where pid='$get_id'";
	$run_pro =mysqli_query($con,$get_pro);
	
	
   $row_pro=mysqli_fetch_array($run_pro);

	$pro_id =$row_pro['pid'];
	$pro_name= $row_pro['pname'];
	$pro_stock= $row_pro['pstock'];
	$pro_desc= $row_pro['pdescription'];
	$pro_sprice = $row_pro['psaleprice'];
	$pro_price = $row_pro['pprice'];
	$product_image = $row_pro['pimage'];
	$pro_keyword=  $row_pro['pkeyword'];
	

}
?>

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
		<td align="right"><b>Product Name:</b></td>
		<td><input type="text" name="product_name" size="60" value="<?php echo $pro_name;?>"/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Description:</b></td>
		<td><textarea name="product_desc" cols="25" rows="10"><?php echo $pro_desc;?></textarea></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Stock:</b></td>
		<td><input type="text" name="product_stock" size="40" value="<?php echo $pro_stock;?>"/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Price:</b></td>
		<td><input type="text" name="product_price" value="<?php echo $pro_price;?>"/></td>
		</tr>
		<tr> 
		<td align="right"><b>Product Sales Price:</b></td>
		<td><input type="text" name="product_sprice" value="<?php echo $pro_sprice;?>"/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Image:</b></td>
		<td><input type="file" name="product_img"/><img src="product_images/<?php echo $product_image?>" width="60" height="60"/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Keywords:</b></td>
		<td><input type="text" name="product_keywords" size="50" value="<?php echo $pro_keyword;?>"/></td>
		</tr>
		
		<tr align="center"> 
		<td colspan="7"><input type="submit" name="update_post" value="Update Product"/></td>
		</tr>
		</table>

	</form>

</body>
</html>

<?php 


	if(isset($_POST['update_post']))
	{
		//getting text data from fields
		$product_name=$_POST['product_name'];
		$product_desc=$_POST['product_desc'];
		$product_stock=$_POST['product_stock'];
		$product_price=$_POST['product_price'];
		$product_sprice=$_POST['product_sprice'];
		$product_keywords=$_POST['product_keywords'];
		
		//getting the image from the fields
		$product_img=$_FILES['product_img']['name'];
		$product_img_tmp=$_FILES['product_img']['tmp_name'];
		move_uploaded_file($product_img_tmp,"product_images/$product_img");
		
		$update_product="update product set pname='$product_name',
		pdescription='$product_desc',pstock='$product_stock',psaleprice='$product_sprice',
		pprice='$product_price',pimage='$product_img',pkeyword='$product_keywords' where pid='$pro_id'";
	    
		$run_pro =mysqli_query($con,$update_product);
		
		if($run_pro)
		{
			echo "<script>alert('Product Updated Successfully')</script>";
			echo "<script>window.open('admin_index.php?view_product','_self')</script>";
			
		}
		
	}
?>