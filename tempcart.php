<?php
session_start();
$order = implode( ",", $_SESSION['cart']);
echo $order;
 ?>
