@extends('admin.admin')

@section('title', 'Administrar usuarios')

@section('content')

    <div class="row justify-content-between mt-5">

        <div class="col-xxl-5 shadow p-5 rounded h-100" id="registrar">
            <h3>Registrar nuevo usuario</h3>
            <form method="POST" id="update" autocomplete="off" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input type="text" value="{{old('name')}}" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                    @error('name')
                        <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" value="{{old('email')}}" class="form-control" id="email"  name="email">
                    @error('email')
                        <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type_user" class="form-label">Rol</label>
                    <select class="form-select" id="type_user" aria-label="Floating label select example" name="type">
                        <option value="Administrador">Administrador</option>
                        <option value="Colaborador">Usuario</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                    @error('password')
                        <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="confirmation" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control p-2" id="confirmation">
                    <span class="text-danger" id="error"></span>
                </div>

                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check" value="enviar">
                  <label class="form-check-label" for="exampleCheck1">Enviar acceso al correo electronico registrado</label>
                </div>
                <button type="submit" class="btn btn-primary" id="boton_registrar">Registrar usuario</button>
            </form>
        </div>
        <div class="col-xxl-6 pt-5 overflow-auto" id="administracion_user">
            <h3>Administrar usuarios</h3>


            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Correo electronico</th>
                    <th scope="col">Administrar</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($users as $key => $user)
                        @if (auth()->user()->id != $user->id)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{route('profile_indivual', $user->id)}}" class="btn btn-success">Administrar</a></td>
                            </tr>
                        @endif
                    @endforeach

                        
                </tbody>
              </table>

              {{ $users->links() }}

        </div>

    </div>

    @if(session('message'))
        <div id="alert" class="bg-success text-white p-3 rounded">
            {{session('message')}}
        </div>
    @endif

    @if(session('delete'))
        <div id="alert" class="bg-danger text-white p-3 rounded">
            {{session('delete')}}
        </div>
    @endif
    
    <script src="{{asset('js/updateProfile/updateProfile.js')}}"></script>

@endsection