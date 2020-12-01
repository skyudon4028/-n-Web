
<!DOCTYPE html>
<html>

  <head>
    <title>Sectioned List</title>
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
		<button class="openbtn navbar-item" onclick="openNav()"><i class="fa fa-bars"></i></button>
		<li class="nav-item navbar-brand">
			<h3>My Classroom</h3>
		</li>
		<div class="navbar ml-auto">
				<button class="openbtn navbar-item ml-auto" type="button" data-toggle="dropdown" id = "joinClass"><i class="fa fa-plus" ></i></button>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="#">Tham gia lớp học</a>
					<a class="dropdown-item" href="#">Tạo lớp học</a>
				</div>
			
			<button class="openbtn navbar-item rounded-circle ml-auto" id = "inform" onclick="openInf()">
				<img src = "img/student.jpg" width = "50px" height = "50px">
			</button>
		</div>
			
	</nav>
	
	<div id="mySidebar" class="sidebar">
		<a href="#" class="closebtn" onclick="closeNav()"><i class="fa fa-angle-double-left"></i></a>
		<a href="#"><i class="fa fa-home"> Classes</i></a>
		<a href="#"><i class="fa fa-calendar"> Calendar</i></a>
		<a href="#"><i class="fas fa-clipboard-list"> To do</i></a>
	</div>
	
	<div class="container">
		<div class="row" id = "gridClass">
				<div class="col-xs-6 col-sm-4 col-md-3" id = "cardClass">
					<div class="card">
						<img class="card-img-top" src="img/theme.jpg" width="100%">
						<div class="card-body" id = "infClass">
							<h4 class="card-title">Name Class</h4>
							<p class="card-text">
								Name teacher
							</p>
						</div>
						<div class="card-footer">
							<div class="btn-wrapper">
								<a class = "btn" type="button float-left"><i class="fa fa-folder"></i></a>
							</div>
							<button class = "btn" type="button" data-toggle="dropdown"><i class="fas fa-ellipsis-v" aria-hidden ="false"></i></button>
							<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Edit</a>
									<a class="dropdown-item" href="#">Delete</a>
							</div>
						</div>
						
					</div>
				</div>
		</div>
	</div>
</body>

</html>