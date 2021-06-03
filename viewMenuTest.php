<?php
include 'php/classes.php';

if (isset($_SESSION['Cart'])) {
    $cart = $_SESSION['Cart'];
} else {
    $cart = new Cart();
}

$conn = new Database_Handler();



 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <meta charset="utf-8">
     <title>Menu</title>
     
   </head>
   <body>
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
        <input type="submit" name="addToCart" value="Add to Cart"><br>
     </form>
     <input type="button" name="viewCart" value="View Cart"> &nbsp; 
     <input type="button" name="addAnotherDrink" value="Add Another Drink">
   </body>
 </html>
