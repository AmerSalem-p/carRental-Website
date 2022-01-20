<?php
session_start();
require_once('login/config.php');
$id="";
$ename="";
$result = mysqli_query($link,"SELECT ename FROM users WHERE id='$_SESSION[$id]'");
$row = mysqli_fetch_array($result);
$ename=$row[0];

$temp2=$_SESSION['reference'];
$sql = mysqli_query($link,"SELECT orderNumber FROM rent WHERE referenceNumber='$temp2'");
$row2 = mysqli_fetch_array($sql);
$order=$row2[0];

 $email = mysqli_query($link,"SELECT email from users where id='$_SESSION[$id]'");
 $row3 = mysqli_fetch_array($email);

 $to="amersalemsalem2000@yahoo.com";
 $subject = "Renting Confirmation";
         $message = "<b>Car reference Number :". $_SESSION['reference']."</b>";
         $message = "<b>Car Brand :". $_SESSION['brand']."</b>";
         $message = "<b>Rent Date :".  $_SESSION['rentdate']."</b>";
         $message = "<b>Return Date :". $_SESSION['return']."</b>";
         $message = "<b>Ordrr Number :". $order."</b>";
//         // $retval = mail ($to,$subject,$message);


mysqli_close($link);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/register.css">
    <title>Rent Car</title>
</head>
<body>

  <nav class="nav-bar">
  <h2>Car Rentals<br/>Hello :<?php echo $ename ?></h2>
  <ul>
    <li class="list-item Home-page"><a href="index.php">Home Page</a></li>
    <li class="list-item Cars"><a href="car.php">Cars</a></li>
    <li class="list-item Search"><a href="rentlist.php">Rent-List</a></li>
    <li class="list-item About-us"><a href="about.php">About Us</a></li>
    <li class="list-item sign-in"><a href="login/logout.php">&nbsp Log-Out &nbsp</a></li>

  </ul>

  </nav>

    <div class="sign">
        <h2>You Have Successfuly Rented the car</h2>
        <div class="order">
          <h2>Your order number is : <?php echo $order; ?></h2>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="reference">
            <h3>Car reference Number : <?php echo $_SESSION['reference']; ?></h3>
          </div>

          <div class="brand">
            <h3>Car Brand : <?php echo $_SESSION['brand']; ?></h3>
          </div>

          <div class="country">
            <h3>manufacturing country : <?php echo $_SESSION['country']; ?></h3>
          </div>

          <div class="time">
            <h3>Rent time : <?php echo $_SESSION['renttime']; ?></h3>
           </div>

           <div class="date">
             <h3>Rent Date : <?php echo $_SESSION['rentdate']; ?></h3>
           </div>

          <div class="return">
            <h3>Return Date : <?php echo $_SESSION['return']; ?></h3>
          </div>
          <div class="price">
            <h3>Total Renting Price $ : <?php echo $_SESSION['totalprice']; ?></h3>
          </div>



        </form>
    </div>

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
