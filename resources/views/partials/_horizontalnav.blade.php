<div>
<header id="header">
</header>
	<div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<p class="navbar-brand"><strong >Innovation Framework</strong></p>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="{{Request::is('/') ? "active": ""}}"><a href="/"><strong>Pagina inicial</strong> <span class="sr-only"></span></a></li>
						<li class="{{Request::is('repositorio') ? "active": ""}}"><a href="/repositorio"><strong>X</strong ></a></li>
						<li class="{{Request::is('about') ? "active": ""}}"><a href="/about"><strong>Sobre</strong></a></li>
						<li class="{{Request::is('contact') ? "active": ""}}"><a href="/contact"><strong>Contacte-nos</strong></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
            @if(Sentinel::check())
                <li class="dropdown">
                     <a href="/logout" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Sentinel::getUser()->last_name}}<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                       <li><a href="#">Meu perfil</a></li>
                       <li><a href="{{url('/logout')}}">Logout</a></li>
                     </ul>
                 </li>
               @else
               <li><a href="/login"><button class="btn btn-success glyphicon glyphicon-lock"><strong>Sign in</strong></button></a></li>
               <li><a href="#"><button class="btn btn-success glyphicon glyphicon-user"><strong>Sign up</strong></button></a></li>
               @endif
						</ul>
					{{--<form class="navbar-form navbar-left">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Pesquisar">
						</div>
						<button type="submit" class="btn btn-default">Pesquisar</button>
					</form>--}}
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>
