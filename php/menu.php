<?php
session_start();

function pushArray(){
  $item = [];
  array_push($item, $_POST['drink'], $_POST['condiments'], $_POST['milk'], $_POST['size']);
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }
  array_push($_SESSION['cart'], $item);
  print_r($_SESSION['cart']);
  // session_unset();
}

function remove($item){
   // echo "test";
   unset($_SESSION['cart'][$item]);
}



switch ($_POST['q']) {
  case 'push':
    pushArray();
    break;
  case 'remove':
    remove($_POST['item']);
    break;
}
?>
