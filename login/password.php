<?php
session_start();
require_once('config.php');

$ename_err=$password_err = $confirm_password_err = "";
$id="";
$_POST['id'] = $_SESSION[$id];



if($_SERVER["REQUEST_METHOD"] == "POST"){


if (strlen($_POST["ename"])<3) {
$ename_err = "name must be more than 3 characters";
}
elseif (strlen($_POST["ename"])>20) {
  $ename_err = "name must be less than 15 characters";
}
else{
  $ename=$_POST["ename"];
}

   if(strlen($_POST["password"]) < 6){
        $password_err = "Password must have atleast 6 characters.";
    }
elseif (strlen($_POST["password"]) > 15) {
  $password_err = "Password must have  at most 15 characters.";
}


    else{
        $password = $_POST["password"];
    }
        $confirm_password = $_POST["confirm_password"];
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }


    if(empty($ename_err)&&empty($password_err) && empty($confirm_password_err)){

        $sql = "UPDATE users
        SET ename='$ename' ,password='$password' WHERE id =$_SESSION[$id]";


        if($stmt = mysqli_prepare($link, $sql)){

            if(mysqli_stmt_execute($stmt)){
                header("location: confirm.php");

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
    <div class="sign">
        <h2>Sign Up</h2>
        <p>Continue to this form to create an account.</p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

          <div class="ename">
            <input type="text" name="ename" placeholder="UserName" required>
            <span class="invalid"><?php echo $ename_err; ?></span>
          </div>

            <div class="password">
                <input type="password" name="password" placeholder="Password"><br>
                <span class="invalid"><?php echo $password_err; ?></span>
            </div>

            <div class="confirmpass">
                <input type="password" name="confirm_password" placeholder="Confirm Password"><br>
                <span class="invalid"><?php echo $confirm_password_err; ?></span>
            </div>

            <div >
                <input class="submit" type="submit" value="Submit">
                <input class="reset" type="reset"  value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
