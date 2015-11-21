<!DOCTYPE>
<html>

<body>

<form action="ex.php" method="post" enctype="multipart/form-data">
<input type="file" name="image">
<input type="submit" name="submit" value="Upload">
</form>

<?php 
if(isset($_POST['submit']))
{

	$imageName = mysqli_real_escape_string($_FILES['image']['name']);
	$imageType =  mysqli_real_escape_string($_FILES['image']['type']);
//$query = "INSERT INTO image (image,id) VALUES('$image','')";  

if(substr($imageType,0,5))
{
	echo "accepted";
}
else
{
	echo "Only image type is accepted";
}
}


?>


</body>

</html>