<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Mail\RevisorMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class ContactController extends Controller
{

  
     public function workMail(){
   
        $mail = new RevisorMail(Auth::user());
        Mail::to('admin@presto.it')->send($mail);
                
        return view('mail.thanks');
    
    
}


public function makeRevisor (User $user){
   
   Artisan::call('presto:make-user-revisor', ["email"=>$user->email]);
   return redirect('/')->with('message', 'Complimenti! L\ utente è diventato revisore');

   
}
}