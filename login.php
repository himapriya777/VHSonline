<!DOCTYPE>
<?php
include("functions/functions.php");
?>
<html>
	<head>
		<title> VHS Online Store</title>
	
	<link rel="stylesheet" href="styles/style.css" media="all"/>
		<link rel="stylesheet" href="styles/bootstrap.css" media="all"/>
	<LINK REL="SHORTCUT ICON" HREF="images/vhs_icon.png"/>
	</head>
	
<body>
	<!-- Main container starts here -->
	<div class="main_wrapper">
	
	<!-- Header starts here -->
	<?php include("includes/header.html"); ?>
	<!-- Header ends here -->	
	
	

	<!-- Content wrapper starts here -->
	<div class="content_wrapper">
	
	<div id="login_area"> 
		<form action="verify.php" method="post" accept-charset="UTF-8">
		  <div class="form-group">
			<label for="username">Username</label>
			<input type="username" class="form-control" id="username" name="username" placeholder="Username">
		  </div>
		  <div class="form-group">
			<label for="pasword">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		  </div>
		  <div class="checkbox">
			<label>
			  <input type="checkbox"> Remember me
			</label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	
	<!-- Content wrapper ends here -->
	<?php include("includes/footer.html"); ?>
	</div>
	<!-- Main container ends here -->

</body>
</html>
