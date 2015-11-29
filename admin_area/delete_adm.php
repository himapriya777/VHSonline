<!DOCTYPE>

<html>
	<head>
		<title> Admin Panel</title>
	
	<link rel="stylesheet" href="admin_style.css" media="all"/>
	
	</head>
	
<body>

<table align="center" width="795" bgcolor=FFFFCC>

<tr align="center">
<td colspan="8"><h2> View All Admin Users Here</h2></td>
</tr>

<tr bgcolor=skyblue>
<th>S.No</th>
<th>User Name</th>
<!--<th>Stock</th>-->
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Address</th>
</tr>

<?php
include("../includes/db.php");
$get_pro ="select * from user where utype='admin'";
$run_pro =mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro))

{
	$pro_id =$row_pro['uid'];
	$pro_name= $row_pro['uusername'];
	$pro_fname= $row_pro['ufname'];
	$pro_lname= $row_pro['ulname'];
	$pro_email = $row_pro['uemail'];
	$pro_address= $row_pro['uaddress'];

	$i++;


?>
<tr align="center">

<td><?php echo $i;?></td>
<td><?php echo $pro_name;?></td>
<td><?php echo $pro_fname;?></td>
<td><?php echo $pro_lname;?></td>
<td><?php echo $pro_email;?></td>
<td><?php echo $pro_address;?></td>

<td><a href="delete_admin.php?delete_adm=<?php echo $pro_id?>">Delete</a></td>
</tr>
<?php
}	// end of while
?>
</table>
</body>
</html>