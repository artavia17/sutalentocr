<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/login/style.css')}}">

        <title>Su Talento</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        
        <main>
            <section>
                <div>
                    <h1>Su Talento CR</h1>
                </div>
                
                <form method="POST">

                    <h1>INICIAR SESIÓN</h1>

                    @csrf
                    <div>
                        <label for="email">Ingresar correo electrónico</label>
                        <input type="email" autofocus value="{{old('email')}}" name="email" id="email">    
                    </div>
                    @error('email')
                        <span>{{$message}} </span>
                    @enderror

                    <div>
                        <label for="password">Ingresar contraseña</label>
                        <input type="password" name="password" id="password">
                    </div>

                    @error('password')
                        <span>{{$message}} </span>
                    @enderror
                    <div>
                        <input type="checkbox" id="check" name="remember">
                        <label for="check" id="recordar">Recordar mi sesión</label>
                    </div>

                    <button type="submit">Iniciar Sesión</button>
                </form>

                @if(session('logout'))
                    <div id="alert" class="bg-success">
                        {{session('logout')}}
                    </div>
                @endif
            </section>
        </main>

    </body>
</html>