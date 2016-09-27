<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title>Sales module</title>
  </head>
  <body>
    <table border="1em">
      <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Item Count</th>
        <th>Item Price</th>
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
</body>
</html>

