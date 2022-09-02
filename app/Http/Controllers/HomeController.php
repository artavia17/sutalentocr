<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\notifications;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        return view('admin/pages/dashboard');
    }


    public function solicitacion(){
        notifications::create([
            'id_user_nofication' => 1,
            'id_sent_user_notification' => auth()->user()->id,
            'content' => auth()->user()->name . " ha solicitado acceso como colaborador",
            'type' => 'Administrador',
            'email_notifycation' => auth()->user()->email,
        ]);
        return Redirect::back()->with('message','La solicitud se envio con exito');
    }
}
