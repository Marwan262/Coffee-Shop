<?php
include "classes.php";
$cart = $_POST['order'];

function addToCart(){
  if (!isset($_SESSION['Cart'])) {
    $_SESSION['Cart'] .= $cart;
  }
  else {
    $_SESSION['Cart'] .= "," .= $cart;
  }

}
function checkout(){
  if (isset($_SESSION['Cart'])) {
    header('Location: cart.php/?');
  }
}

switch ($_POST['q']) {
  case 'add':
    addToCart();
    break;

  case 'cart':
    checkout();
    break;
}
?>
