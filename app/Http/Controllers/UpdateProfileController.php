<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UpdateProfileController extends Controller
{
    function index(){
        return view('admin/pages/userConfiguration');
    }

    function update(Request $request){
        
        $foto_perfil = $request->perfil;
        $name = $request->user;
        $email = $request->email;
        $password = $request->password;

        $id_user = auth()->user()->id;


        if($foto_perfil == 'null' && $password == null){

            User::where('id', $id_user)
                        ->update(['name' => $name, 'email' => $email]);

        }else if($password == null){

            User::where('id', $id_user)
                        ->update(['name' => $name, 'email' => $email, 'photo' => $foto_perfil]);

        }else if($foto_perfil == 'null'){
            
            User::where('id', $id_user)
                        ->update(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);

        }
        
        return Redirect::back()->with('message','Se actualizo correctamente su perfil');

    }
}
