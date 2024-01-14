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
        $previousState = $announcement->toArray();
        $announcement->update(['is_accepted'=> true, 'previous_state'=>$previousState]);
        return redirect()->back()->with('message','Annuncio accettato');
    }

    public function rejectAnnouncement (Ad $announcement)
    {
        $previousState = $announcement->toArray();
        $announcement->update(['is_accepted'=> true, 'previous_state'=>$previousState]);
        return redirect()->back()->with('message','Annuncio rifiutato');
    }

    public function undoLastAction (Ad $announcement) {
        {
            if ($announcement->previous_state) {
                $announcement->update($announcement->previous_state);
                $announcement->update(['previous_state' => null]);
    
                return redirect()->back()->with('message', 'Operazione nnullata');
            }
    
            return redirect()->back()->with('message', 'Nessuna operazione da annullare');
        
        }
    }

    public function workWithUs(){
        return view('revisor.work');
    }

    public function becomeRevisor(){
        return view('revisor.become_revisor');
    }
}
