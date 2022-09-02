<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/admin/nav.css')}}">
	<link rel="stylesheet" href="{{asset('css/admin/main.css')}}">
	<link rel="shortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,500&display=swap" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - Su talento</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{route('inicio')}}">
				<img src="{{asset('img/icon.png')}}" alt="" width="50">
			</a>
		  <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
			</svg>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">

				@if (auth()->user()->type == 'Administrador' || auth()->user()->type == 'Colaborador')

				<li class="nav-item">
					<a class="nav-link active text-white fs-5 fw-lighter" aria-current="page" href="{{route('inicio')}}">Estadísticas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white fs-5 fw-lighter" href="#">Actualizar sitio web</a>
				</li>
				@endif
				@if (auth()->user()->type == 'Administrador')
					<li class="nav-item">
						<a class="nav-link text-white fs-5 fw-lighter" href="{{route('administration-profile')}}">Administrar cuentas</a>
					</li>
				@endif	
			</ul>
			<span class="navbar-text d-flex">
				<h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"></h5>
				<div class="dropdown d-flex align-content-center">
					<button class="btn dropdown-toggle text-white fs-5 fw-lighter w-100 m-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Bienvenido {{auth()->user()->name}}
					</button>
					<ul class="dropdown-menu">
					  <li><a class="dropdown-item text-black  fw-lighter" href="{{route('configuration')}}">Actualizar perfil</a></li>
					  <li>
						<form action="/logout" method="POST">
							@csrf
							<button type="submit" class="dropdown-item text-black fw-lighter">Cerrar sesión</button>
						</form>
					  </li>
					</ul>
				  </div>
			</span>
		  </div>
		</div>
	  </nav>
	  
	<main class="container">
		@yield('content')
	</main>

	<!-- Indicarle al usuario si inicio sesion -->

	@if(session('status'))

		<div id="alert" class="bg-success text-white p-3 rounded">
			{{session('status')}}
		</div>

	@endif

	<footer class="bg-secondary mt-5 p-3 text-center text-white">
		@Derechos reservados 2022
	</footer>

	<script src="@yield('script_url')"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/notifications/app.js')}}"></script>
</body>
</html>