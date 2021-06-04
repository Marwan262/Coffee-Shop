<style media="screen">
  table{
    border-collapse: collapse;
    border: solid 2px;
  }
  th,td{
    border: solid 1px;
  }
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">
      function removeFromCart(item){
        var formData = new FormData();
        formData.append('q', 'remove');
        formData.append('item', item);
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            window.location.reload();
          }
        }
        xmlhttp.open("POST","php/menu.php",true);
        xmlhttp.send(formData);
      }
    </script>
  </head>
  <body>

  </body>
</html>
<?php
include 'php/classes.php';
session_start();
$cart = $_SESSION['cart'];
$conn = new Database_Handler();
$orderCount = count($_SESSION['cart']);

echo "<h4>My Cart</h4>";

  echo "";
        $conn->displayOrder($_SESSION['cart']);

 ?>
