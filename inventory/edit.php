<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Inventory Status</title>
<head>

<body>
<?php
      // get info
      $itemID    = $_GET['id'];

      // authentication to the database
      $servername = "localhost";
      $username = ""; 
      $password = "";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password);
      // Check connection
      if (!$conn) {
	  die("Connection failed: " . $conn->connect_error);
      }
      // Attempt query to select item for itemID
      $sql = "SELECT * FROM `swe30010`.`Inventory` where itemID=$itemID";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)>0){
	      while ($row = mysqli_fetch_assoc($result)){
                  echo "<h1>Edit item for " . $row["itemName"] . "</h1>";
		  echo "<p>Item Name: <input type=\"text\" name=\"itemName\" value=\"" . $row["itemName"] . "\" /></p><br />";
		  echo "<p>Item Description: <br /><textarea rows=\"15\" cols=\"90\" name=\"itemDesc\">" . $row["itemDesc"] . "</textarea></p><br />";
		  echo "<p>Item Count: <input type=\"text\" name=\"itemCount\" value=\"" . $row["itemCount"] . "\" /></p><br />";
		  echo "<p>Item Price: <input type=\"text\" name=\"itemPrice\" value=\"" . $row["itemPrice"] . "\" /></p><br />";
	      }
      } else {
	    echo "<p>No item assoctioted with the id</p>\n";
      }

      //remember to close connection
      mysqli_close($conn);
?>
</body>
<html>
