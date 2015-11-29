<?php
include("../includes/db.php");
if(isset($_GET['delete_pro']))
{

$delete_id=$_GET['delete_pro'];

$delete_pro_cat ="delete from product_has_category where pid='$delete_id'";
$run_delete_cat=mysqli_query($con,$delete_pro_cat);

$delete_pro ="delete from product where pid='$delete_id'";
$run_delete=mysqli_query($con,$delete_pro);



//delete from product where pid=6;
if($run_delete)
{
	echo "<script>alert('Product has been deleted')</script>";
	echo "<script>window.open('admin_index.php?view_product','_self')</script>";
			
}
}




?>