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
        echo '
        
{
    "sales":[
    {
        "salesID":"1",
        "invoice":"INV0001",
        "date":"2012-01-10"
    },
    {
        "salesID":"2",
        "invoice":"INV0002",
        "date":"2012-01-12"
    }

    ],
    "salesItem":[
    {
        "salesID": "1",
        "salesCount": "1",
        "itemName": "Rivoltri",
        "itemPrice": "12.30",
        "itemID":"1"
    },
    {
        "salesID": "1",
        "salesCount": "1",
        "itemName": "Apani",
        "itemPrice": "12.30",
        "itemID":"2"
    },
    {
        "salesID": "2",
        "salesCount": "2",
        "itemName": "Rivoltri",
        "itemPrice": "12.30",
        "itemID":"2"
    },
    {
        "salesID": "2",
        "salesCount": "1",
        "itemName": "Apani",
        "itemPrice": "12.30",
        "itemID":"2"
        
    },
    {
        "salesID": "2",
        "salesCount": "5",
        "itemName": "Another item",
        "itemPrice": "32.30",
        "itemID":"3"
    }
    ]

}
        ';
    }

    mysqli_close($conn);

?>
