<?php
session_start();
require_once('login/config.php');
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id="";


if($_SERVER["REQUEST_METHOD"] == "POST"){
$temp1 = $_POST['filter'];
$temp2 = $_POST['search'];
$sql=mysqli_query($link,"SELECT * FROM cars WHERE $temp1='$temp2'");
}
else{
$sql = mysqli_query($link,"SELECT * FROM cars");
}
if (isset($_POST['button'])){
$sql = mysqli_query($link,"SELECT * FROM cars");
}
if (isset($_POST['rent'])) {
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: renting.php");
      exit;
  }
  else {
    header("location:login/login.php");
  }
}
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
  <h2>Car Rentals</h2>
    <ul>
      <li class="list-item Home-page"><a href="preindex.html">Home Page</a></li>
      <li class="list-item Cars"><a href="#">Cars</a></li>
      <li class="list-item About-us"><a href="preabout.html">About Us</a></li>
      <li class="list-item Register "><a href="login/register.php">&nbspRegister&nbsp</a></li>
      <li class="list-item sign"><a href="login/login.php">&nbsp Log-In &nbsp</a></li>
    </ul>
    </nav>




    <form action="" method="post">
      <fieldset>
        <legend>Car Rental Search</legend>

        <div id="searchBox">

            <label>Search By:</label>

            <select name="filter">
              <option value="brand">brand</option>
              <option value="model">model</option>
              <option value="year">year</option>
              <option value="country">country</option>
              <option value="price">Price</option>
            </select>
         <input type="text" name="search" placeholder="Value">
          <button type="submit">filter</button>
        </div>

<form  action="car.php" method="post">
  <button type="submit" name="button" style="margin-left:25px; width:6%;">All Cars</button>
   </form>


    <div id="car-list">
      <table>
        <caption><strong>Rental Cars</strong></caption>

        <tr class="headings">
          <th></th>
          <th>Reference-Number</th>
          <th>Brand</th>
          <th>Model</th>
          <th>Year</th>
          <th>Price/Day</th>
          <th>Actions</th>
        </tr>
<?php while($row2 = mysqli_fetch_array($sql)):?>
        <tr>
          <td><img class="image" src="images/<?php echo $row2[1]; ?>.jpg" alt="".<?php echo $row2[1] ?>></td>
            <td class="number"><?php echo $row2[0]; ?></td>
          <td class="brand"><?php echo $row2[1]; ?></td>
          <td class="model"><?php echo $row2[2]; ?></td>
          <td class="year"><?php echo $row2[3]; ?></td>
          <td class="price"><?php echo $row2[4]; ?></td>
          <td class="button">
            <a href="carInfo/<?php echo $row2[1]; ?>.php"><button type="button" name="button">View</button></a>
            <form method="post">
                <button  class="renting_button" type="submit" name="rent">Rent</button>
            </form>

          </td>
        </tr>

<?php endwhile; ?>




      </table>
    </div>
</fieldset>
</form>

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
