<?php
	session_start();
	
	$conn = mysqli_connect("127.0.0.1", "root", "", "web");
	if ($conn->connect_error) {
		die("Connection failed:" .$conn->connect_error);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assignment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="main.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-custom">
		<button class="openbtn navbar-brand" onclick="openNav()"><i class="fa fa-bars"></i></button>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a id="classname" href="courseView.php">
					<h6>HK1_2020_503073_Lập trình Web và ứng dụng_N02</h6>
					<p>Mai Văn Mạnh - Web - N2 - T4C3</p>
				</a>
			</li>
		</ul>
	</nav>
	
	<div id="mySidebar" class="sidebar">
		<a href="#" class="closebtn" onclick="closeNav()"><i class="fa fa-angle-double-left"></i></a>
		<a href="listclass.php"><i class="fa fa-home"> Classes</i></a>
		<a href="#"><i class="fa fa-calendar"> Calendar</i></a>
		<a href="#"><i class="fas fa-clipboard-list"> To do</i></a>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h1><i class="material-icons">assignment</i> Bài tập</h1>
				<p>Due</p>
				<hr>
				<p>Content</p>
				<hr>
				<p>Class comment</p>
				<form action="/action_page.php">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Add comment" id="cmt" name="comment">
						<button type="button" class="btn btn-default" onclick="postCmt();"><span class="far fa-comment"></span></button>
					</div>
				</form>
				<table class="table table-hover" id="cmtplace"></table>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Nộp bài</h4>
						<p class="card-text">Danh sách file</p>
						<table class="table table-hover" id="file_upload">
							<?php
								$sql = "SELECT file_name FROM fileinfo";
								$result = $conn->query($sql);
								
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<tr><td><a href='uploads/" .$row['file_name']. "' download>" .$row['file_name']. "</a></td></tr>";
									}
								} else {
									echo "No files submit";
								}
								
								$conn->close();
							?>
						</table>
						<?php
							if (isset($_SESSION['message']) && $_SESSION['message'])
							{
								printf('<p class="card-text">%s</p>', $_SESSION['message']);
								unset($_SESSION['message']);
							}
						?>
						<form method="POST" action="upload.php" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="file" id="fileToUpload" name="fileToUpload"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="submit" id="uploadBtn" name="submit" value="Nộp bài"/>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Private Comment</h4>
						<form action="/action_page.php">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Add comment" id="private_cmt" name="privatecomment">
								<button type="button" class="btn btn-default" onclick="postPrivateCmt();"><span class="far fa-comment"></span></button>
							</div>
						</form>
						<table class="table table-hover" id="private_place"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>