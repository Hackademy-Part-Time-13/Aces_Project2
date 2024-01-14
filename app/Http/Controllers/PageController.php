<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $ads = Ad::where('is_accepted',true)->latest()->paginate(8);
        // dd($annoucements);
        return view('welcome', compact('ads'));
    }
}
