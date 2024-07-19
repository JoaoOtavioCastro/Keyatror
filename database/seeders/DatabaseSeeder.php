<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Layer::factory()->create([
            'name' => 'UnProtected Layer',
            'is_protected' => false,
            'password' => null,
            'description' => 'This is a layer that is not protected by a password',
            'user_id' => 1,
        ]);
        
         \App\Models\Layer::factory(20)->create();
       
    }
}
