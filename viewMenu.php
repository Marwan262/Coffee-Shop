<?php
include 'php/classes.php';
if (!isset($_SESSION['Cart'])) {
  $_SESSION['Cart'] = "";
}
$conn = new Database_Handler();
// $conn = new mysqli("localhost", "root", "", "c2");
// $sql1 = "SELECT * FROM drink";
// $sql2 = "SELECT * FROM condiments";
// $sql3 = "SELECT * FROM milktype";
// $result1 = mysqli_query($conn,$sql1);
// $result2 = mysqli_query($conn,$sql2);
// $result3 = mysqli_query($conn,$sql3);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <meta charset="utf-8">
     <title>Menu</title>
     <script type="text/javascript">
       function addAnotherDrink(){
         var checked1 = false;
         var checked2 = false;
         var checked3 = false;
         var order = "";
         var condiments = " ";
         var drink,milk,size = " ";
         var array1 = document.getElementsByClassName("drink");
         var array2 = document.getElementsByClassName("condiment");
         var array3 = document.getElementsByClassName("milk");
         var array4 = document.getElementsByClassName("size");

         for (var i = 0; i < array1.length; i++) {
           if (array1[i].checked == true) {
              drink = array1[i];
              checked1 = true;
           }
         }
         for (var i = 0; i < array2.length; i++) {
           if (array2[i].checked == true) {
             condiments += array2[i].value + "/";
           }
         }
         condiments = condiments.substring(0,condiments.length-1);
         for (var i = 0; i < array3.length; i++) {
           if (array3[i].checked == true) {
              milk = array3[i];
              checked2 = true;
           }
         }
         for (var i = 0; i < array4.length; i++) {
           if (array4[i].checked == true) {
              size = array4[i];
              checked3 = true;
           }
         }

        if (!checked1 || !checked2 || !checked3) {
          alert("Please finish your order.");
          return;
        }
         var formData = new FormData();
         // alert(condiments);
         formData.append('condiments', condiments);
         formData.append('milk', milk.value);
         formData.append('size', size.value);
         formData.append('drink', drink.value);
         formData.append('q', 'push');
         var xmlhttp=new XMLHttpRequest();
         xmlhttp.onreadystatechange=function() {
           if (this.readyState==4 && this.status==200) {
             document.getElementById("d").innerHTML=this.responseText;
             clear();
           }
         }
         xmlhttp.open("POST","php/menu.php",true);
         xmlhttp.send(formData);
       }
       function clear(){
         var array1 = document.getElementsByClassName("drink");
         var array2 = document.getElementsByClassName("condiment");
         var array3 = document.getElementsByClassName("milk");
         var array4 = document.getElementsByClassName("size");
         for (var i = 0; i < array1.length; i++) {
           array1[i].checked = false;
         }
         for (var i = 0; i < array2.length; i++) {
           array2[i].checked = false;
         }
         for (var i = 0; i < array3.length; i++) {
           array3[i].checked = false;
         }
         for (var i = 0; i < array4.length; i++) {
           array4[i].checked = false;
         }
       }
       function checkout(){
         window.location.href = "cart.php";
       }
     </script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   </head>
   <body>
     <p id = "d"></p>
     <h1>Menu</h1>
     <form method="post" action="">
     <div class="container">
        <h2>Drinks</h2>
        <table class="table">
            <thead>
                <th>Drink Name</th>
                <th>Price</th>
                <th>Description</th>
                <th></th>
            </thead>
            <tbody>
            <?php $conn->displayDrink(); ?>
            </tbody>
        </table>
<table>

</table>
     </div>
     <div class="container">
     <h2>Choose Your Size</h2>
        <table class="table">
            <thead>
                <th>Size</th>
                <th>Price</th>
                <th></th>
            </thead>
            <tbody>
            <?php $conn->displaySize(); ?>
            </tbody>
        </table>

     </div>
     <div class="container">
     <h2>Choose Your Milk</h2>
        <table class="table">
            <thead>
                <th>Milk Type</th>
                <th>Price</th>
                <th></th>
            </thead>
            <tbody>
            <?php $conn->displayMilkTypes();?>
            </tbody>
        </table>

     </div>
     <div class="container">
     <h2>Extras</h2>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Price</th>
                <th></th>
            </thead>
            <tbody>
            <?php $conn->displayCondiments();?>
            </tbody>
        </table>
     </div>

       <input type="button" name="" value="Add Another Drink" onclick="addAnotherDrink()">
       <input type="button" name="" value="Check out" onclick="checkout()">
       </form>
   </body>
 </html>

<?php
ob_end_flush();
?>
