<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        $textBody = "Nombre: ". $request->name .  " De" . $request->email . " Mensaje: " . $request->message;
        //return $textBody;
        Mail::to('soymegh@gmail.com')->send(new SendMail($textBody));
        return back()->with('success', 'Email enviado correctamente');
    }
}