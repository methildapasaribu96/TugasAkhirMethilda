<!DOCTYPE HTML>
<html>
	<head>
		<title>SIPEKAN GURU</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="/">Home</a></li>
								<li><a href="/login">Log In</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a style="font-weight: bold;" href="{{url('/')}}">SPK GURU TERBAIK<a>
						<nav>
						<a href="{{url('/informasi_nilai')}}">Fitur Nilai</a>
						<a href="{{url('/informasi_sistem')}}">Fitur Guru</a>
						<a href="{{url('/informasi_ranking')}}">Fitur Ranking</a>
						<a href="{{url('/informasi_sekolah')}}">Contact Us</a>
						<a href="/login">Login</a>
						</nav>
					</header>
		@yield('content')
				<!-- Footer -->
					
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>