<?php 

	require 'config/config.php';
	$con = new db();
	$dbcon = $con->Connect();


	
	if(isset($_POST["save_btn"])){

		$name = $_POST['name_user'];
		$usr = $_POST['usr_name'];
		$email = $_POST['email_user'];
		$psd1 = $_POST['pass_user'];
		$psd2 = $_POST['pass_rpt'];

		
		if($psd1 === $psd2){

			$sql = "INSERT INTO user (name, username, email, password, dated) VALUES(:name, :user, :email, :pass, :dated)";

			$dateCreate = date('Y-m-d');
			$stmt = $dbcon->prepare($sql);

			$stmt->bindParam('name', $name);
			$stmt->bindParam('user', $usr);
			$stmt->bindParam('email', $email);
			$stmt->bindParam('pass', $psd1);
			$stmt->bindParam('dated', $dateCreate);


			$result = $stmt->execute();

			if($result != null)
			{
				echo "Error creating the account. Please try again";
				
			}
			else{
				echo "Your account has been created";
			}

			

		}
		else{
			echo ('password do not match');
		}

		$dbcon = null;
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
	<title>YemiLyrics | Sign up </title>

	<!-- link of the stylesheet for this project -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container">

				<h1 >Sign up/Register</h1>

				<form method="post" >

					<div class="form-group">
						<label for="name">Full Name</label>
						<input type="text" name="name_user" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="usr_name" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email_user" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass_user" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="pass_rpt" class="form-control" required=""> <br>
					</div>
					<div class="form-group">
						<button class="form-control btn btn-danger" name="save_btn">Submit</button >
					</div>
						<!--<button type="button" name="btn-submit"  class="btn btn-danger">Submit</button>-->
					
					
				</form>
</div>		

</body>
</html>