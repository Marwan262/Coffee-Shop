
<?php
include "dbclass.php";
class orders extends db{
  public function getOrders(){
    $sql="SELECT * FROM drinkorder WHERE Name=";
    $result=$this->connect()->query($sql);
    while ($row=$result->FETCH_ASSOC()) {
      echo $row['Drink'];
      echo $row['Size'];
      echo $row['Condiments'];
      echo $row['MilkType'];
      echo $row['TotalPrice'];
    }
  }
}
 ?>
