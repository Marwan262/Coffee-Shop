<html>
<head>
  <?php
  ob_start();
  include "../login.php";
  $data = ob_get_clean();
  $name=$_SESSION["username"];
   ?>
<link rel="stylesheet" href="../NavBar/navBar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="/Coffee-Shop/viewMenu.php">Menu</a>
    <div class="topnav-right">
          <?php
          if (empty($_SESSION['username'])){
            echo '<a href="/Coffee-Shop/login.php">Login</a>
                  <a href="/Coffee-Shop/Registration/SignUp.php">Register</a>';
          }

          else if (isset($_SESSION['username'])) {
            echo '<a href=""><i class="fa fa-shopping-cart"></i> Cart</a>
                  <a href="/Coffee-Shop/profile.php">Profile</a>
                  <a href="/Coffee-Shop/php/viewOrders.php">Order History</a>
                  <a href="/Coffee-Shop/php/logout.php">Logout</a>';
          }
           ?>


   </div>
</div>



</body>
</html>
