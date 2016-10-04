<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Show sales</title>
    <script src="das.js"></script>
</head>

<body> 
    <table border="1em" onload="manTable()">
    <thead>
        <tr>
	    <th>Sales ID</th>
	    <th>Invoice number</th>
	    <th>Date</th>
	    <th>Items</th>
	    <th>Amount of Purchase</th>
	    <th>Total Amount</th>
	</tr>
    </thead>

    <tbody>
        <?php
            $servername = "localhost";
            $username = "";  // fill in authentication data, starred on slack
            $password = "";

	    $conn = mysqli_connect($servername, $username, $password);

	    if(!$conn){
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $sql = "SELECT * FROM `swe30010`.`Sales`";
	    $result = mysqli_query($conn, $sql);

	    if (mysqli_num_rows($result) > 0){
   	        while ($row = mysqli_fetch_assoc($result)){
		    // second query on sales item
                    $sql = "SELECT I.itemName, SI.itemCount, I.itemPrice
		            FROM `swe30010`.`Inventory` I, `swe30010`.`SalesItem` SI, `swe30010`.`Sales` S 
			    WHERE SI.salesID=" . $row["salesID"] ." AND I.itemID=SI.itemID
		           ";
	            $result2 = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result2);

		    echo "<tr>";
		    echo "<td rowspan=\"" .$count. "\">" . $row["salesID"] . "</td>";
		    echo "<td rowspan=\"" .$count. "\">" . $row["invoice"] . "</td>";
		    echo "<td rowspan=\"" .$count. "\">" . $row["date"] . "</td>";

		    $total = 0;
		    $idnum=1;
		    //print out all associated items
		    while ($row2 = mysqli_fetch_assoc($result2)){
		        echo "<td>" . $row2["itemName"] . "</td>";
		        echo "<td>" . $row2["itemCount"] . "</td>";
			$total += $row2["itemCount"] * $row2["itemPrice"];
			echo "<td class=\"rem\" id=\"" . $idnum++ . "\" rowspan=\"\">" . $total . "</td>";
			// will edit it later in jscript
			echo "</tr>";
			echo "<tr>";
		    }

		    echo "</tr>";
		}
	    }
	?>

    </tbody>
    </table>
</body>
</html>
