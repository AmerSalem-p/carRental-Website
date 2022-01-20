<?php
session_start();
require_once('config.php');

$id_err="";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$email=$address=$birth=$mobile=$telephone=$id=$username="";

if(strlen($_POST['id'])<9){
  $id_err="ID must be 9 digits";
}
else{
$email=$_POST['email'];
$address=$_POST['address'];
$birth=$_POST['birth'];
$mobile=$_POST['mobile'];
$telephone=$_POST['telephone'];
$_SESSION[$id]=$_POST['id'];
$username=$_POST['username'];

$_SESSION['email']=$_POST['email'];
$_SESSION['address']=$_POST['address'];
$_SESSION['birth']=$_POST['birth'];
$_SESSION['mobile']=$_POST['mobile'];
$_SESSION['telephone']=$_POST['telephone'];


      $sql = "INSERT INTO users (id,username,email,address,BirthDate,mobile,telephone) VALUES ('$_SESSION[$id]','$username','$email','$address','$birth','$mobile','$telephone')";
       if($stmt = mysqli_prepare($link, $sql)){
           if(mysqli_stmt_execute($stmt)){
                header("location: password.php");
           }
           mysqli_stmt_close($stmt);
       }

     }
  mysqli_close($link);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/register.css">
    <title>Sign Up</title>
</head>
<body>

  <nav class="nav-bar">
  <h2>Car Rentals</h2>
  <ul>
    <li class="list-item Home-page"><a href="../preindex.html">Home Page</a></li>
    <li class="list-item Cars"><a href="../precar.html">Cars</a></li>
    <li class="list-item About-us"><a href="../preabout.html">About Us</a></li>
    <li class="list-item sign-in"><a href="login.php">&nbsp Log-In &nbsp</a></li>
  </ul>

  </nav>





    <div class="sign">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

            <div class="user">
                <input type="text" name="username" placeholder="Name" required>
            </div>

            <div class="address">
              <input type="address" name="address" placeholder="Address" required>
            </div>

            <div class="id">
            <input type="number" name="id" placeholder="Id Number" required><br>
            <span><?php echo $id_err; ?></span>
            </div>

            <div class="birth">
               <input type="date" name="birth" required>
             </div>

            <div class="email">
              <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="mobile">
              <input type="tel" name="mobile" placeholder="Mobile Number" required>
             </div>

              <div class="telephone">
                 <input type="tel" name="telephone" placeholder="telephone Number" required>
              </div>

            <div >
                <input class="submit" type="submit" value="Next">
                <input class="reset" type="reset"  value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
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
