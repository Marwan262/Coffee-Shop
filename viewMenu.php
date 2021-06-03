<?php
include 'php/classes.php';
include "NavBar.php";

if (!isset($_SESSION['Cart'])) {
  $_SESSION['Cart'] = "";
}
$conn = new mysqli("localhost", "root", "", "coffee_shop");
$sql1 = "SELECT * FROM drink";
$sql2 = "SELECT * FROM condiments";
$sql3 = "SELECT * FROM milktype";
$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);
$result3 = mysqli_query($conn,$sql3);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Menu</title>
     <script type="text/javascript">
       function addAnotherDrink(id){
         var checked = false;
         var order = "";
         var drink,milk,condiment = " ";
         var array1 = document.getElementsByClassName("drink");
         var array2 = document.getElementsByClassName("condiment");
         var array3 = document.getElementsByClassName("milk");

         for (var i = 0; i < array1.length; i++) {
           if (array1[i].checked == true) {
              drink = array1[i];
              checked = true;
           }
         }
         for (var i = 0; i < array2.length; i++) {
           if (array2[i].checked == true) {
              condiment = array2[i];
           }
         }
         for (var i = 0; i < array3.length; i++) {
           if (array3[i].checked == true) {
              milk = array3[i];
           }
         }

        if (!checked) {
          errorMessage();
          return;
        }
         order = drink.value + "," + condiment.value + "," + milk.value;
         var formData = new FormData();
         formData.append('order', order);
         // alert(order);
         var xmlhttp=new XMLHttpRequest();
         xmlhttp.onreadystatechange=function() {
           if (this.readyState==4 && this.status==200) {
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
         for (var i = 0; i < array1.length; i++) {
           array1[i].checked = false;
         }
         for (var j = 0; j < array2.length; j++) {
           array2[j].checked = false;
         }
         for (var k = 0; k < array3.length; k++) {
           array3[k].checked = false;
         }
       }
       function errorMessage(){
         alert("Please finish your order.")
       }
       function checkout(){
         window.location.href = "tempcart.php";
       }
     </script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   </head>
   <body>
     <h2>Menu</h2>
     <form method="post" action="" name="form">
        <h4>Drinks</h4>
        <table class="table" width="30%" border="1" style="border-collapse:collapse; margin-top:4px;">
             <thead>
               <tr>
                 <th><strong></strong></th>
                 <th><strong>Drink</strong></th>
                 <th><strong>Price</strong></th>
                 <th><strong>Description</strong></th>
                 <th><strong></strong></th>
               </tr>
             </thead>
             <tbody>
               <?php
               while ($row1 = mysqli_fetch_array($result1)) {
                 echo "<tr>";
                 echo "<td><img src='pics/" . $row1['drinkName'] . ".jpg' alt='Italian Trulli' width = '75' height = '75'></td>";
                 echo "<td>" . $row1['drinkName'] . "</td>";
                 echo "<td>" . $row1['Price'] . "EGP</td>";
                 echo "<td>" . $row1['Description'] . "</td>";
                 echo "<td><input type='radio' class = 'drink' id='drink' name='drink' value='" . $row1['drinkName'] . "'></td>";
                 echo "</tr>";
               }
                ?>
             </tbody>
        </table>
     </form>
     <div class="">
        <h4>Milk</h4>
        <table class="table"  border="1" style="border-collapse:collapse; margin-top:4px;">
             <thead>
               <tr>
                 <th><strong>Milk Type</strong></th>
                 <th><strong>Price</strong></th>
                 <th><strong></strong></th>
               </tr>
             </thead>
             <tbody>
               <?php
               while ($row3 = mysqli_fetch_array($result3)) {
                 echo "<tr>";
                 echo "<td>" . $row3['Type'] . "</td>";
                 echo "<td>" . $row3['Price'] . "EGP</td>";
                 echo "<td><input type='radio' class = 'menu' id='milk' name='milk' value='" . $row3['Type'] . "'></td>";
                 echo "</tr>";
               }
                ?>
             </tbody>
        </table>
     </div>
     <div class="">
        <h4>Condiments</h4>
        <table class="table" width="30%" border="1" style="border-collapse:collapse; margin-top:4px;">
             <thead>
               <tr>
                 <th><strong>Condiment</strong></th>
                 <th><strong>Price</strong></th>
                 <th><strong></strong></th>
               </tr>
             </thead>
             <tbody>
               <?php
               while ($row2 = mysqli_fetch_array($result2)) {
                 echo "<tr>";
                 echo "<td>" . $row2['Name'] . "</td>";
                 echo "<td>" . $row2['Price'] . "EGP</td>";
                 echo "<td><input type='checkbox' class = 'menu' id='condiment' name='condiment' value='" . $row2['Name'] . "'></td>";
                 echo "</tr>";
               }
                ?>
             </tbody>
        </table>
     </div>

       <input type="button" name="" value="Add Another Drink" onclick="addAnotherDrink(1)">
       <input type="button" name="" value="Check out" onclick="addAnotherDrink(2)">
       </form>
   </body>
 </html>

<?php
ob_end_flush();
?>
