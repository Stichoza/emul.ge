<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="{{ asset('favicon.ico') }}">

		<title>Emul.ge - ინფორმაცია საკვებ დანამატებზე</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('lib/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet">
		<link href="{{ asset('lib_persist/bootswatch/flatly.min.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{ asset('css/dist/style.min.css') }}" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="navbar navbar-static-top navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">მენიუ</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ asset('/') }}"><i class="fa fa-flask"></i> EMUL.GE</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#about">წესები</a></li>
						<li><a href="#contact">პასუხისმგებლობა</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">ინფორმაცია <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">როგორ გამოვიყენო?</a></li>
								<li><a href="#">რა არის ემულგატორი?</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">რამდენად სანდოა ინფორმაცია?</li>
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
			
			<h2 class="text-center"></h2>

			<form action="" class="bs-component">
				<div class="row">

					<div class="col-xs-10 col-sm-9 col-md-8 col-md-offset-1">
							<div class="form-group">
								<input autofocus autocomplete="off" class="form-control input-lg" type="text" id="emulsifiers" name="emulsifiers" placeholder="">
							</div>
					</div>

					<div class="col-xs-2 col-sm-3 col-md-2">
						<button id="emulsifier-submit" type="sutmit" class="btn btn-block btn-lg btn-primary"><i class="hidden fa fa-flask"></i><img src="{{ asset('images/flask.svg') }}" alt=""></button>
					</div>

				</div>
			</form>

		</div>

		<div class="container" id="loading-results">
			<h3>მოითმინეთ ცოტა ხანს</h3>
			<img src="{{ asset('images/flask.svg') }}" alt="Loading..." width="240">
		</div>

		<div class="container" id="results">
			
			<h3 class="text-center">რეზულტატი</h3>

			<div class="row">
				<div class="col-sm-4">
					<h4 class="text-center">ჯანმრთელობა</h4>
					<div class="alert alert-danger" role="alert">Hee</div>
					<div class="alert alert-warning" role="alert">Hee</div>
				</div>
				<div class="col-sm-4">
					<h4 class="text-center">ჯანმრთელობა</h4>
					<div class="alert alert-info" role="alert">Hee</div>
					<div class="alert alert-default" role="alert">Hee</div>
				</div>
				<div class="col-sm-4">
					<h4 class="text-center">ჯანმრთელობა</h4>
					<div class="alert alert-success" role="alert"><i class="fa fa-check"></i> Hee</div>
					<div class="alert alert-warning" role="alert">Hee</div>
				</div>
			</div>

		</div>

		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('lib/typeahead.js/dist/typeahead.jquery.min.js') }}"></script>
		<script src="{{ asset('lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
		<script src="{{ asset('js/dist/main.min.js') }}"></script>
	</body>
</html>
