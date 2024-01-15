<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;

class ContactController extends Controller
{

  
    public function mail (){
        public $name;
        public $email;
        public $msg;
    
        $mail=new ContactMail ($request->name,$request->email,$request->msg);
        return redirect()->route('contact');
    

    }
}
