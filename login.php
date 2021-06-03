<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<?php
			include "php/classes.php";
			// If form submitted, insert values into the database.
			if (isset($_POST['submit'])){
			  $x = new client();
				$x->login($_POST['username'], $_POST['password']);
			}
		?>
		<div class="form">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
		<input type="text" name="username" placeholder="Username" required />
		<input type="password" name="password" placeholder="Password" required />
		<input name="submit" type="submit" value="Login" />
		</form>
		<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
		</div>
	</body>
</html>
