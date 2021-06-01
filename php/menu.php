<?php
include "classes.php";
$_SESSION['Cart'];
$cart = $_POST['order'];
function addToCart(){
  $_SESSION['Cart'] .= $cart;
}

switch ($_POST['q']) {
  case 'add':
    addToCart();
    break;
}
?>
