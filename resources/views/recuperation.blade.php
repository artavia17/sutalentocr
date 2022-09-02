<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/login/style.css')}}">
        <link rel="shortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon">
        <title>Recupation email - Su Talento</title>
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

                    <h1>VERIFICAR EMAIL</h1>

                    @csrf
                    <div>
                        <label for="email">Correo electrónico asociado</label>
                        <input type="email" autofocus value="{{old('email')}}" name="email" id="email">    
                    </div>

                    @error('email')
                        <span>{{$message}} </span>
                    @enderror

                    <span>{{$error}}</span>

                    <button type="submit">Verificar email</button>
                    <div>
                        <a id="recordar" href="{{route('login')}}">Iniciar Sesión</a>
                    </div>
                </form>
            </section>
        </main>

        @if(session('message'))
                    <div id="alert" class="bg-success">
                        {{session('message')}}
                    </div>
        @endif

        <script src="{{asset('js/login/app.js')}}"></script>

    </body>
</html>