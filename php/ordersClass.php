
<?php
include "dbclass.php";
class orders extends db{
  public function getOrders(){
    $sql="SELECT * FROM drinkorder";
    $result=$this->connect()->query($sql);

  echo "<table class='table table-striped'>
  <thead>
  <tr>
  <th>Drink</th>
  <th>Size</th>
  <th>Condiments</th>
  <th>Milk Type</th>
  <th>Total Price</th>
  </tr>
  </thead>";
  while ($row=$result->fetch()) {
    $drink=$row['Drink'];
    $size=$row['Size'];
    $condiments=$row['Condiments'];
    $milkType=$row['MilkType'];
    $total=$row['TotalPrice'];

    $sql ="SELECT drinkName FROM drink WHERE id='$drink' ";
    $result = $this->connect()->query($sql);
    while ($row2=$result->fetch()){
      echo "<tbody><tr><td>".$row2['drinkName']."</td></tr></tbody>" ;
    }


  }
echo "</table>";

  }
}
 ?>
