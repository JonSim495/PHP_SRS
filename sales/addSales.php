<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8 /">
    <title>Add status</title>
  </head>

  <body>
    <?php
      // get post item
    	$invoice = $_POST["invoice"];
    	$date = $_POST["date"];
    	$itemID = $_POST["id"];
		$itemCount = $_POST["count"];

    	// authentication to the database
    	$servername = "localhost";
    	$username = "";
    	$password = "";

    	//Create connection
    	$conn = mysqli_connect($servername, $username, $password);

    	// Check connection
    	if (!$conn) {
    	    die("Connection failed: " . $conn->connect_error);
    	}

    	//Get next sales ID from auto increment
    	$result = mysqli_query($conn, "USE swe30010;SHOW TABLE STATUS WHERE name='Sales';");
    	$data = mysqli_fetch_assoc($result);

		echo "data=".$data."<br />";

    	$salesID = $data['Auto_increment'];
		
		echo "salesID=".$salesID."<br />";

    	// Add into Sales table
    	$sql = "INSERT INTO `swe30010`.`Sales` (salesID, salesDate, invoice) VALUES($salesID, '$date', '$invoice')";
		echo $sql;

/*
      $if (mysqli_query($conn, $sql)) {
    	    echo "<h1>Record added into Sales table.</h1>";
    	} else {
    	    echo "Error: $sql <br />" . mysqli_error($conn);
    	}


    	//Add item into Sales Item table
    	foreach($i as $item){
    	    //do sth?
    	    $itemID = $i["id"];
    	    $itemCount = $i["count"];
    	    $sql = "INSERT INTO `swe30010`.`SalesItem` (salesID, itemID, itemCount)
    	            VALUES ($salesID, $itemID, $itemCount)";

          $if (mysqli_query($conn, $sql)){
          echo "<p>Item $itemID added into Sales table.</p>";
    	    }
    	}
*/
        mysqli_close($conn);
    ?>
  </body>

</html>
