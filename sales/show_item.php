<?php

  /* Reference:- http://www.w3schools.com/js/js_json_sql.asp */
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  $servername = "localhost";
  $username = "";
  $password = "";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
  }
  // Attempt query, MySQL calls within $sql. 
  //You can test in phpMyAdmin to see if there's any syntax error or functionality beforehand.
  $sql = "SELECT * FROM `swe30010`.`Inventory`";
  $result = mysqli_query($conn, $sql);

  $output = "[";
  while ($row = mysqli_fetch_assoc($result)){
    if ($output != "[") {$output.=",";}

    $output .= '{"itemID":"'.$row["itemID"].'",';
    $output .= '"itemName":"'.$row["itemName"].'",';
    $output .= '"itemCount":"'.$row["itemCount"].'"}';
  }

  $output .="]";
  //remember to close connection
  mysqli_close($conn);

  echo($output);
?>
