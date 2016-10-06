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
          echo '<meta http-equiv="refresh" content="3; URL=https://swe30010.tzhongyan.com/test/inventory/showall.php">';

	      }
	      // Attempt query to add
	      $sql = "DELETE FROM `swe30010`.`Inventory` where itemID=$itemID";
	      if (mysqli_query($conn, $sql)){
		    echo "Record " . $itemID . " removed successfully";
            echo '<meta http-equiv="refresh" content="3; URL=https://swe30010.tzhongyan.com/test/inventory/showall.php">';

	      } else {
		    echo "Error: " . $sql . "<br />" . mysqli_error($conn);
            echo '<meta http-equiv="refresh" content="3; URL=https://swe30010.tzhongyan.com/test/inventory/showall.php">';

	      }

	      //remember to close connection
	      mysqli_close($conn);
	?>
	</p>
</body>
<html>
