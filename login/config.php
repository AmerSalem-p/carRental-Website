<?php
define('DBHOST', 'localhost');
define('DBNAME', 'user');
define('DBUSER', 'testuser');
define('DBPASS', 'mypassword');
define('DBCONNSTRING','mysql:dbname=user;charset=utf8mb4;');
$link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
