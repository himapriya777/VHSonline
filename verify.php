<?php
include("includes/db.php");


    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username))
    {
        $error = "Username is empty!";
        echo $error;
        return false;
    }
     
    if(empty($password))
    {
        $error = "Password is empty!";
        echo $error;
        return false;
    }
     
			 
	 echo "username is $username <br/>password is $password<br/>";
	
	$qry_string="select * from USER where uusername='$username' and upassword='$password'";
    //$qry = "SELECT * FROM user WHERE uusername='$username' AND upassword='$password'";
    $result = mysqli_query($con,$qry_string); 
	$count=  mysqli_num_rows($result);
   if($count>=1)
   {
	   echo "You logged in Successfully";
	   
   }
   else
   {
	   echo "User does not exist";
   }

	 


?>