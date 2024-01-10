<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function insert(){
        return view('insert');
    }
    public function welcome() {
        $annoucements = Ad::take(6)->get()->sortByDesc('created_at');
        // dd($annoucements);
        return view('welcome', compact('announcements'));
    }
}
