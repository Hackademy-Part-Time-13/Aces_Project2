<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ottieni l'ID dell'annuncio (ad) dalla richiesta
        $ad = $request->route('ad');
        $adId = $ad->id;
        $user = Auth::user();
        $adBelongsToUser = $user->ads()->where('id', $adId)->exists();
        
        if($adBelongsToUser){
            return $next($request);
        }

        return redirect('/profile')->with('error', 'Non puoi editare un annuncio non tuo');

        
    }
}
