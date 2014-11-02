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

		<meta property="og:image" content="{{ asset('images/flask.png') }}">

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

		<div class="modal fade" id="modal-how-to-use" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">დახურვა</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle"></i> როგორ გამოვიყენო</h4>
					</div>
					<div class="modal-body">
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A autem itaque voluptate iusto veritatis blanditiis accusamus, animi ab rem consequatur, eveniet tempore reiciendis corrupti facilis ipsum molestiae odio quidem? Provident.</p>
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">დახურვა</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div> -->
				</div>
			</div>
		</div>

		<div class="navbar navbar-static-top navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">მენიუ</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ asset('/') }}">
						<i class="fa fa-flask"></i> EMUL.GE
						<sup class="brand-version-container">
							<span class="label label-default brand-version" data-placement="right" title="{!! $git['last_tag_name'] !!}{{'@'}}{!! $git['current_branch'] !!}">alpha</span>
						</sup>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#about">წესები</a></li>
						<li><a href="#contact">პასუხისმგებლობა</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">ინფორმაცია <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#" data-toggle="modal" data-target="#modal-how-to-use">როგორ გამოვიყენო?</a></li>
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
			<form action="" class="bs-component" id="emulsifier-form">
				<div class="row">

					<div class="_col-xs-9 col-sm-9 col-md-8 col-md-offset-1">
						<div class="form-group">
							<input autofocus autocomplete="off" class="form-control input-lg" type="text" id="emulsifiers" name="emulsifiers" placeholder="..." data-placement="bottom">
						</div>
					</div>

					<div class="_col-xs-3 col-sm-3 col-md-2">
						<div class="btn-group btn-group-justified">
							<div class="btn-group">
								<button type="submit" id="emulsifier-submit" tabindex="2" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i> <span class="visible-xs-inline">ოკ</span></button>
							</div>
							<div class="btn-group">
								<button type="button" id="emulsifier-add" tabindex="3" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-plus"></i> <span class="visible-xs-inline">დამატება</span></button>
							</div>
						</div>
					</div>

				</div>
			</form>
		</div>

		<div class="container" id="start-hint">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h3 class="text-center">ჩაწერეთ პროდუქტში შემავალი <strong>ემულგატორების</strong> ნომრები</h3>
					<h4 class="text-center">შემდეგ კი ნაზად დააჭირეთ ენთერს</h4>
				</div>
			</div>
		</div>

		<div class="container" id="loading-results">
			<h3>მოითმინეთ ცოტა ხანს</h3>
			<div class="round-flask">
				<img src="{{ asset('images/flask-blank.svg') }}" alt="Loading...">
				<div class="flask-bubbles">
					<div class="flask-bubble-1"></div>
					<div class="flask-bubble-2"></div>
				</div>
				<img src="{{ asset('images/flask-content.svg') }}" alt="">
			</div>
		</div>

		<div class="container" id="results">
			<h3 class="text-center">რეზულტატი</h3>
			<div class="row">
				<div class="col-sm-7">
					<h4 class="text-center">ჯანმრთელობა</h4>
					<div class="alert alert-danger" role="alert">Hee</div>
					<div class="alert alert-warning" role="alert">Hee</div>
				</div>
				<div class="col-sm-2">
					<h4 class="text-center">ლორემ</h4>
					<div class="alert alert-success" role="alert">დაშვებული</div>
					<div class="alert alert-danger" role="alert">აკრძალულია</div>
					<div class="alert alert-warning" role="alert">ლორემი</div>
				</div>
				<div class="col-sm-3">
					<h4 class="text-center">ჯანმრთელობა</h4>
					<div class="panel panel-primary">
						<div class="panel-heading">რეკლამა</div>
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quibusdam ad dolorum architecto rem nobis voluptatibus ducimus explicabo, nemo ex laboriosam magnam voluptate similique nam, debitis vitae laudantium possimus nihil.</div>
					</div>
				</div>
			</div>
		</div>

		<footer>
			<div class="container-bottom">
				<div class="container"><!-- positioning stuff -->
					<div class="row small">
						<div class="col-sm-4 col-xs-6 text-left">
							<p class="hidden-xs text-muted font-mtavruli">&copy; 2014 &middot; საავტორო უფლებები დაცულია</p>
							<div class="visible-xs-inline-block btn-group dropup">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
									მეტი <i class="fa fa-ellipsis-h"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="disabled font-mtavruli small"><a>&copy; 2014 &middot; საავტორო უფლებები დაცულია</a></li>
								</ul>
							</div>
						</div>
						<div class="hidden-xs col-sm-4 text-center">
							<ul class="hidden-xs list-unstyled list-inline text-center text-muted font-mtavruli">
								<li><a href="#">მოხმარების წესები</a></li>
								<li><a href="#">წესები</a></li>
								<li><a href="#">მოხმარების წესები</a></li>
							</ul>
						</div>
						<div class="col-sm-4 col-xs-6 text-right">
							<p class="text-muted font-helvetica font-thin">Developed by <a href="https://stichoza.com" target="_blank">Stichoza</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('lib/typeahead.js/dist/typeahead.jquery.min.js') }}"></script>
		<script src="{{ asset('lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
		<script src="{{ asset('js/dist/main.min.js') }}"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-30451315-5', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>
