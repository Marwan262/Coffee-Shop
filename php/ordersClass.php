<?php
include "dbclass.php";
ob_start();
include "../login.php";
$data = ob_get_clean();
class orders extends db{
  public function getOrders(){
    $name=$_SESSION["username"];
    $sql="SELECT * FROM drinkorder WHERE Name = '$name'";
    $result=$this->connect()->query($sql);
    if ($result->rowCount()>0) {
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
    echo "<td>".$row['TotalPrice']."<h6 style='display:inline;'> EGP</h6>"."</td></tr></tbody>" ;

    } //End of While Loop
    echo "</table>";
    }
else {
  echo "<div class='container'><h3> No orders placed yet</h3></div>";
}

  }
}
 ?>
