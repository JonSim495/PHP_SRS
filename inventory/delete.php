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
	      // Attempt query to add
	      $sql = "DELETE FROM `swe30010`.`Inventory` where itemID=$itemID";
	      if (mysqli_query($conn, $sql)){
		    echo "Record " . $itemID . "remove successfully";
	      } else {
		    echo "Error: " . $sql . "<br />" . mysqli_error($conn);
	      }

	      //remember to close connection
	      mysqli_close($conn);
	?>
	</p>
</body>
<html>
