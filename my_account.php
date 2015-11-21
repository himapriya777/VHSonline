<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>
<html>
	<head>
		<title> VHS Online Store</title>
	
	<link rel="stylesheet" href="styles/style.css" media="all"/>
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
	
	<div id="sidebar"> 
	
	<div id="sidebar_title">Categories</div>
	
	<ul id="cats">
	<?php getCats(); ?>
	
	</ul>
	
	
	</div>
	
	<div id="content_area"> 
	
    <h2> Hi </h2>

	</div>
	<!-- Content wrapper ends here -->
	
	<?php include("includes/footer.html"); ?>
	
	</div>
	<!-- Main container ends here -->



</body>
</html>