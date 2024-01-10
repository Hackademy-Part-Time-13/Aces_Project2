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
 
    public function retail($category){

        $annoucement=Ad::findOrFail($category);
        return view('ads.retail', compact('announcement'));
   }

    public function welcome() {

        $ads = Ad::latest()->take(6)->get();
        // dd($annoucements);
        return view('welcome', compact('ads'));
    }

    public function adsByCategory(Category $category) {

        $ads = Ad::take(6)->where('category_id',$category->id)->get();
        // dd($ads);
        return view('welcome', compact('ads'));
    }
}
