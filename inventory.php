<?php  
    include ('NavBar/navBar.php');
    include ('php/classes.php');
    $employee = new Employee(); 
    $conn = new mysqli("localhost", "root", "", "coffee_shop");
?>
<html>
    <head>
        <title>Inventory</title>
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
        <!-------------------------------TABLES------------------------------->

        <table class="table table-bordered">
            <caption><h1>Drinks</h1> <button class="btn btn-primary" id="addNewDrink" style="position: relative; margin-right: 40px;float:right;">Add New Drink</button></caption>
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

        <table class="table table-bordered">
            <caption><h1>Sizes</h1> <button class="btn btn-primary" id="addNewSize" style="position: relative; margin-right: 40px;float:right;">Add New Size</button></caption>
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

        <table class="table table-bordered">
            <caption><h1>Milk Types</h1> <button class="btn btn-primary" id="addNewType" style="position: relative; margin-right: 40px;float:right;">Add New Type</button></caption>
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

        <table class="table table-bordered">
            <caption><h1>Condiments</h1> <button class="btn btn-primary" id="addNewCond" style="position: relative; margin-right: 40px;float:right;">Add New Condiment</button></caption>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php  $employee->viewCondiments(); ?> 
            </tbody>
        </table> 




<!-------------------------------MODALS------------------------------->

<div id="addNewDrinkModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span  onclick="document.getElementById('addNewDrinkModal').style.display='none'" class="close">&times;</span>
    <h3>Add New Drink</h3>
    <form method="post" id="drink-form" name="drink-form">
    <label>Name:</label> &nbsp; <input type="text" name="drinkName" class="input-group-text"><br>
    <label>Price:</label> &nbsp; <input type="text" name="drinkPrice" class="input-group-text"><br>
    <label>Description:</label> &nbsp; <input type="text" name="drinkDescription" class="input-group-text"><br>
    <label>Image:</label> &nbsp; <input type="file"><br>
    <input type="submit" class="btn btn-success" name="addDrink" value="Add Drink">
    </form>
  </div>
</div>


<div id="addNewSizeModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span  onclick="document.getElementById('addNewSizeModal').style.display='none'" class="close">&times;</span>
    <h3>Add New Size</h3>
    <form method="post" id="size-form" name="size-form">
    <label>Size:</label> &nbsp; <input type="text" name="size" class="input-group-text"><br>
    <label>Price:</label> &nbsp; <input type="text" name="sizePrice" class="input-group-text"><br>
    <input type="submit" class="btn btn-success" id="addSize"name="addSize" value="Add Size">
    </form>
  </div>
</div>


<div id="addNewTypeModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span onclick="document.getElementById('addNewTypeModal').style.display='none'" class="close">&times;</span>
    <h3>Add New Milk Type</h3>
    <form method="post" id="milk-form" name="milk-form">
    <label>Type:</label> &nbsp; <input type="text" name="type" class="input-group-text"><br>
    <label>Price:</label> &nbsp; <input type="text" name="typePrice" class="input-group-text"><br>
    <input type="submit" class="btn btn-success" name="addType"value="Add Type">
    </form>
  </div>
</div>


<div id="addNewCondModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span onclick="document.getElementById('addNewCondModal').style.display='none'"class="close">&times;</span>
    <h3>Add New Condiment</h3>
    <form method="post" id="cond-form" name="cond-form">
    <label>Name:</label> &nbsp; <input type="text" name="condName" class="input-group-text"><br>
    <label>Price:</label> &nbsp; <input type="text" name="condPrice" class="input-group-text"><br>
    <input type="submit" class="btn btn-success" name="addCond" value="Add Condiment">
    </form>
  </div>
</div>





<!-------------------------------MODAL SCRIPT------------------------------->




<script>
// Get the modal
var drinkModal = document.getElementById("addNewDrinkModal");
var sizeModal = document.getElementById("addNewSizeModal");
var typeModal = document.getElementById("addNewTypeModal");
var condModal = document.getElementById("addNewCondModal");


// Get the button that opens the modal
var addDrinkBtn = document.getElementById("addNewDrink");
var addSizeBtn = document.getElementById("addNewSize");
var addTypeBtn = document.getElementById("addNewType");
var addCondBtn = document.getElementById("addNewCond");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
addDrinkBtn.onclick = function() {
    drinkModal.style.display = "block";
}

addSizeBtn.onclick = function() {
    sizeModal.style.display = "block";
}

addTypeBtn.onclick = function() {
    typeModal.style.display = "block";
}

addCondBtn.onclick = function() {
    condModal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == drinkModal) {
    drinkModal.style.display = "none";
  }
}
window.onclick = function(event) {
  if (event.target == sizeModal) {
    sizeModal.style.display = "none";
  }
}
window.onclick = function(event) {
  if (event.target == typeModal) {
    typeModal.style.display = "none";
  }
}
window.onclick = function(event) {
  if (event.target == condModal) {
    condModal.style.display = "none";
  }
}



// BUTTON FUNCTIONS

$.ajax({  
    url:"/Coffee-Shop/php/classes.php",  
    method:"POST",  
    data:$('#drink-form').serialize(),  
    beforeSend:function(){  
     $('#addNewDrink').val("Inserting");  
    },  
    success:function(data){  
     $('#drink-form')[0].reset();  
     $('#addNewDrinkModal').modal('hide');  
     $('#inventory-page').html(data);  
    }  
   });  

$.ajax({  
    url:"/Coffee-Shop/php/classes.php",  
    method:"POST",  
    data:$('#size-form').serialize(),  
    beforeSend:function(){  
     $('#addNewSize').val("Inserting");  
    },  
    success:function(data){  
     $('#size-form')[0].reset();  
     $('#addNewSizeModal').modal('hide');  
    }  
   });  

   $.ajax({  
    url:"/Coffee-Shop/php/classes.php",  
    method:"POST",  
    data:$('#milk-form').serialize(),  
    beforeSend:function(){ 
      $('#addNewType').val("Inserting");  
    },  
    success:function(data){  
     $('#milk-form')[0].reset();  
     $('#addNewTypeModal').modal('hide');  
    }  
   });  

   $.ajax({  
    url:"/Coffee-Shop/php/classes.php",  
    method:"POST",  
    data:$('#cond-form').serialize(),  
    beforeSend:function(){  
     $('#addNewCond').val("Inserting");  
    },  
    success:function(data){  
     $('#cond-form')[0].reset();  
     $('#addNewCondModal').modal('hide');  
    }  
   });  


</script>


    </body>



</html>