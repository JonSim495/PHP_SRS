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
		$count = count($itemID);

    	// authentication to the database
    	$servername = "localhost";
    	$username = "";
    	$password = "";

    	//Create connection
    	$conn = mysqli_connect($servername, $username, $password);

    	// Check connection
    	if (!$conn) {
    	    die("Connection failed: " . $conn->connect_error);
    	} else {
    		// select database
    		mysqli_select_db($conn, "swe30010");

        	//Get next sales ID from auto increment
    		$sql = "SHOW TABLE STATUS WHERE `Name` = 'Sales';";
        	$result = mysqli_query($conn, $sql);
        	$data = mysqli_fetch_assoc($result);

        	$salesID = $data['Auto_increment'];

        	// Add into Sales table
        	$sql = "INSERT INTO `Sales` (salesID, salesDate, invoice) VALUES($salesID, '$date', '$invoice')";

            if (mysqli_query($conn, $sql)) {
                //Add item into Sales Item table
                $item_count = 0;
        		for ($i=0; $i<$count; $i++){
        			$sql = "INSERT INTO SalesItem (salesID, itemID, itemCount) VALUES ($salesID, '$itemID[$i]', $itemCount[$i])";

        			if (mysqli_query($conn, $sql)){
        				//echo "<p>Item $itemID[$i] has been added to $salesID</p>";
                        $item_count++;
        			} else {
                        echo "Error: $sql <br />" . mysqli_error($conn);
                    }
        		}

                if ($item_count == $count){
            		echo "<div>
            		<script>
            				window.alert('Record added successfully!');
            				window.location.href = 'showSales.html';
            		</script>
                    </div>";
                }
        	} else {
        	    echo "Error: $sql <br />" . mysqli_error($conn);
        	}
        }
        mysqli_close($conn);
    ?>
  </body>

</html>
