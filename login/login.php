
<?php
session_start();
require_once ('config.php');

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:../index.html");
    exit;
}


$username = $password = "";
$username_err = $password_err = $login_err = "";
$id="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = mysqli_query($link,"SELECT id, ename, password FROM users WHERE password ='$password'");
        $result = mysqli_query($link,"SELECT id FROM users WHERE ename='$username'");
        $row = mysqli_fetch_array($result);
        $row2=mysqli_fetch_array($sql);
        $id="";
        $_SESSION[$id] = $row[0];
        if(mysqli_num_rows($sql)!==0 && mysqli_num_rows($result)!==0){

                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;

                         if(isset($_SESSION['url'])){
                           header("location: ../car.php");
                         }
                            else{
                                header("location: ../index.php");
                            }



}
                    else {
                         $login_err = "Invalid username or password.";
                    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/register.css">
    <title>Login</title>
</head>
<body>

  <nav class="nav-bar">
  <h2>Car Rentals</h2>
  <ul>
    <li class="list-item Home-page"><a href="../preindex.html">Home Page</a></li>
    <li class="list-item Cars"><a href="../precar.php">Cars</a></li>
    <li class="list-item About-us"><a href="../preabout.html">About Us</a></li>
    <li class="list-item Register sign-in"><a href="register.php">&nbspRegister&nbsp</a></li>
  </ul>

  </nav>





    <div class="sign">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div >
                <label>Username</label>
                <input type="text" name="username" required><br>
                <span class="invalid-feedback"><?php echo $login_err; ?></span>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div >
                <input class="submit" type="submit" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
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
