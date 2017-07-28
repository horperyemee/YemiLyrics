<?php session_start();

	require '../config/config.php';
	$db = new db(); 
	$db = $db->connect(); 

	$sql = 'SELECT * FROM user;';

	$stmt = $db->prepare($sql);

	$stmt->execute(); 
	$result = $stmt->fetchAll(PDO::FETCH_OBJ);

	if (isset($_POST['btnBlog'])) {
			

			$blog_dir = "../uploads/";
			$blog_up = $blog_dir.$_FILES['blogImage']['name'];

			move_uploaded_file($_FILES['blogImage']['tmp_name'], $blog_up);

			$blog = $_POST['blogTitle'];
			$blogImage = $blog_up;
			$blogContent = $_POST['blogContent'];
			

			$sql = 'INSERT INTO blog_post (post_title, post_content, post_creator,post_img ,date_created) VALUES (:title, :content, :creator, :img, :dated);';

			$dated = date('Y-m-d');
			
			$stmt = $db->prepare($sql);

			
			$stmt->bindParam('title', $blog);
			$stmt->bindParam('content', $blogContent);
			$stmt->bindParam('creator', $_SESSION['admin']);
			$stmt->bindParam('img', $blogImage);
			$stmt->bindParam('dated', $dated);

			
			$final = $stmt->execute();

			

			if (!$final) {
				echo "<script>alert('Problems creating the post, check your fields');</script>";
			}
			else{
				echo "<script>window.location.href = 'dashboard.php';</script>";

				$sql = 'SELECT * FROM blog_post WHERE name=:name;';
			}

		}

		if (isset($_POST['btnTop'])) {

		$top_dir = "../uploads/";
		$top_up = $top_dir. $_FILES['topImage']['name'];

		move_uploaded_file($_FILES['topImage']['tmp_name'], $top_up);
		
		$titleT = $_POST['topTitle'];
		$artistT = $_POST['topArtist'];
		$gerneT = $_POST['topGerne'];
		$imgT = $top_up;

		$sql = 'INSERT INTO toplyrics (songTitle, artist, gernes, image, yearRelease) VALUES (:title, :artist, :gerne, :image, :dated);';

		$dated = date('Y');
		$stmt = $db->prepare($sql);

		$stmt->bindParam('title', $titleT);
		$stmt->bindParam('artist', $artistT);
		$stmt->bindParam('gerne', $gerneT);
		$stmt->bindParam('image', $imgT);
		$stmt->bindParam('dated', $dated);

		$result = $stmt->execute();


			if (!$result) {
				echo "<script>alert('Problems creating the post, check your fields');</script>";
			}
			else{
				echo "<script>window.location.href = 'dashboard.php';</script>";
			}


	}

	if (isset($_POST['btnLyric'])) {
		
		$titleL = $_POST['lyricTitle'];
		$artistL = $_POST['lyricArtist'];
		$gerneL = $_POST['lyricGerne'];
		$contentL = $_POST['lyricContent'];

		$sql = 'INSERT INTO song_lyrics (title_song, gerne, artist, content, year_release) VALUES (:title, :gerne,  :artist, :content, :dated);';

		$dated = date('Y-m-d');
		$stmt = $db->prepare($sql);


		$stmt->bindParam('title', $titleL);
		$stmt->bindParam('gerne', $gerneL);
		$stmt->bindParam('artist', $artistL);
		$stmt->bindParam('content', $contentL);
		$stmt->bindParam('dated', $dated);

		$result = $stmt->execute();


		if (!$result) {
				echo "<script>alert('Problems creating the post, check your fields')</script>";
			}
		else{
				echo "<script>window.location.href = 'dashboard.php';</script>";
			}


	}

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
	<title>YemiLyrics | Dashboard </title>

	<!-- link of the stylesheet for this project -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- BODY starts Here.... -->
