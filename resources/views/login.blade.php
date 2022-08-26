<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/login/style.css')}}">
        <link rel="shortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon">
        <title>Su Talento</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        
        <main>
            <section>
                <div id="container_logo">
                    <div id="logo">
                        <img src="{{asset('img/164686254_116362043819285_7656085136560770984_n-removebg-preview.png')}}" alt="">
                    </div>
                </div>
                
                <form method="POST" id="formulario">
                    
                    <img src="{{asset('img/164686254_116362043819285_7656085136560770984_n-removebg-preview.png')}}" alt="">

                    <h1>INICIAR SESIÓN</h1>

                    <strong id="help-button">Necesitas ayuda?</strong>
                    <div id="help">
                        <strong>Ponerse en contacto con alonso@gmail.com</strong>
                    </div>

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

        <script src="{{asset('js/login/app.js')}}"></script>

    </body>
</html>