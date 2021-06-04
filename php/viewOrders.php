<?php
include "../php/ordersClass.php";
include "../NavBar/navBar.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order History</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Order History</h2>
  <?php
  $obj = new orders();
  echo $obj->getOrders();
  ?>
</div>


</body>
</html>
