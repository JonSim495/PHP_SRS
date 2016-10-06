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

    // Authentication
    $servername = "localhost";
    $username = "";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
        echo '<meta http-equiv="refresh" content="3; URL=https://swe30010.tzhongyan.com/test/inventory/showall.php">';

    }

    //attempt sql update to update table
    $sql="UPDATE `swe30010`.`Inventory` SET itemName = '$itemName', itemDesc = '$itemDesc', itemCount = $itemCount, itemPrice = $itemPrice WHERE itemID=$itemID; ";

    // Run the query
    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
      echo '<meta http-equiv="refresh" content="3; URL=https://swe30010.tzhongyan.com/test/inventory/showall.php">';

    } else {
        echo "Error updating record: " . mysqli_error($conn);
        echo '<meta http-equiv="refresh" content="3; URL=https://swe30010.tzhongyan.com/test/inventory/showall.php">';
    }

    mysqli_close($conn);

    ?>
  </p>
</body>
</html>
