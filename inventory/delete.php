<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width = device - width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../style/style.css" rel="stylesheet"/>
        <title>Add Inventory Status</title>
</head>

<body>
    <div class = "container">
          <div>
              <h1>Delete status</h1>
              <p id = "home">Delete</p>
          </div>

            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="../index.html">PHP SRS</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="../index.html">Home</a></li>
                  <li class="active"><a href="../inventory/index.html">Inventory</a></li>
                  <li><a href="../report/index.html">Report</a></li>
                  <li><a href="../sales/index.html">Sales</a></li>
                </ul>
              </div>
            </nav>

        <p>
        <?php
              // get info
              $itemID    = $_GET['id'];

              // authentication to the database
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
              // Attempt query to delete
              $sql = "DELETE FROM `swe30010`.`Inventory` where itemID=$itemID";
              if (mysqli_query($conn, $sql)){
                echo "Record " . $itemID . " removed successfully";
                echo '<meta http-equiv="refresh" content="3; URL=showall.php">';
              } else {
                echo "Error: " . $sql . "<br />" . mysqli_error($conn);
                echo '<meta http-equiv="refresh" content="3; URL=showall.php">';

              }

              //remember to close connection
              mysqli_close($conn);
        ?>
        </p>

    </div>
</body>
</html>
