<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $ads = Ad::where('is_accepted',true)->latest()->take(8)->get();
        // dd($annoucements);
        return view('welcome', compact('ads'));
    }
}
