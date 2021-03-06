<?php 
	if(isset($_GET['pid'])) {
	$pid = $_GET['pid'];

	require 'config/config.php';
	$con = new db();
	$db = $con->connect();

	$sql = "SELECT * FROM blog_post WHERE id = :id";

	$stmt = $db->prepare($sql);

	$stmt->bindParam('id', $pid);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_OBJ);
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
	<title>Yemi's corner | YemiLyrics </title>
 
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

				<?php foreach ($result as $value) { ?>
					<div class="container top_main">

						
							<div class="row">
								<div class="col-md-12" align="center">
									<h2 class="h_2"><?= $value->post_title;?></h2>
									<div align="center"><small><a href="#">by <?= $value->post_creator?></a></small></div>
								</div>
							</div>
							<div>
								<img src="<?= $value->post_img;?>" class="img-responsive">
							</div>
							<div class="container">
								<?= $value->post_content;?>
							</div>
					
						
							<hr>
						<div class="container">
							<p>Share this:

							<div class="">
						    	<span class="fa-stack socialGrp_post">
								  <i class="fa fa-circle fa-stack-2x social_post_t"></i>
								  <a href="" class="post_icon"><i class="fa fa-twitter fa-stack-1x "></i></a>
								</span>
								<span class="fa-stack socialGrp_post">
								  <i class="fa fa-circle fa-stack-2x social_post_f"></i>
								  <a href="" class="post_icon"><i class="fa fa-facebook fa-stack-1x "></i></a>
								</span>
								<span class="fa-stack socialGrp_post">
								  <i class="fa fa-circle fa-stack-2x social_post_g"></i>
								  <a href="" class="post_icon"><i class="fa fa-google-plus fa-stack-1x "></i></a>
								</span>
								
						    </div>
						    </p>
						    <p></p>
						</div>

					</div>
				<?php }?>
					

				</div>




				<!-- Side Bar Sectcion-->
				<div class="col-md-3">
					<section class="sideBar1">
						<div class="pad_post">
							
								<div class="h3_top">
									<h3 class="h-3">Recent Blog Post</h3>
								</div>

								<div class="row top">
									<div class="col-md-1" align="left"></div>
									<div class="col-md-6">
										<a href="#">My love for singing</a>
									</div>
									<div class="col-md-3"><img src="images/img_2.jpg" class="img-responsive "></div>
									<div class="col-md-2"></div>
									
								</div>
								<hr>
								<div class="row ">
									<div class="col-md-1" align="left"></div>
									<div class="col-md-6">
										<a href="#">My love for singing</a>
									</div>
									<div class="col-md-3"><img src="images/img_2.jpg" class="img-responsive "></div>
									<div class="col-md-2"></div>
									
								</div>
								<hr>
								<div class="row ">
									<div class="col-md-1" align="left"></div>
									<div class="col-md-6">
										<a href="#">My love for singing</a>
									</div>
									<div class="col-md-3"><img src="images/img_2.jpg" class="img-responsive "></div>
									<div class="col-md-2"></div>
									
								</div>
								<hr>
								<div class="row ">
									<div class="col-md-1" align="left"></div>
									<div class="col-md-6">
										<a href="#">My love for singing</a>
									</div>
									<div class="col-md-3"><img src="images/img_2.jpg" class="img-responsive "></div>
									<div class="col-md-2"></div>
									
								</div>
								<hr>
								<div class="row ">
									<div class="col-md-1" align="left"></div>
									<div class="col-md-6">
										<a href="#">My love for singing</a>
									</div>
									<div class="col-md-3"><img src="images/img_2.jpg" class="img-responsive "></div>
									<div class="col-md-2"></div>
									
								</div>
						</div>
						

					</section>	
					<p>&nbsp;</p>
					<!--Lower Section of the side bar-->
					<section class="sideBar2">
						<div class="container-fluid">
							<div class="input-group ">
						      	<input type="text" class="form-control searchTop" placeholder="search for any song lyrics..." name="">
						      	<div class="input-group-btn">
						        <button class="btn btn-top " type="submit"><i class="fa fa-search icon_top"></i></button>
						      	</div>
						    </div>

						    <div class="social">
						    	<span class="fa-stack socialGrp">
								  <i class="fa fa-circle fa-stack-2x social-circle"></i>
								  <a href="" class="social-icon"><i class="fa fa-twitter fa-stack-1x social-icon"></i></a>
								</span>
								<span class="fa-stack socialGrp">
								  <i class="fa fa-circle fa-stack-2x social-circle"></i>
								  <a href="" class="social-icon"><i class="fa fa-facebook fa-stack-1x social-icon"></i></a>
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
