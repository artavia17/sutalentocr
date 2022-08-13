<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Su Talento</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        
        <main>
             
            <div>
                <h1>Su Talento CR</h1>
            </div>

            <form method="POST">
                @csrf
                <label for="email">
                    Ingresar correo electrónico
                    <input type="email" autofocus value="{{old('email')}}" name="email" id="email">    
                </label>

                @error('email')
                    {{$message}} 
                @enderror

                <label for="password">
                    Ingresar contraseña
                    <input type="password" name="password" id="password">
                </label>

                @error('password')
                    {{$message}} 
                @enderror

                <label>
                    Recordar mi sesión
                    <input type="checkbox" name="remember">
                </label>
                <button type="submit">Iniciar Sesión</button>
            </form>

            @if(session('logout'))

                {{session('logout')}}

            @endif

        </main>

    </body>
</html>