<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">
	</head>

	<body>
        @include('layouts.nav')
		<div class="container">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>

	</body>

</html>