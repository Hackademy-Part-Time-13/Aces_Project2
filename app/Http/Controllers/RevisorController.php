<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index (){

        $ad_to_check = Ad::where('is_accepted',false)->first();

        $rejected_ads = Ad::onlyTrashed()->latest()->paginate(10);
        $accepted_ads = Ad::where('is_accepted',true)->latest()->paginate(10);

        return view('revisor.index', compact('ad_to_check', 'accepted_ads', 'rejected_ads'));
    }

    public function acceptAd (Ad $ad)
    {        
        $ad->update(['is_accepted' => true]);
        $ad->save();
        return redirect()->back()->with('success', 'Ad accepted! <a href="'.route('revisor.back',$ad).'"> Whoops, go back </a>');
    }

    public function rejectAd (Ad $ad)
    {
        $ad->delete();
        return redirect()->back()->with('error','Ad rejected! <a href="'.route('revisor.restore', $ad->id).'"> Whoops, go back </a>');
    }

    public function back(Ad $ad)
    {
        $ad->update(['is_accepted'=> false]);
        return redirect()->back()->with('success','Operation canceled successfully');
    
    }

    public function restore($id)
    {
        $ad = Ad::withTrashed()->findOrFail($id);

        if ($ad->trashed()) {
            $ad->restore();
        } else {
            return redirect()->back()->with('error', 'Annuncio non trovato');
        }

        return redirect()->route('revisor.index')->with('success', 'Ad restored successfully');
    }

   
    // public function undoLastAction (Ad $ad) {

    //         $previousState = $ad->toArray();

    //         try{
    //             $ad->update(['is_accepted' => true]);
    //             return redirect()->back()->with('success', 'Annuncio accettato');

    //         } catch (\Exception $e){
    //          $ad->update($previousState);

    //         return redirect()->back()->with('error', 'Annuncio rifiutato');
    //         }
    //     }

    public function workWithUs(){
        return view('revisor.work');
    }

    
}
