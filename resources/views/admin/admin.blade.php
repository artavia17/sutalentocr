<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') - Su talento</title>
</head>
<body>
	
	<header>
		<nav>
			<form action="/logout" method="POST">
				 @csrf
				 <a href="#" onclick="this.closest('form').submit()">Cerrar sesión</a>
			</form>
		</nav>
	</header>

	<main>
		@yield('content')
	</main>

	<!-- Indicarle al usuario si inicio sesion -->

	@if(session('status'))

		<br/>
		{{session('status')}}

	@endif

</body>
</html>