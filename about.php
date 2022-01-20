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
      <link rel="stylesheet" href="CSS/about.css">
      <script src="https://kit.fontawesome.com/942cff5359.js" crossorigin="anonymous"></script>

       <link rel="shortcut icon" href="https://cdn2.rcstatic.com/images/rclogo/blue/logomark-rclogo_32x32.png" type="image/x-icon" />
    <title>Car Rentals</title

  </head>
  <body>



<nav class="nav-bar">
<h2>Car Rentals<br/>Hello :<?php echo $ename ?></h2>
<ul>
  <li class="list-item Home-page"><a href="index.php">Home Page</a></li>
  <li class="list-item Cars"><a href="car.php">Cars</a></li>
  <li class="list-item Search"><a href="rentlist.php">Rent-List</a></li>
  <li class="list-item sign-in"><a href="login/logout.php">&nbsp Log-Out &nbsp</a></li>
</ul>

</nav>



<section class="agency">

  <h1>About Car Rental</h1>
  <p>Founded in 2021 in <strong>Palestine,</strong> car reantal was a small local website and has grown to be one of the world's best car rental. <strong>We make it easy for you to rent your desired car</strong>  </p>
  <p>Car rental has Won an award for being the best online car renting in the world ,<strong>its availble in 50 countries.</strong></p>
  <p>with car rental all you have to do it pick a car and we will deliver it to you no matter where you are</p>

</section>

<section class="city" style="background-image:url(images/world.jpg)">

<p>Car rental is based in Palestine, and is supported internationally in over 50 countries around the world: Accra - Amman - Amsterdam - Antalya - Athens - Atlanta - Auckland - Bangalore - Bangkok - Barcelona - Beijing - Berlin - Bilbao - Bogotá - Bolzano - Bordeaux - Boston - Bratislava - Brisbane - Bristol - Brussels - Bucharest - Budapest - Buenos Aires - Cairo - Calgary - Cambridge - Cancún - Cape Town - Casablanca - Catania - Chengdu - Chicago - Colombo - Copenhagen - Dallas - Denver -  los Angeles -  Madrid - Málaga - Manchester - Manila - Marrakech - Melbourne - Mexico City - Miami - Milan - Montpellier - Montréal - Moscow - Mumbai - Munich - Naha - Nairobi - Natal - New Delhi - New Orleans - New York - Nice - Norwalk - Orlando - Osaka - Oslo - Palma de Mallorca - Panama City - Paris - Phoenix - Phuket - Porto Alegre - Prague - Qingdao - Rennes - Reykjavík - Riga - Rimini - Rio de Janeiro - Rome - Saint Petersburg - Sallanches - Salzburg - San Diego - San Francisco </p>

</section>




<section class="business">
<h1>Main business</h1>
<h2>Our Main business is renting cars</h2>
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
