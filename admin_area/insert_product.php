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
		$get_cats="select * from category";	
		$run_cats=mysqli_query($con,$get_cats);	
		while($row_cats=mysqli_fetch_array($run_cats))
		{
		$cat_id=$row_cats['catid'];
		$cat_name=$row_cats['catname'];
		
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
		<td align="right"><b>Product Description:</b></td>
		<td><textarea name="product_desc" cols="25" rows="10"></textarea></td>
		</tr>
		
		<tr> 
		<td align="right"><b>Product Stock:</b></td>
		<td><input type="text" name="product_stock" size="40"/></td>
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
		$cat_id=$_POST['product_cat'];
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
		
		$insert_products="insert into product(pname,pdescription,pstock,psaleprice,pprice,pimage,pkeyword) values('$product_name','$product_desc','$product_stock','$product_sprice','$product_price','$product_img','$product_keywords')";
	    
		
		$insert_prod=mysqli_query($con,$insert_products);
		$get_pid_query = "select pid from product where pname='$product_name'";
		echo $get_pid_query;
		$get_pid=mysqli_query($con,$get_pid_query);
		
		//$run_pro = mysqli_query($con, $get_pro);
	//$count_cats =mysqli_num_rows($get_pid);
	

	while($row_pro=mysqli_fetch_array($get_pid))
	{
     $pro_id = $row_pro['pid'];		
	}
	
		$insert_relation = "insert into product_has_category(pid,catid) values ('$pro_id','$cat_id')";
		mysqli_query($con,$insert_relation);
		if($insert_prod)
		{
			echo "<script>alert('New product added successfully')</script>";
			echo "<script>window.open('insert_product.php','_self')</script>";
			
		}
		
	}
?>