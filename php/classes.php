<?php
abstract class Database_Handler{
  public $conn;
  function create_connection(){
      $this->conn = new mysqli("localhost", "root", "", "coffee_shop");
  }
  function close_connection(){
      $this->conn->close();
  }
 //  abstract function insert($fields);
 //  abstract function update($fields);
 // abstract function delete($fields);
 //  abstract function by_id($id);
 //  abstract function by_data($fields);
  abstract function displayMenu();
  }



abstract class User
{
  public $conn;
  function create_connection(){
      $this->conn = new mysqli("localhost", "root", "", "hotel");
  }

}

class client extends User{
  function displayMenu(){
    $this->create_connection();
    $sql1 = "SELECT * FROM beverages";
    // $sql2 = "SELECT * FROM condiments";
    // $sql3 = "SELECT * FROM drinks";
    $result=mysqli_query($this->conn,$sql1);
    return $result;
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
 

}




?>
