<?php
    //get info
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Attempt query
    $sql = "DELETE FROM `swe30010`.`SalesItem` WHERE salesID = " . $id .";";

    if (mysqli_query($conn, $sql)) {
        echo "Record " . $id . " deleted successfully from sales item <br />";
    } else {
        echo "Error: " . $sql . "<br />" . mysqli_error($conn);
    }
    $sql = "DELETE FROM `swe30010`.`Sales` WHERE salesID = " . $id .";";

    if (mysqli_query($conn, $sql)) {
        echo "Record " . $id . " deleted successfully from sales";
    } else {
        echo "Error: " . $sql . "<br />" . mysqli_error($conn);
    }

    //close connection
    mysqli_close($conn);
?>

