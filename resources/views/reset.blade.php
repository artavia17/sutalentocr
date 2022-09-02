<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/login/style.css')}}">
        <link rel="shortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon">
        <title>Reset password - Su Talento</title>
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

                    <h1>Cambiar contraseña</h1>

                    @csrf

                    <div>
                        <label for="password">Nueva contraseña</label>
                        <input type="password" name="password" id="password">
                    </div>

                    @error('password')
                        <span>{{$message}} </span>
                    @enderror

                    <div>
                        <label for="confirmation">Confirmar contraseña</label>
                        <input type="password" id="confirmation">
                    </div>
                    <span id="error"></span>


                    <button type="submit">Cambiar contraseña</button>
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

<script>

const enviar = document.querySelector("#formulario");

enviar.onclick = (e) => {

        let password = document.querySelector("#password");
        let confirmation = document.querySelector("#confirmation");
        let error = document.querySelector("#error");

        if(password.value != confirmation.value){
            e.preventDefault();
            error.textContent = "Las contraseñas no coinciden";
        }
        

}

</script>
<script src="{{asset('js/login/app.js')}}"></script>