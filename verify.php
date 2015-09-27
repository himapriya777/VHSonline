<?php


    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'admin' && $password == 'admin1') {
        //echo 'Admin login succesful.';
		header("Location: ./admin_area/admin_details.php");
        die();
        
    } else if($username == 'user' && $password == 'user1') {
       header("Location: ./index.php");
        die();
       
    }

    echo 'Invalid username/password combination.';

?>
