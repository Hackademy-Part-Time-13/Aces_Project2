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
}
