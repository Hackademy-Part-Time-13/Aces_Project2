<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // ultimi 4 annunci
        $last_ads = Ad::where('is_accepted',true)->latest()->take(4)->get();
        
        // 4 annunci più preferiti dagli utenti
        $popular_ads = Ad::where('is_accepted', true)->latest()
        ->withCount('favBy')
        ->orderByDesc('fav_by_count')
        ->take(4)
        ->get();
        
        return view('welcome', compact('last_ads','popular_ads'));
    }

    
}
