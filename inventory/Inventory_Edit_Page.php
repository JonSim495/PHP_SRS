<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Inventory Data</title>
</head>

<body>
	<form action="edit.php" method="post">
		<h2>Edit Inventory Data</h2>
		<p>Item ID: <input type="hidden" name="itemID" value="<?php echo $itemID; ?>" /></p>
		<br />
		<p>Item Name: <input type="text" name="itemName" value="<?php echo $itemName; ?>" /></p>
		<br />
		<p>Item Description: <input type="text" name="itemDesc" value="<?php echo $itemDesc; ?>" /></p>
		<br />
		<p>Item Count: <input type="text" name="itemCount" value="<?php echo $ItemCount; ?>" /></p>
		<br />
		<p>Item Price: <input type="text" name="itemPrice" value="<?php echo $itemPrice; ?>" /></p>
		<br />
		<input type="submit" value="Submit">
	</form>
</body>
</html>