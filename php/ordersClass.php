
<?php
include "dbclass.php";
class orders extends db{
  public function getOrders(){
    $sql="SELECT * FROM drinkorder";
    $result=$this->connect()->query($sql);
    while ($row=$result->fetch()) {
      $drink=$row['Drink'];
      $size=$row['Size'];
      $condiments=$row['Condiments'];
      $milkType=$row['MilkType'];
      $total=$row['TotalPrice'];

      $sql ="SELECT drinkName FROM drink WHERE id='$drink' ";
      $result = $this->connect()->query($sql);
      echo $row['drinkName'];

      $sql ="SELECT Size FROM size WHERE id='$size' ";
      $result = $this->connect()->query($sql);
      echo $row['Size'];

    }
  }
}
 ?>
