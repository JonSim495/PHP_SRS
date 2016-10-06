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
<head>

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
                  $username = "swe30010"; 
                  $password = "#EDC4rfv";

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
                    echo '<meta http-equiv="refresh" content="3; URL=https://swe30010.tzhongyan.com/test/inventory/showall.php">';
                  } else {
                    echo "Error: " . $sql . "<br />" . mysqli_error($conn);
                  }

                  /* Manipulate with $result, should have rows */

                  //remember to close connection
                  mysqli_close($conn);

            ?>
            </p>
    </div>
</body>
<html>
