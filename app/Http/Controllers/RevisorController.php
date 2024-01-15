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
        $announcement->delete();
        return redirect()->back()->with('success','Annuncio rifiutato <a href="'.route('revisor.restore', $announcement->id).'"> Torna indietro </a>');
    }

    public function back(Ad $announcement)
    {
        $announcement->update(['is_accepted'=> false]);
        return redirect()->back()->with('success','Operazione annullata con successo');
    
    }

    public function restore($id)
    {
        $announcement = Ad::withTrashed()->findOrFail($id);

        if ($announcement->trashed()) {
            $announcement->restore();
        } else {
            return redirect()->back()->with('error', 'Annuncio non trovato');
        }

        return redirect()->route('revisor.index')->with('success', 'Annuncio ripristinato');
    }

    // public function undoLastAction (Ad $announcement) {

    //         $previousState = $announcement->toArray();

    //         try{
    //             $announcement->update(['is_accepted' => true]);
    //             return redirect()->back()->with('success', 'Annuncio accettato');

    //         } catch (\Exception $e){
    //          $announcement->update($previousState);

    //         return redirect()->back()->with('error', 'Annuncio rifiutato');
    //         }
    //     }

    public function workWithUs(){
        return view('revisor.work');
    }

    
}
