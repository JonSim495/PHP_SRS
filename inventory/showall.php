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
          <div class = "showall">
              <h1>People Health Pharmacy</h1>
              <p id = "showall">Show All</p>
          </div>
             <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="../index.html">PHP SRS</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li><a href="../index.html">Home</a></li>
                      <li><a href="../about.html">About Us</a></li>
                      <li><a href="../contact.html">Contact Us</a></li>
                      <li><a href="#"></a></li>
                    </ul>
                  </div>
            </nav>
          <div style = "height: 800px; overflow-y:auto;">
                <table border="1em" class = "table table-bordered table-striped table-hover">
                      <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Item Count</th>
                        <th>Item Price</th>
                        <th>Edit</th>
                        <th>Deletion</th>
                      </tr>
                <?php
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
                  $sql = "SELECT * FROM `swe30010`.`Inventory`";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>". $row["itemID"]. "</td>" .
                         "<td>". $row["itemName"]. "</td>" .
                         "<td>". $row["itemDesc"]. "</td>" .
                         "<td>". $row["itemCount"]. "</td>" .
                         "<td>". $row["itemPrice"]. "</td>".
                     "<td><a href=\"edit.php?id=". $row["itemID"] ."\">Edit</a></td>" .
                     "<td><a href=\"delete.php?id=". $row["itemID"] ."\" onclick=\"return confirm('Are you sure?'); \">Delete</a></td>";
                    echo "</tr>";
                  }
                } else {
                    echo "0 results";
                }

                  //Close connection
                  mysqli_close($conn);
                ?>
              </table>
          </div>
      </div>
</body>
</html>
