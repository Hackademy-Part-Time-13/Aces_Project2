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
            ['name' => 'Electronics', 'icon' => 'fa-laptop'],
            ['name' => 'Vehicles', 'icon' => 'fa-car-side'],
            ['name' => 'Real Estate', 'icon' => 'fa-building'],
            ['name' => 'Jobs', 'icon' => 'fa-briefcase'],
            ['name' => 'Furniture', 'icon' => 'fa-hammer'],
            ['name' => 'Clothing', 'icon' => 'fa-shirt'],
            ['name' => 'Sport', 'icon' => 'fa-table-tennis-paddle-ball'],
            ['name' => 'Pets', 'icon' => 'fa-cat'],
            ['name' => 'Services', 'icon' => 'fa-bell-concierge'],
            ['name' => 'Collectibles', 'icon' => 'fa-museum'],    
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

        Ad::factory(30)->create(); 
        
    }
}
