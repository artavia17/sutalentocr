<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Mail\DeleteUserMailable;
use App\Mail\ActualizarUserMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserUpdateController extends Controller
{
    function index($id){

        if(auth()->user()->type == 'Administrador'){
            $user = DB::table('users')->find($id);
            return view('admin.pages.userIndividual.individualUser', ['user' => $user]);
        }

        return redirect()->route('inicio');

    }

    function update(Request $request, $id){


        if(auth()->user()->type == 'Administrador'){

            $foto_perfil = $request->perfil;
            $name = $request->user;
            $email = $request->email;
            $check = $request->check;


            if($check == "enviar"){

                $token = Str::random(400);

                User::where('id', $id)
                            ->update(['name' => $name, 'email' => $email, 'photo' => $foto_perfil, 'remember_token' => $token]);

                $user = DB::table('users')->find($id);
                $email = $user->email;
                $token = $user->remember_token;
                $correo = new ActualizarUserMailable($email, $token);
                Mail::to($email)->send($correo);
            }else{

                User::where('id', $id)
                            ->update(['name' => $name, 'email' => $email, 'photo' => $foto_perfil]);

            }
            

            return Redirect::back()->with('message','Se actualizo correctamente el usuario');

        }

        return redirect()->route('inicio');

    }

    function delete($id){

        if(auth()->user()->type == 'Administrador'){

            $user = DB::table('users')->find($id);
            $email = $user->email;

            $correo = new DeleteUserMailable();
            Mail::to($email)->send($correo);

            $deleted = DB::table('users')->where('id', $id)->delete();

            return redirect()->route('administration-profile')->with('delete', 'Usuario eliminado correctamente');
        }
        return redirect()->route('inicio');
    }
}
