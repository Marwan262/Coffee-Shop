<?php
session_start();
include "classes.php";
$order = $_POST['order'];

$cart = new Cart(); 

function addToCart(){
  if (isset($_SESSION['Cart'])) {
    $cart = $_SESSION['Cart'];
    // $_SESSION['Cart'] .= $order;
  }
  else {
   $cart = new Cart(); 
  }
}


switch ($_POST['q']) {
  case 'add':
    addToCart();
    break;
}
?>
