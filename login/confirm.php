<?php
session_start();
require_once('config.php');
$id="";
$ename="";
$result = mysqli_query($link,"SELECT ename FROM users WHERE id='$_SESSION[$id]'");
$row = mysqli_fetch_array($result);
$ename=$row[0];


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/confirm.css">
    <title>cofirm</title>
  </head>
  <body>


<h1>You Have been registered seccessfully</h1>
<label>Your ID :</label><?php echo $_SESSION[$id] ?>
<br>
<label>Your UserName : </label> <?php echo $ename;  ?>
<br>
<br>
<a href="login.php">Login</a>


  </body>
</html>
