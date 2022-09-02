<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\ActualizarUserMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{

    public function email_recuperation(){
        return view('recuperation', ['error' => '']);
    }

    public function email_recuperation_redirect(Request $request){

        $validator = request()->validate([
            'email' => ['required', 'email', 'string'],
        ]); 

        $email = $request->email;
        
        if(!User::where('email', $email)->exists()){

            return view('recuperation', ['error' => 'El correo electronico es incorrecto']);
        }
        
        $user = DB::table('users')->where('email', $email)->first();
        $id = $user->id;

        $token = Str::random(400);
        User::where('id', $id)
                ->update(['remember_token' => $token]);
        $user = DB::table('users')->find($id);

        $token = $user->remember_token;
        $email = $user->email;
        $correo = new ActualizarUserMailable($email, $token);
        Mail::to($email)->send($correo);

        return Redirect::back()->with('message','Se ha enviado un correo electronico para resetear la contraseña');


    }

    public function index($id){
        $token = Str::random(400);
        User::where('id', $id)
                ->update(['remember_token' => $token]);
        $user = DB::table('users')->find($id);

        $token = $user->remember_token;
        $email = $user->email;
        $correo = new ActualizarUserMailable($email, $token);
        Mail::to($email)->send($correo);

        return Redirect::back()->with('message','Se ha enviado un correo electronico para resetear la contraseña');

    }

    public function update_password_template($token){ 

        if(auth()->user()){
            return redirect()->route('inicio')->with('status', 'Para cambiar la contraseña primero debe cerrar sesion');
        }

        if(DB::table('users')->where('remember_token', $token)->exists()){
            $user = DB::table('users')->where('remember_token', $token)->get();            
            return view('reset');
        }

        return redirect()->route('login')->with('logout', 'Ha tratado de acceder a una direccion 404');

    }

    public function update_password(Request $request ,$token){

        $validator = request()->validate([

            'password' => ['required', 'string'],
        ]); 

        $password = $request->password;

        User::where('remember_token', $token)
                ->update(['password' => Hash::make($password), 'remember_token' => null]);

        return redirect()->route('login')->with('logout', 'Se ha cambiado la contraseña exitosamente');

    }
}
