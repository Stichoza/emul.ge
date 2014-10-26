<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="{{ asset('favicon.ico') }}">

		<title>Sticky Footer Navbar Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('lib/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('lib_persist/bootswatch/paper.min.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<!-- Fixed navbar -->
		<div class="hidden navbar navbar-static-top navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><i class="fa fa-flask"></i> EMUL.GE</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<!-- Begin page content -->
		<div class="container">
			
			<h3 class="text-center">შეიყვანეთ ემულგატორები</h3>

			<div class="row">

				<div class="col-sm-8 col-sm-offset-2">
					<form action="" class="bs-component">
						<div class="form-group">
							<input class="form-control input-lg" type="text" id="emulsifiers" name="emulsifiers" placeholder="E">
						</div>
					</form>
				</div>
			</div>

		</div>
		<div class="container">
			
			<h5 class="text-center">რეზულტატი</h5>

			<div class="row">
				<div class="col-sm-4">
					<h6 class="text-center">ჯანმრთელობა</h6>
					<div class="alert alert-danger" role="alert">Hee</div>
					<div class="alert alert-warning" role="alert">Hee</div>
				</div>
				<div class="col-sm-4">
					<h6 class="text-center">ჯანმრთელობა</h6>
					<div class="alert alert-info" role="alert">Hee</div>
					<div class="alert alert-default" role="alert">Hee</div>
				</div>
				<div class="col-sm-4">
					<h6 class="text-center">ჯანმრთელობა</h6>
					<div class="alert alert-success" role="alert"><i class="fa fa-check"></i> Hee</div>
					<div class="alert alert-warning" role="alert">Hee</div>
				</div>
			</div>

		</div>

		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	</body>
</html>
