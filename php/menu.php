<?php
session_start();
include "classes.php";
$order = $_POST['order'];

function addToCart(){
  if (!isset($_SESSION['Cart'])) {
    $_SESSION['cart'] = "";
    $_SESSION['Cart'] .= $order;
  }
  else {
    $_SESSION['Cart'] .= "/" .= $order;
  }
}


switch ($_POST['q']) {
  case 'add':
    addToCart();
    break;
}
?>
