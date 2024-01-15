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
        
        $announcement->update(['is_accepted' => true]);
        $announcement->save();
        return redirect()->back()->with('success', 'Annuncio accettato <a href="'.route('revisor.back',$announcement).'"> Torna indietro </a>');
    }

    public function rejectAnnouncement (Ad $announcement)
    {
        $previousState = $announcement;
        $announcement->delete();
        return redirect()->back()->with('success','Annuncio rifiutato <a href="'.route('revisor.restore', $announcement->id).'"> Torna indietro </a>');
    }

    public function back(Ad $announcement)
    {
        $announcement->update(['is_accepted'=> false]);
        return redirect()->back()->with('success','Operazione annullata con successo');
    
    }

    public function restore(Ad $announcement)
    {
        $announcement = Ad::withTrashed()->find($announcement->id);
        if ($announcement && $announcement->trashed()){
            $announcement->restore();
        }
        $announcement->update(['is_accepted'=> false]);
        return redirect()->back()->with('success','Operazione annullata con successo');
    
    }

    public function undoLastAction (Ad $announcement) {

            $previousState = $announcement->toArray();

            try{
                $announcement->update(['is_accepted' => true]);
                return redirect()->back()->with('success', 'Annuncio accettato');

            } catch (\Exception $e){
             $announcement->update($previousState);

            return redirect()->back()->with('error', 'Annuncio rifiutato');
            }
        }

    public function workWithUs(){
        return view('revisor.work');
    }

    public function becomeRevisor(){
        return view('revisor.become_revisor');
    }
}
