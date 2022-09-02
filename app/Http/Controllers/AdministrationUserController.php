<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Mail\NuevoUsuarioMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AdministrationUserController extends Controller
{
    public function index(){

        if(auth()->user()->type == 'Administrador'){

            $users = DB::table('users')->paginate(10);

            return view('admin.pages.administrationUser', ['users' => $users]);
        }

        return redirect()->route('inicio');
    }

    public function create_user(Request $request){
        if(auth()->user()->type == 'Administrador'){
            $validator = request()->validate([

                'name' => ['required', 'string', ],
                'email'=> ['unique:users', 'required', 'string'],
                'type'=> ['required', 'string'],
                'password'=> ['required', 'string'],
            ]);

            $name = $request->name;
            $email = $request->email;
            $type = $request->type;
            $password = $request->password;
            $enviar_email = $request->check;

            if($enviar_email == 'enviar'){
                User::create([
                    'name' => $name,
                    'photo' => 'null',
                    'email' => $email,
                    'type' => $type,
                    'password' => Hash::make($password),
                ]);

                $correo = new NuevoUsuarioMailable($email, $password);

                Mail::to($email)->send($correo);

                return Redirect::back()->with('message','Usuario agregado correctamente');
            }

            User::create([
                'name' => $name,
                'photo' => 'null',
                'email' => $email,
                'type' => $type,
                'password' => Hash::make($password),
            ]);

            return Redirect::back()->with('message','Usuario agregado correctamente');

    
        }
        
        return redirect()->route('inicio');
    }
}
