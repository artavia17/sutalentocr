@extends('admin.admin')

@section('title', $user->name)

@section('content')

<div class="container">
	
    <div class="row my-4 shadow p-3 mb-5 bg-body rounded p-4">

        <h3 class="text-center">Datos del usuario</h3>

        <div class="table_container w-100 overflow-auto" style="">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Fecha del registro</th>
                    <th scope="col">Última actualización</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$user->name}}</th>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        <a href="{{route('profile_indivual_delete', $user->id)}}" class="btn btn-danger">Borrar usuario</a>
                    </td>
                    <td>
                        <form action="{{route('reset-password', $user->id)}}" method="POST">
                            @csrf
                            <button class="btn btn-success" type="submit">Cambiar contraseña</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        
        </div>

    </div>
    
    <div class="row justify-content-center">
        <form class="mt-5 justify-content-center col-xxl-7 col-xl-9 col-lg-12 container" method="POST" id="update">
            <div class="row justify-content-center">
                @csrf

                <div class="mb-5 w-100">
                    <label class="d-flex" for="foto" id="container_image_perfil">\docs\9.x\migrations

                        @if ( $user->photo == 'null')

                            <img src="{{asset('img/user_logo.png')}}" alt="" width="200" height="200" class="m-auto" id="imagen_perfil">

                        @else

                            <img src="{{$user->photo}}" alt="" width="200" height="200" class="m-auto" id="imagen_perfil">

                        @endif

                    </label>
                    <input type="file" class="form-control" id="foto" aria-describedby="emailHelp" accept="image/*" onchange="readFile(this)">
                    <input type="hidden" class="form-control" name="perfil" aria-describedby="emailHelp" id="code64" value="null">
                </div>

                <div class="mb-3 col-xl-6">
                    <label for="nombre" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control p-2" id="nombre" aria-describedby="emailHelp" name="user" value="{{$user->name}}" required>
                </div>

                <div class="mb-3 col-xl-6">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control p-2" id="correo" aria-describedby="emailHelp" name="email" value="{{$user->email}}" required>
                </div>


                <div class="mb-3 form-check col-xl-12 d-flex justify-content-center">
                    <input type="checkbox" class="form-check-input mx-2" id="exampleCheck1" name="check" value="enviar">
                    <label class="form-check-label" for="exampleCheck1">Enviar reseteo de contraseña al usuario?</label>
                </div>

                <button type="submit" class="btn btn-primary col-xl-4 justify-items-center mt-3 rounded"  id="boton_actualizar">Actualizar perfil</button>
            <div>
        </form>
    <div>
</div>

@if(session('message'))
    <div id="alert" class="bg-success text-white p-3 rounded">
        {{session('message')}}
    </div>
@endif

<script src="{{asset('js/updateProfile/updateProfile.js')}}"></script>

@endsection