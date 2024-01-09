<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnunciController extends Controller
{
    public function inserisciAnnuncio(Request $request){
        return view('inserisciAnnuncio');
    }
}
