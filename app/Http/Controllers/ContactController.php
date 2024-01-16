<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;


class ContactController extends Controller
{

  
     public function workMail(Request $request){
         $mail = new ContactMail($request->name,$request->email);
         dd($email);
        
    
    
}
}