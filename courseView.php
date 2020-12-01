<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assignment</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="main.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

	</head>
	<body>
		<div class="container" id="theme">
			<h2>HK1_2020_503073_Lập trình Web và ứng dụng_N02</h2>
			<h4>Mai Văn Mạnh - Web - N2 - T4C3</h4>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Sắp hết hạn</h4>
							<p>không có bài tập nào sắp đến hạn!</p>
						</div>
					</div>
				</div>

				<div class="col-lg-9">
					<div class="card">
						<div class="card-body">
							<h6 class="card-title">Chia sẻ với lớp học</h6>
							<form action="/action_page.php">
								<div class="input-group mb-3">
									<input type="text" class="form-control" id="cmt" name="comment" form="cmtForm">
									<button type="button" class="btn btn-default" onclick="postCmt();"><span class="fas fa-location-arrow"></span></button>
								</div>
							</form>
							<?php
								if (isset($_SESSION['comment']) && $_SESSION['comment'])
								{
									printf('<p class="card-text">%s</p>', $_SESSION['comment']);
									unset($_SESSION['comment']);
								}
							?>
							<form method="POST" action="courseView_Upload.php" enctype="multipart/form-data" id="cmtForm">
								<div>
									<input type="file" id="uploadFile" name="uploadFile"/>
									<button onclick="addItem()" class="btn btn-add">Đăng</button>
								</div>
							</form>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<i class="material-icons">person</i>Mai Văn Mạnh
							<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">Setting</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Edit</a>
								<a class="dropdown-item" href="#">Delete</a>
							</div>
							<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
							<a href="test_file.zip" download>Download File</a>
							<hr />
							<form action="/action_page.php">
								<div class="input-group mb-3">
									<input type="text" class="form-control" id="cmt" name="comment" form="cmtForm">
									<button type="button" class="btn btn-default" onclick="postCmt();"><span class="fas fa-location-arrow"></span></button>
								</div>
							</form>
						</div>
					</div>
					
					<div class="card">
						<div class="card-body">
							<i class="material-icons">person</i>Mai Văn Mạnh
								<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">Setting</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Edit</a>
								<a class="dropdown-item" href="#">Delete</a>
							</div>
							<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
							<a href="test_file.zip" download>Download File</a>
							<hr />
							<form action="/action_page.php">
								<div class="input-group mb-3">
									<input type="text" class="form-control" id="cmt" name="comment" form="cmtForm">
									<button type="button" class="btn btn-default" onclick="postCmt();"><span class="fas fa-location-arrow"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>		
			</div>
		</div>

	</body>
</html>