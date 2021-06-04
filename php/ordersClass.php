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
//--------------------------------------------Reading the drink's name from table drink--------------------------------------------//
    $sql2 ="SELECT drinkName FROM drink WHERE id='$drink' ";
    $result2 = $this->connect()->query($sql2);
    while ($row2=$result2->fetch()){
      echo "<tbody><tr><td>".$row2['drinkName']."</td>" ;
    }
//--------------------------------------------Reading the drink's size from table size--------------------------------------------//
    $sql3 ="SELECT Size FROM size WHERE id='$size' ";
    $result3 = $this->connect()->query($sql3);
    while ($row3=$result3->fetch()){
      echo "<td>".$row3['Size']."</td>" ;
    }
//--------------------------------------------Reading the drink's condiments from table condiments--------------------------------------------//
    $sql4 ="SELECT Name FROM condiments WHERE id='$condiments' ";
    $result4 = $this->connect()->query($sql4);
    while ($row4=$result4->fetch()){
      echo "<td>".$row4['Name']."</td>" ;
    }
//--------------------------------------------Reading the drink's Milk Type from table milktype--------------------------------------------//
    $sql5 ="SELECT Type FROM milktype WHERE id='$milkType' ";
    $result5 = $this->connect()->query($sql5);
    while ($row5=$result5->fetch()){
      echo "<td>".$row5['Type']."</td>" ;
    }
//--------------------------------------------Reading the drink's Total Price from table drinkorder--------------------------------------------//
echo "<td>".$row['TotalPrice']."</td></tr></tbody>" ;

} //End of While Loop
echo "</table>";

  }
}
 ?>
