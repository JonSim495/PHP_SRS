<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $date = $_POST["date"];
    if ($date == ""){
        // TODO: when date is not available, show the ajax for month report available
        echo "[]";    
    } else {
        // TODO: when date is available, show the sales of the month
        echo "[]";
    }

?>
