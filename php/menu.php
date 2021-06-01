<?php
include "classes.php";
$order = $_POST['order'];

function addToCart(){
  if (!isset($_SESSION['Cart'])) {
    $_SESSION['Cart'] .= $order;
  }
  else {
    $_SESSION['Cart'] .= "," .= $order;
  }

}
function checkout(){
  if (isset($_SESSION['Cart'])) {
    header('Location: cart.php/?&order=' . $order);
  }
  else {
    errormessage();
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
