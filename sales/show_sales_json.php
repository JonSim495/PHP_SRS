<?php


    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $servername = "localhost";
    $username = "";  // fill in authentication data, starred on slack
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);

    if(!$conn){
	die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `swe30010`.`Sales`";
    $result = mysqli_query($conn, $sql);
    
    //start of ajax file
    $output = "[";

    if (mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)){
	    if ($output != "["){
	        $output .= ",";
	    }

	    // include salesID in ajax file
	    $output .= "{\"salesID\":\"" . $row["salesID"] . "\",";
	    $output .= "\"salesDate\":\"" . $row["salesDate"] . "\",";
	    $output .= "\"invoice\":\"" . $row["invoice"] . "\",";
	    // all items associated with the sales ID
	    $output .= "\"itemInfo\":[";

            // second query on sales item
	    $sql = "SELECT DISTINCT I.itemName, SI.itemCount, I.itemPrice
		    FROM `swe30010`.`Inventory` I, `swe30010`.`SalesItem` SI, `swe30010`.`Sales` S 
		    WHERE SI.salesID=" . $row["salesID"] ." AND I.itemID=SI.itemID
		   ";
	    $result2 = mysqli_query($conn, $sql);
	    //print out all associated items

	    $first = true;
	    while ($row2 = mysqli_fetch_assoc($result2)){
	        if (!$first)
		    $output .= ",";
	        //itemName, count and price into ajax
		$output .= "{\"itemName\":\"" . $row2["itemName"] . "\",";
		$output .= "\"itemCount\":\"" . $row2["itemCount"] . "\",";
		$output .= "\"itemPrice\":\"" . $row2["itemPrice"]. "\"}";
		$first = false;
	    }
	//close bracket for each sales
	$output .= "]}";
	}
    }

    //close ajax bracket
    $output .= "]";

    echo($output);

    mysqli_close($conn);
?>

