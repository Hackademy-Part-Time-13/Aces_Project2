<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function insert(){
        return view('ads.insert');
    }
 
    public function retail(Ad $ad){
        
        return view('ads.retail', compact('ad'));
    }

    public function welcome() {

        $ads = Ad::latest()->take(6)->get();
        // dd($annoucements);
        return view('welcome', compact('ads'));
    }

    public function adsByCategory(Category $category) {

        $categoryName = $category->name;
        $ads = Ad::latest()->where('category_id',$category->id)->get();
        // dd($ads);
        return view('welcome', compact('ads','categoryName'));
    }
}
