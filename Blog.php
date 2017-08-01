<?php 
	require 'config/config.php';

	$db = new db(); 
	$db = $db->connect(); 

	$sql = 'SELECT * FROM blog_post;';

	$stmt = $db->prepare($sql);
	
	$stmt->execute();

	$final = $stmt->fetchAll(PDO::FETCH_OBJ);



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

					<div class="container-fluid top-main">

						<div class="row">
							<div class="col-md-4">

								
							

								
							</div>
							<div class="col-md-4">

							<?php foreach ($final as $value) { ?>
									

								<div class="blog_post">
									<div class="container h_ref" align="center">
										<a href="post.php?pid=<?= $value->id; ?>"><h2><b><?= $value->post_title;?></b></h2></a>
									</div>
									
									<div >
										<img src="<?php echo $value->post_img;?>" alt="Post Image" class="img_size img-responsive">
									</div>
									
									<div class="container">

										<p style="font-size: 15px;"><?php echo substr($value->post_content, 0, 320); ?>
										...</p>

										<div align="right"><small><a href="#">by <?= $value->post_creator?></a></small></div>

										<div><a href="post.php?pid=<?= $value->id; ?>" class="read_more">Continue reading </a></div>
									</div>

									<div class="blog_btn">
										<a href="post.php?pid=<?= $value->id; ?>"><i class="fa fa-clock-o"></i>&nbsp;<?= $value->date_created?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<a href="#"><i class="fa fa-comments"></i></a>
									</div>
									
								</div>
								<p></p>
								<?php } ?>

								
							</div>
							<div class="col-md-4">
								
								
							

							</div>
						</div>



					</div>
				</div>
				






				<!-- Side Bar Sectcion-->
				<div class="col-md-3">
					<section class="sideBar1">
						<div class="pad-blog">
							
								<div class="h3_top">
									<h3 class="h-3">Recent Blog Posts</h3>
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
