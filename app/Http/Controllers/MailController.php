<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    public function getAddress()
    {
        return view('email.mailToReset');
    }

   public function send(Request $request) 
   {
    $email = $request->get("emailToReset"); 
    $validEmail = User::where('email', $email)->firstOr(function () {

    return null;
    });

    if($validEmail)
    {
        $host = $request->getHttpHost();
        $token = Crypt::encryptString($request->get("emailToReset"));
        $data=['token'=>$token,'host'=>$host];
       
        Mail::send('mail', $data, function($message) use ($email) {
             $message->to($email)->subject
                ('reset your password');
          });
          return redirect()->route('login')->with('message', 'Email with link was sent. Check your mailbox.');
    }
    else
    {
        return redirect()->route('getAddress')->withErrors(['authentication'=>'No user with such an email address']);
   }
}
}