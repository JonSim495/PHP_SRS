<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width = device - width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link ref = "stylesheet" type = "text/css" href = "style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
                background-color: aliceblue;
                background-image: url("images/capture_01.jpg");
            } 
            .container {
                height: 1070px;
                box-shadow: 3px 3px 3px rgba(0, 0, 0, .5);
                background-color: white;
            }
            
            .navbar {
                width: 1140px;
            }
            
            #showall {
                font-size: 150%;
            }
            
            #home {
                font-size: 150%;
            }
            
            #inventory_data {
                font-size: 150%;
            }
            
            #form1 {
                margin-left: 420px;
                margin-top: 100px;
                margin-right: 430px;
                padding-left: 30px;
                padding-top: 50px;
                padding-bottom: 60px;
                box-shadow: 3px 3px 3px rgba(0, 0, 0, .5);
                background-color: #f2f2f2;
            }
            
            #form2 {
                margin-left: 100px;
                margin-top: 20px;
                margin-right: 100px;
                margin-bottom: 70px;
                padding-left: 30px;
                padding-top: 50px;
                padding-bottom: 60px;
                box-shadow: 3px 3px 3px rgba(0, 0, 0, .5);
                background-color: #f2f2f2;
            }
            
            .row1{
                margin-top: 100px;
            }
            
            div.srs1 {
                 width: 300px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align: center;
            } 
            
            .row2{
                margin-top: 100px;
                margin-left: 150px;
            }
            
            div.srs2 {
                 width: 300px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align: center;
            }
        
        </style>      
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
                      <a class="navbar-brand" href="https://swe30010.tzhongyan.com/test/index.html">PH SRS</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="home.html">Home</a></li>
                      <li><a href="about.html">About Us</a></li>
                      <li><a href="contact.html">Contact Us</a></li>
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
                  $username = "swe30010";
                  $password = "#EDC4rfv";

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

