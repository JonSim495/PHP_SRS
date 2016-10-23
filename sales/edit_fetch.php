<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "";
$password = "";

$id = $_POST["id"];
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `swe30010`.`Sales` WHERE salesID=$id";
$result = mysqli_query($conn, $sql);
$output = "{\"sales\":[";

$flag=false;
while ($row = mysqli_fetch_assoc($result)){
    if($flag){
        $output .= ",";
    }

    $output .= '{"salesID":"'.$row["salesID"].'",';
    $output .= '"invoice":"'.$row["invoice"].'",';
    $output .= '"salesDate":"'.$row["salesDate"].'"}';
    $flag = true;
}

// TODO: enquiry for items in that particular sales
$output .= "]}";

echo $output;
//remember to close connection
mysqli_close($conn); 
?>
