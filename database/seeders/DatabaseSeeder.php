<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'Elettronica e Tecnologia',
            'Veicoli' ,
            'Immobili' ,
            'Lavoro e Occupazione',
            'Arredamento e Casa',
            'Abbigliamento e Accessori',
            'Sport e Tempo Libero',
            'Animali e Accessori',
            'Servizi' ,
            'Collezionismo e Antiquariato'
        ];

        foreach($categories as $category) {
            Category::create(['name'=>$category]);
        }
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
