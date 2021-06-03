<?php  
    include ('NavBar/navBar.php');
    include ('php/classes/php');
    $employee = new Employee(); 
?>
<html>
    <head>
        <title>Users</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <table class="table">
            <caption><h2>Users</h2> <button class="btn btn-primary" style="position: relative; margin-right: 0px;float:right;">Add New User</button></caption>
            <thead>

                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>UserType</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
              
                    <?php
                       $employee ->viewUsers(); 


                    ?>
             
            </tbody>




        </table>
    </body>



</html>