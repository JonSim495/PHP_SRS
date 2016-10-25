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
            $sql = "SELECT DISTINCT MONTH(salesDate) AS month, YEAR(salesDate) AS year FROM `swe30010`.`Sales`";
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
        echo "[]";
    }

    mysqli_close($conn);

?>
