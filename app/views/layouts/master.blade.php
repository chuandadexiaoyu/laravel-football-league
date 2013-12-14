<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/style.css') }}
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