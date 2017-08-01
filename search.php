<?php 
	
	require 'config/config.php';

/** Connecting to the database */
	$db = new db(); 
	$db = $db->connect(); 


?> 

<!DOCTYPE html>
<html>
<head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compactible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title -->
	<title>YemiLyrics | search result </title>

	<!-- link of the stylesheet for this project -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- BODY starts Here.... -->
<body class="jumbotron" style="margin-top: -48px;">

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

			<div class="container">

			
					<form method="post" action="search.php">
						<div class="input-group ">
							<input type="text" class="form-control searchBox" style="background-color: transparent;" placeholder="search for any song lyrics..." name="searchBox">
					      	<div class="input-group-btn">
					        <button class="btn btn_srch" name="searchBtn" type="submit"><i class="fa fa-search icon_srch"></i></button>
					      	</div>
					    </div>
					</form>

					<?php 
							if (isset($_POST['searchBtn'])) {
							
							$search =  $_POST['searchBox'];
							$error_msg = "No Results Found....";

							$sql = 'SELECT * FROM song_lyrics WHERE title_song LIKE "%$search%" OR artist LIKE "%$search%";';

							$query = $db->prepare($sql);
							
							$query->execute();

							$final = $query->fetchAll(PDO::FETCH_ASSOC);

								echo "	<div>
											<h2>Search Results <strong>".$search."</strong></h2>
										</div>";

								if ($final > 3) {
									
										foreach ($final as $row) {
											
											echo "
												<div class='searchR'>
													<h4>".$row['song_title']."</h4>
													<h6>".$row['artist']."</h6>
												</div>
											 ";
										}

										
										
									}

								else{

									echo "
												<div class='searchR'>
													<h2>".$error_msg."</h2>
												</div>
											 ";
								}
							/*foreach ($final as $row) {
							 
							 
										echo "
												<div class='searchR'>
													<h4>".$row['song_title']."</h4>
													<h6>".$row['artist']."</h6>
												</div>
											 ";
									}*/
										
								
							
							
						}


						$db = null;
					?>
					
					
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