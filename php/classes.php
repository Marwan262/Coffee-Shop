<?php
class Database_Handler{

  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $database = 'c2';

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
      echo "<td><input type='radio' class = 'drink' id='drink' name='drink' value='" . $row['id'] . "'></td>";
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
      echo "<td><input type='radio' class = 'size' id='size' name='size' value='" . $row['id'] . "'></td>";
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
      echo "<td>" . $row['type'] . "</td>";
      echo "<td>" . $row['Price'] . "</td>";
      echo "<td><input type='radio' class = 'milk' id='milk' name='milk' value='" . $row['id'] . "'></td>";
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
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['Price'] . "</td>";
      echo "<td><input type='checkbox' class = 'condiment' id='condiment' name='condiment' value='" . $row['id'] . "'></td>";
      echo "</tr>";

    }
  }
  public function displayOrder($array){

    $connection = $this->connection;
    $totalPrice = 0;

    foreach ($array as $key=>$value) {
      $drinks = [];
      $milk = [];
      $condiments = [];
      $condimentsS = "";
      $size = [];

      $sql1 = "SELECT Price,drinkName FROM drink WHERE id = $value[0]";
      $sql2 = "SELECT Price,type FROM milktype WHERE id = $value[2]";
      $sql3 = "SELECT Price,Size FROM size WHERE id = $value[3]";

      $result1 = mysqli_query($connection, $sql1);
      $result2 = mysqli_query($connection, $sql2);
      $result3 = mysqli_query($connection, $sql3);

      $row1 = mysqli_fetch_array($result1);
        $totalPrice += $row1['Price'];
        echo "<table id='table'>";
        echo "<thead>";
        echo "<th>" . $row1['drinkName'] . "</th>";
        echo "<th>" . $row1['Price'] . "</th>";
        echo "<th><button type='button' name='button' onclick='removeFromCart($key)'>X</button></th>";
        echo "</thead>";
        array_push($drinks, $row1['drinkName']);

      echo "<tbody>";
      $condiments = explode("/", $value[1]);
      foreach ($condiments as $cond) {
        $sql = "SELECT Price,name FROM condiments WHERE id = $cond";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result);
        $totalPrice += $row['Price'];

        echo "<tr>";
        echo "<td>Condiment</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "</tr>";
        $condimentsS += $row['name'] += ",";

    }

      $row2 = mysqli_fetch_array($result2);
      $totalPrice += $row2['Price'];
      echo "<tr>";
      echo "<td>Milk</td>";
      echo "<td>" . $row2['type'] . "</td>";
      echo "<td>" . $row2['Price'] . "</td>";
      echo "</tr>";


    $row3 = mysqli_fetch_array($result3);
    $totalPrice += $row3['Price'];
    echo "<tr>";
    echo "<td>Size</td>";
    echo "<td>" . $row3['Size'] . "</td>";
    echo "<td>" . $row3['Price'] . "</td>";
    echo "</tr>";


    echo "</tbody>";
    echo "</table>";
    echo "<br>";
    }
    if ($totalPrice == 0) {
      echo "<h3>Your Cart is Empty</h3>";
    }
    else {
      echo "<tr><td></td><td>Total:<td>" . $totalPrice . "</td></tr>";
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

  public $conn;
  function create_connection(){
      $this->conn = new mysqli("localhost", "root", "", "coffee_shop");
  }
    public function viewDrinks()
    {
      $this->create_connection();
      $displayDrinksSQL = "SELECT * FROM drink"; 
                       $result = mysqli_query($this->conn,$displayDrinksSQL); 
                       while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td><img src='pics/" . $row['drinkName'] . ".jpg' alt='Italian Trulli' width = '75' height = '75'></td>";
                        echo "<td>" . $row['drinkName'] . "</td>";
                        echo "<td>" . $row['Price'] . " EGP</td>";
                        echo "<td>" . $row['Description'] . "</td>";
                        echo "<td><a class='btn btn-warning' href='edit.php'>Edit</a> &nbsp;
                        <a class='btn btn-danger' href='delete.php'>Delete</a></td>";
                        echo "</tr>";
                        
                      }


    }

    public function viewSizes()
    {
      $this->create_connection();
      $displaySizesSQL = "SELECT * FROM size"; 
      $result = mysqli_query($this->conn,$displaySizesSQL); 
      while ($row = mysqli_fetch_array($result)) {
         echo "<tr>";
         echo "<td>" . $row['id'] . "</td>";
         echo "<td>" . $row['Size'] . "</td>";
         echo "<td>" . $row['Price'] . " EGP</td>";
         echo "<td><a class='btn btn-warning' href='edit.php'>Edit</a> &nbsp;
         <a class='btn btn-danger' href='delete.php'>Delete</a></td>";
         echo "</tr>";
       
     }

    }

    public function viewMilkTypes()
    {
      $this->create_connection();

      $displayTypesSQL = "SELECT * FROM milktype"; 
      $result = mysqli_query($this->conn,$displayTypesSQL); 
      while ($row = mysqli_fetch_array($result)) {
         echo "<tr>";
         echo "<td>" . $row['id'] . "</td>";
         echo "<td>" . $row['Type'] . "</td>";
         echo "<td>" . $row['Price'] . " EGP</td>";
         echo "<td><a class='btn btn-warning' href='edit.php'>Edit</a> &nbsp;
         <a class='btn btn-danger' href='delete.php'>Delete</a></td>";
         echo "</tr>";
       
     }


    }
    public function viewCondiments()
    {
      $this->create_connection();

      $displayCondSQL = "SELECT * FROM condiments"; 
      $result = mysqli_query($this->conn,$displayCondSQL); 
      while ($row = mysqli_fetch_array($result)) {
         echo "<tr>";
         echo "<td>" . $row['id'] . "</td>";
         echo "<td>" . $row['Name'] . "</td>";
         echo "<td>" . $row['Price'] . " EGP</td>";
         echo "<td><a class='btn btn-warning' href='edit.php'>Edit</a> &nbsp;
         <a class='btn btn-danger' href='delete.php'>Delete</a></td>";
         echo "</tr>";
       
     }


    }

    public function viewUsers()
    {
      $this->create_connection();
      $displayUsersSQL = "SELECT * FROM person"; 
      $result = mysqli_query($this->conn,$displayUsersSQL); 
      while ($row = mysqli_fetch_array($result)) {
         echo "<tr>";
         echo "<td>" . $row['ID'] . "</td>";
         echo "<td>" . $row['Name'] . "</td>";
         echo "<td>" . $row['Password'] . "</td>";
         echo "<td>" . $row['Email'] . "</td>";
         echo "<td>" . $row['UserType'] . "</td>";
         if($row['UserType']==1){echo "<td>Customer</td>";}
         else echo "<td>Employee</td>";
         echo "<td><a class='btn btn-warning' href='edit.php'>Edit</a> &nbsp;
         <a class='btn btn-danger' href='delete.php'>Delete</a></td>";
         echo "</tr>";
    }
  }

    public function addToInventory()
    {
      $this->create_connection();

        //Add New Drink
        if(isset($_POST['addDrink']))
        {
            $name = $_POST['drinkName']; 
            $price = $_POST['drinkPrice']; 
            $description = $_POST['drinkDescription'];
            $addNewDrinkSQL = "INSERT INTO size SET Size='$size', Price='$price' "; 
            if ( $this->conn->query($addNewDrinkSQL)) {
              return true;
            } 
            else {return false;}
        }
        // Add New Size
        else if(isset($_POST['addSize']))
        {
            $size = $_POST['size']; 
            $price = $_POST['sizePrice']; 
            $addNewSizeSQL = "INSERT INTO size SET Size='$size', Price='$price' "; 
            if ( $this->conn->query($addNewSizeSQL)) {
              return true;
            } 
            else {return false;}
        }

        // Add New Milk Type
        else if(isset($_POST['addType']))
        {
            $type = $_POST['type']; 
            $price = $_POST['typePrice']; 
            $addNewTypeSQL = "INSERT INTO milktype SET Type='$type', Price='$price' "; 
            if ( $this->conn->query($addNewTypeSQL)) {
              return true;
            } 
            else {return false;}
        }

         // Add New Condiment
         else if(isset($_POST['addCond']))
         {
             $cond = $_POST['condName']; 
             $price = $_POST['condPrice']; 
             $addNewCondSQL = "INSERT INTO condiments SET Name='$type', Price='$price' "; 
             if ( $this->conn->query($addNewCondSQL)) {
               return true;
             } 
             else {return false;}
         }
        


    }

    public function editInventory()
    {

    }

    public function deleteFromInventory()
    {

    }

    


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
