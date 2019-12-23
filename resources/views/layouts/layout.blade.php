<!DOCTYPE html>
<html>
		<head>
			@include('partials._head')
		</head>
		<body>
				@include('partials._horizontalnav')
				<div id="container">
					<main id="center" class="column">
						@include('partials._messages')
						@yield('content')
					</main>
					<div id="left" class="column">
							@yield('left_sidebar')
					</div>
					<div id="right" class="column">
						@yield('right_sidebar')
						</div>
					</div>
				<div id="footer-wrapper" center>
				   @include('partials._footer')
				</div>
		</body>
</html>
