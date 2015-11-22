<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>

	<?php
				//CONNECT TO DATABASE USING PHP
			$con=mysqli_connect("localhost","root", "", "test_image");
			if(!$con){
				die('Could not connect: ' . mysqli_error());
			}    			
			
			$sql = "SELECT image FROM test_image WHERE id = 9";
			$res = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($res);
			$data = $row['image'];
			echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" />';
			
			
			
			mysqli_close($con);
			
			?>
			
		

</body>
</html>
