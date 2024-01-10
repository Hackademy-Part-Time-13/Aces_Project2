<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $categories = [
            'Electronics',
            'Vehicles' ,
            'Real Estate' ,
            'Jobs',
            'Furniture',
            'Clothing',
            'Sport',
            'Pets',
            'Services' ,
            'Collectibles'
        ];

        foreach($categories as $category) {
            Category::create(['name'=>$category]);
        }

        User::factory(10)->create();

        Ad::factory(30)->create();



        
    }
}
