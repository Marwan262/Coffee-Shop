<?php  
    include ('NavBar/navBar.php');
    include ('php/classes.php');
    $employee = new Employee(); 
    $conn = new mysqli("localhost", "root", "", "coffee_shop");
?>
<html>
    <head>
        <title>Inventory</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <table class="table">
            <caption><h1>Drinks</h1> <button class="btn btn-primary" style="position: relative; margin-right: 40px;float:right;">Add New Drink</button></caption>
            <thead>

                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </thead>
            <tbody>
              
                    <?php  $employee->viewDrinks(); ?> 
            </tbody>
        </table>

        <br><hr>

        <table class="table">
            <caption><h1>Sizes</h1> <button class="btn btn-primary" style="position: relative; margin-right: 40px;float:right;">Add New Size</button></caption>
            <thead>
                <th>ID</th>
                <th>Size</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody>
             <?php  $employee->viewSizes(); ?> 
            </tbody>
        </table>

        <br><hr>            

        <table class="table">
            <caption><h1>Milk Types</h1> <button class="btn btn-primary" style="position: relative; margin-right: 40px;float:right;">Add New Type</button></caption>
            <thead>
                <th>ID</th>
                <th>Milk Type</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody>
             <?php  $employee->viewMilkTypes(); ?> 
            </tbody>
        </table> 

        <br><hr>            

        <table class="table">
            <caption><h1>Condiments</h1> <button class="btn btn-primary" style="position: relative; margin-right: 40px;float:right;">Add New Condiment</button></caption>
            <thead>
                <th>ID</th>
                <th>Milk Type</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php  $employee->viewCondiments(); ?> 
            </tbody>
        </table> 



    </body>



</html>