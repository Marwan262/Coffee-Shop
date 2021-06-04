
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

    $sql2 ="SELECT drinkName FROM drink WHERE id='$drink' ";
    $result2 = $this->connect()->query($sql2);
    while ($row2=$result2->fetch()){
      echo "<tbody><tr><td>".$row2['drinkName']."</td>" ;
    }
    $sql3 ="SELECT Size FROM size WHERE id='$size' ";
    $result3 = $this->connect()->query($sql3);
    while ($row3=$result3->fetch()){
      echo "<td>".$row3['Size']."</td></tr></tbody>" ;
    }

  }
echo "</table>";

  }
}
 ?>
