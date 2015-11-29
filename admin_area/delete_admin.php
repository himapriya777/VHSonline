<?php
include("../includes/db.php");
if(isset($_GET['delete_adm']))
{

$delete_id=$_GET['delete_adm'];

$delete_pro ="delete from user where uid='$delete_id'";
$run_delete=mysqli_query($con,$delete_pro);



//delete from product where pid=6;
if($run_delete)
{
	echo "<script>alert('Admin user has been deleted')</script>";
	echo "<script>window.open('admin_index.php?view_admin','_self')</script>";
			
}
}




?>