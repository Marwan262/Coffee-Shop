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






class User{
  public $username;
  public $password;

  public $conn;
  function create_connection(){
      $this->conn = new mysqli("localhost", "root", "", "coffee_shop");
  }

  public function login($user, $pass){
    $this->create_connection();
    $result = mysqli_query($this->conn,"SELECT * FROM person WHERE Name='$user' AND Password='$pass'");
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
      header('Location: /Coffee-Shop/viewMenu.php');
    }
    else {
      echo "Incorrect Credentials.";
    }
  }

  public function logout(){
      @session_start();
      session_destroy();
      header('location:/Coffee-Shop/viewMenu.php');
  }

}

class Employee extends User{
  
}


class SignUpDB{   //DBconnection
  public $host = 'localhost'; //host NAME.
  public $database = 'coffee_shop'; //Database Name
  public $dbusername = 'root'; //Database Username
  public $dbpassword = ''; //Database Password
  public $conn;

  function __construct() {
       
      $this->conn = new mysqli($this->host,$this-> dbusername, $this->dbpassword,$this->database); 
  
      if (mysqli_connect_error()) {
          die('Connect Error (' . mysqli_connect_errno() . ') '
                  . mysqli_connect_error());
      }
      
  } 
  
  

  public function close(){
      mysqli_close(); 
  }
     public function isUserExist($email,$usertype){  
      
      $sql= "SELECT * FROM person WHERE Email = '".$email."' and UserType='".$usertype."' ";
      $result =  $this->conn->query($sql);
      if ($result) {  //mysqli_query($this->conn, $sql)
          if ($result->num_rows > 0) {
            return true;
          } else {
            return false;
          }
        } else {
          echo 'Error: '.mysqli_error();
        }


}
  public function UserRegister($username,$email, $password){  
      
      $usertype= "1";
      $sql= "INSERT INTO person(Name, Email,Password,UserType) 
      values('".$username."','".$email."','".$password."','".$usertype."')";
       if ( $this->conn->query($sql)) {
          return true;
    } else {
          return false;
    }
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

  

