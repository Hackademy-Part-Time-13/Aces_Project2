<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

  
     public function workMail(Request $request){
        $mail = new ContactMail($request->name,$request->email);
        Mail::to('admin@presto.it')->send($mail);
        // return view('mail.contact',['name'=>$request->name,'email'=>$request->email]);
         return $mail->render();
        
    
    
}
}