<body class="jumbotron dashBoard">

	<div class="container-fluid">

	<!-- Header Start HERE... -->
		<div class="row header">
		
			<div class="col-md-2">
				<img src="../images/logo.png" class="img-responsive">
			</div>

			<div class="col-md-8"></div>

			<div class="col-md-2">
				<img src="../images/admin.png" class="img-responsive">
			</div>

		</div>
		</div>
	<!-- Main Body Start HERE.... -->
		
			
		<div class="container-fluid">

			<div class="row black">
				<div class="col-md-2">
					<p class="dash-text"><a href="../index.php"><i class="fa fa-home"></i> View Website</a></p>
				</div>
				<div class="col-md-7"></div>
				<div class="col-md-3"></div>
			</div>

		</div>


			<!-- Body -->	
		<div class="container-fluid">
			<div class="row pad_body">

				<!-- Sidebar 1-->
				<div class="col-md-2 sidebar1 navbar-fixed-left">
					
						<nav>
							<ul>
								<li><a href="">Blog Post</a></li>
								<li><a href="">Lyrics Post</a></li>
								<li><a href="dashboard.php#topLyrics">Top Lyrics</a></li>
								<li><a href="Submitted.php">Submitted Lyrics</a></li>
							</ul>
						</nav>
						<div class="container">
							<p >
								<!--Admin name-->
								<strong></strong>
								<small></small>
								<small></small>
								
							</p>
							
						</div>
					
				</div>

				<!-- Middle -->

				<div class="col-md-6">

				<!-- Blog Studio and Content-->
					<section>
						<h3>Blog Post Studio | Content</h3>
						<div class="row">
							<div class="col-md-12">

							<!-- Blog Create input fields-->
								<form method="post" enctype="multipart/form-data">
									<input type="text" name="blogTitle" placeholder="Title of post" class="form-control" required=""><br>
									<input type="file" name="blogImage" placeholder="image files only" class="form-control" required=""><br>
									<textarea name="blogContent" placeholder="Post Content" required="" class="form-control"></textarea><br>
									<div class="form-group" align="center">
										<button class="btn btn-danger" name="btnBlog">Post</button>
									</div>
								</form>

							</div>
						</div>
						
						</section>

						<hr style="border: 8px solid #cc3333;">
					<section>
						<h3>Lyrics Studio | Content</h3>

							<form method="post">

									<input type="text" name="lyricTitle" placeholder="Title of lyrics" class="form-control" required=""><br>
									<input type="text" name="lyricArtist" placeholder="artist name" class="form-control" required=""><br>
									<input type="text" name="lyricGerne" placeholder="Music gerne" class="form-control" required=""><br>
									<textarea name="lyricContent" placeholder="Lyric Content" required="" class="form-control"></textarea><br>
									<div class="form-group" align="center">
										<button class="btn btn-danger" name="btnLyric">Create</button>
									</div>

							</form>


						<!-- Top Lyrics input fields-->
						<div  id="topLyrics" align="center">
								<div class="topSection">
									<h3>Top Lyrics Selection</h3>
								</div>
								
								<form method="post" enctype="multipart/form-data">
									<input type="text" name="topTitle" placeholder="song title" class="form-control" required=""><br>
									<input type="text" name="topArtist" placeholder="name of artist" class="form-control" required=""><br>
									<input type="text" name="topGerne" placeholder="gerne type" class="form-control" required="" ><br>
									<input type="file" name="topImage" placeholder="image files only" class="form-control" required=""><br>
									<div class="form-group" align="center">
										<button class="btn btn-danger" name="btnTop">Create</button>
									</div>
								</form>
						</div>
					</section>
					
				</div>

				<!-- Sidebar 2-->
				<div class="col-md-4 black_side2">
					<div class="table-responsive ">

						<!-- Tables for list of registered users on the website -->
					<table class="table table-hover">
						<thead>
							<tr class="danger">
								<th>s/n</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Date Joined</th>
								
							</tr>
						</thead>
						 <?php $i=1; foreach ($result as $row) { ?> 
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $row->name; ?></td>
								<td><?= $row->username; ?></td>
								<td><?= $row->email; ?></td>
								<td><?= $row->dated; ?></td>
							</tr>
							<?php }?>
					</table>
					</div>
				</div>
			</div>

		</div>


		
	
	<!-- Lower Part of the Body Start HERE.... -->

		


	




























<!-- Javascript Links for project-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>