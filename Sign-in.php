<?php  session_start();
	
	require 'config/config.php';

/** Connecting to the database */
	$db = new db(); 
	$db = $db->connect(); 

	if(isset($_POST['Reg_btn']))
		{
			$user = $_POST['usr_name'];
			$psd = $_POST['pass_user'];

			$sql = "SELECT username, password FROM user WHERE username = :user AND password = :pswd;";

			$stmt = $db->prepare($sql);

			$stmt->bindParam('user', $user);
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
					$_SESSION['admin'] = $row->username;
				}
				
				echo "<script>window.location.href = 'index.php';</script>";
			}

			$db = null;
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
	<title>YemiLyrics | Sign in </title>

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
							<li><a href="sign-up.php">Sign up</a></li>

							<li><a href="Sign-in.php">Sign in</a></li>						
						</ul>
					</div>
				</nav>

			</div>

		</div>
		</div>
	<!-- Main Body Start HERE.... -->

			<div class="container formBodyIn">
				<h1 class="textRed">Sign in / Login</h1>
				<form method="post" >

					<div class="form-group">
						<label class="textRed">Username</label>
						<input type="text" name="usr_name" class="form-control" required="">
					</div>
					
					<div class="form-group">
						<label class="textRed">Password</label>
						<input type="password" name="pass_user" class="form-control" required="">
					</div>
					
					<div class="form-group">
						<button class="form-control btn btn-danger" name="Reg_btn">Submit</button >
					</div>

					
					<div class="row">
						<div class="col-md-4" style="color:#cc3333;">
							Don't have an account | <a href="sign-up.php">Sign up / Register</a>
						</div> 
						<div class="col-md-5"></div>
						<div class="col-md-3">
							<a href="#"><i>Forgot password ?</i></a>
						</div>
						
					</div>
					<div>&nbsp;</div>
						<!--<button type="button" name="btn-submit"  class="btn btn-danger">Submit</button>-->
					
					
				</form>
			</div>		



		
	
	<!-- Lower Part of the Body Start HERE.... -->

		<div class="pageBttm">

			<div class="container">

				<div class="row">

					<div class="col-md-2">
						
					</div>
					<div class="col-md-8 text-center">

					<!-- Blog Post-->
					
					<p>&nbsp;</p>
					


					</div>
					<div class="col-md-2">
						
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



	




























<!-- Javascript Links for project-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>