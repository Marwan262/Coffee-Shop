<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
  </head>
  <body>
    <h1>Your Profile</h1>
    <?php
    ob_start();
    include "login.php";
    $data = ob_get_clean();
      $con=mysqli_connect("localhost","root","","coffee_shop");
      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $x = $_SESSION["username"];
      $result = mysqli_query($con,"SELECT * FROM person WHERE Name ='$x'");

      echo "<table border='1'>
      <tr>
      <th>Username</th>
      <th>Password</th>
      <th>User Type</th>
      <th>Email</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['Password'] . "</td>";
      echo "<td>" . $row['UserType'] . "</td>";
      echo "<td>" . $row['Email'] . "</td>";
      echo "</tr>";
      }
      echo "</table>";

      mysqli_close($con);
    ?>
  </body>
</html>
