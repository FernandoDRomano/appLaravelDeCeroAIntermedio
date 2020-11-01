<?php

namespace App\Http\Controllers;

use App\Mail\MessageContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    
    public function store(Request $request){
        
        $datos = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'asunto' => 'required',
            'mensaje' => 'required|min:3'
        ]);

        //Enviar el email
        Mail::to('fernandoreceptor2014@gmail.com')->send(new MessageContact($datos));

        return 'Email enviado....';
    }


}
