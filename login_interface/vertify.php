<?php    
$username = $_POST['username'];
$password = $_POST['password'];
    
if($username == 'admin' && $password == 'admin1') {
    echo 'Admin login successful.';
    session_start();
    return true;
} else if($username == 'user' && $password == 'user1') {
    echo 'User login successful.';
    session_start();
    return true;
}

echo 'Invalid username/password combination.';
return false;
?>
