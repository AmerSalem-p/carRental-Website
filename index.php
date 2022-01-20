<?php
session_start();
require_once('login/config.php');
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
      <link rel="stylesheet" href="CSS/index.css">
      <script src="https://kit.fontawesome.com/942cff5359.js" crossorigin="anonymous"></script>

       <link rel="shortcut icon" href="https://cdn2.rcstatic.com/images/rclogo/blue/logomark-rclogo_32x32.png" type="image/x-icon" />
    <title>Car Rentals</title

  </head>
  <body>



<nav class="nav-bar">
<h2>Car Rentals<br/>Hello :<?php echo $ename ?></h2>
<ul>
  <li class="list-item Home-page"><a href="#">Home Page</a></li>
  <li class="list-item Cars"><a href="car.php">Cars</a></li>
  <li class="list-item Search"><a href="rentlist.php">Rent-List</a></li>
  <li class="list-item About-us"><a href="about.php">About Us</a></li>
  <li class="list-item sign-in"><a href="login/logout.php">&nbsp Log-Out &nbsp</a></li>

</ul>

</nav>

<section class="section1" style="background-image:url(images/car.jpg)">
  <div>
    <h1>Rent The Best Cars For the Best Prices</h1>
    <a class="button" href="#footer">Contact Us</a>
    <a class="button feature-button" href="#features">&nbsp&nbspFeatures&nbsp&nbsp</a>
  </div>
</section>

<section id="features" class="features">

<div class="row">

  <div class="feature-box">
    <i class="fas fa-dollar-sign icon"></i>
     <h3>Best Prices</h3>
     <p>Rent cars with the best price in town</p>

  </div>

  <div class="feature-box feature2">

    <i class="fas fa-bullseye icon"></i>
    <h3>Elite Clientele</h3>
    <p>We have all the cars, the best cars</p>

  </div>

  <div class="feature-box feature3">
        <i class="fas fa-car icon"></i>
       <h3>Best Cars</h3>
       <p>Rent the best cars in town</p>
  </div>

</div>


</section>


<footer id="footer">

  <i class="fab fa-twitter footerIcon"></i>
  <i class="fab fa-facebook footerIcon"></i>
  <i class="fab fa-instagram footerIcon"></i>
  <i class="far fa-envelope footerIcon"></i>
  <br>
  <a href="#">Email: amersalemsalem2000@yahoo.com</a>
  <br>
  <span>Phone: 0598094977</span>
  <p>© Copyright 2021 Amer's Car Rental</p>

</footer>


  </body>
</html>
