<?php  

    //include 'DBconnection.php';  
    //session_start();

    class SignUpDB{   //DBconnection
        public $host = 'localhost'; //host NAME.
        public $database = 'coffee-shop'; //Database Name
        public $dbusername = 'root'; //Database Username
        public $dbpassword = ''; //Database Password
        public $conn;
    
        function __construct() {
             
            $this->conn = new mysqli($this->host,$this-> dbusername, $this->dbpassword,$this->database); 
        /*    if(!$conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }    */
            if (mysqli_connect_error()) {
                die('Connect Error (' . mysqli_connect_errno() . ') '
                        . mysqli_connect_error());
            }
            //return $conn;  
        } 
        
        

        public function close(){
            mysqli_close(); 
        }
           public function isUserExist($email,$usertype){  
            //global $db;
            //global $conn;
            $sql= "SELECT * FROM person WHERE Email = '".$email."' and UserType='".$usertype."' ";
            $result =  $this->conn->query($sql);
            if ($result) {//mysqli_query($this->conn, $sql)
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
            //global $db;
            //global $conn;
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


?>