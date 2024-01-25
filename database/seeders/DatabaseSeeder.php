<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    protected static ?string $password;

    public function run(): void
    {

        $categories = [
            ['title_it' => 'Electronics', 'title_en' => 'Electronics', 'title_es' => 'Electronics', 'icon' => 'fa-laptop'],
            ['title_it' => 'Vehicles', 'title_en' =>'Vehicles', 'title_es' => 'Vehicles', 'icon' => 'fa-car-side'],
            ['title_it' => 'Real Estate', 'title_en' =>'Real Estate', 'title_es'=> 'Real Estate', 'icon' => 'fa-building'],
            ['title_it' => 'Jobs', 'title_en' =>'Jobs', 'title_es'=> 'Jobs', 'icon' => 'fa-briefcase'],
            ['title_it' => 'Furniture', 'title_en' => 'Furniture', 'title_es'=> 'Furniture' , 'icon' => 'fa-hammer'],
            ['title_it' => 'Clothing', 'title_en' => 'Clothing', 'title_es'=> '','icon' => 'fa-shirt'],
            ['title_it' => 'Sport', 'title_en' =>'Sport' , 'title_es'=> 'Sport','icon' => 'fa-table-tennis-paddle-ball'],
            ['title_it' => 'Pets', 'title_en' =>'Pets', 'title_es'=> 'Pets','icon' => 'fa-cat'],
            ['title_it' => 'Services', 'title_en' => 'Services', 'title_es'=> 'Services','icon' => 'fa-bell-concierge'],
            ['title_it' => 'Collectibles', 'title_en' =>'Collectibles', 'title_es'=> 'Collectibles','icon' => 'fa-museum'],    
        ];

        foreach($categories as $category) {
            Category::create($category);
        }

        User::factory(10)->create();

        User::create([
            'name'=>'Revisore',
            'email'=>'revisor@presto.it',
            'password' => static::$password ??= Hash::make('password'),
            'is_revisor'=> true,
            'email_verified_at' => now(),            
        ]);

        // Ad::factory(30)->create(); 
        
    }
}
