<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('is_revisor')->except('workWithUs');
    }

    public function index (){

        $ad_to_check = Ad::where('is_accepted',false)->where('user_id','!=',auth()->user()->id)->first();

        $rejected_ads = Ad::onlyTrashed()->where('user_id','!=',auth()->user()->id)->latest()->paginate(10);
        $accepted_ads = Ad::where('is_accepted',true)->where('user_id','!=',auth()->user()->id)->latest()->paginate(10);

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

    public function workWithUs(){
        return view('revisor.work');
    }
   
    
}
