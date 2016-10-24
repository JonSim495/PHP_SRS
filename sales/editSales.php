<?php
    // get post item
    $invoice = $_POST["invoice"];
    $date = $_POST["date"];
    $itemID = $_POST["id"];
    $itemCount = $_POST["count"];
    $salesID = $_POST["salesID"];
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
    
        // Edit sales table
        $sql = "UPDATE `swe30010`.`Sales` SET salesDate='$date', invoice='$invoice' WHERE salesID=$salesID";
        if (mysqli_query($conn, $sql)) {
            // Remove all items from sales table
            $sql = "DELETE FROM `swe30010`.`SalesItem` WHERE salesID=$salesID;";
            if (mysqli_query($conn, $sql)){                
                //Add all item into Sales Item table
                $item_count = 0;
                for ($i=0; $i<$count; $i++){
                    $sql = "INSERT INTO `swe30010`.`SalesItem` (salesID, itemID, itemCount) VALUES ($salesID, '$itemID[$i]', $itemCount[$i])";
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
                            window.alert('Record edited successfully!');
                            window.location.href = 'showSales.html';
                    </script>
                    </div>";
                }
            } else {
                echo "Error: " . $sql . "<br />" . mysqli_error($conn);
            }
        } else {
            echo "Error: $sql <br />" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
 ?>
