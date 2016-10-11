<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width = device - width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../style/style.css" rel="stylesheet"/>
        <title>Sales module</title>
</head>

<body>

    <div class = "container">
          <div>
              <h1>People Health Pharmacy</h1>
              <p id = "inventory_data">Add</p>
          </div>


            <p>Status Report</p>
            <p>
            <?php
                  // get post info
                  //$itemID    = $_POST['itemID'];
                  $itemName  = $_POST['itemName'];
                  $itemDesc  = $_POST['itemDesc'];
                  $itemCount = $_POST['itemCount'];
                  $itemPrice = $_POST['itemPrice'];

                  // authentication to the database
                  $servername = "localhost";
                  $username = "";
                  $password = "";

                  // Create connection
                  $conn = mysqli_connect($servername, $username, $password);
                  // Check connection
                  if (!$conn) {
                  die("Connection failed: " . $conn->connect_error);
                  }
                  // Attempt query to add
                  $sql = "INSERT INTO `swe30010`.`Inventory` (itemID, itemName, itemDesc, itemCount, itemPrice)
                  VALUES(DEFAULT,'$itemName', '$itemDesc', '$itemCount', '$itemPrice')";
                  if (mysqli_query($conn, $sql)){
                    echo "Record added successfully";
                    echo '<meta http-equiv="refresh" content="3; URL=showall.php">';
                  } else {
                    echo "Error: " . $sql . "<br />" . mysqli_error($conn);
                  }

                  //remember to close connection
                  mysqli_close($conn);

            ?>
            </p>
    </div>
</body>
</html>
