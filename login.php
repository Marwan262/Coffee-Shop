<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>

		<!-- Main css -->
		<link rel="stylesheet" href="Registration/Style/Style.css?v=<?php echo time(); ?>">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>
	<body style="background-color:#ffd9b0;">
		<?php
			include_once "php/dbClass.php";
			session_start();
			if (isset($_POST['submit'])){
				$_SESSION['username'] = $_POST['username'];
			  $x = new client();
				$x->login($_POST['username'], $_POST['password']);
			}
		?>
		<div class="container">
				<div class="row">
						<div class="col-md-6">


								<img src="Registration/images/coffee2.jpg"
								style="width=400px; height:583px; padding-right:100px;">
						</div>

								<div class="col-md-6">
										<h1 style="text-align:center;"> Log In </h1>
										<form method="post" action="../../login.php">
                        <div class="formList">
                                <label> Username </label>
                                <input type="text" name="username" placeholder="Username" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label> Password </label>
                                <input type="text" name="password" placeholder="Password" class="form-control" required>
                        </div>

                        <input type="submit" value="Login" name="submit" class="btn btn-primary">
												<br>
												<p>Not registered yet? <a href='Registration/signup.php'>Register Here</a></p>
												<br>
                    </form>
<p></p>

								</div>

						</div>
					</div>
				</div>

	</body>
</html>
