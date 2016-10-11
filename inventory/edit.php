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
              <h1>People Health Pharmacy</h1>
              <p id = "inventory_data">Edit</p>
          </div>
             <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="home.html">PH Pharmacy</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="home.html">Home</a></li>
                      <li><a href="about.html">About Us</a></li>
                      <li><a href="contact.html">Contact Us</a></li>
                      <li><a href="#"></a></li>
                    </ul>
                  </div>
            </nav>

        <form method="post" action="edit2.php" id="form2">
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
              }
              // Attempt query to select item for itemID
              $sql = "SELECT * FROM `swe30010`.`Inventory` where itemID=$itemID";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result)>0){
                  while ($row = mysqli_fetch_assoc($result)){
                  echo "<h1>Edit item for " . $row["itemName"] . "</h1>";
                  echo "<div class =\"form-group\"><label for=\"ItemID\">Item ID: <input type=\"text\" id=\"ItemID\"name=\"itemID\" value=\"" . $row["itemID"] . "\" class=\"form-control\" placeholder=\"Item Description\" readonly /></label></div>";
                      echo "<div><label for=\"itemName\">Item Name: <input type=\"text\" id=\"itemName\" name=\"itemName\" value=\"" . $row["itemName"] . "\" class=\"form-control\" placeholder=\"Item Description\" required /></label></div>";
                      echo "<div><label for=\"itemDesc\">Item Description: <br /><textarea rows=\"15\" cols=\"90\" id=\"itemDesc\" name=\"itemDesc\" class=\"form-control\" placeholder=\"Item Description\">" . $row["itemDesc"] . "</textarea></label></div>";
                      echo "<div><label for=\"itemCount\">Item Count: <input type=\"text\" id=\"itemCount\" name=\"itemCount\" value=\"" . $row["itemCount"] . "\" class=\"form-control\" placeholder=\"Item Description\" required /></label></div>";
                      echo "<div><label for=\"itemPrice\">Item Price: <input type=\"text\" id=\"itemPrice\" name=\"itemPrice\" value=\"" . $row["itemPrice"] . "\" class=\"form-control\" placeholder=\"Item Description\" required /></label></div>";
                  }
              } else {
                echo "<p>No item assoctioted with the id</p>\n";
              }

              //remember to close connection
              mysqli_close($conn);
        ?>

        <button type = "submit" class="btn btn-default btn-lg">Submit</button>
        </form>

    </div>
</body>
</html>
