<?php
session_start();
require_once('login/config.php');
$id="";
$ename="";
$result = mysqli_query($link,"SELECT ename FROM users WHERE id='$_SESSION[$id]'");
$row = mysqli_fetch_array($result);
$ename=$row[0];
$error="";
if($_SERVER["REQUEST_METHOD"] == "POST"){



  $sql = mysqli_query($link,"SELECT price FROM cars WHERE referenceNumber ='".$_POST["reference"]."'");
  $row = mysqli_fetch_array($sql);

$_SESSION['reference']=$_POST['reference'];
$_SESSION['brand']=$_POST['brand'];
$_SESSION['country']=$_POST['country'];

if (mysqli_num_rows($sql)!==0) {


  $totalPrice=0;


  $date1 = strtotime($_POST['rentdate']);
  $date2 = strtotime($_POST['return']);
  $diff = $date2 - $date1;
  $diff= round($diff/86400);
  $totalPrice = $diff * $row[0];

        $_SESSION['totalprice'] = $totalPrice;
        $_SESSION['renttime'] = $_POST['renttime'];
        $_SESSION['rentdate'] = $_POST['rentdate'];
        $_SESSION['return'] = $_POST['return'];

           header("location: confirmation.php");
}

else {
  $error= "No such Car";
}
mysqli_close($link);

}
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
        <h2>Rent-Car</h2>
        <p>Please fill this form to rent the desired car.</p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

            <div class="reference">
                <input type="text" name="reference" placeholder="Reference-Number">
            </div>

            <div class="brand">
              <input type="text" name="brand" placeholder="Brand" >
            </div>

            <div class="country">
            <input type="text" name="country" placeholder="Country">
            </div>

            <div class="time">
               <input type="time" name="renttime" placeholder="time" required>
             </div>

             <div class="date">
               <input type="date" name="rentdate" placeholder="rent-Date" required>
             </div>

            <div class="return">
              <input type="date" name="return" placeholder="Return-Date" required>
            </div>

            <h3><?php echo $error; ?></h3>

            <div >
                <input class="submit" type="submit" value="Next">
                <input class="reset" type="reset"  value="Reset">
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
