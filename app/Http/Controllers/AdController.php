<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class AdController extends Controller
{
    public function create()
    {
        return view('ads.create');
    }
 
    public function show(Ad $ad)
    {
        if($ad->is_accepted) {
            return view('ads.show', compact('ad'));
        } else {
            abort(403);
        }
    }

    public function news()
    {
        $ads = Ad::where('is_accepted',true)->latest()->paginate(8);

        return view('ads.index', compact('ads'));
    }

    public function popular()
    {
        $ads = Ad::where('is_accepted', true)->latest()
        ->withCount('favBy')
        ->orderByDesc('fav_by_count')
        ->paginate(8);

        return view('ads.index', compact('ads'));
    }

    public function adsByCategory(Category $category)
    {
        $categoryName = $category->name;
        $ads = Ad::where('is_accepted',true)->where('category_id',$category->id)->latest()->paginate(6);
        // dd($ads);
        return view('ads.index', compact('ads','categoryName'));
    }

    public function adsByUser(User $user)
    {
        $userName = $user->name;
        $ads = Ad::where('is_accepted',true)->where('user_id',$user->id)->latest()->paginate(6);
        // dd($ads);
        return view('ads.index', compact('ads','userName'));
    }

    public function favs()
    {
        $ads = Auth::user()->favAds()->paginate(6);
        return view('ads.index', compact('ads'));
    }

    public function searchAds(Request $request)
    {
        $query = $request->input('searched');
        
        $ads = Ad::search($request->searched)->where('is_accepted',true)->paginate(6);
        
        return view('ads.index', compact('ads','query'));
        
    }
}
