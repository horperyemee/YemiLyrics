<?php session_start();

	require '../config/config.php';

/** Connecting to the database */
	$db = new db(); 
	$db = $db->connect(); 

	if(isset($_POST['btnLogin']))
		{
			$user = $_POST['usr-admin'];
			$psd = $_POST['pass-admin'];

			$sql = "SELECT name, username, password FROM admin WHERE name = :name OR username = :email  AND password = :pswd;";

			$stmt = $db->prepare($sql);

			$stmt->bindParam('name', $_SESSION['admin']);
			$stmt->bindParam('email', $user);
			$stmt->bindParam('pswd', $psd);


			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

				
			if(!$result)
			{
				echo "Username or Password incorrect";
			}
			else
			{
				foreach ($result as $row) {
					$_SESSION['admin'] = $row->name;
				}
				
				echo "<script>window.location.href = 'dashboard.php';</script>";
			}

			$db = null;
		}
?>




?> 

<!DOCTYPE html>
<html>
<head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compactible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title -->
	<title>YemiLyrics | Admin Login </title>

	<!-- link of the stylesheet for this project -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg">
	
	<div class="container-fluid jumbotron">
			
			<div class="row body">
				
				<div class="col-md-4"></div>
				<div class="col-md-4">

					<h1 align="center">Admin Login</h1>
					
					<form method="post" action="">
						<div class="form-group">
							<label>Username:</label>
							<input type="text" name="usr-admin" class="form-control">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="Password" name="pass-admin" class="form-control"><br>
						</div>
						<div align="center">
							<button class="btn btn-danger" name="btnLogin">Login</button>
						</div>
						
					</form>

				</div>
				<div class="col-md-4"></div>

			</div>


	</div>



</body>
</html>
