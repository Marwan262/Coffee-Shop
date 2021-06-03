<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cartPage.css">
</head>
<body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
        
          <div class="col-50">
          <h2 style="text-align: center;"><i class="fa fa-shopping-cart"></i>Cart</h2>

          <h3>Order Details</h3>
          <table class="table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>
          </table>
          
        
          
        </div>

        
    </div>
    
      <hr>
      <p>VAT <span class="price" style="color:black">EGP</span></p>
      <p>Total <span class="price" style="color:black"><b>EGP</b></span></p><br>
      <input type="submit" value="Make Order" name="make-order" class="btn">
      <input type="button" value="Add Another Drink" href="/COFFEE-SHOP/viewMenu.php" class="btn">

  </div>

        
      </form>
 </div>
</body>
</html>