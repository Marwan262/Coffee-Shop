<?php
session_start();

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
else {
  array_push($_SESSION['cart'], $order);
}

?>
