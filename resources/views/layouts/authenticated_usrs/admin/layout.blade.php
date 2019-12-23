<!DOCTYPE html>
<html>
		<head>
			@include('partials.guest._head')
		</head>
		<body>
      <div class="ui grid container">
        <div class="row">
          @include('partials.admin._horizontalnav')
        </div>
        <div class="row" style="padding-top:60px">
          <div class="three wide column">
              @yield('side_nav')
          </div>
          <div class="twelve wide column"style="padding-top:60px;">
            @yield('content')
          </div>
        </div>
    </div>
		</body>
</html>
