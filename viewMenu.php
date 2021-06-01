<?php
include 'php/classes.php';
if (!isset($_SESSION['Cart'])) {
  $_SESSION['Cart'] = "";
}
$conn = new mysqli("localhost", "root", "", "c2");
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
       function addAnotherDrink(){
         var order = "";
         var condiment = document.getElementById('condiment').value.toString();
         var drink = document.getElementById('drink').value.toString();
         var milk = document.getElementById('milk').value.toString();
         order += drink += condiment += milk;
         var formData = new FormData();
         formData.append('q', 'add');
         formData.append('order', order);
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
         var array = document.getElementsByClassName("menu");
         for (var i = 0; i < array.length; i++) {
           array[i].checked = false;
         }
       }
     </script>
   </head>
   <body>
     <h2>Menu</h2>
     <div class="">
        <h4>Drinks</h4>
        <table width="30%" border="1" style="border-collapse:collapse; margin-top:4px;">
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
                 echo "<td>" . $row1['Price'] . "</td>";
                 echo "<td>" . $row1['Description'] . "</td>";
                 echo "<td><input type='radio' class = 'menu' id='drink' name='drink' value='" . $row1['drinkName'] . "'></td>";
                 echo "</tr>";
               }
                ?>
             </tbody>
        </table>
     </div>
     <div class="">
        <h4>Condiments</h4>
        <table width="30%" border="1" style="border-collapse:collapse; margin-top:4px;">
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
                 echo "<td>" . $row2['Price'] . "</td>";
                 echo "<td><input type='radio' class = 'menu' id='condiment' name='condiment' value='" . $row2['Name'] . "'></td>";
                 echo "</tr>";
               }
                ?>
             </tbody>
        </table>
     </div>
     <div class="">
        <h4>Milk</h4>
        <table width="30%" border="1" style="border-collapse:collapse; margin-top:4px;">
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
                 echo "<td>" . $row3['Price'] . "</td>";
                 echo "<td><input type='radio' class = 'menu' id='milk' name='milk' value='" . $row3['Type'] . "'></td>";
                 echo "</tr>";
               }
                ?>
             </tbody>
        </table>
     </div>
       <input type="button" name="" value="Add Another Drink" onclick="addAnotherDrink()">
       <input type="button" name="" value="View Cart">
   </body>
 </html>

<?php
ob_end_flush();
?>
