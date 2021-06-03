<?php
class Database_Handler{

  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $database = 'coffee_shop';

  protected $connection;

  public function __construct(){

      if (!isset($this->connection)) {

          $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

          if (!$this->connection) {
              echo 'Cannot connect to database';
              exit;
          }
      }

      return $this->connection;
  }

  public function displayDrink()
  {
    $connection = $this->connection;
    $sql = "SELECT * FROM drink";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td><img src='pics/" . $row['drinkName'] . ".jpg' alt='Italian Trulli' width = '75' height = '75'></td>";
      echo "<td>" . $row['drinkName'] . "</td>";
      echo "<td>" . $row['Price'] . "</td>";
      echo "<td>" . $row['Description'] . "</td>";
      echo "<td><input type='radio' class = 'drink' id='drink' name='drink' value='" . $row['drinkName'] . "'></td>";
      echo "</tr>";

    }
  }

  public function displaySize()
  {
    $connection = $this->connection;
    $sql = "SELECT * FROM size";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['Size'] . "</td>";
      echo "<td>" . $row['Price'] . "</td>";
      echo "<td><input type='radio' class = 'drink' id='drink' name='size' value='" . $row['Size'] . "'></td>";
      echo "</tr>";

    }
  }
  public function displayMilkTypes()
  {
    $connection = $this->connection;
    $sql = "SELECT * FROM milktype";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['Type'] . "</td>";
      echo "<td>" . $row['Price'] . "</td>";
      echo "<td><input type='radio' class = 'drink' id='drink' name='milk' value='" . $row['Type'] . "'></td>";
      echo "</tr>";

    }
  }
  public function displayCondiments()
  {
    $connection = $this->connection;
    $sql = "SELECT * FROM condiments";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['Price'] . "</td>";
      echo "<td><input type='checkbox' class = 'drink' id='drink' name='condiment' value='" . $row['Name'] . "'></td>";
      echo "</tr>";

    }
  }
}




abstract class User
{
  public $conn;
  function create_connection(){
      $this->conn = new mysqli("localhost", "root", "", "coffee_shop");
  }

}

class client extends User{
  public $username;
  public $password;

  function login($user, $pass){
    $this->create_connection();
    $result = mysqli_query($this->conn,"SELECT * FROM person WHERE Name='$user' AND Password='$pass'");
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
      header('Location: viewMenu.php');
    }
    else {
      echo "Incorrect Credentials.";
    }
  }

}


class admin extends User{

      function login($username,$password){
        $this->create_connection();
        $sql="SELECT * from user where username='$username'and password='$password'";
        $result=mysqli_query($this->conn,$sql);
        return $result;
      }


  function display(){
    $this->create_connection();
    $sql = "SELECT * FROM user";
    $result=mysqli_query($this->conn,$sql);
    $this->close_connection();
    return $result;
  }

  function delete($id){
    $this->create_connection();
    $sql = "DELETE FROM user WHERE ID = $id ";
    $result = mysqli_query($this->conn,$sql);
    $this->close_connection();
  }

  function update($fields){
    $this->create_connection();
    $sql = "UPDATE user SET first_name = " . "'$fields[first_name]'" . ", last_name = " . "'$fields[last_name]'" . ", password = " . "'$fields[password]'" . ", position = " . "'$fields[position]'" . ", username = " . "'$fields[username]'" . " WHERE ID = '$fields[id]'";
    $result = mysqli_query($this->conn,$sql);
    $this->close_connection();
  }


}



class Cart
{


    public function addToCart(int $drink, $milkType, $size, $condiments)
    {
      $drinkPrice = "SELECT Price FROM drink WHERE id='$drink'";

      $addToCartSQL = "INSERT INTO drinkorder SET Drink='$drink', Size='$size',
                       Condiments='$condiments', MilkType='$milkType', TotalPrice='$total'";
    }




}






?>
