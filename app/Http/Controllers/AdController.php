<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function insert(){
        return view('insert');
    }

 
   public function retail (){
     return view('announcements.retail');
   }
}
