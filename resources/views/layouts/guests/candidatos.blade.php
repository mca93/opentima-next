<!DOCTYPE html>
<html>
		<head>
			@include('partials._logedinuserheader')
		</head>
		<body>
      <div class="ui grid container" style="paddig-top: 120px">
        <div class="five wide column"style="padding-top:60px;"></div>
        <div class="row"style="padding-top:20px;">
          @yield('content')
        </div>
      </div>
		</body>
</html>
