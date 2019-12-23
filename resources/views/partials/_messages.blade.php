<div class="four wide column offset">
	@if(Session::has('success'))
			<div class="ui positive message">
		  <i class="close icon"></i>
		  <div class="header">
		    <h2><strong>Sucesso!</strong></h2>
		  </div>
		  <p> <b>{{Session::get('success')}}</b></p>
		</div>
	@elseif(Session::has('error'))
	<div class="ui negative message">
	  <i class="close icon"></i>
	  <div class="header">
  		<h2><strong>Oops!</strong></h2>
	  </div>
	  <p><b>{{Session::get('error')}}</b></p>
	</div>
	@endif
</div>
