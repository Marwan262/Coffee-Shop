<?php  
    include ('NavBar/navBar.php');
    include ('php/classes.php');
    $employee = new Employee(); 
?>
<html>
    <head>
        <title>Users</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
    </head>
    <body>
        <table class="table">
            <caption><h2>Users</h2> <button  id="addNewUser"class="btn btn-primary" style="position: relative; margin-right: 0px;float:right;">Add New User</button></caption>
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


<div id="addNewUserModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span  onclick="document.getElementById('addNewUserModal').style.display='none'" class="close">&times;</span>
    <h3>Add New User</h3>
    <form method="post" id="user-form" name="user-form">
    <label>Name:</label> &nbsp; <input type="text" name="name" class="input-group-text"><br>
    <label>Password:</label> &nbsp; <input type="text" name="pass" class="input-group-text"><br>
    <label>Email:</label> &nbsp; <input type="text" name="email" class="input-group-text"><br>
    <label>User Type:</label> &nbsp; <input type="text" name="userType" class="input-group-text"><br>
    <input type="submit" class="btn btn-success" name="addUser" value="Add User">
    </form>
  </div>
</div>

    </body>

    <script>
// Get the modal
var userModal = document.getElementById("addNewUserModal");
var addUserBtn = document.getElementById("addNewUser");
var span = document.getElementsByClassName("close")[0];
addUserBtn.onclick = function() {
    userModal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == userModal) {
    userModal.style.display = "none";
  }
}

$.ajax({  
    url:"/Coffee-Shop/php/classes.php",  
    method:"POST",  
    data:$('#user-form').serialize(),  
    beforeSend:function(){  
     $('#addUser').val("Inserting");  
    },  
    success:function(data){  
     $('#user-form')[0].reset();  
     $('#addNewUserModal').modal('hide');  

    }  
   });  

</html>