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
        $ads = Ad::latest()->paginate(6);
        // dd($annoucements);
        return view('welcome', compact('ads'));
    }

    public function adsByCategory(Category $category)
    {
        $categoryName = $category->name;
        $ads = Ad::latest()->where('category_id',$category->id)->paginate(6);
        // dd($ads);
        return view('welcome', compact('ads','categoryName'));
    }

    public function favs()
    {
        $ads = Auth::user()->favAds()->paginate(6);
        return view('welcome', compact('ads'));
    }

    public function searchAds(Request $request)
    {
        $query = $request->input('searched');
        
        $ads = Ad::search($request->searched)->paginate(6);
        
        return view('welcome', compact('ads','query'));
        
    }
}
