<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index (){
        $announcement_to_check = Ad::where('is_accepted',false)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement (Ad $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message','Annuncio accettato');
    }

    public function rejectAnnouncement (Ad $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message','Annuncio rifiutato');
    }
}
