<?php session_start();
	require 'config/config.php';

	$db = new db(); 
	$db = $db->connect(); 

	$sql = 'SELECT * FROM blog_post ORDER BY id DESC LIMIT 1;';

	$stmt = $db->prepare($sql);
	
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_OBJ);


	$db = null;



?> 

<!DOCTYPE html>
<html>
<head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compactible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title -->
	<title>YemiLyrics | Home </title>

	<!-- link of the stylesheet for this project -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- BODY starts Here.... -->
<body class="bg_home">

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
							<li><a href="sign-in.php">Contribute</a></li>
							<li><a href="Blog.php">Yemi's Corner</a></li>
							<li><a href="sign-up.php">Sign up</a></li>
							<li><a href="sign-in.php">Sign in</a></li>						
						</ul>
					</div>
				</nav>

			</div>

		</div>
	<!-- Main Body Start HERE.... -->

		<div class="container content" align="center">
				<div class="Hd_text">
					<h1 class="text big_L"><strong>WELCOME</strong></h1>
					<h1 class="text small_L"><b>TO THE HOME OF LYRICS<b></h1>
				</div>
			<form method="post" action="">

				<div class="input-group ">
			      	<input type="text" class="form-control searchBox" placeholder="search for any song lyrics..." name="">
			      	<div class="input-group-btn">
			        <button class="btn btn_srch " type="submit"><i class="fa fa-search icon_srch"></i></button>
			      	</div>
			    </div>

			</form>



		</div>
	</div>
	<!-- Lower Part of the Body Start HERE.... -->

		<div class="pageBttm">

			<div class="container">

				<div class="row">

					<div class="col-md-2">
						
					</div>
					<div class="col-md-8 text-center">

						<div class="row">
							<div class="col-md-9">
								<!-- Blog Post-->
							<?php foreach ($result as $row) {?>
								
							
								<h1 class="text text_bold no_pad-btm "><?= $row->post_title;?><!--#DoYouKnow?--></h1>
									<small class="readmore">written by <?= $row->post_creator;?><!--Yemi brahim--></small>
									<p>&nbsp;</p>
								<p class="text text_light">	
									
									<?php echo substr($row->post_content, 0, 320); ?>....
									<!--Lorem Ipsum is simply dummy text of the printing and typesetting
									industry. Lorem Ipsum has been the industry's standard dummy text
									ever since the 1500s, when an unknown printer took a galley of type 
									and scrambled it to make a type specimen book. It has survived not only 
									five centuries,--> 
									<br>
									<a href="post.php?pid=<?= $row->id; ?>" class="readmore">Continue reading </a>
								</p>
									
							</div>
							<div class="col-md-3 pad_img">
								<img src="<?= $row->post_img; ?>" class="img-responsive img-thumbnail" width="" height="500px">
							</div>
							<?php } ?>
						</div>

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