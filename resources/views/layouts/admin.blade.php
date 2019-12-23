<!DOCTYPE html>
<html>
		<head>
			@include('partials._logedinuserheader')
		</head>
		<body>
      <div class="ui grid container">
        <div class="wide column centered grid">
          @include('partials._adminnav')
        </div>
      </div>
			<div class="row" style="padding-top:60px;">
				@include('partials._messages')
			</div>
      <div class="ui grid container">
        <div class="four wide column">
          @yield('secundary_nav')
        </div>
        <div class="ten wide column"style="padding-top:60px;">
          @yield('content_Area')
        </div>
        <div class="two eigth column">

        </div>
      </div>
		</body>
</html>
<script type="text/javascript">
$('.ui.dropdown').dropdown('hide');
</script>
