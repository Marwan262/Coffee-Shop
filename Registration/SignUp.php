<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>sign up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

   

<?php 
    include "Database/SignUpDB.php";

    $SignUpObj = new SignUpDB;

    if(isset($_POST['submit'])){  
        $username = $_POST['username'];  
        $password = $_POST['password'];  
        $confirmP = $_POST['confirmPassword'];  
        $email = $_POST['email'];  
        $usertype= "1";

       

        //check email and password validation
        if($password == $confirmP && filter_var($email, FILTER_VALIDATE_EMAIL) ){  

            $userCheck = $SignUpObj->isUserExist($email,$usertype);  
            if($userCheck){  
                //echo "hello"; //testing
                echo "<script>alert('Email Already Exist')</script>";  
            }
            else{
                $register = $SignUpObj->UserRegister($username,$email, $password);  
                if($register){  
                    //echo "hello"; //testing
                     echo "<script>alert('Registration Successful')</script>";  
                }else{  
                    echo "<script>alert('Registration Not Successful')</script>";  
                }  
            }  
        } 
        else if($password != $confirmP){    //validate matching passwords
            echo "<script>alert('Password Not Match')</script>";  
        } 
        else if(filter_var($email, FILTER_VALIDATE_EMAIL) !== true){  //validate email
            echo "<script>alert('Email is not valid')</script>";
        }  

        }  
      

?>

    
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="images/coffee2.jpg" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form id="booking-form" method="post">
                        <h2>Sign up </h2>
                        <div class="form-group form-input">
                            <input type="text" name="username" class="username" value="" required >
                            <label  class="form-label">Username</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="text" name="email" class="email" value="" required >
                            <label  class="form-label">Email</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="password" name="password" class="password" value="" required >
                            <label class="form-label">Password</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="password" name="confirmPassword" class="confirmPassword" value="" required >
                            <label class="form-label">Confirm Password</label>
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Sign up" name="submit" class="submit" >
                        </div> <br>
                        <h2 style="font-size:12px;"> do you have an account already ? <a href="#"> Sign in</a></h2>
                        <!-- update sign in link -->
                        
                        
                    </form>
                    
                </div>
            </div>
        </div>

    </div>

    
</body>
</html>