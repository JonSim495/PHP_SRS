<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit status</title>
</head>

<body>
  <p>
  <?php
    // get post info
    $itemID    = $_POST['itemID'];
    $itemName  = $_POST['itemName'];
    $itemDesc  = $_POST['itemDesc'];
    $itemCount = $_POST['itemCount'];
    $itemPrice = $_POST['itemPrice'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    //attempt sql update to update table
    $sql="UPDATE `swe30010`.`Inventory`
          SET itemName = $itemName,
              itemDesc = $itemDesc,
              itemCount = $itemCount,
              itemPrice = $itemPrice
          WHERE itemID=$itemID;";

    // Run the query
    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    ?>
  </p>
</body>
</html>
