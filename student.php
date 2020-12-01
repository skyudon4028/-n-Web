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
	<div class="container">
		<div class="tabContainer">
			<div class="buttonContainer">
				<button onclick="showPanel(0)">Tab 1</button>
				<button onclick="showPanel(1)">Tab 2</button>
			</div>
			<div class="tabPanel" style="margin-top:50px">
				<i class="fa fa-user-circle" style="font-size: 40px">GIÁO VIÊN</i>
				<hr/>
				<i class="fa fa-user-circle">Mai Văn Mạnh</i>
				<hr/>
				<i class="fa fa-user-circle">Mai Văn Mạnh</i>
				<hr/>
				<i class="fa fa-user-circle">Mai Văn Mạnh</i>
			</div>
			
			<div class="tabPanel">
				<div class="tabPanel" style="margin-top: 50px">
					<i class="fa fa-user-circle" style="font-size: 40px">BẠN HỌC</i>
					<button type="button" style="float: right">Add</button>
					<hr/>
					<i class="fa fa-user-circle">Mai Văn Mạnh</i>
					<hr/>
					<i class="fa fa-user-circle">Mai Văn Mạnh</i>
					<hr/>
					<i class="fa fa-user-circle">Mai Văn Mạnh</i>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>