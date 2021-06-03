<html>

    <head>

       
        <!-- Main css -->
        <link rel="stylesheet" href="Style/Style.css?v=<?php echo time(); ?>">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Sign up </title>

    
<?php 
    include "../php/classes.php";

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


    <body style="background-color:#ffd9b0;">

        
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                    
                    <img src="images/coffee2.jpg" 
                    style="width=400px; height:583px; padding-right:100px;">
                    

                </div>

                <div class="col-md-6">
                    <h1 style="text-align:center;"> Sign Up </h1>
                    <form method="post" action="../../login.php">
                        <div class="formList">
                                <label> Username </label>
                                <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label> Email </label>
                                <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label> Password </label>
                                <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label> Confirm Password </label>
                                <input type="password" name="confirmPassword" class="form-control" required>
                        </div>
                        <input type="submit" value="sign up" name="submit" class="btn btn-primary">
                    </form>
                </div>


            </div>
        </div>

    </body>

</html>
