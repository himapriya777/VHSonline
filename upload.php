
  

<html>
	<body>

		<form method="post" enctype="multipart/form-data">
			<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
				<tr> 
					<td width="246">
					<input type="hidden" name="MAX_FILE_SIZE" value="9000000">
					<input name="userfile" type="file" id="userfile"> 
					</td>
				<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
				</tr>
			</table>
		</form>
	
			
	<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);
	if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
	{
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];

		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		$con=mysqli_connect("localhost","root", "", "test_image");
				if(!$con){
					die('Could not connect: ' . mysqli_error());
				}   

		mysqli_query($con,"INSERT INTO test_image(image, name) VALUES('$content', '$fileName')");
		
		
		echo "<br>File $fileName uploaded<br>";
	} 
	?>
	</body>
</html>
