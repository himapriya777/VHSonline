<?php
session_start();

if(!isset($_SESSION['admin_name']))
{
	echo "<script>window.open('admin_login.php?not_admin=You are not a Admin user','_self')</script>";
	
}
else
{
   // $_SESSION['admin_name']=$_GET['uname'];
?>

<!DOCTYPE>

<html>
	<head>
		<title> Admin Panel</title>
	
	<link rel="stylesheet" href="admin_style.css" media="all"/>
	
	</head>
	
<body>

<div class="main_wrapper">

<div id="header"></div>
<div id="right">

<a href="admin_index.php?add_product">Add New Product</a>
<a href="admin_index.php?view_product">View All Products </a>
<a href="admin_index.php?edit_product">Edit Product </a>

<?php
if($_SESSION['admin_type']=='madmin')
{
echo "<a href='admin_index.php?delete_product'>Delete Product </a>";
}
?>
<hr>

<a href="admin_index.php?add_event">Add New Event</a>
<a href="admin_index.php?view_event">View All Events</a>
<a href="admin_index.php?edit_event">Edit Event </a>
<?php
if($_SESSION['admin_type']=='madmin')
{
echo "<a href='admin_index.php?delete_event'>Delete Event </a>";
echo "<hr>";
echo "<a href='admin_index.php?add_admin'>Add New Admin User</a>";
echo "<a href='admin_index.php?view_admin'>View All Admin Users</a>";
echo "<a href='admin_index.php?delete_admin'>Delete Admin User</a>";

}
?>
<hr>
<a href="admin_logout.php"><b>Admin Logout</b></a>
</div>

<div id="left">

<?php
// for product
if(isset($_GET['add_product']))
{
	include("insert_product.php");
}
if(isset($_GET['view_product']))
{
	include("view_product.php");
}
if(isset($_GET['edit_product']))
{
	include("edit_pro.php");
}
if(isset($_GET['delete_product']))
{
	include("delete_pro.php");
}
if(isset($_GET['edit_pro']))
{
	include("edit_product.php");
}
if(isset($_GET['delete_pro']))
{
	include("delete_product.php");
}

// for event
if(isset($_GET['add_event']))
{
	include("insert_event.php");
}
if(isset($_GET['view_event']))
{
	include("view_event.php");
}
if(isset($_GET['edit_event']))
{
	include("edit_eve.php");
}
if(isset($_GET['delete_event']))
{
	include("delete_eve.php");
}
if(isset($_GET['edit_eve']))
{
	include("edit_event.php");
}
if(isset($_GET['delete_eve']))
{
	include("delete_event.php");
}

// for admin user
if(isset($_GET['add_admin']))
{
	include("insert_admin.php");
}
if(isset($_GET['view_admin']))
{
	include("view_admin.php");
}
if(isset($_GET['delete_admin']))
{
	include("delete_adm.php");
}
if(isset($_GET['delete_adm']))
{
	include("delete_admin.php");
}

?>

</div>



</div>

</body>
</html>
<?php
} // end of else
?>