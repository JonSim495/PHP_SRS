<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $date = $_GET["date"];

    $servername = "localhost";
    $username = "";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password);

    if ($date == ""){
        // when date is empty, show the ajax for month report available
        if (!$conn){
            // no connection
            echo "[]";
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "SELECT DISTINCT MONTH(salesDate) AS month, YEAR(salesDate) AS year FROM `swe30010`.`Sales` ORDER BY month ASC, year ASC";
            $result = mysqli_query($conn, $sql);

            // start of json
            $output = "[";
            while ($row = mysqli_fetch_assoc($result)){
                if ($output != "["){
                    $output .= ",";
                }

                // dates available
                $output .= '{"date":"' . $row["year"] . '-' . $row["month"] . '"}';
            }
            // end of json
            $output .= "]";
            echo $output;

        }
    } else {
        // TODO: when date is available, show the sales of the month
        $md = explode("-", $date);
        $sql = "SELECT * FROM `swe30010`.`Sales` WHERE MONTH(salesDate)=$md[1] AND YEAR(salesDate)=$md[0]";
        $result = mysqli_query($conn, $sql);
        
        // start of json
        $output = '{"sales":[';
        $output2 = '[';
        while ($row = mysqli_fetch_assoc($result)){
            if ($output != '{"sales":['){
                $output .= ',';
            }
            
            // sales ID
            $output .= '{"salesID":"' . $row["salesID"] . '",';
            $output .= '"invoice":"' . $row["invoice"] . '",';
            $output .= '"date":"' . $row["salesDate"] . '"}';

            // for each sales ID, find its sales item detail
            $id = $row["salesID"];
            $sql2 = "SELECT SI.salesID AS id, SI.itemCount AS count, I.itemName AS name, I.itemPrice as price, SI.itemID as item FROM `swe30010`.`SalesItem` SI, `swe30010`.`Inventory` I WHERE SI.salesID=$id AND SI.itemID=I.itemID";
            $result2 = mysqli_query($conn, $sql2);

            while($row2 = mysqli_fetch_assoc($result2)){
                if ($output2!='['){
                    $output2 .= ',';
                }
                $output2 .= '{"salesID":"' . $row2["id"] . '",';
                $output2 .= '"salesCount":"' . $row2["count"] . '",';
                $output2 .= '"itemName":"' . $row2["name"] . '",';
                $output2 .= '"itemPrice":"' . $row2["price"] . '",';
                $output2 .= '"itemID":"' . $row2["item"] . '"}';
            }
        }
        $output .= '],"salesItem":' . $output2;
        $output .= ']}';
        echo $output;
    }

    mysqli_close($conn);

?>
