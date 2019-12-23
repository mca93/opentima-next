<!DOCTYPE html>
<html>
		<head>
			@include('partials.guest._head')
		</head>
		<body>
      <div class="ui grid container" style="paddig-top: 120px">
        <div class="five wide column"style="padding-top:60px;"></div>
        <div class="six wide column"style="padding-top:60px;">
          @yield('content')
        </div>
      </div>
		</body>
</html>
