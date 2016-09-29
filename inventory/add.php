<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Inventory Status</title>
<head>

<body>
	<h1>Status Report</h1>
	<p>
	<?php
	      // get post info
	      //$itemID    = $_POST['itemID'];
	      $itemName  = $_POST['itemName'];
	      $itemDesc  = $_POST['itemDesc'];
	      $itemCount = $_POST['itemCount'];
	      $itemPrice = $_POST['itemPrice'];

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
	      // Attempt query to add
	      $sql = "INSERT INTO `swe30010`.`Inventory` (itemID, itemName, itemDesc, itemCount, itemPrice)
	      VALUES(DEFAULT,'$itemName', '$itemDesc', '$itemCount', '$itemPrice')";
	      if (mysqli_query($conn, $sql)){
		    echo "Record added successfully";
	      } else {
		    echo "Error: " . $sql . "<br />" . mysqli_error($conn);
	      }

	      /* Manipulate with $result, should have rows */

	      //remember to close connection
	      mysqli_close($conn);
	?>
	</p>
</body>
<html>
