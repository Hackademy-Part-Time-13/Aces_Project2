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

    public function news(Request $request)
    {
        $title = 'Last items';
        $orderby='default';

        if($request->all() && $request->input('orderby') != 'default'){
            $orderby = $request->input('orderby');
            $ads = Ad::where('is_accepted',true)->orderBy('price', $orderby)->paginate(8);
        }else{
            $ads = Ad::where('is_accepted',true)->latest()->paginate(8);
        }

        return view('ads.index', compact('ads','orderby','title'));
    }

    public function popular(Request $request)
    {
        $orderby='default';
        $title='Popular';

        if($request->all() && $request->input('orderby') != 'default'){

            $orderby = $request->input('orderby');

            $ads = Ad::where('is_accepted', true)->latest()
            ->withCount('favBy')
            ->orderByDesc('fav_by_count')
            ->orderBy('price', $orderby)
            ->paginate(8);            

        }else{
            $ads = Ad::where('is_accepted', true)->latest()
            ->withCount('favBy')
            ->orderByDesc('fav_by_count')
            ->paginate(8);
        }

        return view('ads.index', compact('ads','orderby','title'));
    }

    public function adsByCategory(Category $category, Request $request)
    {
        $title=$category->name;
        $id = $category->id;
        
        $orderby='default';

        if($request->all() && $request->input('orderby') != 'default'){

            $orderby = $request->input('orderby');
            $ads = Ad::where('is_accepted',true)->where('category_id',$category->id)->orderBy('price', $orderby)->paginate(6);

        }else{

            $ads = Ad::where('is_accepted',true)->where('category_id',$category->id)->latest()->paginate(6);
        }

        return view('ads.index', compact('ads','orderby','title','id'));

    }

    public function adsByUser(User $user, Request $request)
    {   
        $title="Items by ".$user->name;
        $id = $user->id;
        
        $orderby='default';

        if($request->all() && $request->input('orderby') != 'default'){

            $orderby = $request->input('orderby');
            $ads = Ad::where('is_accepted',true)->where('user_id',$user->id)->latest()->orderBy('price', $orderby)->paginate(6);
            
        }else{
            $ads = Ad::where('is_accepted',true)->where('user_id',$user->id)->latest()->paginate(6);
        }

        return view('ads.index', compact('ads','orderby','title','id'));
    }

    public function favs(Request $request)
    {
        $title="Wishlist";
        $orderby='default';

        if($request->all() && $request->input('orderby') != 'default'){
            $orderby = $request->input('orderby');
            $ads = Auth::user()->favAds()->orderBy('price', $orderby)->paginate(8);
        }else{
            $ads = Auth::user()->favAds()->paginate(6);
        }

        return view('ads.index', compact('ads','orderby','title'));

    }

    public function searchAds(Request $request)
    {   
        $query=$request->input('searched');
        $title="Items about ".$query;
        $orderby='default';

        if($request->has('orderby') && $request->input('orderby') != 'default'){
            $orderby = $request->input('orderby');
            $ads = Ad::search($request->searched)->where('is_accepted',true)->orderBy('price', $orderby)->paginate(8);
        }else{
            $ads = Ad::search($request->searched)->where('is_accepted',true)->paginate(6);
        }        

        return view('ads.index', compact('ads', 'title', 'orderby','query'));       
        
    }

    
}
