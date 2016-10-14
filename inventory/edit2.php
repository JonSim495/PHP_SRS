<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width = device - width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../style/style.css" rel="stylesheet"/>
        <title>Edit status</title>
</head>

<body>
        <div class = "container">
            <div>
                <h1>People Health Pharmacy</h1>
                <p id = "home">Edit Status</p>
            </div>
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="../index.html">PHP SRS</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class=><a href="../index.html">Home</a></li> 
                  <li><a href="../about.html">About Us</a></li>
                  <li><a href="../contact.html">Contact Us</a></li>
                  <li><a href="#"></a></li>
                </ul>
              </div>
            </nav>
          </div>


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
                echo '<meta http-equiv="refresh" content="3; URL=showall.php">';

            }

            //attempt sql update to update table
            $sql="UPDATE `swe30010`.`Inventory` SET itemName = '$itemName', itemDesc = '$itemDesc', itemCount = $itemCount, itemPrice = $itemPrice WHERE itemID=$itemID; ";

            // Run the query
            if (mysqli_query($conn, $sql)) {
              echo "Record updated successfully";
              echo '<meta http-equiv="refresh" content="3; URL=showall.php">';

            } else {
                echo "Error updating record: " . mysqli_error($conn);
                echo '<meta http-equiv="refresh" content="3; URL=showall.php">';
            }

            mysqli_close($conn);

            ?>
          </p>
    </div>
</body>
</html>
