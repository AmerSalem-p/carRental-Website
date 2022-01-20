<?php
session_start();
require_once('login/config.php');
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id="";
$ename="";
$result = mysqli_query($link,"SELECT ename FROM users WHERE id='$_SESSION[$id]'");
$row = mysqli_fetch_array($result);
$ename=$row[0];

echo $ename;
$sql = mysqli_query($link,"SELECT * FROM rent WHERE username ='$ename'");


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="CSS/car.css">
      <script src="https://kit.fontawesome.com/942cff5359.js" crossorigin="anonymous"></script>
       <link rel="shortcut icon" href="https://cdn2.rcstatic.com/images/rclogo/blue/logomark-rclogo_32x32.png" type="image/x-icon" />
    <title>Cars</title>

  </head>
  <body>
    <nav class="nav-bar">
  <h2>Car Rentals<br/>Hello :<?php echo $ename ?></h2>
    <ul>
      <li class="list-item Home-page"><a href="index.php">Home Page</a></li>
      <li class="list-item Cars"><a href="car.php">Cars</a></li>
      <li class="list-item Search"><a href="#">Search</a></li>
      <li class="list-item About-us"><a href="about.php">About Us</a></li>
      <li class="list-item sign-in"><a href="login/logout.php">&nbsp Log-Out &nbsp</a></li>
    </ul>
    </nav>

      <fieldset>


    <div id="car-list">
      <table>
        <caption><strong>Rented</strong></caption>

        <tr class="headings">
          <th>order Number</th>
          <th>Reference-Number</th>
          <th>Brand</th>
          <th>rent Date</th>
          <th>Return Date</th>
        </tr>
<?php while($row2 = mysqli_fetch_array($sql)):?>
        <tr>
          <td class="ordernumber" style="padding-left:60px;"><?php echo $row2[0]; ?></td>
          <td class="ref"><?php echo $row2[2]; ?></td>
          <td class="brand"><?php echo $row2[3]; ?></td>
          <td class="rentdate"><?php echo $row2[4]; ?></td>
          <td class="returndate"><?php echo $row2[5]; ?></td>

        </tr>

<?php endwhile; ?>




      </table>
    </div>
</fieldset>

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
