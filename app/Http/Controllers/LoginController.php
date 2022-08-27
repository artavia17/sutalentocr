<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class LoginController extends Controller
{

    public function __construct(){

        // Creando el usuario administrador 

        if(!User::first()){
            User::create([

                'name' => 'Alonso Fabian',
                'email' => 'admin@sutalentocr.com',
                'password' => Hash::make('SuTalentowebcr@13082022'),
                'photo' => 'null',
                'type' => 'Administrador'

            ]);
        }

    }

    public function login(Request $request){

        // Realizando validacion de los inputs

        $validator = request()->validate([

            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],

        ]); 

        // Comparando los datos con la base de datos del login

        $crendetials = request()->only('email', 'password');

        $remember = request()->filled('remember');


        // Si el usuario es correcto ingresar al if, si es incorrecto va a retornar un error

        if(Auth::attempt($crendetials, $remember)){

            request()->session()->regenerate();
            return redirect()->intended('dashboard')->with('status', 'Ha iniciado sesión correctamente');

        }

        throw ValidationException::withMessages([

            'email' => __('auth.failed')

        ]);

    }

    // Cerrar sesion

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/')->with('logout', 'Sesión cerrada correctamente');

    }
}
