<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title>Sales module</title>
	  <meta name = "viewport" content = "width = device - width, initial-scale=1" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link ref = "stylesheet" type = "text/css" href = "style.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="../style/style.css" rel="stylesheet"/> 
  </head>

  <body>
  <div class = "container">
            <div>
                <h1>People Health Pharmacy</h1>
                <p id = "home">Reporting System</p>
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
    <?php
      //get info
      $id = $_GET['id'];

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
      $sql = "DELETE FROM `swe30010`.`SalesItem` WHERE salesID = " . $id .";";
      
      if (mysqli_query($conn, $sql)) {
        echo "Record " . $id . " deleted successfully from sales item <br />";
      } else {
         echo "Error: " . $sql . "<br />" . mysqli_error($conn);
      }
      $sql = "DELETE FROM `swe30010`.`Sales` WHERE salesID = " . $id .";";
      
      if (mysqli_query($conn, $sql)) {
        echo "Record " . $id . " deleted successfully from sales";
      } else {
         echo "Error: " . $sql . "<br />" . mysqli_error($conn);
      }

      //close connection
      mysqli_close($conn);
    ?>
  </div>
</body>
</html>
