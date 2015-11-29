<?php
include("../includes/db.php");
if(isset($_GET['delete_eve']))
{

$delete_id=$_GET['delete_eve'];

$delete_pro ="delete from event where eid='$delete_id'";
$run_delete=mysqli_query($con,$delete_pro);



if($run_delete)
{
	echo "<script>alert('Event has been deleted')</script>";
	echo "<script>window.open('admin_index.php?view_event','_self')</script>";
			
}
}




?>