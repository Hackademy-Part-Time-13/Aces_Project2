<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'category_id','user_id','price','description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // funzione per ottenere gli user a cui piace tal annuncio

    public function favBy()
    {
        return $this->belongsToMany(User::class, 'user_favorite_ad');
    }
}
