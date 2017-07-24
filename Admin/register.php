<?php 

	require '../config/config.php';

/** Connecting to the database */
	$db = new db(); 
	$db = $db->connect(); 


	if (isset($_POST['btnReg'])) {
		$name = $_POST['name_admin'];
		$user = $_POST['usr_admin'];
		$email = $_POST['eml_admin'];
		$pass = $_POST['pass_admin'];
		$pass_rpt = $_POST['psrpt_admin'];

		if($pass != $pass_rpt){
			echo "<script>alert('Password did not match try again');</script>";
		}
		else {
			$sql = "INSERT INTO admin (name, username, email, password) VALUES(:name, :user, :eml, :pass);";

			$stmt = $db->prepare($sql);

			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':user', $user);
			$stmt->bindParam(':eml', $email);
			$stmt->bindParam(':pass', $pass);

			$stmt->execute();

			$db = null;

			echo "<script> window.location.href = 'index.php'; </script>";
		}
	}




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

					<h1 align="center">Admin Register</h1>
					
					<form method="post" action="">

						<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name_admin" id="name_admin" class="form-control" required="">
							
						</div>
						<div class="form-group">
							<label>Username:</label>
							<input type="text" name="usr_admin" id="usr_admin" class="form-control" required="">
						
						</div>
						<div class="form-group">
							<label>email:</label>
							<input type="email" name="eml_admin" id="eml_admin" class="form-control" required="">
						
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="Password" name="pass_admin" id="pass_admin" class="form-control" required="">
							
						</div>
						<div class="form-group">
							<label>Confirm Password:</label>
							<input type="Password" name="psrpt_admin" id="psrpt_admin" class="form-control" required="">
							<span></span>
						</div>
						<div align="center">
							<button class="btn btn-danger" name="btnReg">Login</button>
							
						</div>
						
					</form>

				</div>
				<div class="col-md-4"></div>

			</div>


	</div>


</body>
</html>
