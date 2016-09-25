-<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title>Sales module</title>
  </head>
  <body>
 
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
      $sql = "UPDATE sales ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
    // output data of each row
   echo "Record updated successfully";
    } else {
        echo "0 results";
    }
      //Close connection
      mysqli_close($conn);
    ?>
  </table>
</body>
</html>
