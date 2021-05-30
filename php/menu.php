<?php
include "classes.php";
$GLOBALS['client']=new client();

function viewMenu(){
  $result=$GLOBALS['client']->displayMenu();

  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Price'] . "</td>";
    // echo "<td align='center'><type='button' name='add' >Add</a></td>";
    echo "</tr>";
  }
}

switch ($_POST['q']) {
  case 'view':
    viewMenu();
    break;
}
?>
<!-- <label for="fname">First name:</label>
<input type="radio" name="favorite_pet" value="Cats">Cats<br>
<label for="fname">First name:</label>
<input type="radio" name="favorite_pet" value="Dogs">Dogs<br>
<label for="fname">First name:</label>
<input type="radio" name="favorite_pet" value="Birds">Birds<br>
<label for="fname">First name:</label> -->
