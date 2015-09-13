<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>

<body bgcolor="skyblue">

	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="750" bgcolor=pink>
		<tr align="center">
			<td colspan="7"><h2> Insert New Product Here</h2></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Category:</b></td>
		<td>
		<select name="product_cat" required>
		<option>Select a Category</option>
		<?php
		$get_cats="select * from categories";	
		$run_cats=mysqli_query($con,$get_cats);	
		while($row_cats=mysqli_fetch_array($run_cats))
		{
		$cat_id=$row_cats['cat_id'];
		$cat_name=$row_cats['cat_name'];
		
		echo "<option value='$cat_id'>$cat_name</option>";
		}
		?>
		
		</select>
		</td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Name:</b></td>
		<td><input type="text" name="product_name" size="40" required/></td>
		</tr>
		<tr> 
		<td align="right"><b>Product Price:</b></td>
		<td><input type="text" name="product_price" required/></td>
		</tr>
		<tr> 
		<td align="right"><b>Product Sales Price:</b></td>
		<td><input type="text" name="product_sprice" required/></td>
		</tr>
		<tr> 
		<td align="right"><b>Product Description:</b></td>
		<td><textarea name="product_desc" cols="25" rows="10"></textarea></td>
		</tr>
		<tr> 
		<td align="right"><b>Product Image:</b></td>
		<td><input type="file" name="product_img" required/></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Keywords:</b></td>
		<td><input type="text" name="product_keywords" size="50" required/></td>
		</tr>
		
		<tr align="center"> 
		<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
		</tr>
		</table>

	</form>

</body>
</html>

<?php 


	if(isset($_POST['insert_post']))
	{
		//getting text data from fields
		$product_cat=$_POST['product_cat'];
		$product_name=$_POST['product_name'];
		$product_price=$_POST['product_price'];
		$product_sprice=$_POST['product_sprice'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keywords'];
		
		//getting the image from the fields
		$product_img=$_FILES['product_img']['name'];
		$product_img_tmp=$_FILES['product_img']['tmp_name'];
		move_uploaded_file($product_img_tmp,"product_images/$product_img");
		
		$insert_products="insert into products(product_cat,product_name,product_price,product_sellprice,product_desc,product_image,product_keywords) values('$product_cat','$product_name','$product_price','$product_sprice','$product_desc','$product_img','$product_keywords')";
	    
		$insert_prod=mysqli_query($con,$insert_products);
		if($insert_prod)
		{
			echo "<script>alert('New product added successfully')</script>";
			echo "<script>window.open('insert_product.php','_self')</script>";
			
		}
	}
?>