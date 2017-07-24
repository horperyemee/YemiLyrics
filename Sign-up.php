<?php 

	require 'config/config.php';
	$con = new db();
	$dbcon = $con->Connect();


	
	if(isset($_POST['save_btn'])){

		$name = $_POST['name_user'];
		$usr = $_POST['usr_name'];
		$email = $_POST['email_user'];
		$psd1 = $_POST['pass_user'];
		$psd2 = $_POST['pass_rpt'];

		
		if($psd1 != $psd2){

			echo ('password do not match');
		}
		else{
			

			$sql = "INSERT INTO user (name, username, email, password, dated) VALUES (:name, :user, :email, :pass, :dated)";

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
				echo "<script>window.location.href = 'sign-in.php';</script>?";
			}
			else{
				echo "Error creating the account. Please try again";
			}

			

			$dbcon = null;
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
	<title>YemiLyrics | Sign up </title>

	<!-- link of the stylesheet for this project -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- BODY starts Here.... -->

<body class="sign-up">

	<div class="container-fluid">

	<!-- Header Start HERE... -->
		<div class="row header">
		
			<div class="col-md-2">
				<a href="Index.php"><img src="images/logo.png" class="img-responsive"></a>
			</div>

			<div class="col-md-4"></div>

			<div class="col-md-6">
				<nav class="navbar menu">
					<button type="button" class="navbar-toggle dark" data-toggle="collapse" data-target=".navbar-collapse">
			            <span class="sr-only"></span>
			            <span class="icon-bar color"></span>
			            <span class="icon-bar color"></span>
			            <span class="icon-bar color"></span>
			        </button>
			        <div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="Top-lyrics.php">Top Lyrics</a></li>
							<li><a href="Contribute.php">Contribute</a></li>
							<li><a href="Blog.php">Yemi's Corner</a></li>
							<li><a href="Sign-up.php">Sign up</a></li>

							<li><a href="Sign-in.php">Sign in</a></li>						
						</ul>
					</div>
				</nav>

			</div>

		</div>
		</div>
	<!-- Main Body Start HERE.... -->

			<div class="container formBody">

				<h1 class="textRed">Sign up/Register</h1>



				<form method="post" >

					<div class="form-group">
						<label for="name" class="textRed">Full Name</label>
						<input type="text" name="name_user" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="textRed">Username</label>
						<input type="text" name="usr_name" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="textRed">Email</label>
						<input type="email" name="email_user" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="textRed">Password</label>
						<input type="password" name="pass_user" id="pass_user" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="textRed">Confirm Password</label>
						<input type="password" name="pass_rpt" id="pass_rpt" class="form-control" required=""> <br>
					</div>
					<div class="form-group" align="center">
						<button class=" btn btn-danger" name="save_btn"  onclick="btnReg()">Submit</button >
					</div>
						
					
					
				</form>

			
			</div>		



		
	
	<!-- Lower Part of the Body Start HERE.... -->

		<div class="pageBttm">

			<div class="container">

				<div class="row">

					<div class="col-md-2">
						
					</div>
					<div class="col-md-8 text-center">

				</div>
					</div>
					</div>
			<!-- Footer Here-->
			<div class="footer container-fluid">
				<div class="row">

					<div class="col-md-4">
						<p class="text text_light">&copy; 2017 YemiLyrics.com</p>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-2">
						<a href="#">Made with <i class="glyphicon glyphicon-heart text"></i> by YemiBrahim</a>
					</div>
				</div>
				


			</div>

		</div>



	









<script type="text/javascript">
		
		function btnReg() {
			var pass = document.getElementById('pass_user').value;
			var psd2 = document.getElementById('pass_rpt').value;

			if (pass === psd2) {
				
			}
		}

</script>


















<!-- Javascript Links for project-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>-->
</body>
</html>