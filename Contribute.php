<?php session_start();
	require 'config/config.php';

/** Connecting to the database */
	$db = new db(); 
	$db = $db->connect(); 

	$sql = 'SELECT * FROM user_contribute ORDER BY id DESC LIMIT 10;';

	$stmt = $db->prepare($sql);

	$stmt->execute(); 
	$result = $stmt->fetchAll(PDO::FETCH_OBJ);

	if (isset($_POST['btnCon'])) {
		
		
		$title = $_POST['title'];
		$gerne = $_POST['gerne'];
		$artist = $_POST['artist'];
		$content = $_POST['content'];

		$sql = 'INSERT INTO user_contribute (username, lyric_title, lyric_gerne, lyric_artist, lyric_content) VALUES (:user, :title, :gerne, :artist, :content);';

		$stmt = $db->prepare($sql);

		$stmt = bindParam('user',$_SESSION['admin']);
		$stmt = bindParam('title', $title);
		$stmt = bindParam('gerne', $gerne);
		$stmt = bindParam('artist', $artist);
		$stmt = bindParam('content', $content);
		
		$result = $stmt->execute();
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

			<div class="row ">
				
				<div class="col-md-9 nopad">

					<div class="background">
						
					
					<div class="img_con" align="center">
						<h2 class="text_bold text fontBig">Contribute to the community</h2>
					</div>
						<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							
							<p class="textred fontSmall">Lorem Ipsum is simply dummy text of the printing and typesetting
								industry. Lorem Ipsum has been the industry's standard dummy text
								ever since the 1500s, when an unknown printer took a galley of type 
								and scrambled it to make a type specimen book. It has survived not only 
								five centuries, 
							</p>
						</div>
							<div class="col-md-1"></div>
						</div>	
						

					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<form method="post">
							<div class="form-group">
								<label for="title" class="textred">Music title:</label>
								<input type="text" name="title" class="form-control">
							</div>
							<div class="form-group">
								<label for="gerne" class="textred">Music genre:</label>
								<input type="text" name="gerne" class="form-control">
							</div>
							<div class="form-group">
								<label for="artist" class="textred">Artist name:</label>
								<input type="text" name="artist" class="form-control">
							</div>
							<div class="form-group">
								<label for="content" class="textred">Music lyrics:</label>
								<textarea name="content" class="form-control"></textarea>
							</div>
							<div class="form-group" align="center">
								<button class="btn btn-danger" name="btnCon">Submit</button>
							</div>
						</form>
						</div>
						
						<div class="col-md-2"></div>
					</div>
					</div>
					
				</div>
					

					

				

				
				






				<!-- Side Bar Sectcion-->
				<div class="col-md-3">
					<section class="sideBar1">
						<div class="bg_red text-center">
							<p class="text">Top Contributors</p>
						</div>
					<div class="container-fluid">
						<div class="table-responsive">
						
						<table class="table-hover">
							<?php $i=1; foreach($result as $row) {?>
							<tr>
								<td><?= $i++;?></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><?= $row->name;?></td>
							</tr>
							<?php }?>
						</table><br>
					</div>
					</div>
					
						
					</section>	

					<p>&nbsp;</p>
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
