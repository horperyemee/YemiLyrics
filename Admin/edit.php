<?php
	require '../config/config.php';

/** Connecting to the database */
	$db = new db(); // creating an instance of class db from db.php file
	$db = $db->connect(); // calling the function connect from class db

/** Performing query operations to the database */
	$sql = 'SELECT * FROM user_contribute WHERE id = :id;'; // SQL string to fetch all items from table todo
	$stmt = $db->prepare($sql); // Prepare the sql statement for execution

	$stmt->bindParam(':id', $_GET['id']);
	$id = $_GET['id'];
/** Executing thhe query and fetching the results */
	$stmt->execute(); // executing the prepared statement
	$result = $stmt->fetchAll(PDO::FETCH_OBJ); // storing the result as Objects into variable $result

/** End Query fetching*/
if(isset($_POST['btnEdit']))
{
	$sql = "UPDATE blog_post set post_title = :title WHERE post_content = :content";
		$stmt = $db->prepare($sql);

		$item = $_POST['newItem'];
		$title = $_POST['newTitle'];

		$stmt->bindParam(':title', $item);
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		$db = null;

		echo "<script> window.location.href = 'index.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit | Admin</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<form action="" method="post">
<h1>Edit Item</h1>
	
	<input type="text" name="newTitle" class="form-control" placeholder="title"><br>
	<textarea name="newItem" id="txtItem" class="form-control" placeholder="Add new item here" ></textarea><br>
	<button name="btnEdit" type="submit" class="btn btn-save btn-danger">Update</button>
</form>
</div>
</body>
</html>