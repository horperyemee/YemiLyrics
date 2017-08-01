<?php
	require 'config/config.php';

/** Connecting to the database */
	$db = new db(); 
	$db = $db->connect(); 

	$sql = 'SELECT * FROM toplyrics LIMIT 20;';

	$stmt = $db->prepare($sql);

	$stmt->execute(); 
	$result = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html>
<head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compactible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title -->
	<title>YemiLyrics | Top Lyrics </title>
 
	<!-- link of the stylesheet for this project -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="jumbotron no-pad-top">
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

		<!--Main Body-->

		<div class="container-fluid">

			<div class="row">
				<div class="col-md-9">

					<div class="container-fluid top_main">

					
						<div class="row theader">
							<div class="col-md-1 textheader" align="center">s/n</div>
							<div class="col-md-3 textheader" align="center">Song Title</div>
							<div class="col-md-3 textheader" align="center">Artist</div>
							<div class="col-md-2 textheader" align="center">Genre</div>
							<div class="col-md-1 textheader"></div>
							<div class="col-md-2 textheader" align="center">Year</div>
							
						</div>

						<?php $i=1; foreach($result as $row) { ?>
						<div class="row">
							<div class="col-md-1 text_red" align="center"><?= $i++; ?></div>
							<div class="col-md-3 textred" align="center"><a class="textRed" href="#"><?= $row->songTitle; ?></a></div>
							<div class="col-md-3 textred" align="center"><a class="textRed" href="#"><?= $row->artist; ?></a></div>
							<div class="col-md-2 textred" align="center"><a class="textRed" href="#"><?= $row->gernes; ?></a></div>
							<div class="col-md-1 textred" align="center"><img src="<?= $row->image;?>" class="img-responsive"></div>
							<div class="col-md-2 textred" align="center"><?= $row->yearRelease; ?></div>
							
						</div>
						<hr>
						<?php } ?>



					</div>
				</div>
				






				<!-- Side Bar Sectcion-->
				<div class="col-md-3">
					<section class="sideBar1">

						<div class="m_gerne">
							<div class="h3_top">
								<h3 class="h-3">Music Genres</h3>
							</div>
							
							<ol>
								<li><a href="#">Blues</a></li>
								<hr>
								<li><a href="#">Jazz</a></li>
								<hr>
								<li><a href="#">Reggae</a></li>
								<hr>
								<li><a href="#">Afro Beat</a></li>
								<hr>
								<li><a href="#">R&B</a></li>
								<hr>
								<li><a href="#">Pop</a></li>
								<hr>
								<li><a href="#">Hip Hop</a></li>
								<hr>
							</ol>
							<p><a href="#" class="m-anc">load more >>> </a></p>
						</div>
						
					</section>	

					<!--Lower Section of the side bar-->
					<section class="sideBar2">
						<div class="container-fluid">
							<form method="POST" action="search.php">
								<div class="input-group ">
							      	<input type="text" class="form-control searchTop" placeholder="search for any song lyrics..." name="searchBox">
							      	<div class="input-group-btn">
							        <button class="btn btn-top" name="searchBtn" type="submit"><i class="fa fa-search icon_top"></i></button>
							      	</div>
						    	</div>
							</form>
							

						    <div class="social">
						    	<span class="fa-stack socialGrp">
								  <i class="fa fa-circle fa-stack-2x social-circle"></i>
								  <a href="https://twitter.com/YemeeLyrics" class="social-icon"><i class="fa fa-twitter fa-stack-1x social-icon"></i></a>
								</span>
								<span class="fa-stack socialGrp">
								  <i class="fa fa-circle fa-stack-2x social-circle"></i>
								  <a href="https://www.facebook.com/YemeeLyrics/" class="social-icon"><i class="fa fa-facebook fa-stack-1x social-icon"></i></a>
								</span>
								<span class="fa-stack socialGrp">
								  <i class="fa fa-circle fa-stack-2x social-circle"></i>
								 <a href="" class="social-icon"> <i class="fa fa-pinterest-p fa-stack-1x "></i></a>
								</span>
								<span class="fa-stack socialGrp">
								  <i class="fa fa-circle fa-stack-2x social-circle"></i>
								  <a href="" class="social-icon"><i class="fa fa-google-plus fa-stack-1x "></i></a>
								</span>
								
						    </div>

						</div>
					</section>
				</div>
			</div>
			
		</div>



</body>



</html>
