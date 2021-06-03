<?php
session_start();

$order = $_POST['order'];

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
  array_push($_SESSION['cart'], $order);
}
else {
  array_push($_SESSION['cart'], $order);
}

?>
