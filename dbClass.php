<?php
class db{
  private $host="localhost";
  private $user="root";
  private $pass="";
  private $dbName="coffee_shop";

  protected function connect(){
    $conn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
    $pdo = new PDO($conn,$this->user,$this->pass);
    $pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;

  }
}
 ?>
