<?php
session_start();
require_once('login/config.php');
$id="";
$ename="";
$result = mysqli_query($link,"SELECT ename FROM users WHERE id='$_SESSION[$id]'");
$row = mysqli_fetch_array($result);
$ename=$row[0];

$card_err="";
$temp="";

$ref=$brand=$rentDate=$returnDate="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(strlen($_POST['cardnumber'])<9 || strlen($_POST['cardnumber'])>9){
    $card_err="Card number must be 9 digits";
  }else{

  $paymethod = $_POST['pay'];

if ($paymethod =="visa"){
  $temp="111";
}elseif ($paymethod=="mastercard") {
  $temp="222";
}
else{
  $temp="333";
}

if(substr($_POST['cardnumber'],0,3)!==$temp){
  $card_err="Card number must start with ".$temp;

}
}

if(empty($card_err)){

$ref=$_SESSION['reference'];
$brand=$_SESSION['brand'];
$rentDate=$_SESSION['rentdate'];
$returnDate=$_SESSION['return'];

$sql=mysqli_query($link,"INSERT INTO rent (username,referenceNumber,brand,rentDate,returnDate) VALUES ('$ename','$ref','$brand','$rentDate','$returnDate')");

  header("location: rentconfirm.php");
exit();
}

}

mysqli_close($link);





 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/register.css">
    <title>rent confirmation</title>
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
        <h2>Rent-Confirmation</h2>
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
<div class="radio">
  <h1>Payment method:</h1><br>
<div class="details">
  <input type="text" name="name" placeholder="Name" required><br>
  <input type="text" name="cardnumber" placeholder="Card number"  required><br>
  <input type="text" name="bank" placeholder="Bank" required><br>
  <label>Expire Date</label><br>
  <input type="date" name="date" required><br>

</div>
  <input type="radio" id="visa"  name="pay" value="visa"><label for="visa">Visa</label>
  <input type="radio" id="master" name="pay" value="mastercard"><label for="master">Master Card</label>
  <input type="radio" id="express" name="pay" value="americanexpress"><label for="express">American Express</label><br>
  <input class="confirm" type="submit" value="Rent">
</div>
<label><?php echo $card_err; ?></label>

            <div >

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
