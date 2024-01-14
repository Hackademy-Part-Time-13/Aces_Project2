<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function create()
    {
        return view('ads.create');
    }
 
    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    public function index()
    {
        $ads = Ad::where('is_accepted',true)->latest()->paginate(8);
        // dd($annoucements);
        return view('ads.index', compact('ads'));
    }

    public function adsByCategory(Category $category)
    {
        $categoryName = $category->name;
        $ads = Ad::where('is_accepted',true)->where('category_id',$category->id)->latest()->paginate(8);
        // dd($ads);
        return view('ads.index', compact('ads','categoryName'));
    }

    public function favs()
    {
        $ads = Auth::user()->favAds()->paginate(8);
        return view('ads.index', compact('ads'));
    }

    public function searchAds(Request $request)
    {
        $query = $request->input('searched');
        
        $ads = Ad::search($request->searched)->where('is_accepted',true)->paginate(8);
        
        return view('ads.index', compact('ads','query'));
        
    }
}
