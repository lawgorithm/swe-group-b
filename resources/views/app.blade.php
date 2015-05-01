<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TA/PLA Application</title>

	<link href="/css/app.css" rel="stylesheet">
	@yield('headers')
	<link href="/css/overrides.css" rel="stylesheet">

	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>

</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
					<a class="logo" href="/">Mizzou TA Application</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
				@yield('links')
                    @if (!\Auth::check())
                            <li><a href="/auth/register">Register</a></li>
                            <li><a href="/auth/login">Sign In</a></li>
                    @else
                    	
                        <li><a href="/auth/logout">Logout</a></li>
                    @endif
                
				</ul>
			</div>
		</div>
	</nav>
	<div id="page-container" class="wrapper">
		@yield('content')
	</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	@yield('scripts')
</body>
</html>
